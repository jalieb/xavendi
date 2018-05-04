<?php

namespace XvndBackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Lead
 *
 * @ORM\Table(name="lead")
 * @ORM\Entity(repositoryClass="XvndBackendBundle\Repository\LeadRepository")
 */
class Lead
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
     * @ORM\Column(name="unique_user_hash", type="string", length=255, nullable=false, unique=true)
     */
    private $uniqueUserHash;

    /**
     * @var array
     *
     * @ORM\Column(name="data", type="array")
     */
    private $data;

    /**
     * Many Leads have One Placement
     *
     * @ORM\ManyToOne(targetEntity="Placement", inversedBy="leads")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    protected $placement;

    /**
     * Many Leads have Many Campaigns.
     *
     * @ORM\ManyToMany(targetEntity="Campaign", inversedBy="leads", indexBy="id", cascade={"persist"}, orphanRemoval=false)
     * @ORM\JoinTable(name="leads_campaigns")
     */
    protected $campaigns;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->campaigns = new ArrayCollection();
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
     * Set uniqueUserHash
     *
     * @param string $uniqueUserHash
     *
     * @return Lead
     */
    public function setUniqueUserHash($uniqueUserHash)
    {
        $this->uniqueUserHash = $uniqueUserHash;

        return $this;
    }

    /**
     * Get uniqueUserHash
     *
     * @return string
     */
    public function getUniqueUserHash()
    {
        return $this->uniqueUserHash;
    }

    /**
     * Set data
     *
     * @param \stdClass $data
     *
     * @return Lead
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set placement
     *
     * @param \XvndBackendBundle\Entity\Placement $placement
     *
     * @return Lead
     */
    public function setPlacement(Placement $placement = null)
    {
        $this->placement = $placement;

        return $this;
    }

    /**
     * Get placement
     *
     * @return \XvndBackendBundle\Entity\Placement
     */
    public function getPlacement()
    {
        return $this->placement;
    }

    /**
     * Add campaign
     *
     * @param \XvndBackendBundle\Entity\Campaign $campaign
     *
     * @return Lead
     */
    public function addCampaign(Campaign $campaign)
    {
        if($this->campaigns->contains($campaign)) {
            return;
        }

        $this->campaigns->add($campaign);

        return $this;
    }

    /**
     * Remove campaign
     *
     * @param \XvndBackendBundle\Entity\Campaign $campaign
     */
    public function removeCampaign(Campaign $campaign)
    {
        $this->campaigns->removeElement($campaign);
    }

    /**
     * Get campaigns
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCampaigns()
    {
        return $this->campaigns;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getUniqueUserHash();
    }
}
