<?php
namespace Like\Custom\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection 
{
    protected function _construct()
    {
        $this->_init('Like\Custom\Model\Post','Like\Custom\Model\ResourceModel\Post');
    }
}