<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpembayaran extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('username'))
		{
			redirect('login');
		}
		$this->load->model('mpembayaran');
		$this->load->model('muser');
	}
	
	public function index()
	{
		
		$is_processed = $this->mpembayaran->process();
		if($is_processed)
		{
			$this->cart->destroy();
			redirect('cpembayaran/success');
		}else{
				$this->session->set_flashdata('error','Failed To Processed Your Order ! , please try again');
				redirect('home/cart');
			
			 }
	}
	
	public function success()
	{
		$id=$this->uri->segment(3);
		$data['data']=$this->mpembayaran->dataa($id);
		$this->load->view('profil/vnavbar');
		$this->load->view('member/vkonfirmasi',$data);
		$this->load->view('footer');
			
	}


	public function checkout()
	{
		$id=$this->uri->segment(3);
		$data['data']=$this->mpembayaran->dataa($id);
		$this->load->view('profil/vnavbar');
		$this->load->view('vcheckout');
		$this->load->view('footer');		
	}
	
	
}//end  class