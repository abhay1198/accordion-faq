<?php

/**
 * @package     Abhay/AccordionFaq
 * @version     1.0.0
 * @author      Abhay
 * @copyright   Copyright © 2021. All Rights Reserved.
 */

namespace Abhay\AccordionFaq\Model\ResourceModel\Faq;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Abhay\AccordionFaq\Model\Faq as FaqModel;
use Abhay\AccordionFaq\Model\ResourceModel\Faq as FaqResource;

class Collection extends AbstractCollection
{
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init(FaqModel::class,FaqResource::class);
	}

}