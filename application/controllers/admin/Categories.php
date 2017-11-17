<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Categories extends MY_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->redirect();
						
			$limit = $this->settings->pagi_admin;
			$page = !empty($_GET['page'])?$_GET['page']:1;
			$this->pageLimit = ($page * $limit) - $limit;
			$counts = $this->commonmodel->countWhere('categories', array('status'=>1));
			$totalpages = ceil($counts / $limit);			
			$this->data = $this->commonmodel->arrayPaginationON('categories', $limit, $this->pageLimit);
			$this->pagination = $this->pagination($page, $totalpages);			
		}
		
		

		public function index(){
			$this->data = array(
				'active' => 'categories',
				'title' => 'Categories',
				'dataAll' => $this->data,
				'pageLimit' => $this->pageLimit,
				'pagination' => $this->pagination
			);			
				
			$this->page = 'admin/categories/index';
			$this->admin_layout();
		}

		public function add(){
			$this->data = array(
				'active' => 'categories',
				'title' => 'Categories',
				'dataAll' => $this->data,
				'pageLimit' => $this->pageLimit,
				'pagination' => $this->pagination
			);
			
			if($this->input->post('submit') == true){
				$name = $this->input->post('name');
				$slug = url_title($name, 'dash', true);
				$check = $this->commonmodel->countWhere('categories', array('slug'=>$slug));
				if($check){
				$this->notification('Already Exist!', 'danger');
				}
				
				$array = array(
				'uid' => $this->sess,
				'name' => $name,
				'slug' => $slug,
				'status' => $this->input->post('status'),
				'created' => date('Y-m-d H:m:s'),
				'updated' => date('Y-m-d H:m:s')
				);			
				$data = $this->commonmodel->insert('categories', $array);
				if($data){
				$this->notification('Added Successfully!', 'success');
				} else {
				$this->notification('Server Error!', 'danger');
				}
			}
			
				
			$this->page = 'admin/categories/index';
			$this->admin_layout();
		}

		public function edit($id){
			
			$this->data = array(
				'active' => 'categories',
				'title' => 'Categories',
				'dataAll' => $this->data,
				'pageLimit' => $this->pageLimit,
				'pagination' => $this->pagination,
				'dataId' => $this->commonmodel->getWhere('categories', array('id'=>$id))
			);	
			
			if($this->input->post('submit') == true){
				$name = $this->input->post('name');
				$slug = url_title($name, 'dash', true);
				
				$check = $this->commonmodel->countWhere('categories', array('slug'=>$slug, 'id!='=>$id));
				if($check){
				$this->notification('Already Exist!', 'danger');
				}
				
				$array = array(
				'uid' => $this->sess,
				'name' => $name,
				'slug' => $slug,
				'status' => $this->input->post('status'),
				'updated' => date('Y-m-d H:m:s')
				);			
				$this->commonmodel->update('categories', $array, $id);
				$this->notification('Updated Successfully!', 'success');
			}
				
			$this->page = 'admin/categories/index';
			$this->admin_layout();
		}
		
		
		public function delete($id){
			$this->commonmodel->delete('categories', $id);
			$this->session->set_flashdata('message', 'Deleted  successfully!');
			$this->session->set_flashdata('type', 'success');
			redirect('admin/categories');
		}
		
		
	}
