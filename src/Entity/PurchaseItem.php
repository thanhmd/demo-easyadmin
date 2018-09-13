<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PurchaseItemRepository")
 */
class PurchaseItem
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Purchase", inversedBy="purchaseItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $purchase;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $quantity;

    /**
     * @var string
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $tax_rate = 1.0;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="purchaseItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPurchase(): ?Purchase
    {
        return $this->purchase;
    }

    public function setPurchase(?Purchase $purchase): self
    {
        $this->purchase = $purchase;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getTaxRate():?string
    {
        return  $this->tax_rate;
    }

    public function setTaxRate(?string $tax_rate): self
    {
        $this->tax_rate = $tax_rate;

        return $this;
    }

    public function __toString()
    {
        return $this->getProduct()->getName().' [x'.$this->getQuantity().']: '.$this->getTotalPrice();
    }

    /**
     * Return the total price (tax included).
     *
     * @return float
     */
    public function getTotalPrice()
    {
        return $this->product->getPrice() * $this->quantity ;//* (1 + $this->tax_rate);
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }
}
