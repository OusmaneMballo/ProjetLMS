<?php

declare(strict_types=1);

namespace Doctrine\Tests\ORM\Functional;

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\Tests\Models\ECommerce\ECommerceProduct;

use function count;

/**
 * Tests a self referential many-to-many association mapping (from a model to the same model, without inheritance).
 * For simplicity the relation duplicates entries in the association table
 * to remain symmetrical.
 */
class ManyToManySelfReferentialAssociationTest extends AbstractManyToManyAssociationTestCase
{
    protected $_firstField  = 'product_id';
    protected $_secondField = 'related_id';
    protected $_table       = 'ecommerce_products_related';
    private $firstProduct;
    private $secondProduct;
    private $firstRelated;
    private $secondRelated;

    protected function setUp(): void
    {
        $this->useModelSet('ecommerce');
        parent::setUp();
        $this->firstProduct  = new ECommerceProduct();
        $this->secondProduct = new ECommerceProduct();
        $this->firstRelated  = new ECommerceProduct();
        $this->firstRelated->setName('Business');
        $this->secondRelated = new ECommerceProduct();
        $this->secondRelated->setName('Home');
    }

    public function testSavesAManyToManyAssociationWithCascadeSaveSet(): void
    {
        $this->firstProduct->addRelated($this->firstRelated);
        $this->firstProduct->addRelated($this->secondRelated);
        $this->_em->persist($this->firstProduct);
        $this->_em->flush();

        $this->assertForeignKeysContain(
            $this->firstProduct->getId(),
            $this->firstRelated->getId()
        );
        $this->assertForeignKeysContain(
            $this->firstProduct->getId(),
            $this->secondRelated->getId()
        );
    }

    public function testRemovesAManyToManyAssociation(): void
    {
        $this->firstProduct->addRelated($this->firstRelated);
        $this->firstProduct->addRelated($this->secondRelated);
        $this->_em->persist($this->firstProduct);
        $this->firstProduct->removeRelated($this->firstRelated);

        $this->_em->flush();

        $this->assertForeignKeysNotContain(
            $this->firstProduct->getId(),
            $this->firstRelated->getId()
        );
        $this->assertForeignKeysContain(
            $this->firstProduct->getId(),
            $this->secondRelated->getId()
        );
    }

    public function testEagerLoadsOwningSide(): void
    {
        $this->_createLoadingFixture();
        $products = $this->_findProducts();
        $this->assertLoadingOfOwningSide($products);
    }

    public function testLazyLoadsOwningSide(): void
    {
        $this->_createLoadingFixture();

        $metadata                                          = $this->_em->getClassMetadata(ECommerceProduct::class);
        $metadata->associationMappings['related']['fetch'] = ClassMetadata::FETCH_LAZY;

        $query    = $this->_em->createQuery('SELECT p FROM Doctrine\Tests\Models\ECommerce\ECommerceProduct p');
        $products = $query->getResult();
        $this->assertLoadingOfOwningSide($products);
    }

    public function assertLoadingOfOwningSide($products): void
    {
        [$firstProduct, $secondProduct] = $products;
        $this->assertEquals(2, count($firstProduct->getRelated()));
        $this->assertEquals(2, count($secondProduct->getRelated()));

        $categories      = $firstProduct->getRelated();
        $firstRelatedBy  = $categories[0]->getRelated();
        $secondRelatedBy = $categories[1]->getRelated();

        $this->assertEquals(2, count($firstRelatedBy));
        $this->assertEquals(2, count($secondRelatedBy));

        $this->assertInstanceOf(ECommerceProduct::class, $firstRelatedBy[0]);
        $this->assertInstanceOf(ECommerceProduct::class, $firstRelatedBy[1]);
        $this->assertInstanceOf(ECommerceProduct::class, $secondRelatedBy[0]);
        $this->assertInstanceOf(ECommerceProduct::class, $secondRelatedBy[1]);

        $this->assertCollectionEquals($firstRelatedBy, $secondRelatedBy);
    }

    protected function _createLoadingFixture(): void
    {
        $this->firstProduct->addRelated($this->firstRelated);
        $this->firstProduct->addRelated($this->secondRelated);
        $this->secondProduct->addRelated($this->firstRelated);
        $this->secondProduct->addRelated($this->secondRelated);
        $this->_em->persist($this->firstProduct);
        $this->_em->persist($this->secondProduct);

        $this->_em->flush();
        $this->_em->clear();
    }

    protected function _findProducts()
    {
        $query = $this->_em->createQuery('SELECT p, r FROM Doctrine\Tests\Models\ECommerce\ECommerceProduct p LEFT JOIN p.related r ORDER BY p.id, r.id');

        return $query->getResult();
    }
}