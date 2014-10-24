<?php

namespace FitClubs\Bundle\ClubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Club
 */
class Club
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $address;

    /**
     * @var float
     */
    private $geolat;

    /**
     * @var float
     */
    private $geolng;


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
     * Set name
     *
     * @param string $name
     * @return Club
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
     * Set description
     *
     * @param string $description
     * @return Club
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Club
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Club
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set geolat
     *
     * @param float $geolat
     * @return Club
     */
    public function setGeolat($geolat)
    {
        $this->geolat = $geolat;

        return $this;
    }

    /**
     * Get geolat
     *
     * @return float 
     */
    public function getGeolat()
    {
        return $this->geolat;
    }

    /**
     * Set geolng
     *
     * @param float $geolng
     * @return Club
     */
    public function setGeolng($geolng)
    {
        $this->geolng = $geolng;

        return $this;
    }

    /**
     * Get geolng
     *
     * @return float 
     */
    public function getGeolng()
    {
        return $this->geolng;
    }
}
