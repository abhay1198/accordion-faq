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

class Delete extends \Magento\Backend\App\Action
{
    protected $_faq;

    public function __construct(
        Action\Context $context,
        \Abhay\AccordionFaq\Model\FaqFactory $faqFactory
    ) {
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
        $id=$this->getRequest()->getParam('id');
        if ($id) {
            $faq = $this->_faq->create()->load($id);
            $faq->delete();
            $this->messageManager->addSuccess(__('FAQ(s) deleted successfully.'));
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/');
    }
}
