<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mpembayaran extends CI_Model {
	
	public function belumlunas1($id)
	{
		$query = $this->db->query("select distinct i.status isl, m.name mnm, m.id_rumah mid from invoices i right join mpembayaran m on i.id=m.invoice_id left join user u on m.id_pelanggan=u.id_pelanggan where u.id_pelanggan='$id'");
		$rows=$query->result();
		return $rows;
	}

	public function dataa($id)
	{
		$query = $this->db->query("select * from rumah where id_rumah='$id'");
		$rows=$query->result();
		return $rows;
	}
	
	public function belumlunas($id)
	{
		$query = $this->db->query("select distinct k.status kstat, k.status1 kst, k.id_rumah kid, r.name rnm from konfirmasi k left join user u on k.id_pelanggan=u.id_pelanggan left join rumah r on k.id_rumah=r.id_rumah where u.id_pelanggan='$id'");
		$rows=$query->result();
		return $rows;
	}
	
	public function get_user_id_by_session()
	{ 
		$usr_name = $this->session->userdata('username');
		$gry = $this->db->where('username',$usr_name)
						->select('id_pelanggan')
						->limit(1)
						->get('user');
				if($gry->num_rows() > 0 )
					{
							return $gry->row()->id_pelanggan;
					}else{
						
							return 0;
						 }	
	}
	
	public function get_useridRumah()
	{ 
		$usr_name = $this->session->userdata('id_pemilik');
		$gry = $this->db->where('id_pemilik',$usr_name)
						->select('id_pemilik')
						->limit(1)
						->get('rumah');
				if($gry->num_rows() > 0 )
					{
							return $gry->row()->id_pemilik;
					}else{
						
							return 0;
						 }	
	}
	
	public function process()
	{ 	
		//here for create new invoice
		$invoice = array(
						'data'		=>	date('Y-m-d H:i:s'),
						'due_date'	=>	date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d') + 1,date('Y'))),
						'id_pelanggan'	=> $this->get_user_id_by_session(),
						'status'	=>	'unpaid'
						);
		$this->db->insert('invoices',$invoice);
		$invoice_id = $this->db->insert_id();
		//here for put ordered items in orders table
		foreach ($this->cart->contents() as $item)
		{
			$data = array(
						'invoice_id'		=> $invoice_id,
						'id_rumah	'		=> $item['id'],
						'name'		=> $item['name'],
						'price'				=> $item['price'],
						'id_pelanggan'	=> $this->get_user_id_by_session(),
						
						 );
			$this->db->insert('mpembayaran',$data);
		}
		
		return TRUE;
	}
	
	public function all_invoices()
	{ // get all orders from orders tble
		$get_orders = $this->db->get('invoices');
			if($get_orders->num_rows() > 0 ) {
					return $get_orders->result();
			} else {
					 return array();
			}
	}
	public function get_invoice_by_id($invoice_id)
	{
		$get_invoice_by = $this->db->where('id',$invoice_id)->limit(1)->get('invoices');
		if($get_invoice_by->num_rows() > 0 ) {
					return $get_invoice_by->result();
			} else {
					 return FALSE;
					}
	}
	
	public function get_orders_by_invoice($invoice_id)
	{
		$get_orders_by = $this->db->where('invoice_id',$invoice_id)->get('mpembayaran');
		if($get_orders_by->num_rows() > 0 ) {
					return $get_orders_by->result();
			} else {
					 return FALSE;
					}
	}
	
	public function ambilDatabyId(){
		$id =$this->mpembayaran->get_useridRumah();
		$hasil = $this->db->get("mpembayaran ");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else {
			return array();
		}
		
	}
	
	public function ambilDataSemua($limit,$offset){
		return $this->db->get('mpembayaran')->result();
	}
	
	public function num_rows_user()
	{
		return $this->db->get('mpembayaran')->num_rows();
	}
	
	
}//end class