<?php
namespace Like\Custom\Model\ResourceModel;

class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('custom_like_dislike','id');
    }
}