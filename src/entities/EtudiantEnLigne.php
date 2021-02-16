<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class EtudiantEnLigne
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", length=4)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
}