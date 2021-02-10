<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Ressource
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $source;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $salon_id;

    /**
     * @ORM\ManyToOne(targetEntity="Salon", inversedBy="ressources")
     * @ORM\JoinColumn(name="salon_id2", referencedColumnName="id")
     */
    private $salon;
}