# Cms magento 2x installation guide
#### Installation and Configuration

1.) Upload app/code/CmsmagentoPayment (all files and folder) at you server end.

2.) Run below command:
   - php bin/magento module:enable CmsmagentoPayment_Cmsmagento
   - php bin/magento setup:upgrade
   
3.) Goto Admin->Store->Configuration->Sales->Payment Method->Cms magento
   - fill details here and save them.

4.) Goto Admin->System->Cache Management
   - Clear all Cache.

#### Now you can collect payment via Cmsmagento.

