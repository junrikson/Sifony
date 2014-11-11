<?php

namespace Sifo\SharedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Employee
 */
class Employee implements UserInterface, \Serializable
{
    /**
     * @var integer
     */
    private $id;

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
    private $marital;

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
     * @var integer
     */
    private $height;

    /**
     * @var integer
     */
    private $weight;

    /**
     * @var string
     */
    private $education;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var \DateTime
     */
    private $dateEmployed;

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
    private $groupings;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $subjectsGroupings;

    /**
     * @var \Sifo\SharedBundle\Entity\Position
     */
    private $position;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->groupings = new \Doctrine\Common\Collections\ArrayCollection();
        $this->subjectsGroupings = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set code
     *
     * @param string $code
     * @return Employee
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
     * @return Employee
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
     * @return Employee
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
     * Set password
     *
     * @param string $password
     * @return Employee
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
     * @return Employee
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
     * @return Employee
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
     * @return Employee
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
     * @return Employee
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
     * @return Employee
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
     * Set marital
     *
     * @param string $marital
     * @return Employee
     */
    public function setMarital($marital)
    {
        $this->marital = $marital;

        return $this;
    }

    /**
     * Get marital
     *
     * @return string 
     */
    public function getMarital()
    {
        return $this->marital;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Employee
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
     * @return Employee
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
     * @return Employee
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
     * @return Employee
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
     * Set height
     *
     * @param integer $height
     * @return Employee
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     * @return Employee
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set education
     *
     * @param string $education
     * @return Employee
     */
    public function setEducation($education)
    {
        $this->education = $education;

        return $this;
    }

    /**
     * Get education
     *
     * @return string 
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * Set subject
     *
     * @param string $subject
     * @return Employee
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set dateEmployed
     *
     * @param \DateTime $dateEmployed
     * @return Employee
     */
    public function setDateEmployed($dateEmployed)
    {
        $this->dateEmployed = $dateEmployed;

        return $this;
    }

    /**
     * Get dateEmployed
     *
     * @return \DateTime 
     */
    public function getDateEmployed()
    {
        return $this->dateEmployed;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Employee
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
     * @return Employee
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
     * @return Employee
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
     * @return Employee
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
     * @return Employee
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
     * Add groupings
     *
     * @param \Sifo\SharedBundle\Entity\Grouping $groupings
     * @return Employee
     */
    public function addGrouping(\Sifo\SharedBundle\Entity\Grouping $groupings)
    {
        $this->groupings[] = $groupings;

        return $this;
    }

    /**
     * Remove groupings
     *
     * @param \Sifo\SharedBundle\Entity\Grouping $groupings
     */
    public function removeGrouping(\Sifo\SharedBundle\Entity\Grouping $groupings)
    {
        $this->groupings->removeElement($groupings);
    }

    /**
     * Get groupings
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroupings()
    {
        return $this->groupings;
    }

    /**
     * Add subjectsGroupings
     *
     * @param \Sifo\SharedBundle\Entity\SubjectsGrouping $subjectsGroupings
     * @return Employee
     */
    public function addSubjectsGrouping(\Sifo\SharedBundle\Entity\SubjectsGrouping $subjectsGroupings)
    {
        $this->subjectsGroupings[] = $subjectsGroupings;

        return $this;
    }

    /**
     * Remove subjectsGroupings
     *
     * @param \Sifo\SharedBundle\Entity\SubjectsGrouping $subjectsGroupings
     */
    public function removeSubjectsGrouping(\Sifo\SharedBundle\Entity\SubjectsGrouping $subjectsGroupings)
    {
        $this->subjectsGroupings->removeElement($subjectsGroupings);
    }

    /**
     * Get subjectsGroupings
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubjectsGroupings()
    {
        return $this->subjectsGroupings;
    }

    /**
     * Set position
     *
     * @param \Sifo\SharedBundle\Entity\Position $position
     * @return Employee
     */
    public function setPosition(\Sifo\SharedBundle\Entity\Position $position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return \Sifo\SharedBundle\Entity\Position 
     */
    public function getPosition()
    {
        return $this->position;
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
        return array('ROLE_ADMIN');
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
