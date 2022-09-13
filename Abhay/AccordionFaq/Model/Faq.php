<?php

/**
 * @package     Abhay/AccordionFaq
 * @version     1.0.0
 * @author      Abhay
 * @copyright   Copyright © 2021. All Rights Reserved.
 */

namespace Abhay\AccordionFaq\Model;


use Magento\Framework\Model\AbstractModel;
use Abhay\AccordionFaq\Api\Data\FaqInterface;
use Magento\Framework\DataObject\IdentityInterface;

class Faq extends AbstractModel implements FaqInterface, IdentityInterface
{
	const CACHE_TAG = 'abhay_accordionfaq_faq';

	protected $_cacheTag = 'abhay_accordionfaq_faq';

	protected $_eventPrefix = 'abhay_accordionfaq_faq';

	protected function _construct()
	{
		$this->_init(\Abhay\AccordionFaq\Model\ResourceModel\Faq::Class);
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}

	/**
     * Get ID
     *
     * @return int
     */
    public function getId()
    {
        return parent::getData(self::ENTITY_ID);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return \Abhay\AccordionFaq\Api\Data\FaqInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ENTITY_ID, $id);
    }

}