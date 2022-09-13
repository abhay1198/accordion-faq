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

class NewAction extends AddfaqController
{
    /**
     * @return \Magento\Backend\Model\View\Result\Forward
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Forward $resultForward */
        $resultForward = $this->resultFactory->create(ResultFactory::TYPE_FORWARD);
        $resultForward->forward('edit');
        return $resultForward;
    }
}
