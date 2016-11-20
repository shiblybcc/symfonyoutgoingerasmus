<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stammdaten
 *
 * @ORM\Table(name="stammdaten")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StammdatenRepository")
 */
class Stammdaten
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
     * @ORM\Column(name="nachname", type="string", length=255)
     */
    private $nachname;

    /**
     * @var int
     *
     * @ORM\Column(name="matno", type="integer")
     */
    private $matno;





    /**
     * @ORM\OneToMany(targetEntity="Address", mappedBy="address")
     */
    private $addresses;

    /**
     * @ORM\OneToMany(targetEntity="Application", mappedBy="application")
     */
    private $applications;




    /**
     * @ORM\ManyToOne(targetEntity="Vertif", inversedBy="stammdaten")
     * @ORM\JoinColumn(name="vertif_id", referencedColumnName="id")
     */
    private $vertif;

    /**
     * @ORM\ManyToOne(targetEntity="Course", inversedBy="stammdaten")
     * @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     */
    private $course;

    /**
     * @ORM\ManyToOne(targetEntity="Stdn", inversedBy="stammdaten")
     * @ORM\JoinColumn(name="stdn_id", referencedColumnName="id")
     */
    private $stdn;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->addresses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->applications = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nachname
     *
     * @param string $nachname
     *
     * @return Stammdaten
     */
    public function setNachname($nachname)
    {
        $this->nachname = $nachname;

        return $this;
    }

    /**
     * Get nachname
     *
     * @return string
     */
    public function getNachname()
    {
        return $this->nachname;
    }

    /**
     * Set matno
     *
     * @param integer $matno
     *
     * @return Stammdaten
     */
    public function setMatno($matno)
    {
        $this->matno = $matno;

        return $this;
    }

    /**
     * Get matno
     *
     * @return integer
     */
    public function getMatno()
    {
        return $this->matno;
    }

    /**
     * Add address
     *
     * @param \AppBundle\Entity\Address $address
     *
     * @return Stammdaten
     */
    public function addAddress(\AppBundle\Entity\Address $address)
    {
        $this->addresses[] = $address;

        return $this;
    }

    /**
     * Remove address
     *
     * @param \AppBundle\Entity\Address $address
     */
    public function removeAddress(\AppBundle\Entity\Address $address)
    {
        $this->addresses->removeElement($address);
    }

    /**
     * Get addresses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * Add application
     *
     * @param \AppBundle\Entity\Application $application
     *
     * @return Stammdaten
     */
    public function addApplication(\AppBundle\Entity\Application $application)
    {
        $this->applications[] = $application;

        return $this;
    }

    /**
     * Remove application
     *
     * @param \AppBundle\Entity\Application $application
     */
    public function removeApplication(\AppBundle\Entity\Application $application)
    {
        $this->applications->removeElement($application);
    }

    /**
     * Get applications
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getApplications()
    {
        return $this->applications;
    }

    /**
     * Set vertif
     *
     * @param \AppBundle\Entity\Vertif $vertif
     *
     * @return Stammdaten
     */
    public function setVertif(\AppBundle\Entity\Vertif $vertif = null)
    {
        $this->vertif = $vertif;

        return $this;
    }

    /**
     * Get vertif
     *
     * @return \AppBundle\Entity\Vertif
     */
    public function getVertif()
    {
        return $this->vertif;
    }

    /**
     * Set course
     *
     * @param \AppBundle\Entity\Course $course
     *
     * @return Stammdaten
     */
    public function setCourse(\AppBundle\Entity\Course $course = null)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return \AppBundle\Entity\Course
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * Set stdn
     *
     * @param \AppBundle\Entity\Stdn $stdn
     *
     * @return Stammdaten
     */
    public function setStdn(\AppBundle\Entity\Stdn $stdn = null)
    {
        $this->stdn = $stdn;

        return $this;
    }

    /**
     * Get stdn
     *
     * @return \AppBundle\Entity\Stdn
     */
    public function getStdn()
    {
        return $this->stdn;
    }
}
