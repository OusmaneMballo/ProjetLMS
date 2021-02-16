<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Profil
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true, length=50, nullable=false)
     */
    private $libelle;
}