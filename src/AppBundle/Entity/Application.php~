<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Application
 *
 * @ORM\Table(name="application")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ApplicationRepository")
 */
class Application
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
     * @ORM\ManyToOne(targetEntity="Stammdaten", inversedBy="applications")
     * @ORM\JoinColumn(name="stammdaten_id", referencedColumnName="id")
     */
    private $stammdaten;


    /**
     * @ORM\ManyToOne(targetEntity="Uni", inversedBy="application")
     * @ORM\JoinColumn(name="uni_id", referencedColumnName="id")
     */
    private $uni;

    /**
     * @ORM\ManyToOne(targetEntity="Duration", inversedBy="application")
     * @ORM\JoinColumn(name="duration_id", referencedColumnName="id")
     */
    private $duration;




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
     * Constructor
     */
    public function __construct()
    {
        $this->unis = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set stammdaten
     *
     * @param \AppBundle\Entity\Stammdaten $stammdaten
     *
     * @return Application
     */
    public function setStammdaten(\AppBundle\Entity\Stammdaten $stammdaten = null)
    {
        $this->stammdaten = $stammdaten;

        return $this;
    }

    /**
     * Get stammdaten
     *
     * @return \AppBundle\Entity\Stammdaten
     */
    public function getStammdaten()
    {
        return $this->stammdaten;
    }

    /**
     * Add uni
     *
     * @param \AppBundle\Entity\Uni $uni
     *
     * @return Application
     */
    public function addUni(\AppBundle\Entity\Uni $uni)
    {
        $this->unis[] = $uni;

        return $this;
    }

    /**
     * Remove uni
     *
     * @param \AppBundle\Entity\Uni $uni
     */
    public function removeUni(\AppBundle\Entity\Uni $uni)
    {
        $this->unis->removeElement($uni);
    }

    /**
     * Get unis
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUnis()
    {
        return $this->unis;
    }

    /**
     * Set uni
     *
     * @param \AppBundle\Entity\Uni $uni
     *
     * @return Application
     */
    public function setUni(\AppBundle\Entity\Uni $uni = null)
    {
        $this->uni = $uni;

        return $this;
    }

    /**
     * Get uni
     *
     * @return \AppBundle\Entity\Uni
     */
    public function getUni()
    {
        return $this->uni;
    }

    /**
     * Set duration
     *
     * @param \AppBundle\Entity\Duration $duration
     *
     * @return Application
     */
    public function setDuration(\AppBundle\Entity\Duration $duration = null)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return \AppBundle\Entity\Duration
     */
    public function getDuration()
    {
        return $this->duration;
    }
}
