define([
    'uiComponent',
    'Magento_Checkout/js/model/payment/renderer-list'
],function(Component,renderList){
    'use strict';
    renderList.push({
        type : 'cmsmagento',
        component : 'CmsmagentoPayment_Cmsmagento/js/view/payment/method-renderer/cmsmagento-method'
    });

    return Component.extend({});
})
