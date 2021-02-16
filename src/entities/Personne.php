<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Personne
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", length=4)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=45, nullable=false)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $lieu_naissance;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $nci;
}