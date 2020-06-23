<?php

namespace CmsmagentoPayment\Cmsmagento\Model;

class Account implements \Magento\Framework\Option\ArrayInterface {

    const ACC_BIZ = 'cmsmagentobiz';
    const ACC_MONEY = 'cmsmagentomoney';

    /**
     * Possible environment types
     * 
     * @return array
     */
    public function toOptionArray() {
        return [
            [
                'value' => self::ACC_BIZ,
                'label' => 'CmsmagentoBiz',
            ],
            [
                'value' => self::ACC_MONEY,
                'label' => 'CmsmagentoMoney'
            ]
        ];
    }

}
