<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CustomerRepository")
 */
class Customer
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
     * @var int
     *
     * @ORM\Column(name="dartagnan_link", type="integer")
     */
    private $dartagnanLink = '';

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=255)
     */
    private $company = '';

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=255)
     */
    private $contact = '';

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password = '';

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code = '';

    /**
     * @var string
     *
     * @ORM\Column(name="address_1", type="string", length=255)
     */
    private $address1 = '';

    /**
     * @var string
     *
     * @ORM\Column(name="address_2", type="string", length=255)
     */
    private $address2 = '';

    /**
     * @var string
     *
     * @ORM\Column(name="address_3", type="string", length=255)
     */
    private $address3 = '';

    /**
     * @var string
     *
     * @ORM\Column(name="address_4", type="string", length=255)
     */
    private $address4 = '';

    /**
     * @var string
     *
     * @ORM\Column(name="directory", type="string", length=255)
     */
    private $directory = '';

    /**
     * @var string
     *
     * @ORM\Column(name="zip_code", type="string", length=255)
     */
    private $zipCode = '';

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city = '';

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     */
    private $country = '';

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone = '';

    /**
     * @var string
     *
     * @ORM\Column(name="cellphone", type="string", length=255)
     */
    private $cellphone = '';

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=255)
     */
    private $fax = '';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email = '';

    /**
     * @var string
     *
     * @ORM\Column(name="prefix", type="string", length=255)
     */
    private $prefix = '';

    /**
     * @var string
     *
     * @ORM\Column(name="suffix", type="string", length=255)
     */
    private $suffix = '';

    /**
     * @var int
     *
     * @ORM\Column(name="format", type="integer")
     */
    private $format = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255)
     */
    private $logo = '';

    /**
     * @var string
     *
     * @ORM\Column(name="server", type="string", length=255)
     */
    private $server = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="addr_chgt_unchangeable", type="boolean")
     */
    private $addrChgtUnchangeable = false;

    /**
     * @var bool
     *
     * @ORM\Column(name="addr_liv_unchangeable", type="boolean")
     */
    private $addrLivUnchangeable = false;


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
     * Set dartagnanLink
     *
     * @param integer $dartagnanLink
     *
     * @return Customer
     */
    public function setDartagnanLink($dartagnanLink)
    {
        $this->dartagnanLink = $dartagnanLink;

        return $this;
    }

    /**
     * Get dartagnanLink
     *
     * @return int
     */
    public function getDartagnanLink()
    {
        return $this->dartagnanLink;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return Customer
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set contact
     *
     * @param string $contact
     *
     * @return Customer
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Customer
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Customer
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set address1
     *
     * @param string $address1
     *
     * @return Customer
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Get address1
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     *
     * @return Customer
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Get address2
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set address3
     *
     * @param string $address3
     *
     * @return Customer
     */
    public function setAddress3($address3)
    {
        $this->address3 = $address3;

        return $this;
    }

    /**
     * Get address3
     *
     * @return string
     */
    public function getAddress3()
    {
        return $this->address3;
    }

    /**
     * Set address4
     *
     * @param string $address4
     *
     * @return Customer
     */
    public function setAddress4($address4)
    {
        $this->address4 = $address4;

        return $this;
    }

    /**
     * Get address4
     *
     * @return string
     */
    public function getAddress4()
    {
        return $this->address4;
    }

    /**
     * Set directory
     *
     * @param string $directory
     *
     * @return Customer
     */
    public function setDirectory($directory)
    {
        $this->directory = $directory;

        return $this;
    }

    /**
     * Get directory
     *
     * @return string
     */
    public function getDirectory()
    {
        return $this->directory;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return Customer
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Customer
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
     * Set country
     *
     * @param string $country
     *
     * @return Customer
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Customer
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set cellphone
     *
     * @param string $cellphone
     *
     * @return Customer
     */
    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;

        return $this;
    }

    /**
     * Get cellphone
     *
     * @return string
     */
    public function getCellphone()
    {
        return $this->cellphone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     *
     * @return Customer
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set prefix
     *
     * @param string $prefix
     *
     * @return Customer
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * Get prefix
     *
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * Set suffix
     *
     * @param string $suffix
     *
     * @return Customer
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;

        return $this;
    }

    /**
     * Get suffix
     *
     * @return string
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * Set format
     *
     * @param integer $format
     *
     * @return Customer
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return int
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set logo
     *
     * @param string $logo
     *
     * @return Customer
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set server
     *
     * @param string $server
     *
     * @return Customer
     */
    public function setServer($server)
    {
        $this->server = $server;

        return $this;
    }

    /**
     * Get server
     *
     * @return string
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * Set addrChgtUnchangeable
     *
     * @param boolean $addrChgtUnchangeable
     *
     * @return Customer
     */
    public function setAddrChgtUnchangeable($addrChgtUnchangeable)
    {
        $this->addrChgtUnchangeable = $addrChgtUnchangeable;

        return $this;
    }

    /**
     * Get addrChgtUnchangeable
     *
     * @return bool
     */
    public function getAddrChgtUnchangeable()
    {
        return $this->addrChgtUnchangeable;
    }

    /**
     * Set addrLivUnchangeable
     *
     * @param boolean $addrLivUnchangeable
     *
     * @return Customer
     */
    public function setAddrLivUnchangeable($addrLivUnchangeable)
    {
        $this->addrLivUnchangeable = $addrLivUnchangeable;

        return $this;
    }

    /**
     * Get addrLivUnchangeable
     *
     * @return bool
     */
    public function getAddrLivUnchangeable()
    {
        return $this->addrLivUnchangeable;
    }
}

