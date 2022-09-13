<?php

/**
 * @package     Abhay/AccordionFaq
 * @version     1.0.0
 * @author      Abhay
 * @copyright   Copyright © 2021. All Rights Reserved.
 */

namespace Abhay\AccordionFaq\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Faq extends AbstractDb
{
	protected function _construct()
	{
		$this->_init('abhay_accordionfaq', 'id');
	}
	
}