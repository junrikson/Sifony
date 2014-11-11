<?php

namespace Sifo\SharedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogCategory
 */
class BlogCategory
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $blogMenus;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $blogArticles;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $blogAgendas;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->blogMenus = new \Doctrine\Common\Collections\ArrayCollection();
        $this->blogArticles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->blogAgendas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return BlogCategory
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
     * @return BlogCategory
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
     * Set description
     *
     * @param string $description
     * @return BlogCategory
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
     * @return BlogCategory
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
     * @return BlogCategory
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
     * @return BlogCategory
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
     * @return BlogCategory
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
     * @return BlogCategory
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
     * Add blogArticles
     *
     * @param \Sifo\SharedBundle\Entity\BlogArticle $blogArticles
     * @return StudentsGrouping
     */
    public function addBlogArticle(\Sifo\SharedBundle\Entity\BlogArticle $blogArticles)
    {
        $this->blogArticles[] = $blogArticles;

        return $this;
    }

    /**
     * Remove blogArticles
     *
     * @param \Sifo\SharedBundle\Entity\BlogArticle $blogArticles
     */
    public function removeBlogArticle(\Sifo\SharedBundle\Entity\BlogArticle $blogArticles)
    {
        $this->blogArticles->removeElement($blogArticles);
    }

    /**
     * Get blogArticles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBlogArticles()
    {
        return $this->blogArticles;
    }

    /**
     * Add blogAgendas
     *
     * @param \Sifo\SharedBundle\Entity\BlogAgenda $blogAgendas
     * @return StudentsGrouping
     */
    public function addBlogAgenda(\Sifo\SharedBundle\Entity\BlogAgenda $blogAgendas)
    {
        $this->blogAgendas[] = $blogAgendas;

        return $this;
    }

    /**
     * Remove blogAgendas
     *
     * @param \Sifo\SharedBundle\Entity\BlogAgenda $blogAgendas
     */
    public function removeBlogAgenda(\Sifo\SharedBundle\Entity\BlogAgenda $blogAgendas)
    {
        $this->blogAgendas->removeElement($blogAgendas);
    }

    /**
     * Get blogAgendas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBlogAgendas()
    {
        return $this->blogAgendas;
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
