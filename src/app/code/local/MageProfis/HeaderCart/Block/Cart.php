<?php
class MageProfis_HeaderCart_Block_Cart extends Mage_Checkout_Block_Cart_Sidebar
{
    /**
     * Get title for header cart block
     *
     * @return string
     */
    protected function getCartTitle()
    {
        $config_title = Mage::getStoreConfig('headercart/general/title');
        if ($config_title != "") {
            return $config_title;
        }
        return $this->__('Cart');
    }
}
