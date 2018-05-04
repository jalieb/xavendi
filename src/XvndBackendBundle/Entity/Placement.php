<?php

namespace XvndBackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Placement
 *
 * @ORM\Table(name="placement")
 * @ORM\Entity(repositoryClass="XvndBackendBundle\Repository\PlacementRepository")
 */
class Placement
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
     * @ORM\ManyToOne(targetEntity="Publisher")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $publisher;

    /**
     * Many Placements have Many Campaigns.
     * @ORM\ManyToMany(targetEntity="Campaign", inversedBy="placements", indexBy="id", cascade={"persist"}, orphanRemoval=false)
     * @ORM\JoinTable(name="placements_campaigns")
     */
    private $campaigns;

    /**
     * One Placement has Many Leads.
     * @ORM\OneToMany(targetEntity="Lead", mappedBy="placement")
     */
    protected $leads;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->campaigns = new ArrayCollection();
        $this->leads = new ArrayCollection();
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
     * @return Placement
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
     * Set publisher
     *
     * @param \XvndBackendBundle\Entity\Publisher $publisher
     *
     * @return Placement
     */
    public function setPublisher(Publisher $publisher = null)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Get publisher
     *
     * @return \XvndBackendBundle\Entity\Publisher
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Add campaign
     *
     * @param \XvndBackendBundle\Entity\Campaign $campaign
     *
     * @return Placement
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
     * Add lead
     *
     * @param \XvndBackendBundle\Entity\Lead $lead
     *
     * @return Placement
     */
    public function addLead(Lead $lead)
    {
        $this->leads->add($lead);
        $lead->setPlacement($this);

        return $this;
    }

    /**
     * Remove lead
     *
     * @param \XvndBackendBundle\Entity\Lead $lead
     */
    public function removeLead(Lead $lead)
    {
        $this->leads->removeElement($lead);
        $lead->setPlacement(null);
    }

    /**
     * Get leads
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeads()
    {
        return $this->leads;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getName();
    }
}
