<?php
namespace Like\Custom\Block\Account;

use Magento\Customer\Model\Session;
use Magento\Framework\View\Element\Template\Context;
use Like\Custom\Helper\Data;

class Likedislikedata extends \Magento\Framework\View\Element\Template 
{
	
	protected $Helper;

	protected $Session;

	protected $customerSession;

	public function __construct(
		Context $context,
		Data $Helper,
		\Magento\Catalog\API\ProductRepositoryInterface $productRepository,
		\Magento\Customer\Model\Session $Session
	) 
	{
		parent::__construct($context);
		$this->Helper = $Helper;
		$this->productRepository = $productRepository;
		$this->Session = $Session;
		
	}
	public function getLikedislikedata(){
			$customerid = $this->Session->getCustomer()->getId();
			return $this->Helper->getAllLikedislikedata($customerid);
		
	}
	public function getProduct($id)
	{
	 return $this->productRepository->getById($id);
	}
	public function getCustomerid(){
		return $this->Session->getCustomer()->getId();
	}
}