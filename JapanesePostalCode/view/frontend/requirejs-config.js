/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            postalCodeDataProvider: 'MagentoCommunity_JapanesePostalCode/js/service/madefor-postal-code-api'
        }
    },
    config: {
        mixins: {
            'Magento_Ui/js/form/element/post-code': {
                'MagentoCommunity_JapanesePostalCode/js/ui/form-postal-code-element': true
            }
        }
    }
};
