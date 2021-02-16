<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Activite
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", length=4)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true, length=20, nullable=false)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=300, nullable=false)
     */
    private $ressource;
}