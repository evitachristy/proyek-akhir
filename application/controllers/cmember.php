<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cmember extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('level') != 'member' and $this->session->userdata('isLogin') != 1)
		{
			$this->session->set_flashdata('error','Maaf anda belum Login !');
			redirect('home/login');	
		}
		$this->load->model('muser','mu');
		$this->load->model('admin');
		$this->load->model('mrumah');
		$this->load->model('mpembayaran');
		$this->load->model('muser','mu');
		$this->load->model('mkonfirmasi');
	}
	
	
	public function index(){
		$this->load->view('profil/vnavbar');
		$data["rumah"]= $this->mrumah->halaman();
		$this->load->view('vrumah', $data);
	}
	
	public function konfirmasi(){
		
		
		$this->load->view('profil/vnavbar');
		$this->load->view('member/vkonfirmasi');
		
	}


	
	public function cekstat(){
		
		$id= $this->mu->get_user_id_by_session();
		$data["status"]= $this->mpembayaran->belumlunas($id);
		
		$this->load->view('profil/vnavbar');
		$this->load->view('member/vstatus',$data);
	
	}
		
	public function profile(){
	$username = $this->session->userdata('username');
	$this->load->view('profil/vnavbar');
	$data['foto'] = $this->mu->get_foto($username);
	$data['valuser'] = $this->mu->get_user_byusername($username);
	$this->load->view('profil/vprofil',$data);
	}
	
	public function simpanprofil(){
		
		$id= $this->mu->get_user_id_by_session();
		
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$notelp = $this->input->post('notelp');
		
		
		$this->mu->updateprofil($id, $nama, $email, $username, $password, $notelp);
		
		$this->load->view('profil/vnavbar');
		$this->load->view('profil/sukses');
	}
	
	
	public function create(){
		
		$this->cart->destroy();

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 2048000;// = MB
		$config['max_width']            = 2000;
		$config['max_height']           = 2000;
		$this->load->library('upload', $config);
			
		
			if (  $this->upload->do_upload())
			{	
			
				// if form_validation = true  -> insert into db
					$upload_image = $this->upload->data();
					$data = array
					(
						'id_konfirmasi'	=> set_value('id_konfirmasi'),
						'nama'			=> set_value('nama'),
						'id_rumah'		=> set_value('id_rumah'),
						'tanggal'		=> set_value('tanggal'),
						'price'			=> set_value('price'),
						'status'		=> set_value('Belum Lunas'),
						'image'			=> $upload_image['file_name'],
						'id_pelanggan'	=> $this->mu->get_user_id_by_session()
					);//end array data_products
					
					$this->mkonfirmasi->create($data);
					$data2 = array
					(
						'id_konfirmasi'	=> set_value('id_konfirmasi'),
						'id_pelanggan'	=> set_value('id_pelanggan'),
						'id_rumah'		=> set_value('id_rumah'),
						'nama'			=> set_value('nama'),
						'tanggal'		=> set_value('tanggal'),
						'price'			=> set_value('price'),
						'status1'		=> 'Waiting',
						'image'			=> $upload_image['file_name'],
						'id_pelanggan'	=> $this->mu->get_user_id_by_session()
					);//end array data_products

					$this->db->insert('konfirmasi', $data2);
					
					redirect('cpembayaran/checkout');
					$this->session->set_flashdata('msg', 'Data Berhasil Disimpan !!!');						
			} //end if uploading 
		
	}
	

	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}
	public function add_to_cart($id)
	{
		$id = $this->mrumah->find($id);
		$data = array(
					   'id'      => $id->id_rumah,
					   'qty'     => 1,
					   'price'   => $id->price,
					   'dp'		 => $id->dp,
					   'name'    => $id->name,
					   'description'    => $id->description
					);
 
		$this->cart->insert($data);
		redirect(base_url('cmember'));
	}
	
	public function cart(){
		$this->load->view('profil/vnavbar');
		$this->load->view('vcart');
		
		
	}

	
	public function clear_cart()
	{
	$this->cart->destroy();
	redirect(base_url('cmember'));
	}


}