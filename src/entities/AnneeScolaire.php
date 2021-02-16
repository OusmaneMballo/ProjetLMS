<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class AnneeScolaire
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", length=4)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true, length=50, nullable=false)
     */
    private $annee_scolaire;
}