<?php

namespace Sifo\SharedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StudentsGrouping
 */
class StudentsGrouping
{
    /**
     * @var integer
     */
    private $id;

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
    private $attendances;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $results;

    /**
     * @var \Sifo\SharedBundle\Entity\Grouping
     */
    private $grouping;

    /**
     * @var \Sifo\SharedBundle\Entity\Student
     */
    private $student;

    /**
     * @var \Sifo\SharedBundle\Entity\Semester
     */
    private $semester;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->attendances = new \Doctrine\Common\Collections\ArrayCollection();
        $this->results = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set description
     *
     * @param string $description
     * @return StudentsGrouping
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
     * @return StudentsGrouping
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
     * @return StudentsGrouping
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
     * @return StudentsGrouping
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
     * @return StudentsGrouping
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
     * Add attendances
     *
     * @param \Sifo\SharedBundle\Entity\Attendance $attendances
     * @return StudentsGrouping
     */
    public function addAttendance(\Sifo\SharedBundle\Entity\Attendance $attendances)
    {
        $this->attendances[] = $attendances;

        return $this;
    }

    /**
     * Remove attendances
     *
     * @param \Sifo\SharedBundle\Entity\Attendance $attendances
     */
    public function removeAttendance(\Sifo\SharedBundle\Entity\Attendance $attendances)
    {
        $this->attendances->removeElement($attendances);
    }

    /**
     * Get attendances
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAttendances()
    {
        return $this->attendances;
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
     * Set grouping
     *
     * @param \Sifo\SharedBundle\Entity\Grouping $grouping
     * @return StudentsGrouping
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
     * Set student
     *
     * @param \Sifo\SharedBundle\Entity\Student $student
     * @return StudentsGrouping
     */
    public function setStudent(\Sifo\SharedBundle\Entity\Student $student)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \Sifo\SharedBundle\Entity\Student 
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set semester
     *
     * @param $semester
     * @return integer
     */
    public function setSemester($semester)
    {
        $this->semester = $semester;

        return $this;
    }

    /**
     * Get semester
     *
     * @return integer
     */
    public function getSemester()
    {
        return $this->semester;
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
        return $this->getStudent()->getCode()." - ".$this->getStudent()->getName() ? $this->getStudent()->getCode()." - ".$this->getStudent()->getName() : "";
    }
}
