<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mrumah');
		$this->load->model('admin');
		$this->load->model('muser');
		$this->load->model('mpemilik');
	}
	public function index()
	{
		$this->load->view('sidebar');
		$data["rumah"]= $this->mrumah->halaman();
		$this->load->view('vrumah', $data);
		
		
	}

	public function cart(){
		$this->load->view('sidebar');
		$this->load->view('vcart');
		
	}
	public function login(){
		$this->load->view('sidebar');
		$this->load->view('vlogin');
	}
	
	
	public function login_process()
		{
			$this->load->view('sidebar');
			if($this->input->post('btnlogin'))
			{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
						
				$this->form_validation->set_rules('username', 'Username', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				
						
				
				if ($this->form_validation->run() == FALSE)
				{
					$this->load->view('vlogin');
				}else if($this->muser->cek_account($username,$password)){
						$this->session->set_userdata('username',$username);
						$this->session->set_userdata('password',$password);
						$this->session->set_userdata('level','member');
						$this->session->set_userdata('isLogin',1);
							
						redirect('cmember/profile','refresh');
				}else if($this->mpemilik->cek_account($username,$password)){
						$this->session->set_userdata('username',$username);
						$this->session->set_userdata('password',$password);
						$this->session->set_userdata('level','member');
						$this->session->set_userdata('isLogin',1);

					redirect('cpemilik/','refresh');
				} else {
					$this->session->set_flashdata('msg', 'Username atau password salah');
					$this->load->view('vlogin');
				}
		}
	}
	
	public function daftar()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[6]|max_length[24]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[24]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('notelp', 'Nomor Handphone', 'required|numeric|min_length[11]|max_length[24]');		
		if ($this->form_validation->run() == FALSE)
		{
				$this->load->view('sidebar');
				$this->load->view('member/vregistrasi');
				
		}else{
		
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 2048000;// = MB
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$this->load->library('upload', $config);
			
		
			if ( ! $this->upload->do_upload())
			{	
				$this->load->view('member/vregistrasi');
				
				
			}else{	
				// if form_validation = true  -> insert into db
					$upload_image = $this->upload->data();
					$data = array
					(
						'username'	=> set_value('username'),
						'password'			=> set_value('password'),
						'nama'		=> set_value('nama'),
						'email'		=> set_value('email'),
						'notelp'			=> set_value('notelp'),
						'image'			=> $upload_image['file_name']
					);//end array data_products
					
					$this->muser->add($data);
					$this->session->set_flashdata('msg', 'Data Berhasil Disimpan !!!');
					redirect('home/registrasi_user','refresh');
			} //end if uploading 
		}
			
	}

		public function daftarPemilik()
	{
		
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[6]|max_length[24]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[24]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[24]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('ktp', 'Nomor KTP', 'required|numeric');
		$this->form_validation->set_rules('notelp', 'No Telp', 'required|numeric');		
			
		if ($this->form_validation->run() == FALSE)
		{
				$this->load->view('sidebar');
				$this->load->view('pemilik/vregistrasiPemilik');
				
		}else{
		
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 2048000;// = MB
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$this->load->library('upload', $config);
			
		
			if ( ! $this->upload->do_upload())
			{	
				$this->load->view('home/registrasi_pemilik');
				
				
			}else{	
				// if form_validation = true  -> insert into db
					$upload_image = $this->upload->data();
					$data = array
					(
						'username'	=> set_value('username'),
						'password'			=> set_value('password'),
						'nama'		=> set_value('nama'),
						'email'		=> set_value('email'),
						'notelp'			=> set_value('notelp'),
						'image'			=> $upload_image['file_name']
					);//end array data_products
					
					$this->mpemilik->add($data);
					$this->session->set_flashdata('msg', 'Data Berhasil Disimpan !!!');
					redirect('home/registrasi_pemilik','refresh');
			} //end if uploading 
		}
			
	}
	

	
	public function registrasi()
	{
		$this->load->view('sidebar');
		$this->load->view('vregistrasi');
		
	}
	
	
	public function registrasi_user()
	{
		$this->load->view('sidebar');
		$this->load->view('member/vregistrasi');
		
	}
	public function registrasi_pemilik()
	{
		$this->load->view('sidebar');
		$this->load->view('pemilik/vregistrasiPemilik');
		
	}
	public function LoginAdmin(){
		$this->load->view('admin/vloginadmin');
	}
	public function login_admin()
		{
			if($this->input->post('btnlogin'))
			{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				
				$this->form_validation->set_rules('username', 'Username', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				
				if ($this->form_validation->run() == FALSE)
				{
					$this->load->view('admin/vloginadmin');
				}
			
						else if($this->admin->cek_account($username,$password)){
						$this->session->set_userdata('username',$username);
						$this->session->set_userdata('level','admin');
						$this->session->set_userdata('isLogin',1);
						
						redirect('cadmin/index','refresh');
				}else{
					$this->session->set_flashdata('msg', 'Username atau password salah');
					$this->load->view('admin/vloginadmin');
			}
		}
	}
	
	public function view_detail(){
		$this->load->view('sidebar');
		$id=$this->uri->segment(3);
		$data['row_data']=$this->mrumah->get_detail_data($id);
		$this->load->view('vdetail',$data);
		$this->load->view('footer');
		}
}
