<?php

namespace CmsmagentoPayment\Cmsmagento\Controller\Standard;

class Cancel extends \CmsmagentoPayment\Cmsmagento\Controller\CmsmagentoAbstract {

    public function execute() {
        $this->getOrder()->cancel()->save();
        
        $this->messageManager->addErrorMessage(__('Your order has been can cancelled'));
        $this->getResponse()->setRedirect(
                $this->getCheckoutHelper()->getUrl('checkout')
        );
    }

}
