<?php
namespace Like\Custom\Model;

class Post extends \Magento\Framework\Model\AbstractModel
{
    public function _construct()
    {
        $this->_init('Like\Custom\Model\ResourceModel\Post');
    }
}