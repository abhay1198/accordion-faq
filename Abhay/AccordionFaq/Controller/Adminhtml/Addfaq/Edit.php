<?php

/**
 * @package     Abhay/AccordionFaq
 * @version     1.0.0
 * @author      Abhay
 * @copyright   Copyright © 2021. All Rights Reserved.
 */

namespace Abhay\AccordionFaq\Controller\Adminhtml\Addfaq;

use Abhay\AccordionFaq\Controller\Adminhtml\Addfaq as AddfaqController;
use Magento\Framework\Controller\ResultFactory;

class Edit extends AddfaqController
{
    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        if (!$id) {
            $resultPage->getConfig()->getTitle()->prepend(
                __('New FAQ')
            );
        } else {
            $resultPage->getConfig()->getTitle()->prepend(
                __('Edit FAQ')
            );
        }
        
        return $resultPage;
    }
}
