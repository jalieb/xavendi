<?php

namespace XvndBackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Field
 *
 * @ORM\Table(name="field")
 * @ORM\Entity(repositoryClass="XvndBackendBundle\Repository\FieldRepository")
 */
class Field
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="labelName", type="string", length=255)
     */
    private $labelName;

    /**
     * @var string
     *
     * @ORM\Column(name="helpText", type="text", nullable=true)
     */
    private $helpText;

    /**
     * Many Fields have Many InputTypes.
     * @ORM\ManyToOne(targetEntity="InputType")
     */
    protected $inputType;

    /**
     * Many Fields have One Campaign
     *
     * @ORM\ManyToOne(targetEntity="Campaign", inversedBy="fields")
     */
    protected $campaign;


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
     * Set name
     *
     * @param string $name
     *
     * @return Field
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
     * Set labelName
     *
     * @param string $labelName
     *
     * @return Field
     */
    public function setLabelName($labelName)
    {
        $this->labelName = $labelName;

        return $this;
    }

    /**
     * Get labelName
     *
     * @return string
     */
    public function getLabelName()
    {
        return $this->labelName;
    }

    /**
     * Set helpText
     *
     * @param string $helpText
     *
     * @return Field
     */
    public function setHelpText($helpText)
    {
        $this->helpText = $helpText;

        return $this;
    }

    /**
     * Get helpText
     *
     * @return string
     */
    public function getHelpText()
    {
        return $this->helpText;
    }

    /**
     * Set inputType
     *
     * @param \XvndBackendBundle\Entity\InputType $inputType
     *
     * @return Field
     */
    public function setInputType(InputType $inputType = null)
    {
        $this->inputType = $inputType;

        return $this;
    }

    /**
     * Get inputType
     *
     * @return \XvndBackendBundle\Entity\InputType
     */
    public function getInputType()
    {
        return $this->inputType;
    }

    /**
     * Set campaign
     *
     * @param \XvndBackendBundle\Entity\Campaign $campaign
     *
     * @return Field
     */
    public function setCampaign(Campaign $campaign = null)
    {
        $this->campaign = $campaign;

        return $this;
    }

    /**
     * Get campaign
     *
     * @return \XvndBackendBundle\Entity\Campaign
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
