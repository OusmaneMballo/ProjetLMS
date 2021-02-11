<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Abonnement
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $montant;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateFin;

    /**
     * @ORM\ManyToOne(targetEntity="Paiement2", inversedBy="Abonnements")
     * @ORM\JoinColumn(name="paiement_id", referencedColumnName="id")
     */
    private $Paiement;
}