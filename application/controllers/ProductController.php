<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller {
	

     function __construct(){
		  parent::__construct();
		  $this->load->library('Paypal_lib');
		  $this->load->model('product');
	 }


     function index(){
		 $data = array();
		  // Get products data from the database
		  $data['products'] = $this->product->getRows();
        
		  // Pass products data to the view

		  $data['meta'] = array(
		 						  "title"=>"Product Page Title",
									   "description"=>"Product Page Description",
									   "image"=>"assets/images/home.jpg",
									   "slug"=>"product"
									      );
		 

		  $this->load->view('templates/header',$data);
		  $this->load->view('products/index', $data);
	      $this->load->view('templates/footer');
	 }

	 function buy($id){
        // Set variables for paypal form
        $returnURL = base_url().'paypal/success';
        $cancelURL = base_url().'paypal/cancel';
        $notifyURL = base_url().'paypal/ipn';
        
        // Get product data from the database
        $product = $this->product->getRows($id);
        
        // Get current user ID from the session
		//$userID = $_SESSION['userID'];
		$userID = 1;
       
        // Add fields to paypal form
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', $product['name']);
        $this->paypal_lib->add_field('custom', $userID);
        $this->paypal_lib->add_field('item_number',  $product['id']);
        $this->paypal_lib->add_field('amount',  $product['price']);
        
        // Render paypal form
        $this->paypal_lib->paypal_auto_form();
    }




	// public function view($page='product')
	// {
	// 	if(file_exists(APPPATH.'views/pages/'.$page.'.php')){
				 
		
	// 		$data['meta'] = array(
	// 						  "title"=>"Product Page Title",
	// 						   "description"=>"Product Page Description",
	// 						   "image"=>"assets/images/home.jpg",
	// 						   "slug"=>"product"
	// 						      );

	// 	   $this->load->view('templates/header',$data);
	// 	   $this->load->view('pages/'.$page);
    //        $this->load->view('templates/footer');
	// 	}
	// 	else{
	// 		show_404();
	// 	}
	// }




}
