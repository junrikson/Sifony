<?php

namespace Sifo\SharedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogAgenda
 */
class BlogAgenda
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $tittle;

    /**
     * @var date
     */
    private $dateStart;

    /**
     * @var date
     */
    private $dateEnd;

    /**
     * @var time
     */
    private $timeStart;

    /**
     * @var time
     */
    private $timeEnd;

    /**
     * @var string
     */
    private $place;

    /**
     * @var text
     */
    private $content;

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
     * @var \Sifo\SharedBundle\Entity\BlogCategory
     */
    private $blogCategories;

    public function __construct() {
        $this->blogCategories = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set tittle
     *
     * @param string $tittle
     * @return BlogAgenda
     */
    public function setTittle($tittle)
    {
        $this->tittle = $tittle;

        return $this;
    }

    /**
     * Get tittle
     *
     * @return string 
     */
    public function getTittle()
    {
        return $this->tittle;
    }

    /**
     * Set dateStart
     *
     * @param date $dateStart
     * @return BlogAgenda
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return date 
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateEnd
     *
     * @param date $dateEnd
     * @return BlogAgenda
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return date
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Set timeStart
     *
     * @param time $timeStart
     * @return BlogAgenda
     */
    public function setTimeStart($timeStart)
    {
        $this->timeStart = $timeStart;

        return $this;
    }

    /**
     * Get timeStart
     *
     * @return time
     */
    public function getTimeStart()
    {
        return $this->timeStart;
    }

    /**
     * Set timeEnd
     *
     * @param time $timeEnd
     * @return BlogAgenda
     */
    public function setTimeEnd($timeEnd)
    {
        $this->timeEnd = $timeEnd;

        return $this;
    }

    /**
     * Get timeEnd
     *
     * @return time
     */
    public function getTimeEnd()
    {
        return $this->timeEnd;
    }

    /**
     * Set place
     *
     * @param string $place
     * @return BlogAgenda
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return string 
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Set content
     *
     * @param text $content
     * @return BlogAgenda
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return text
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return BlogAgenda
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
     * @return BlogAgenda
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
     * @return BlogAgenda
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
     * @return BlogAgenda
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
     * Add blogMenus
     *
     * @param \Sifo\SharedBundle\Entity\BlogMenu $blogMenus
     * @return StudentsGrouping
     */
    public function addBlogMenu(\Sifo\SharedBundle\Entity\BlogMenu $blogMenus)
    {
        $this->blogMenus[] = $blogMenus;

        return $this;
    }

    /**
     * Remove blogMenus
     *
     * @param \Sifo\SharedBundle\Entity\BlogMenu $blogMenus
     */
    public function removeBlogMenu(\Sifo\SharedBundle\Entity\BlogMenu $blogMenus)
    {
        $this->blogMenus->removeElement($blogMenus);
    }

    /**
     * Get blogMenus
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBlogMenus()
    {
        return $this->blogMenus;
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
     * Set blogCategory
     *
     * @param \Sifo\SharedBundle\Entity\BlogCategory $blogCategory
     * @return Attendance
     */
    public function setBlogCategory(\Sifo\SharedBundle\Entity\BlogCategory $blogCategory)
    {
        $blogCategory->addBlogAgenda($this);
        $this->blogCategories[] = $blogCategory;

        return $this;
    }

    /**
     * Get blogCategory
     *
     * @return \Sifo\SharedBundle\Entity\BlogCategory 
     */
    public function getBlogCategory()
    {
        return $this->blogCategories;
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
        return $this->getTittle() ? $this->getTittle() : "";
    }
}
