<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class ObjectifPedagogique
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", length=4)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $objectif;
}