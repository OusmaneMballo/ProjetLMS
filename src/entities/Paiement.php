<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Paiement
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $type;

    /**
     * @ORM\OneToOne(targetEntity="Facture2", mappedBy="Paiement")
     */
    private $Factures;

    /**
     * @ORM\OneToMany(targetEntity="Abonnement2", mappedBy="Paiement")
     */
    private $Abonnements;
}