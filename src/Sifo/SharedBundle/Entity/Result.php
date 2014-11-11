<?php

namespace Sifo\SharedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Result
 */
class Result
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var float
     */
    private $number1;

    /**
     * @var float
     */
    private $number2;

    /**
     * @var float
     */
    private $number3;

    /**
     * @var float
     */
    private $number4;

    /**
     * @var float
     */
    private $number5;

    /**
     * @var string
     */
    private $text1;

    /**
     * @var string
     */
    private $text2;

    /**
     * @var string
     */
    private $text3;

    /**
     * @var string
     */
    private $text4;

    /**
     * @var string
     */
    private $text5;

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
     * @var \Sifo\SharedBundle\Entity\StudentsGrouping
     */
    private $studentsGrouping;

    /**
     * @var \Sifo\SharedBundle\Entity\SubjectsGrouping
     */
    private $subjectsGrouping;

    /**
     * @var \Sifo\SharedBundle\Entity\program
     */
    private $program;


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
     * Set number1
     *
     * @param float $number1
     * @return Result
     */
    public function setNumber1($number1)
    {
        $this->number1 = $number1;

        return $this;
    }

    /**
     * Get number1
     *
     * @return float 
     */
    public function getNumber1()
    {
        return $this->number1;
    }

    /**
     * Set number2
     *
     * @param float $number2
     * @return Result
     */
    public function setNumber2($number2)
    {
        $this->number2 = $number2;

        return $this;
    }

    /**
     * Get number2
     *
     * @return float 
     */
    public function getNumber2()
    {
        return $this->number2;
    }

    /**
     * Set number3
     *
     * @param float $number3
     * @return Result
     */
    public function setNumber3($number3)
    {
        $this->number3 = $number3;

        return $this;
    }

    /**
     * Get number3
     *
     * @return float 
     */
    public function getNumber3()
    {
        return $this->number3;
    }

    /**
     * Set number4
     *
     * @param float $number4
     * @return Result
     */
    public function setNumber4($number4)
    {
        $this->number4 = $number4;

        return $this;
    }

    /**
     * Get number4
     *
     * @return float 
     */
    public function getNumber4()
    {
        return $this->number4;
    }

    /**
     * Set number5
     *
     * @param float $number5
     * @return Result
     */
    public function setNumber5($number5)
    {
        $this->number5 = $number5;

        return $this;
    }

    /**
     * Get number5
     *
     * @return float 
     */
    public function getNumber5()
    {
        return $this->number5;
    }

    /**
     * Set text1
     *
     * @param string $text1
     * @return Result
     */
    public function setText1($text1)
    {
        $this->text1 = $text1;

        return $this;
    }

    /**
     * Get text1
     *
     * @return string 
     */
    public function getText1()
    {
        return $this->text1;
    }

    /**
     * Set text2
     *
     * @param string $text2
     * @return Result
     */
    public function setText2($text2)
    {
        $this->text2 = $text2;

        return $this;
    }

    /**
     * Get text2
     *
     * @return string 
     */
    public function getText2()
    {
        return $this->text2;
    }

    /**
     * Set text3
     *
     * @param string $text3
     * @return Result
     */
    public function setText3($text3)
    {
        $this->text3 = $text3;

        return $this;
    }

    /**
     * Get text3
     *
     * @return string 
     */
    public function getText3()
    {
        return $this->text3;
    }

    /**
     * Set text4
     *
     * @param string $text4
     * @return Result
     */
    public function setText4($text4)
    {
        $this->text4 = $text4;

        return $this;
    }

    /**
     * Get text4
     *
     * @return string 
     */
    public function getText4()
    {
        return $this->text4;
    }

    /**
     * Set text5
     *
     * @param string $text5
     * @return Result
     */
    public function setText5($text5)
    {
        $this->text5 = $text5;

        return $this;
    }

    /**
     * Get text5
     *
     * @return string 
     */
    public function getText5()
    {
        return $this->text5;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Result
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
     * @return Result
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
     * @return Result
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
     * @return Result
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
     * @return Result
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
     * Set studentsGrouping
     *
     * @param \Sifo\SharedBundle\Entity\StudentsGrouping $studentsGrouping
     * @return Result
     */
    public function setStudentsGrouping(\Sifo\SharedBundle\Entity\StudentsGrouping $studentsGrouping)
    {
        $this->studentsGrouping = $studentsGrouping;

        return $this;
    }

    /**
     * Get studentsGrouping
     *
     * @return \Sifo\SharedBundle\Entity\StudentsGrouping 
     */
    public function getStudentsGrouping()
    {
        return $this->studentsGrouping;
    }

    /**
     * Set subjectsGrouping
     *
     * @param \Sifo\SharedBundle\Entity\SubjectsGrouping $subjectsGrouping
     * @return Result
     */
    public function setSubjectsGrouping(\Sifo\SharedBundle\Entity\SubjectsGrouping $subjectsGrouping)
    {
        $this->subjectsGrouping = $subjectsGrouping;

        return $this;
    }

    /**
     * Get subjectsGrouping
     *
     * @return \Sifo\SharedBundle\Entity\SubjectsGrouping 
     */
    public function getSubjectsGrouping()
    {
        return $this->subjectsGrouping;
    }

    /**
     * Set program
     *
     * @param \Sifo\SharedBundle\Entity\program $program
     * @return Result
     */
    public function setProgram(\Sifo\SharedBundle\Entity\program $program)
    {
        $this->program = $program;

        return $this;
    }

    /**
     * Get program
     *
     * @return \Sifo\SharedBundle\Entity\program 
     */
    public function getProgram()
    {
        return $this->program;
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
