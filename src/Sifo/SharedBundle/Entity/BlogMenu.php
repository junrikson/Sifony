<?php

namespace Sifo\SharedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogMenu
 */
class BlogMenu
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
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $orders;

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
    private $blogCategory;

    /**
     * @var \Sifo\SharedBundle\Entity\BlogPage
     */
    private $blogPage;

    /**
     * @var \Sifo\SharedBundle\Entity\BlogMenu
     */
    private $parent;

    /**
     * @var array
     */
    private $children;

    public function __construct() {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return BlogMenu
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
     * Set name
     *
     * @param string $name
     * @return BlogMenu
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
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return BlogMenu
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return BlogMenu
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
     * Set orders
     *
     * @param integer $orders
     * @return BlogMenu
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;

        return $this;
    }

    /**
     * Get orders
     *
     * @return integer 
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return BlogMenu
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
     * @return BlogMenu
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
     * @return BlogMenu
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
     * @return BlogMenu
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
     * Set blogCategory
     *
     * @param \Sifo\SharedBundle\Entity\BlogCategory $blogCategory
     * @return Attendance
     */
    public function setBlogCategory(\Sifo\SharedBundle\Entity\BlogCategory $blogCategory)
    {
        $this->blogCategory = $blogCategory;

        return $this;
    }

    /**
     * Get blogCategory
     *
     * @return \Sifo\SharedBundle\Entity\BlogCategory 
     */
    public function getBlogCategory()
    {
        return $this->blogCategory;
    }

    /**
     * Set blogPage
     *
     * @param \Sifo\SharedBundle\Entity\BlogPage $blogPage
     * @return Attendance
     */
    public function setBlogPage(\Sifo\SharedBundle\Entity\BlogPage $blogPage = null)
    {
        $this->blogPage = $blogPage;

        return $this;
    }

    /**
     * Get blogPage
     *
     * @return \Sifo\SharedBundle\Entity\BlogPage 
     */
    public function getBlogPage()
    {
        return $this->blogPage;
    }

    /**
     * Set parent
     *
     * @param \Sifo\SharedBundle\Entity\BlogMenu $parent
     * @return Attendance
     */
    public function setParent(\Sifo\SharedBundle\Entity\BlogMenu $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Sifo\SharedBundle\Entity\BlogMenu
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add children
     *
     * @param \Sifo\SharedBundle\Entity\BlogMenu $children
     * @return BlogMenu
     */
    public function addChildren(\Sifo\SharedBundle\Entity\BlogMenu $children)
    {
        $this->children[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param \Sifo\SharedBundle\Entity\BlogMenu $children
     */
    public function removeChildren(\Sifo\SharedBundle\Entity\BlogMenu $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get groupings
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
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
