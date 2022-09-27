<?php
namespace Like\Custom\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;


class Likedislike extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;

    protected $Helper;

    protected $session;

    protected $storemanager;

    protected $resultJsonFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        PageFactory $resultPageFactory,
    	\Like\Custom\Helper\Data $Helper,
    	\Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
    	\Magento\Store\Model\StoreManagerInterface $storemanager
        )
    {
        $this->session = $customerSession;
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    	$this->Helper = $Helper;
    	$this->_storemanager = $storemanager;
    	$this->resultJsonFactory = $resultJsonFactory;
    }
    public function execute()
    {
        $resultJson = $this->resultJsonFactory->create();
        if(!$this->session->isLoggedIn())
        {
            $response = [
                    'errors' => true,
                    'login_error' => true,
                    'message' => __("Please LogIn.")
                ];
            return $resultJson->setData($response); 
        }
        else
        {
            $post = $this->getRequest()->getParams();
            $productid = $post['produc_id'];
            $like_dislike = $post['like_dislike'];
            $customerid = $this->session->getCustomer()->getId();
            // $likedislikedata = $this->Helper->getLikedislikedata($customerid,$productid);
           
            $this->Helper->setLikedislike($customerid,$productid,$like_dislike);
            
            $response = [
                    'errors' => false,
                    'login_error' => false,
                    'message' => __("Changed.")
                ];
            return $resultJson->setData($response); 
        }
        
        // print_r('test');

    }
}
