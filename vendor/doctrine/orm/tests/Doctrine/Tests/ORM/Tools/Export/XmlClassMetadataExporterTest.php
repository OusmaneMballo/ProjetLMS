<?php

declare(strict_types=1);

namespace Doctrine\Tests\ORM\Tools\Export;

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
use Doctrine\ORM\Tools\Export\Driver\XmlExporter;

/**
 * Test case for XmlClassMetadataExporterTest
 *
 * @link        http://www.phpdoctrine.org
 */
class XmlClassMetadataExporterTest extends AbstractClassMetadataExporterTest
{
    protected function _getType(): string
    {
        return 'xml';
    }

    /**
     * @group DDC-3428
     */
    public function testSequenceGenerator(): void
    {
        $exporter = new XmlExporter();
        $metadata = new ClassMetadata('entityTest');

        $metadata->mapField(
            [
                'fieldName' => 'id',
                'type' => 'integer',
                'columnName' => 'id',
                'id' => true,
            ]
        );

        $metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_SEQUENCE);
        $metadata->setSequenceGeneratorDefinition(
            [
                'sequenceName' => 'seq_entity_test_id',
                'allocationSize' => 5,
                'initialValue' => 1,
            ]
        );

        $expectedFileContent = <<<'XML'
<?xml version="1.0" encoding="utf-8"?>
<doctrine-mapping
    xmlns="http://doctrine-project.org/schemas/orm/doctrine-mapping"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://doctrine-project.org/schemas/orm/doctrine-mapping https://www.doctrine-project.org/schemas/orm/doctrine-mapping.xsd"
>
  <entity name="entityTest">
    <id name="id" type="integer" column="id">
      <generator strategy="SEQUENCE"/>
      <sequence-generator sequence-name="seq_entity_test_id" allocation-size="5" initial-value="1"/>
    </id>
  </entity>
</doctrine-mapping>
XML;

        $this->assertXmlStringEqualsXmlString($expectedFileContent, $exporter->exportClassMetadata($metadata));
    }

    /**
     * @group 1214
     * @group 1216
     * @group DDC-3439
     */
    public function testFieldOptionsExport(): void
    {
        $exporter = new XmlExporter();
        $metadata = new ClassMetadata('entityTest');

        $metadata->mapField(
            [
                'fieldName' => 'myField',
                'type' => 'string',
                'columnName' => 'my_field',
                'options' => [
                    'default' => 'default_string',
                    'comment' => 'The comment for the field',
                ],
            ]
        );

        $expectedFileContent = <<<'XML'
<?xml version="1.0" encoding="utf-8"?>
<doctrine-mapping xmlns="http://doctrine-project.org/schemas/orm/doctrine-mapping" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://doctrine-project.org/schemas/orm/doctrine-mapping https://www.doctrine-project.org/schemas/orm/doctrine-mapping.xsd">
  <entity name="entityTest">
    <field name="myField" type="string" column="my_field">
      <options>
        <option name="default">default_string</option>
        <option name="comment">The comment for the field</option>
      </options>
    </field>
  </entity>
</doctrine-mapping>
XML;

        $this->assertXmlStringEqualsXmlString($expectedFileContent, $exporter->exportClassMetadata($metadata));
    }
}
