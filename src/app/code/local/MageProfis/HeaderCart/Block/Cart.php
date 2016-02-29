<?php
class MageProfis_HeaderCart_Block_Cart extends Mage_Checkout_Block_Cart_Sidebar
{
    protected $remainingItemsCount;

    protected function getCartTitle()
    {
        $config_title = Mage::getStoreConfig('headercart/general/title');

        if ($config_title != "") {
            return $config_title;
        }

        return $this->__('Cart');
    }

    /**
     * When there are more items in cart than can be displayed in drop
     * down render additional row with items number and remaining amount
     */
    /**
     * Get remaining items count depending on system configuration
     *
     * @return int
     */
    public function getRemainingItemsCount()
    {
        if (!is_null($this->remainingItemsCount)) {
            return $this->remainingItemsCount;
        }

        if (Mage::getStoreConfig('checkout/cart_link/use_qty')) {
            $itemsQty = 0;
            foreach ($this->getRecentItems() as $item) {
                $itemsQty += $item->getQty();
            }
            $this->remainingItemsCount = $this->getSummaryCount() - $itemsQty;
        } else {
            $this->remainingItemsCount = $this->getSummaryCount() - count($this->getRecentItems());
        }

        return $this->remainingItemsCount;
    }

    /**
     * Get remaining items subtotal
     *
     * @return float
     */
    public function getRemainingItemsSubtotal()
    {
        $recentSubtotal = 0;

        foreach ($this->getRecentItems() as $_item) {
            $recentSubtotal += $_item->getQty() * $this->helper('checkout')->getPriceInclTax($_item);
        }

        return $this->getSubtotal() - $recentSubtotal;
    }
}
