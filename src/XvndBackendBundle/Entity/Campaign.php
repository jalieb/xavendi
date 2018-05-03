<?php

namespace XvndBackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Campaign
 *
 * @ORM\Table(name="campaign")
 * @ORM\Entity(repositoryClass="XvndBackendBundle\Repository\CampaignRepository")
 */
class Campaign
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
     * @ORM\Column(name="small_desc", type="string", length=255, nullable=true)
     */
    private $smallDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="long_desc", type="text", nullable=true)
     */
    private $longDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="preview_img", type="string", length=255, nullable=true)
     */
    private $previewImg;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Advertiser")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $advertiser;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="CampaignType")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $campaignType;

    /**
     * Many Campaigns have Many Placements.
     * @ORM\ManyToMany(targetEntity="Placement", mappedBy="campaigns", cascade={"persist"}, orphanRemoval=false)
     */
    protected $placements;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->placements = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Campaign
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
     * Set smallDesc
     *
     * @param string $smallDesc
     *
     * @return Campaign
     */
    public function setSmallDesc($smallDesc)
    {
        $this->smallDesc = $smallDesc;

        return $this;
    }

    /**
     * Get smallDesc
     *
     * @return string
     */
    public function getSmallDesc()
    {
        return $this->smallDesc;
    }

    /**
     * Set longDesc
     *
     * @param string $longDesc
     *
     * @return Campaign
     */
    public function setLongDesc($longDesc)
    {
        $this->longDesc = $longDesc;

        return $this;
    }

    /**
     * Get longDesc
     *
     * @return string
     */
    public function getLongDesc()
    {
        return $this->longDesc;
    }

    /**
     * Set previewImg
     *
     * @param string $previewImg
     *
     * @return Campaign
     */
    public function setPreviewImg($previewImg)
    {
        $this->previewImg = $previewImg;

        return $this;
    }

    /**
     * Get previewImg
     *
     * @return string
     */
    public function getPreviewImg()
    {
        return $this->previewImg;
    }

    /**
     * Set advertiser
     *
     * @param \XvndBackendBundle\Entity\Advertiser $advertiser
     *
     * @return Campaign
     */
    public function setAdvertiser(Advertiser $advertiser = null)
    {
        $this->advertiser = $advertiser;

        return $this;
    }

    /**
     * Get advertiser
     *
     * @return \XvndBackendBundle\Entity\Advertiser
     */
    public function getAdvertiser()
    {
        return $this->advertiser;
    }

    /**
     * Set campaignType
     *
     * @param \XvndBackendBundle\Entity\CampaignType $campaignType
     *
     * @return Campaign
     */
    public function setCampaignType(CampaignType $campaignType = null)
    {
        $this->campaignType = $campaignType;

        return $this;
    }

    /**
     * Get campaignType
     *
     * @return \XvndBackendBundle\Entity\CampaignType
     */
    public function getCampaignType()
    {
        return $this->campaignType;
    }

    /**
     * Add placement
     *
     * @param \XvndBackendBundle\Entity\Placement $placement
     *
     * @return Campaign
     */
    public function addPlacement(Placement $placement)
    {
        $this->placements[] = $placement;

        return $this;
    }

    /**
     * Remove placement
     *
     * @param \XvndBackendBundle\Entity\Placement $placement
     */
    public function removePlacement(Placement $placement)
    {
        $this->placements->removeElement($placement);
    }

    /**
     * Get placements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlacements()
    {
        return $this->placements;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getName();
    }
}
