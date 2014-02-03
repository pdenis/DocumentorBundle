<?php

namespace Snide\Bundle\DocumentorBundle\Model;

/**
 * Class Repo
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class Repo
{
    protected $slug;
    protected $description;
    protected $updatedAt;
    protected $createdAt;
    protected $sourceDir;
    protected $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setCreatedAt()
    {
        $this->createdAt = new \DateTime();
    }
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime();
    }

    public function getSourceDir()
    {
        return $this->sourceDir;
    }

    public function setSourceDir($sourceDir)
    {
        $this->sourceDir = $sourceDir;
    }
}
