<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Product extends MY_Controller {
		
		function __construct()
		{
			parent::__construct();
			$this->redirect();
			
			$limit = $this->settings->pagi_admin;
			$page = !empty($_GET['page'])?$_GET['page']:1;
			$this->pageLimit = ($page * $limit) - $limit;
			$counts = $this->commonmodel->countWhere('products', array('status'=>1));
			$totalpages = ceil($counts / $limit);			
			$this->data = $this->commonmodel->arrayPaginationON('products', $limit,  $this->pageLimit);
			$this->pagination = $this->pagination($page, $totalpages);
		}

		public function index(){
			$this->data = array(
				'active' => 'product',
				'title' => 'Product',
				'dataAll' => $this->data,
				'pageLimit' => $this->pageLimit,
				'pagination' => $this->pagination
			);	
			
				
			$this->page = 'admin/product/index';
			$this->admin_layout();
		}

		public function add(){
			$this->data = array(
				'active' => 'product',
				'title' => 'Product',
				'dataAll' => $this->data,
				'pageLimit' => $this->pageLimit,
				'pagination' => $this->pagination,
				'category' => $this->commonmodel->arrayWhere('categories', array('status'=>'1'))
			);	
			
			if($this->input->post('submit') == true){
				$title = $this->input->post('title');
				$slug = url_title($title, 'dash', true);
				$check = $this->commonmodel->countWhere('products', array('slug'=>$slug));
				if($check){
				$this->notification('Already Exist!', 'danger');
				}
				$image = $this->commonmodel->imageUpload('image', 'img-'.$this->rand(10), 'products');
				
				$array = array(
				'uid' => $this->sess,
				'title' => $title,
				'slug' => $slug,
				'price' => $this->input->post('price'),
				'description' => $this->input->post('description'),
				'category' => json_encode($this->input->post('category')),
				'image' => $image[0],
				'hot' => ($this->input->post('hot'))?$this->input->post('hot'):'off',
				'status' => $this->input->post('status'),
				'created' => date('Y-m-d H:m:s'),
				'updated' => date('Y-m-d H:m:s')
				);			
				$data = $this->commonmodel->insert('products', $array);
				if($data){
				$this->notification('Added Successfully!', 'success');
				} else {
				$this->notification('Server Error!', 'danger');
				}
			}			
				
			$this->page = 'admin/product/index';
			$this->admin_layout();
		}

		public function edit($id){
		
			$this->data = array(
				'active' => 'product',
				'title' => 'Product',
				'dataAll' => $this->data,
				'pageLimit' => $this->pageLimit,
				'pagination' => $this->pagination,
				'dataId' => $this->commonmodel->getWhere('products', array('id'=>$id)),
				'category' => $this->commonmodel->arrayWhere('categories', array('status'=>'1'))
			);
			
			if($this->input->post('submit') == true){
				$title = $this->input->post('title');
				$slug = url_title($title, 'dash', true);
				$check = $this->commonmodel->countWhere('products', array('slug'=>$slug, 'id!='=>$id));
				if($check){
				$this->notification('Already Exist!', 'danger');
				}
				$image = $this->commonmodel->imageUpload('image', 'img-'.$this->rand(10), 'products');
				
				$array = array(
				'uid' => $this->sess,
				'title' => $title,
				'slug' => $slug,
				'price' => $this->input->post('price'),
				'description' => $this->input->post('description'),
				'category' => json_encode($this->input->post('category')),
				'hot' => ($this->input->post('hot'))?$this->input->post('hot'):'off',
				'status' => $this->input->post('status'),
				'updated' => date('Y-m-d H:m:s')
				);
				$this->commonmodel->update('products', $array, $id);
				if($image[0]){
					$array = array(
					'image' => $image[0]
					);
					$this->commonmodel->update('products', $array, $id);
				}
				$this->notification('Updated Successfully!', 'success');
			}	
			
				
			$this->page = 'admin/product/index';
			$this->admin_layout();
		}


		public function delete($id){
			$this->commonmodel->delete('products', $id);
			$this->session->set_flashdata('message', 'Deleted  successfully!');
			$this->session->set_flashdata('type', 'success');
			redirect('admin/product');
		}

	}
