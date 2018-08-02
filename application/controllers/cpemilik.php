<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpemilik extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('level') != 'pemilik' and $this->session->userdata('isLogin') != 1)
		{
			$this->session->set_flashdata('error','Maaf anda belum Login !');
			redirect('home/login');	
		}
		$this->load->model('muser','mu');
		$this->load->model('admin');
		$this->load->model('mrumah');
		$this->load->model('mpembayaran');
		$this->load->model('mpemilik','mp');
		$this->load->model('mkonfirmasi');
	}
		
	
	public function index(){
		$this->load->view('pemilik/navbarP');
		$this->load->view('pemilik/index');
		$this->load->view('footer');
		$id_pemilik = $this->session->userdata('id_pemilik');
		
	}
	
	public function tambahRumah(){
	$this->load->view('pemilik/navbarP');
	$this->load->view('pemilik/index');
	$this->load->view('pemilik/tambahrumah1');			
	}
	
	public function create(){
		$this->form_validation->set_rules('name', 'Nama Rumah', 'required');
		$this->form_validation->set_rules('price', 'Harga Rumah', 'required|numeric');	
		$this->form_validation->set_rules('description', 'Deskripsi', 'required');
		$this->form_validation->set_rules('jmlhkamar', 'Jumlah Kamar Tidur');
		$this->form_validation->set_rules('jmlhkamarmandi', 'Jumlah Kamar Mandi', 'required|numeric');
		$this->form_validation->set_rules('luasb', 'Luas Bangunan');
		$this->form_validation->set_rules('luast', 'Luas Tanah');
		$this->form_validation->set_rules('jmlhlantai', 'Jumlah Lantai', 'required|numeric');
		$this->form_validation->set_rules('lokasi', 'Lokasi Rumah', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
				$this->load->view('pemilik/navbarP');
				$this->load->view('pemilik/index');
				$this->load->view('pemilik/tambahrumah1');
				
		}else{
		
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 2048000;// = MB
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$this->load->library('upload', $config);
			
		
			if ( ! $this->upload->do_upload())
			{	
				$this->load->view('pemilik/create');
				
				
			}else{	
				// if form_validation = true  -> insert into db
					$upload_image = $this->upload->data();
					$data_products = array
					(
						'name'			=> set_value('name'),
						'price'			=> set_value('price'),
						'description'	=> set_value('description'),
						'jmlhkamar'		=> set_value('jmlhkamar'),
						'jmlhkamarmandi'=> set_value('jmlhkamarmandi'),
						'luasb'			=> set_value('luasb'),
						'luast'			=> set_value('luast'),
						'jmlhlantai'	=> set_value('jmlhlantai'),
						'lokasi'		=> set_value('lokasi'),
						'image'			=> $upload_image['file_name'],
						'id_pemilik'	=> $this->mp->get_user_id_by_session()
					);//end array data_products
					
					$this->mrumah->create($data_products);
					redirect('cpemilik/create');
					$this->session->set_flashdata('msg', 'Data Berhasil Disimpan !!!');						
			} //end if uploading 
		}
	}
	
	public function listRumah(){
		$this->load->view('pemilik/navbarP');
		$this->load->view('pemilik/index');
		$id =$this->mp->get_user_id_by_session();

		$data["mrumah"]= $this->mrumah->ambilData($id);
		$this->load->view("pemilik/vkelolaRumah", $data);
	}
	
	public function profile(){
	$username = $this->session->userdata('username');
	$this->load->view('pemilik/navbarP');
	$data['foto'] = $this->mp->get_foto($username);
	$data['valpemilik'] = $this->mp->get_user_byusername($username);
	$this->load->view('pemilik/vprofil',$data);
	}

	public function editRumah()
	{
			$id =$this->mp->get_user_id_by_session();
			$no = $this->uri->segment(3);
		$this->form_validation->set_rules('name', 'Nama Rumah', 'required');
		$this->form_validation->set_rules('price', 'Harga Rumah', 'required|numeric');	
		$this->form_validation->set_rules('description', 'Deskripsi', 'required');
		$this->form_validation->set_rules('jmlhkamar', 'Jumlah Kamar Tidur', 'required|numeric');
		$this->form_validation->set_rules('jmlhkamarmandi', 'Jmlah Kamar Mandi', 'required|numeric');
		$this->form_validation->set_rules('luasb', 'Luas Bangunan', 'required');
		$this->form_validation->set_rules('luast', 'Luas Tanah', 'required');
		$this->form_validation->set_rules('jmlhlantai', 'Jumlah Lantai', 'required');
		$this->form_validation->set_rules('lokasi', 'Lokasi Rumah', 'required');
					

		
		
						$data['rumah'] = $this->mrumah->find($no);
						$this->load->view('pemilik/navbarP');
						$this->load->view('pemilik/index');
						$this->load->view('pemilik/vupdateRumah',$data);
						
					
			
	}
		public function simpanprofil(){
		
		$id= $this->mu->get_user_id_by_session();
		
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$notelp = $this->input->post('notelp');
		
		
		$this->mu->updateprofil($id, $nama, $email, $username, $password, $notelp);
		
		$this->load->view('pemilik/navbarP');
		$this->load->view('profil/sukses');
	}
	
	
	public function simpan_editRumah()
	{
		
		$this->form_validation->set_rules('name', 'Nama Rumah', 'required');
		$this->form_validation->set_rules('price', 'Harga Rumah', 'required|numeric');	
		$this->form_validation->set_rules('description', 'Deskripsi', 'required');
		$this->form_validation->set_rules('jmlhkamar', 'Jumlah Kamar Tidur', 'required|numeric');
		$this->form_validation->set_rules('jmlhkamarmandi', 'Jmlah Kamar Mandi', 'required|numeric');
		$this->form_validation->set_rules('luasb', 'Luas Bangunan', 'required');
		$this->form_validation->set_rules('luast', 'Luas Tanah', 'required');
		$this->form_validation->set_rules('jmlhlantai', 'Jumlah Lantai', 'required');
		$this->form_validation->set_rules('lokasi', 'Lokasi Rumah', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
				$no = $this->uri->segment(3);
				$data['rumah'] = $this->mrumah->find($no);
				$this->load->view('pemilik/navbarP');
				$this->load->view('pemilik/index');
				$this->load->view('pemilik/vupdateRumah',$data);
				
		}else{
		
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 2048000;// = MB
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$this->load->library('upload', $config);
			
		
			if ( ! $this->upload->do_upload())
			{	
				$this->load->view('pemilik/vupdateRumah');
				
				
			}else{	
				// if form_validation = true  -> insert into db
					$upload_image = $this->upload->data();
					$data_products = array
					(
						'id_rumah'		=> set_value('id_rumah'),
						'name'			=> set_value('name'),
						'description'	=> set_value('description'),
						'price'			=> set_value('price'),
						'jmlhkamar'		=> set_value('Jumlah Kamar Tidur'),
						'jmlhkamarmandi'=> set_value('Jmlah Kamar Mandi'),
						'luasb'			=> set_value('Luas Bangunan'),
						'luast'			=> set_value('Luas Tanah'),
						'jmlhlantai'	=> set_value('Jumlah Lantai'),
						'lokasi'		=> set_value('Lokasi Rumah'),
						'image'			=> $upload_image['file_name'],
						'id_pemilik'	=> $this->mp->get_user_id_by_session()
					);//end array data_products
					
					$this->mrumah->update($data_products['id_rumah'],$data_products['name'],$data_products['description'],$data_products['price'],$data_products['image']);
					redirect('cpemilik/listRumah');
					$this->session->set_flashdata('msg', 'Data Berhasil Disimpan !!!');						
			} //end if uploading 
		}
      
	}
	
	
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}
	
	
	public function delete($id_rumah)
	{
	$this->mrumah->delete($id_rumah);
	redirect('cpemilik/listRumah');
	}

	public function delete_by_admin($id_rumah)
	{
	$this->mrumah->delete($id_rumah);
	redirect('cadmin/listRumah');
	}


}