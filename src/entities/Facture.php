<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Facture
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $destinataire;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $montant;

    /**
     * @ORM\OneToOne(targetEntity="Paiement2", inversedBy="Factures")
     * @ORM\JoinColumn(name="paiement_id", referencedColumnName="id", unique=true)
     */
    private $Paiement;
}