<?php

/**
 * @package     Abhay/AccordionFaq
 * @version     1.0.0
 * @author      Abhay
 * @copyright   Copyright © 2021. All Rights Reserved.
 */

namespace Abhay\AccordionFaq\Controller\Adminhtml\Addfaq;

use Magento\Backend\App\Action;
use Magento\TestFramework\ErrorLog\Logger;
use Magento\Ui\Component\MassAction\Filter;

class MassDisable extends \Magento\Backend\App\Action
{
    protected $_filter;
    protected $_faq;

    public function __construct(
        \Magento\Ui\Component\MassAction\Filter $filter,
        Action\Context $context,
        \Abhay\AccordionFaq\Model\FaqFactory $faqFactory
    ) {
        $this->_filter = $filter;
        $this->_faq = $faqFactory;
        parent::__construct($context);
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Abhay_AccordionFaq::addfaq');
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $faqModel = $this->_faq->create();
        $collection = $this->_filter->getCollection($faqModel->getCollection());
        foreach ($collection as $faq) {
            $faq->setStatus(0);
            $faq->save();
        }
        $this->messageManager->addSuccess(__('FAQ(s) disabled successfully.'));
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/');
    }
}
