<?php

/**
 * @package     Abhay/AccordionFaq
 * @version     1.0.0
 * @author      Abhay
 * @copyright   Copyright © 2021. All Rights Reserved.
 */

namespace Abhay\AccordionFaq\Controller\Adminhtml\Addfaq;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Backend\App\Action;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @param Action\Context $context
     * @param \Abhay\AccordionFaq\Model\FaqFactory $faqFactory
     */
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
     * Save action.
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $time = date('Y-m-d H:i:s');
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getParams();
        if ($data) {
            $data['faq'] = strip_tags($data['faq']);
            $data['body'] = strip_tags($data['body']);
            $id = (int) $this->getRequest()->getParam('id');
            $model = $this->_faq->create();
            $data['updated_at'] = $time;
            if ($id) {
                $model->addData($data)->setId($id)->save();
            } else {
                unset($data['id']);
                $data['created_at'] = $time;
                $model->setData($data)->save();
            }
        }
        $this->messageManager->addSuccess(__('FAQ saved successfully.'));

        return $resultRedirect->setPath('*/*/');
    }
}
