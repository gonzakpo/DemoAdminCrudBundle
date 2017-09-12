<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Page
 *
 * @ORM\Table(name="page")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PageRepository")
 */
class Page
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="page_date", type="date")
     */
    private $pageDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="page", orphanRemoval=true, cascade={"persist", "remove"})
     */
    private $posts;

    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="pageEmbed", orphanRemoval=true, cascade={"persist", "remove"})
     */
    private $postsEmbeds;


    /**
     * Construct
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->postsEmbeds = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->title;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Page
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Page
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set pageDate
     *
     * @param \DateTime $pageDate
     *
     * @return Page
     */
    public function setPageDate($pageDate)
    {
        $this->pageDate = $pageDate;

        return $this;
    }

    /**
     * Get pageDate
     *
     * @return \DateTime
     */
    public function getPageDate()
    {
        return $this->pageDate;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Page
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Add post
     *
     * @param \AppBundle\Entity\Post $post
     *
     * @return Page
     */
    public function addPost(\AppBundle\Entity\Post $post)
    {
        $post->setPage($this);
        $this->posts[] = $post;

        return $this;
    }

    /**
     * Remove post
     *
     * @param \AppBundle\Entity\Post $post
     */
    public function removePost(\AppBundle\Entity\Post $post)
    {
        $this->posts->removeElement($post);
    }

    /**
     * Get posts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Add postsEmbed
     *
     * @param \AppBundle\Entity\Post $postsEmbed
     *
     * @return Page
     */
    public function addPostsEmbed(\AppBundle\Entity\Post $postsEmbed)
    {
        $postsEmbed->setPageEmbed($this);
        $this->postsEmbeds[] = $postsEmbed;

        return $this;
    }

    /**
     * Remove postsEmbed
     *
     * @param \AppBundle\Entity\Post $postsEmbed
     */
    public function removePostsEmbed(\AppBundle\Entity\Post $postsEmbed)
    {
        $this->postsEmbeds->removeElement($postsEmbed);
    }

    /**
     * Get postsEmbeds
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPostsEmbeds()
    {
        return $this->postsEmbeds;
    }
}
