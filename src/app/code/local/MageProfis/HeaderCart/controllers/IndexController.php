<?php
class MageProfis_HeaderCart_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout($this->getFullActionName());
        $this->renderLayout();
    }
}
