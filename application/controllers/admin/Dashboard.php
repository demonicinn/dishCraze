<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends MY_Controller {

	
		function __construct()
		{
			parent::__construct();
			$this->redirect();
		}
		
		public function index(){
			$this->data = array(
				'active' => 'dashboard',
				'title' => 'Dashboard',
				'total_categories' => $this->commonmodel->count('categories'),
				'total_products' => $this->commonmodel->count('products'),
			);			
				
			$this->page = 'admin/dashboard/index';
			$this->admin_layout();
		}
	}
