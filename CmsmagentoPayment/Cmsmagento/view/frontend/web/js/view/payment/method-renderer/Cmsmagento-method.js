define(
    [
        'Magento_Checkout/js/view/payment/default',
        'CmsmagentoPayment_Cmsmagento/js/action/set-payment-method',
    ],
    function(Component,setPaymentMethod){
    'use strict';

    return Component.extend({
        defaults:{
            'template':'CmsmagentoPayment_Cmsmagento/payment/cmsmagento'
        },
        redirectAfterPlaceOrder: false,
        
        afterPlaceOrder: function () {
            setPaymentMethod();    
        }

    });
});
