<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadmin extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('level') != 'admin' and $this->session->userdata('isLogin') != 1)
		{
			$this->session->set_flashdata('error','Maaf anda belum Login !');
			redirect('home/LoginAdmin');	
		}
		$this->load->model('muser','mu');
		$this->load->model('admin');
		$this->load->model('mpemilik');
		$this->load->model('mkonfirmasi');
		$this->load->model('mrumah');
		$this->load->model('mpembayaran');
	}
	public function index(){
		$data["notif"]= $this->mkonfirmasi->ambilnotif();
		$this->load->view('admin/index',$data);
	}
	
	public function searchpaid()
    {
        $keyword    =   $this->input->get('cari',true);
        
		$this->load->view('admin/navbaradmin');
		$data['konfirmasi']    =   $this->admin->search($keyword);
		$this->load->view("admin/vkonfirmasiData", $data);
        
    }
	
	public function searchnotif()
    {
        $keyword    =   $this->input->get('cari',true);
        
		$this->load->view('admin/navbaradmin');
		$data['konfirmasi']    =   $this->admin->searchnt($keyword);
		$this->load->view("admin/vkonfirmasiData", $data);
        
    }

	
	public function searchrumah()
    {
        $keyword    =   $this->input->get('cari',true);
		$this->mrumah->searchrum($keyword);
        
		$limit = 5;
		if(empty($offset)){ $offset = 0;}
		
		$config['base_url'] = 'http://localhost/carkon/cadmin/listRumah';
		$config['total_rows'] = $this->mrumah->num_rows_user();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);		
		$data['pagelink'] = $this->pagination->create_links();
		
		$keyword    =   $this->input->get('cari',true);
		$this->load->view('admin/navbaradmin',$data);
		$data["mrumah"]=$this->mrumah->searchrum($keyword);
		$data["notif"]= $this->mkonfirmasi->ambilnotif();
		$this->load->view("admin/vlistRumah", $data);
		
		
    }
	
	public function searchpel()
    {
        $keyword    =   $this->input->get('cari',true);
        $data['muser']    =   $this->muser->search($keyword);
		$this->load->view("admin/navbaradmin", $data);
		$this->load->view("admin/vlistPelanggan", $data);
        
    }
	
	public function searchpem()
    {
        $keyword    =   $this->input->get('cari',true);
        $data['mpemilik']    =   $this->mpemilik->searchpem($keyword);
		$this->load->view("admin/navbaradmin", $data);
		$this->load->view("admin/vlistPemilik", $data);
        
    }
	
	public function searchlap()
    {
        $keyword    =   $this->input->get('cari',true);
        $data['hasil']    =   $this->admin->searchlp($keyword);
		$this->load->view("admin/navbaradmin", $data);
		$this->load->view("admin/vlistLaporan", $data);
        
    }
	
	public function search_keyword()
    {
        $keyword    =   $this->input->post('keyword');
        $data['mpemilik']    =   $this->mpemilik->search($keyword);
        $this->load->view("admin/navbaradmin", $data);
    }
	
	public function editPelanggan(){
		$iduser = $this->uri->segment(3);
		
		$data["notif"]= $this->mkonfirmasi->ambilnotif();
		$data["muser"]= $this->admin->find($iduser);
		$this->load->view('admin/navbaradmin',$data);
		$this->load->view("admin/vupdatePelanggan",$data);
	}

		public function editPemilik(){
		$idpemilik = $this->uri->segment(3);
		$data["mpemilik"]= $this->admin->find_pemilik($idpemilik);
		$this->load->view('admin/navbaradmin',$data);
		$this->load->view("admin/vupdatePemilik",$data);
	}
	
	public function simpanpelanggan(){
		$id_pelanggan = $this->input->post('id');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$notelp = $this->input->post('notelp');
		
		$data["notif"]= $this->mkonfirmasi->ambilnotif();
		$data["muser"]= $this->admin->updatepelanggan($id_pelanggan, $username, $password, $nama, $email, $notelp);
		$this->load->view('admin/navbaradmin',$data);
		$this->load->view("admin/sukses", $data);
	}

		public function simpanpemilik(){		
		$id_pemilik = $this->input->post('id');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$notelp = $this->input->post('notelp');
		
		$data["notif"]= $this->mkonfirmasi->ambilnotif();
		$data["mpemilik"]= $this->admin->updatepemilik($id_pemilik, $username, $password, $nama, $email, $notelp);
		$this->load->view('admin/navbaradmin',$data);
		$this->load->view("admin/sukses", $data);
	}
	
	public function listPelanggan(){
		
		$data["notif"]= $this->mkonfirmasi->ambilnotif();
		$data["muser"]= $this->mu->ambilData()->result();
		$this->load->view('admin/navbaradmin',$data);
		$this->load->view("admin/vlistPelanggan", $data);
	}
	public function listPemilik(){
		
		$data["notif"]= $this->mkonfirmasi->ambilnotif();
		$data["mpemilik"]= $this->mpemilik->ambilData()->result();
		$this->load->view('admin/navbaradmin',$data);
		$this->load->view("admin/vlistPemilik", $data);
	}

	public function tolak(){
		$id=$this->uri->segment(3);
		$where = array('id_konfirmasi' => $id );
		$data = array('status1' => 'Ditolak');
		$this->admin->update_status_laporan($id, $data);
		redirect('cadmin/laporan');
	}
	
		
	
	public function listRumah($offset = 0){
		// $limit = 5;
		// if(empty($offset))$limit,$offset{ $offset = 0;}
		
		$config['base_url'] = 'http://localhost/carkon/cadmin/listRumah';
		$config['total_rows'] = $this->mrumah->num_rows_user();
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);		
		$data['pagelink'] = $this->pagination->create_links();
		
		$data["notif"]= $this->mkonfirmasi->ambilnotif();
		$data["mrumah"]= $this->mrumah->ambilDataSemua();
		$this->load->view("admin/vlistRumah", $data);
		$this->load->view('admin/navbaradmin',$data);
	}
	
	public function list_user($offset = 0)
	{	
		$limit = 2;
		if(empty($offset)){ $offset = 0;}
		
		$config['base_url'] = 'http://localhost/reg/cadmin/list_user';
		$config['total_rows'] = $this->mu->num_rows_user();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);		
		$data['pagelink'] = $this->pagination->create_links();
	
		$data["notif"]= $this->mkonfirmasi->ambilnotif();
		$data['muser'] = $this->mu->get_all_user($limit,$offset);
		$this->load->view('side');
		$this->load->view('vmember',$data);
		
	}
	
	public function lihat($id_konfirmasi){
		$id_konfirmasi = $this->uri->segment(3);
		$data["gambar"]= $this->mkonfirmasi->ambilgambar($id_konfirmasi);
		$this->load->view('admin/navbaradmin', $data);
		$this->load->view("admin/vgambar", $data);
	}
	
	public function setuju($id_user){
		$id_user = $this->uri->segment(3);
		$this->mkonfirmasi->setuju($id_user);
		$this->mkonfirmasi->mstat($id_user);
		$this->mkonfirmasi->mstat1($id_user);
		//$this->mkonfirmasi->tolak($id_user);
		
		$data["notif"]= $this->mkonfirmasi->ambilnotif();
		$data["konfirmasi"]= $this->mkonfirmasi->ambilnotif();
		$this->load->view('admin/navbaradmin', $data);
		$this->load->view("admin/vnotif", $data);
	}
	
	public function approve(){
		$id = $this->uri->segment(3);
		$data = array(
			'status1' => 'Lunas'
		);

		$this->admin->update_status_laporan($id, $data);
		redirect('cadmin/laporan');
	} 

	public function laporan(){
		
		$data["hasil"]= $this->admin->datalaporan();
		$data["notif"]= $this->mkonfirmasi->ambilnotif();
		$this->load->view('admin/navbaradmin', $data);
		$this->load->view("admin/vlistLaporan", $data);
		
	} 

	// function cetakpdf(){
			
	// 		$nokonfirm = $this->uri->segment(3);
			  			
			
	// 		$hasil=$this->admin->cetaklaporan($nokonfirm);
			
				
	// 			//load mPDF library
	// 			$this->load->library('m_pdf');
	// 			//load mPDF library


	// 			//now pass the data//
	// 			 $this->data['title']="MY PDF TITLE 1.";
	// 			 $this->data['description']="";
	// 			// $this->data['description']=$this->official_copies;
	// 			 $this->data['id_konfirmasi']=$hasil->kir;
	// 			 $this->data['id_pelanggan']=$hasil->kip;
	// 			 $this->data['id_rumah']=$hasil->rid;
	// 			 $this->data['namapel']=$hasil->knama;
	// 			 $this->data['namerum']=$hasil->rnama;
	// 			 $this->data['namapem']=$hasil->pnama;
	// 			 $this->data['tanggal']=$hasil->ktgl;
	// 			 $this->data['price']=$hasil->khg;
	// 			 //$this->data['status']=$hasil->pkuota;
				 
				 
				 
	// 			 //now pass the data //

	// 			$html=$this->load->view('laporanadmin.html',$this->data, true); 
				
				
			 
	// 			//this the the PDF filename that user will get to download
	// 			$pdfFilePath =$tgl."Laporan Data Pelanggan Cari Kontrakan".".pdf";
				
				
				
	// 			//actually, you can pass mPDF parameter on this load() function
	// 			$pdf = $this->m_pdf->load();
	// 			//generate the PDF!
	// 			$pdf->WriteHTML($html,2);
				
	// 			//offer it to user via browser download! (The PDF won't be saved on your server HDD)
	// 			$pdf->Output();
				
	// 			//$pdf->Output($pdfFilePath, "D");
				
	// 	}
	

	
	public function delete($id_user)
	{
	$this->mu->delete($id_user);
	redirect('cadmin/listPelanggan');
	}
	
	public function deletepemilik($id_pemilik)
	{
	$this->mpemilik->delete($id_pemilik);
	redirect('cadmin/listPemilik');
	}

	public function delete_by_admin($id_rumah)
	{
	$this->mrumah->delete($id_rumah);
	redirect('cadmin/listRumah');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('home/LoginAdmin');
	}
} 