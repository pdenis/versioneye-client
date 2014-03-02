<?php

namespace Snide\VersionEye\Model;

/**
 * Class Project
 *
 * @author Pascal DENIS <pascal.denis@businessdecision.com>
 */
class Project
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $projectKey;

    /**
     * @var boolean
     */
    protected $private;

    /**
     * @var string
     */
    protected $projectType;

    /**
     * @var string
     */
    protected $period;

    /**
     * @var string
     */
    protected $source;

    /**
     * @var int
     */
    protected $depNumber;

    /**
     * @var int
     */
    protected $outNumber;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime
     */
    protected $updatedAt;

    /**
     * @var array
     */
    protected $dependencies;

    /**
     * Constructor
     *
     * @param string $projectKey
     */
    public function __construct($projectKey = '')
    {
        $this->projectKey = $projectKey;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        if (!is_object($createdAt)) {
            $this->createdAt = new \DateTime($createdAt);
        } else {
            $this->createdAt = $createdAt;
        }
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param int $depNumber
     */
    public function setDepNumber($depNumber)
    {
        $this->depNumber = $depNumber;
    }

    /**
     * @return int
     */
    public function getDepNumber()
    {
        return $this->depNumber;
    }

    /**
     * @param array $dependencies
     */
    public function setDependencies($dependencies)
    {
        $this->dependencies = $dependencies;
    }

    /**
     * @return array
     */
    public function getDependencies()
    {
        return $this->dependencies;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param int $outNumber
     */
    public function setOutNumber($outNumber)
    {
        $this->outNumber = $outNumber;
    }

    /**
     * @return int
     */
    public function getOutNumber()
    {
        return $this->outNumber;
    }

    /**
     * @param string $period
     */
    public function setPeriod($period)
    {
        $this->period = $period;
    }

    /**
     * @return string
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param boolean $private
     */
    public function setPrivate($private)
    {
        $this->private = $private;
    }

    /**
     * @return boolean
     */
    public function getPrivate()
    {
        return $this->private;
    }

    /**
     * @param string $projectKey
     */
    public function setProjectKey($projectKey)
    {
        $this->projectKey = $projectKey;
    }

    /**
     * @return string
     */
    public function getProjectKey()
    {
        return $this->projectKey;
    }

    /**
     * @param string $projectType
     */
    public function setProjectType($projectType)
    {
        $this->projectType = $projectType;
    }

    /**
     * @return string
     */
    public function getProjectType()
    {
        return $this->projectType;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        if (!is_object($updatedAt)) {
            $this->updatedAt = new \DateTime($updatedAt);
        } else {
            $this->updatedAt = $updatedAt;
        }
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
