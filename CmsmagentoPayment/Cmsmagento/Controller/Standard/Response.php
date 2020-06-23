<?php

namespace CmsmagentoPayment\Cmsmagento\Controller\Standard;

class Response extends \CmsmagentoPayment\Cmsmagento\Controller\CmsmagentoAbstract {

    public function execute() {
        $returnUrl = $this->getCheckoutHelper()->getUrl('checkout');

        try {
            $paymentMethod = $this->getPaymentMethod();
            $params = $this->getRequest()->getParams();
            if ($params['status']=='Y'){
                $this->messageManager->addSuccessMessage(__('Thank you for shopping with us. Your account has been charged and your transaction is successful. We will be shipping your order to you soon.'));
                $returnUrl = $this->getCheckoutHelper()->getUrl('checkout/onepage/success');
                $order = $this->getOrder();
                $payment = $order->getPayment();
                $paymentMethod->postProcessingSuccess($order, $payment, $params);
                
            } 
           else if ($params['status']=='P'){
                $this->messageManager->addErrorMessage(__('Payment Pending.'));
                $returnUrl = $this->getCheckoutHelper()->getUrl('checkout/onepage/success');
                $order = $this->getOrder();
                $payment = $order->getPayment();
                $paymentMethod->postProcessingSuccess($order, $payment, $params);
                
            }
			else if ($params['status']=='C'){
                $this->messageManager->addErrorMessage(__('Thank You for shopping with us. However, the transaction has been canceled'));
                $returnUrl = $this->getCheckoutHelper()->getUrl('checkout');
                $order = $this->getOrder();
                $payment = $order->getPayment();
				$paymentMethod->postProcessingFail($order, $payment, $params);
                
            }
            else if ($params['status']=='N'){
                $this->messageManager->addErrorMessage(__('Transaction failed. Please try again later!'));
                $returnUrl = $this->getCheckoutHelper()->getUrl('checkout');
                $order = $this->getOrder();
                $payment = $order->getPayment();
				$paymentMethod->postProcessingFail($order, $payment, $params);
            }
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->messageManager->addExceptionMessage($e, $e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addExceptionMessage($e, __('We can\'t place the order.'));
			echo $this->messageManager->addExceptionMessage($e, $e->getMessage());
        }

        $this->getResponse()->setRedirect($returnUrl);
    }

}
