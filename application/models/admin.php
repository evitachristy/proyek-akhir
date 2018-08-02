<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	
	public function update_status_laporan($id,$data){
		$this->db->where('id_konfirmasi', $id);
		$this->db->update('konfirmasi',$data);
	}
	public function datalaporan(){
		 // $q="SELECT k.id_konfirmasi kir, k.id_pelanggan kip, k.nama knama, r.id_rumah rid, r.name rnama, p.nama pnama, k.tanggal ktgl, k.price khg FROM  konfirmasi k left join rumah r on k.id_rumah=r.id_rumah left join pemilik p on r.id_pemilik=p.id_pemilik";
   //      $query=$this->db->query($q);
   //      return $query->result();
		$this->db->select('*');
		$this->db->from('konfirmasi');
		return $this->db->get()->result();
	}
	
	public function cetaklaporan($nokonfirm){
		 $query=$this->db->query("SELECT k.id_konfirmasi kir, k.id_pelanggan kip, k.nama knama, r.id_rumah rid, r.name rnama, p.nama pnama, k.tanggal ktgl, k.price khg FROM  konfirmasi k left join rumah r on k.id_rumah=r.id_rumah left join pemilik p on r.id_pemilik=p.id_pemilik where k.id_konfirmasi='$nokonfirm'");
        $rows=$query->row();
		return $rows;
		
	}
	
	public function searchlp($keyword){
		 $q="SELECT k.id_pelanggan kip, k.nama knama, r.id_rumah rid, r.name rnama, p.nama pnama, k.tanggal ktgl, k.price khg FROM  konfirmasi k left join rumah r on k.id_rumah=r.id_rumah left join pemilik p on r.id_pemilik=p.id_pemilik where k.id_pelanggan like '$keyword' or k.nama like '$keyword' or r.name like '$keyword' or p.nama like '$keyword' or k.tanggal like '$keyword' ";
        $query=$this->db->query($q);
        return $query->result();
		
	}
	
	public function cek_account($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('admin');
		
		if($query->num_rows() > 0)
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function search($keyword)
    {
        $this->db->like('nama',$keyword)->or_like('tanggal',$keyword)->or_like('price',$keyword)->or_like('status',$keyword)->or_like('id_pelanggan',$keyword)->or_like('id_konfirmasi',$keyword);
        $query  =   $this->db->get('konfirmasi');
        return $query->result();
    }
	
	// public function searchnt($keyword)
 //    {
 //        $this->db->like('nama',$keyword)->or_like('tanggal',$keyword)->or_like('price',$keyword)->or_like('status',$keyword)->or_like('id_pelanggan',$keyword)->or_like('id_konfirmasi',$keyword);
 //        $query  =   $this->db->get('notif');
 //        return $query->result();
 //    }
	
	public function find($iduser){
		 $q="SELECT *  FROM  user WHERE id_pelanggan='$iduser'";
        $query=$this->db->query($q);
        return $query->row();
		
	}	

	public function find_pemilik($iduser){
		 $q="SELECT *  FROM  pemilik WHERE id_pemilik='$iduser'";
        $query=$this->db->query($q);
        return $query->row();
		
	}	
	
	public function updatepelanggan($id_pelanggan, $nama, $email, $notelp)
	{
		$data = array(
		'id_pelanggan' => $id_pelanggan ,
		'nama' => $nama ,
		'email' => $email,
		'notelp' => $notelp
		);

		$this->db->where('id_pelanggan', $id_pelanggan);
		$this->db->update('user', $data);
	}

	public function updatepemilik($id_pemilik, $nama, $email, $notelp)
	{
		$data = array(
		'id_pemilik' => $id_pemilik ,
		'nama' => $nama ,
		'email' => $email,
		'notelp' => $notelp
		);

		$this->db->where('id_pemilik', $id_pemilik);
		$this->db->update('pemilik', $data);
	}
	
	
	
	
}