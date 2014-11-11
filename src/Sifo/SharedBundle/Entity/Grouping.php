<?php

namespace Sifo\SharedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grouping
 */
class Grouping
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
     * @var integer
     */
    private $semester;

    /**
     * @var string
     */
    private $password1;

    /**
     * @var string
     */
    private $password2;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $subjectsGroupings;

    /**
     * @var \Sifo\SharedBundle\Entity\Period
     */
    private $period;

    /**
     * @var \Sifo\SharedBundle\Entity\Classroom
     */
    private $classroom;

    /**
     * @var \Sifo\SharedBundle\Entity\Employee
     */
    private $employee;

    /**
     * @var \Sifo\SharedBundle\Entity\Unit
     */
    private $unit;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->studentsGroupings = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Grouping
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
     * Set semester
     *
     * @param integer $semester
     * @return Grouping
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
     * Set password1
     *
     * @param string $password1
     * @return Grouping
     */
    public function setPassword1($password1)
    {
        $this->password1 = $password1;

        return $this;
    }

    /**
     * Get password1
     *
     * @return string 
     */
    public function getPassword1()
    {
        return $this->password1;
    }

    /**
     * Set password2
     *
     * @param string $password2
     * @return Grouping
     */
    public function setPassword2($password2)
    {
        $this->password2 = $password2;

        return $this;
    }

    /**
     * Get password2
     *
     * @return string 
     */
    public function getPassword2()
    {
        return $this->password2;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Grouping
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
     * @return Grouping
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
     * @return Grouping
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
     * @return Grouping
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
     * @return Grouping
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
     * @return Grouping
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
     * Add subjectsGroupings
     *
     * @param \Sifo\SharedBundle\Entity\SubjectsGrouping $subjectsGroupings
     * @return Grouping
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
     * Set period
     *
     * @param \Sifo\SharedBundle\Entity\Period $period
     * @return Grouping
     */
    public function setPeriod(\Sifo\SharedBundle\Entity\Period $period)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get period
     *
     * @return \Sifo\SharedBundle\Entity\Period 
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set classroom
     *
     * @param \Sifo\SharedBundle\Entity\Classroom $classroom
     * @return Grouping
     */
    public function setClassroom(\Sifo\SharedBundle\Entity\Classroom $classroom)
    {
        $this->classroom = $classroom;

        return $this;
    }

    /**
     * Get classroom
     *
     * @return \Sifo\SharedBundle\Entity\Classroom 
     */
    public function getClassroom()
    {
        return $this->classroom;
    }

    /**
     * Set employee
     *
     * @param \Sifo\SharedBundle\Entity\Employee $employee
     * @return Grouping
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
     * Set unit
     *
     * @param \Sifo\SharedBundle\Entity\Unit $unit
     * @return Grouping
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
