<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PurchaseRepository")
 * 
*  
 */
class Purchase
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @var string
     * 
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="purchases")
     * @ORM\JoinColumn(nullable=false)
     */
    private $buyer;

    /**
     * @ORM\Column(type="string", length=36, nullable=true)
     */
    private $guid;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $delivery_date;

    /**
     * The purchase datetime in the customer timezone.
     * @var \DateTime
     * @ORM\Column(type="datetimetz")
     */
    private $created_at;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $shipping;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $delivery_hour;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PurchaseItem", mappedBy="purchase")
     */
    private $purchaseItems;

    /**
     * @ORM\Column(type="json_array", nullable=true)
     * @var array
     */
    private $billing_address = array();


    public function __construct()
    {
        $this->id = $this->generateId();
        $this->purchaseItems = new ArrayCollection();
        $this->created_at = new \DateTime();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getBuyer(): ?User
    {
        return $this->buyer;
    }

    public function setBuyer(?User $buyer): self
    {
        $this->buyer = $buyer;

        return $this;
    }

    public function getGuid(): ?string
    {
        return $this->guid;
    }

    public function setGuid(?string $guid): self
    {
        $this->guid = $guid;

        return $this;
    }

    public function getDeliveryDate(): ?\DateTimeInterface
    {
        return $this->delivery_date;
    }

    public function setDeliveryDate(?\DateTimeInterface $delivery_date): self
    {
        $this->delivery_date = $delivery_date;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at)
    {
        $this->created_at = $created_at;
    }

    public function getShipping(): ?string
    {
        return $this->shipping;
    }

    public function setShipping(?string $shipping): self
    {
        $this->shipping = $shipping;

        return $this;
    }

    public function getDeliveryHour(): ?\DateTimeInterface
    {
        return $this->delivery_hour;
    }

    public function setDeliveryHour(?\DateTimeInterface $delivery_hour): self
    {
        $this->delivery_hour = $delivery_hour;

        return $this;
    }

    /**
     * @return Collection|PurchaseItem[]
     */
    public function getPurchaseItems(): Collection
    {
        return $this->purchaseItems;
    }

    public function addPurchaseItem(PurchaseItem $purchaseItem): self
    {
        if (!$this->purchaseItems->contains($purchaseItem)) {
            $this->purchaseItems[] = $purchaseItem;
            $purchaseItem->setPurchase($this);
        }

        return $this;
    }

    public function removePurchaseItem(PurchaseItem $purchaseItem): self
    {
        if ($this->purchaseItems->contains($purchaseItem)) {
            $this->purchaseItems->removeElement($purchaseItem);
            // set the owning side to null (unless already changed)
            if ($purchaseItem->getPurchase() === $this) {
                $purchaseItem->setPurchase(null);
            }
        }

        return $this;
    }

    public function __toString():string{
        return 'Purchase #'.$this->getId();
    }

    public function sumTotal()
    {
        $s = 0.0;
        foreach ($this->getPurchaseItems() as $value) {
            $s+= $value-> getTotalPrice();
        }
        return $s;
    }

    public function getTotal()
    {
        return $this->sumTotal();
    }

    /**
     * @param int $storeId
     *
     * @return string
     */
    public function generateId($storeId = 1)
    {
        return preg_replace('/[^0-9]/i', '', sprintf('%d%d%03d%s', $storeId, date('Y'), date('z'), microtime()));
    }

   /**
     * Set the address where the customer want its billing.
     *
     * @param array $billing_address
     */
    public function setBillingAddress($billing_address)
    {
        $this->billing_address = $billing_address;
    }

    /**
     * @return array
     */
    public function getBillingAddress()
    {
        return $this->billing_address;
    }
}
