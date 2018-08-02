<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Mkonfirmasi extends CI_Model {
 	
	public function create($data){	 
		
			//guery insert into database 	
			$this->db->insert('notif',$data);
				
		}//end function craete
		
		
	public function ambilData(){
		$hasil = $this->db->get("konfirmasi");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else {
			return array();
		}
	}


	
	public function ambilnotif(){
		 $query=$this->db->query("SELECT * from notif where status=''");
        $rows=$query->result();
		return $rows;
	}

	
	public function ambilgambar($id_konfirmasi){
		 $query=$this->db->query("SELECT image from notif where id_konfirmasi='$id_konfirmasi'");
        $rows=$query->result();
		return $rows;
	}
	
	public function tolak($id_user)
	{
		$this->db->query("update notif set status='Tolak' where id_konfirmasi='$id_user'");
	}
	
	public function setuju($id_user){
		$this->db->query("insert into konfirmasi(id_konfirmasi, id_pelanggan, id_rumah, nama, tanggal, price, image, status) select id_konfirmasi, id_pelanggan, id_rumah, nama, tanggal, price, image, 'Belum Lunas' from notif where id_konfirmasi='$id_user'");
	}
	
	public function mstat($id_user){
		$this->db->query("update konfirmasi set status1='Lunas' where id_konfirmasi='$id_user' and status1=''");
	}
	
	public function mstat1($id_user){
		$this->db->query("update notif set status='Setuju' where id_konfirmasi='$id_user'");
	}
}