<?php

namespace Sifo\SharedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Period
 */
class Period
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
     * @var date
     */
    private $dateStarted;

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
    private $students;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->groupings = new \Doctrine\Common\Collections\ArrayCollection();
        $this->students = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Period
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
     * Set yearStarted
     *
     * @param string $date
     * @return YearStarted
     */
    public function setDateStarted($dateStarted)
    {
        $this->dateStarted = $dateStarted;

        return $this;
    }

    /**
     * Get yearStarted
     *
     * @return date 
     */
    public function getDateStarted()
    {
        return $this->dateStarted;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Period
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
     * @return Period
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
     * @return Period
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
     * @return Period
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
     * @return Period
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
     * @return Period
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
     * Add groupings
     *
     * @param \Sifo\SharedBundle\Entity\Grouping $groupings
     * @return Period
     */
    public function addStudent(\Sifo\SharedBundle\Entity\Student $students)
    {
        $this->students[] = $students;

        return $this;
    }

    /**
     * Remove groupings
     *
     * @param \Sifo\SharedBundle\Entity\Grouping $groupings
     */
    public function removeStudent(\Sifo\SharedBundle\Entity\Student $students)
    {
        $this->students->removeElement($students);
    }

    /**
     * Get groupings
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStudents()
    {
        return $this->students;
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

    public function __toString()
    {
        return $this->getName() ? $this->getName() : "";
    }
}
