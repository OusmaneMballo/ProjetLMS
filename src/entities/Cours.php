<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Cours
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
    private $room;

    /**
     * @ORM\Column(type="string", length=25, nullable=false)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=25, nullable=false)
     */
    private $heure_debut;

    /**
     * @ORM\Column(type="string", length=25, nullable=false)
     */
    private $heure_fin;
}