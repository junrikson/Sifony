<?php

namespace Sifo\SharedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SubjectsGrouping
 */
class SubjectsGrouping
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $category;

    /**
     * @var string
     */
    private $day;

    /**
     * @var \DateTime
     */
    private $startTime;

    /**
     * @var \DateTime
     */
    private $endTime;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $results;

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
     * @var \Sifo\SharedBundle\Entity\Grouping
     */
    private $grouping;

    /**
     * @var \Sifo\SharedBundle\Entity\Subject
     */
    private $subject;

    /**
     * @var \Sifo\SharedBundle\Entity\Employee
     */
    private $employee;


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
     * Set category
     *
     * @param string $category
     * @return SubjectsGrouping
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set day
     *
     * @param string $day
     * @return SubjectsGrouping
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return string 
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set startTime
     *
     * @param \DateTime $startTime
     * @return SubjectsGrouping
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return \DateTime 
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set endTime
     *
     * @param \DateTime $endTime
     * @return SubjectsGrouping
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * Get endTime
     *
     * @return \DateTime 
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return SubjectsGrouping
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
     * Add results
     *
     * @param \Sifo\SharedBundle\Entity\Result $results
     * @return StudentsGrouping
     */
    public function addResult(\Sifo\SharedBundle\Entity\Result $results)
    {
        $this->results[] = $results;

        return $this;
    }

    /**
     * Remove results
     *
     * @param \Sifo\SharedBundle\Entity\Result $results
     */
    public function removeResult(\Sifo\SharedBundle\Entity\Result $results)
    {
        $this->results->removeElement($results);
    }

    /**
     * Get results
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return SubjectsGrouping
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
     * @return SubjectsGrouping
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
     * @return SubjectsGrouping
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
     * @return SubjectsGrouping
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
     * Set grouping
     *
     * @param \Sifo\SharedBundle\Entity\Grouping $grouping
     * @return SubjectsGrouping
     */
    public function setGrouping(\Sifo\SharedBundle\Entity\Grouping $grouping)
    {
        $this->grouping = $grouping;

        return $this;
    }

    /**
     * Get grouping
     *
     * @return \Sifo\SharedBundle\Entity\Grouping 
     */
    public function getGrouping()
    {
        return $this->grouping;
    }

    /**
     * Set subject
     *
     * @param \Sifo\SharedBundle\Entity\Subject $subject
     * @return SubjectsGrouping
     */
    public function setSubject(\Sifo\SharedBundle\Entity\Subject $subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return \Sifo\SharedBundle\Entity\Subject 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set employee
     *
     * @param \Sifo\SharedBundle\Entity\Employee $employee
     * @return SubjectsGrouping
     */
    public function setEmployee(\Sifo\SharedBundle\Entity\Employee $employee)
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * Get employee
     *
     * @return \Sifo\SharedBundle\Entity\Employee 
     */
    public function getEmployee()
    {
        return $this->employee;
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
        return ($this->category.' - '.$this->getSubject()->getName()) ? ($this->category.' - '.$this->getSubject()->getName()) : "";
    }
}
