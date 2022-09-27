<?php

namespace Like\Custom\Helper;

use \Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
	protected $_resource;

	public function __construct(
		\Magento\Framework\App\ResourceConnection $resource
	){
		$this->_resource = $resource;
	}
	public function setLikedislike($customerid,$productid,$like_dislike){

		$connection = $this->_resource->getConnection();

		$selectquery = "SELECT * FROM custom_like_dislike WHERE customeid = '".$customerid."' AND product_id='".$productid."'";
		$selected =  $connection->fetchAll($selectquery);
		if(count($selected) == 0)
		{
			$sql = "INSERT INTO custom_like_dislike (id, customeid, product_id, like_dislike) Values ('','".$customerid."','".$productid."','".$like_dislike."')";
			$connection->query($sql);

		}
		else
		{
			$sql = "UPDATE custom_like_dislike SET like_dislike = '".$like_dislike."' WHERE customeid = '".$customerid."' AND product_id='".$productid."'";
			$connection->query($sql);
		}


	}
	public function getLikedislikedata($customerid,$productid)
	{
		$connection = $this->_resource->getConnection();
		$sql = "SELECT * FROM custom_like_dislike WHERE customeid = '".$customerid."' AND product_id='".$productid."'";
		return $connection->fetchAll($sql);
	}
	public function getAllLikedislikedata($customerid)
	{	
		
		$connection = $this->_resource->getConnection();
		$sql = "SELECT * FROM custom_like_dislike WHERE customeid = '".$customerid."'";
		return $connection->fetchAll($sql);
	}
}