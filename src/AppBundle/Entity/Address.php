<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AddressRepository")
 */
class Address
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
     * @ORM\Column(name="street", type="string", length=255)
     */
    private $street;

    /**
     * @var int
     *
     * @ORM\Column(name="house_no", type="integer")
     */
    private $houseNo;






    /**
     * @ORM\ManyToOne(targetEntity="Stammdaten", inversedBy="addresses")
     * @ORM\JoinColumn(name="stammdaten_id", referencedColumnName="id")
     */
    private $stammdaten;








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
     * Set street
     *
     * @param string $street
     *
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set houseNo
     *
     * @param integer $houseNo
     *
     * @return Address
     */
    public function setHouseNo($houseNo)
    {
        $this->houseNo = $houseNo;

        return $this;
    }

    /**
     * Get houseNo
     *
     * @return int
     */
    public function getHouseNo()
    {
        return $this->houseNo;
    }

    /**
     * Set stammdaten
     *
     * @param \AppBundle\Entity\Stammdaten $stammdaten
     *
     * @return Address
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
}
