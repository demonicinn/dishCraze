<?php
	Class Commonmodel extends CI_Model {
	
		function insert($table, $data) {
			$this->db->insert($table, $data);
			return $this->db->insert_id();
		}
		
		function get($table) {
			$this->db->order_by('id', 'desc');
			$query = $this->db->get($table);
			return $query->result();
		}
		
		function getWhere($table, $array) {
			$query = $this->db->get_where($table, $array);
			return $query->row();
		}
		
		function arrayWhere($table, $data) {
			$this->db->order_by('id', 'desc');
			$this->db->where('status', '1');
			$query = $this->db->get_where($table, $data);
			return $query->result();
		}

		
		function countWhere($table, $array) {
			$query = $this->db->get_where($table, $array);
			return $query->num_rows();
		}

		function count($table) {
			$query = $this->db->get($table);
			return $query->num_rows();
		}
		
		function update($table, $update, $id) {
			$this->db->where('id', $id);
			$this->db->update($table, $update);
		}
		
		function delete($table, $id) {
			$this->db->delete($table, array('id' => $id));
		}



		function arrayPaginationON($table, $limit, $pageLimit) {
			$this->db->order_by("id", "DESC");
			$query = $this->db->limit($limit, $pageLimit)->get($table);
			return $query->result();
		}

		function arrayWherePagination($table, $limit, $pageLimit) {
			$this->db->order_by("id", "DESC");
			$this->db->where('status', '1');
			$query = $this->db->limit($limit, $pageLimit)->get($table);
			$data = $query->result();
			
			$datas = array();
			foreach($data as $row){
				$query = $this->db->query("SELECT sum(rating)/count('pid') as totalrating FROM `rating` WHERE `pid`=".$row->id)->row();				
				if(isset($_COOKIE['rating-cookies'])){
				$cookies = $_COOKIE['rating-cookies'];
				$cook = self::getWhere('rating', array('cookie'=>$cookies, 'pid'=>$row->id));
				}				
				$array = array();
				$array['id'] = $row->id;
				$array['title'] = $row->title;
				$array['price'] = $row->price;
				$array['description'] = $row->description;
				$array['image'] = $row->image;
				$array['category'] = $row->category;
				$array['slug'] = $row->slug;
				$array['hot'] = $row->hot;
				$array['rating'] = number_format($query->totalrating, 1, '.', '');				
				$array['ratedPro'] = isset($cook)?'1':'';
				$array['ratingValue'] = isset($cook->rating)?$cook->rating:'';				
				$datas[] = $array; 
			}			
			return $datas;
		}

		function getRating($pid) {
			return $this->db->query("SELECT sum(rating)/count('pid') as totalrating FROM `rating` WHERE `pid`=".$pid)->row();
		}
		
		
		
		/*-------------------image upload---------------------*/	
		function imageUpload($img, $name, $path){
			$this->load->library('image_lib');
			$config['upload_path'] = './assets/images/'.$path;
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']	= '10000';
			$config['max_width']  = '10000';
			$config['max_height']  = '10000';
			$config['file_name'] = $name;
			
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload($img)){
				$error = array('error' => $this->upload->display_errors());
				} else {
				$file = $this->upload->data();
				$files = glob($config['upload_path'].'/*');
				
				$config = array(
				'source_image'      => $file['full_path'],
				'new_image'         => './assets/images/'.$path,
				'maintain_ratio'    => false,
				);
				$this->image_lib->initialize($config);
				
				$data = array('upload_data' => $this->upload->data());
				return array($file['file_name'],'');
			}
		}
		
	}	