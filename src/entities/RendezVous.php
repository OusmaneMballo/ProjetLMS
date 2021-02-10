<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class RendezVous
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="date", length=20, nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="time", length=20, nullable=true)
     */
    private $heuredebut;

    /**
     * @ORM\Column(type="time", length=20, nullable=true)
     */
    private $heurefin;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $objet;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link;
}