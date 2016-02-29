<?php
class Mageprofis_HeaderCart_Model_Observer
{
    public function addLayoutXml($event)
    {
        $xml = $event->getUpdates()->addChild('headercart');
        $xml->addAttribute('module', 'MageProfis_HeaderCart');
        $xml->addChild('file', 'mageprofis-headercart.xml');
    }
}
