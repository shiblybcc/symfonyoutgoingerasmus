<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vertif
 *
 * @ORM\Table(name="vertif")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VertifRepository")
 */
class Vertif
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * @ORM\OneToMany(targetEntity="Stammdaten", mappedBy="stammdaten")
     */
    private $stammdatens;




    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Vertif
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->stammdatens = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add stammdaten
     *
     * @param \AppBundle\Entity\Stammdaten $stammdaten
     *
     * @return Vertif
     */
    public function addStammdaten(\AppBundle\Entity\Stammdaten $stammdaten)
    {
        $this->stammdatens[] = $stammdaten;

        return $this;
    }

    /**
     * Remove stammdaten
     *
     * @param \AppBundle\Entity\Stammdaten $stammdaten
     */
    public function removeStammdaten(\AppBundle\Entity\Stammdaten $stammdaten)
    {
        $this->stammdatens->removeElement($stammdaten);
    }

    /**
     * Get stammdatens
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStammdatens()
    {
        return $this->stammdatens;
    }
}
