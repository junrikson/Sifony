<?php

namespace Sifo\SharedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Student
 */
class Student implements UserInterface, \Serializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $facebookId;

    /**
     * @var string
     */
    private $facebookAccessToken;

    /**
     * @var string
     */
    private $twitterId;

    /**
     * @var string
     */
    private $twitterAccessToken;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $otherCode;

    /**
     * @var string
     */
    private $name;

    /**
     * @var date
     */
    private $dateEntered;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $salt;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var string
     */
    private $birthPlace;

    /**
     * @var \DateTime
     */
    private $birthDate;

    /**
     * @var string
     */
    private $religion;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $mobile;

    /**
     * @var string
     */
    private $bloodType;

    /**
     * @var string
     */
    private $fatherName;

    /**
     * @var string
     */
    private $fatherJob;

    /**
     * @var string
     */
    private $fatherPhone;

    /**
     * @var string
     */
    private $motherName;

    /**
     * @var string
     */
    private $motherJob;

    /**
     * @var string
     */
    private $motherPhone;

    /**
     * @var string
     */
    private $custodianName;

    /**
     * @var string
     */
    private $custodianJob;

    /**
     * @var string
     */
    private $custodianPhone;

    /**
     * @var string
     */
    private $description;

    /**
     * @var boolean
     */
    private $isActive;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var string
     */
    private $operator;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $studentsGroupings;

    /**
     * @var \Sifo\SharedBundle\Entity\Unit
     */
    private $unit;

    /**
     * @var \Sifo\SharedBundle\Entity\Period
     */
    private $period;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->studentsGroupings = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set email
     *
     * @param string $email
     * @return Student
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
     * Set facebookId
     *
     * @param string $facebookId
     * @return Student
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    /**
     * Get facebookId
     *
     * @return string 
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * Set facebookAccessToken
     *
     * @param string $facebookAccessToken
     * @return Student
     */
    public function setFacebookAccessToken($facebookAccessToken)
    {
        $this->facebookAccessToken = $facebookAccessToken;

        return $this;
    }

    /**
     * Get facebookAccessToken
     *
     * @return string 
     */
    public function getFacebookAccessToken()
    {
        return $this->facebookAccessToken;
    }

    /**
     * Set TwitterId
     *
     * @param string $twitterId
     * @return Student
     */
    public function setTwitterId($twitterId)
    {
        $this->twitterId = $twitterId;

        return $this;
    }

    /**
     * Set twitterAccessToken
     *
     * @param string $twitterAccessToken
     * @return Student
     */
    public function setTwitterAccessToken($twitterAccessToken)
    {
        $this->twitterAccessToken = $twitterAccessToken;

        return $this;
    }

    /**
     * Get twitterAccessToken
     *
     * @return string 
     */
    public function getTwitterAccessToken()
    {
        return $this->twitterAccessToken;
    }

    /**
     * Get TwitterId
     *
     * @return string 
     */
    public function getTwitterId()
    {
        return $this->twitterId;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Student
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
     * Set otherCode
     *
     * @param string $otherCode
     * @return Student
     */
    public function setOtherCode($otherCode)
    {
        $this->otherCode = $otherCode;

        return $this;
    }

    /**
     * Get otherCode
     *
     * @return string 
     */
    public function getOtherCode()
    {
        return $this->otherCode;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Student
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     * @return Student
     */
    public function setDateEntered($dateEntered)
    {
        $this->dateEntered = $dateEntered;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime 
     */
    public function getDateEntered()
    {
        return $this->dateEntered;
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
     * Set password
     *
     * @param string $password
     * @return Student
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
     * Set salt
     *
     * @param string $salt
     * @return Student
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Student
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set birthPlace
     *
     * @param string $birthPlace
     * @return Student
     */
    public function setBirthPlace($birthPlace)
    {
        $this->birthPlace = $birthPlace;

        return $this;
    }

    /**
     * Get birthPlace
     *
     * @return string 
     */
    public function getBirthPlace()
    {
        return $this->birthPlace;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     * @return Student
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime 
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set religion
     *
     * @param string $religion
     * @return Student
     */
    public function setReligion($religion)
    {
        $this->religion = $religion;

        return $this;
    }

    /**
     * Get religion
     *
     * @return string 
     */
    public function getReligion()
    {
        return $this->religion;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Student
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
     * Set phone
     *
     * @param string $phone
     * @return Student
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
     * Set mobile
     *
     * @param string $mobile
     * @return Student
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set bloodType
     *
     * @param string $bloodType
     * @return Student
     */
    public function setBloodType($bloodType)
    {
        $this->bloodType = $bloodType;

        return $this;
    }

    /**
     * Get bloodType
     *
     * @return string 
     */
    public function getBloodType()
    {
        return $this->bloodType;
    }

    /**
     * Set fatherName
     *
     * @param string $fatherName
     * @return Student
     */
    public function setFatherName($fatherName)
    {
        $this->fatherName = $fatherName;

        return $this;
    }

    /**
     * Get fatherName
     *
     * @return string 
     */
    public function getFatherName()
    {
        return $this->fatherName;
    }

    /**
     * Set fatherJob
     *
     * @param string $fatherJob
     * @return Student
     */
    public function setFatherJob($fatherJob)
    {
        $this->fatherJob = $fatherJob;

        return $this;
    }

    /**
     * Get fatherJob
     *
     * @return string 
     */
    public function getFatherJob()
    {
        return $this->fatherJob;
    }

    /**
     * Set fatherPhone
     *
     * @param string $fatherPhone
     * @return Student
     */
    public function setFatherPhone($fatherPhone)
    {
        $this->fatherPhone = $fatherPhone;

        return $this;
    }

    /**
     * Get fatherPhone
     *
     * @return string 
     */
    public function getFatherPhone()
    {
        return $this->fatherPhone;
    }

    /**
     * Set motherName
     *
     * @param string $motherName
     * @return Student
     */
    public function setMotherName($motherName)
    {
        $this->motherName = $motherName;

        return $this;
    }

    /**
     * Get motherName
     *
     * @return string 
     */
    public function getMotherName()
    {
        return $this->motherName;
    }

    /**
     * Set motherJob
     *
     * @param string $motherJob
     * @return Student
     */
    public function setMotherJob($motherJob)
    {
        $this->motherJob = $motherJob;

        return $this;
    }

    /**
     * Get motherJob
     *
     * @return string 
     */
    public function getMotherJob()
    {
        return $this->motherJob;
    }

    /**
     * Set motherPhone
     *
     * @param string $motherPhone
     * @return Student
     */
    public function setMotherPhone($motherPhone)
    {
        $this->motherPhone = $motherPhone;

        return $this;
    }

    /**
     * Get motherPhone
     *
     * @return string 
     */
    public function getMotherPhone()
    {
        return $this->motherPhone;
    }

    /**
     * Set custodianName
     *
     * @param string $custodianName
     * @return Student
     */
    public function setCustodianName($custodianName)
    {
        $this->custodianName = $custodianName;

        return $this;
    }

    /**
     * Get custodianName
     *
     * @return string 
     */
    public function getCustodianName()
    {
        return $this->custodianName;
    }

    /**
     * Set custodianJob
     *
     * @param string $custodianJob
     * @return Student
     */
    public function setCustodianJob($custodianJob)
    {
        $this->custodianJob = $custodianJob;

        return $this;
    }

    /**
     * Get custodianJob
     *
     * @return string 
     */
    public function getCustodianJob()
    {
        return $this->custodianJob;
    }

    /**
     * Set custodianPhone
     *
     * @param string $custodianPhone
     * @return Student
     */
    public function setCustodianPhone($custodianPhone)
    {
        $this->custodianPhone = $custodianPhone;

        return $this;
    }

    /**
     * Get custodianPhone
     *
     * @return string 
     */
    public function getCustodianPhone()
    {
        return $this->custodianPhone;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Student
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
     * Set isActive
     *
     * @param boolean $isActive
     * @return Student
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Student
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Student
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set operator
     *
     * @param string $operator
     * @return Student
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * Get operator
     *
     * @return string 
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Add studentsGroupings
     *
     * @param \Sifo\SharedBundle\Entity\StudentsGrouping $studentsGroupings
     * @return Student
     */
    public function addStudentsGrouping(\Sifo\SharedBundle\Entity\StudentsGrouping $studentsGroupings)
    {
        $this->studentsGroupings[] = $studentsGroupings;

        return $this;
    }

    /**
     * Remove studentsGroupings
     *
     * @param \Sifo\SharedBundle\Entity\StudentsGrouping $studentsGroupings
     */
    public function removeStudentsGrouping(\Sifo\SharedBundle\Entity\StudentsGrouping $studentsGroupings)
    {
        $this->studentsGroupings->removeElement($studentsGroupings);
    }

    /**
     * Get studentsGroupings
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStudentsGroupings()
    {
        return $this->studentsGroupings;
    }

    /**
     * Set unit
     *
     * @param \Sifo\SharedBundle\Entity\Unit $unit
     * @return Student
     */
    public function setUnit(\Sifo\SharedBundle\Entity\Unit $unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return \Sifo\SharedBundle\Entity\Unit 
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set unit
     *
     * @param \Sifo\SharedBundle\Entity\Unit $unit
     * @return Student
     */
    public function setPeriod(\Sifo\SharedBundle\Entity\Period $period)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get unit
     *
     * @return \Sifo\SharedBundle\Entity\Unit 
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        if(!$this->getCreatedAt()) {
            $this->createdAt = new \DateTime();
        }
    }
 
    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        $this->updatedAt = new \DateTime();
    }

    public function getUsername()
    {
        return $this->code;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->code,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->code,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }

    public function __toString()
    {
        return $this->getName() ? $this->getName() : "";
    }
}
