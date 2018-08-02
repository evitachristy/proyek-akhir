<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mpemilik extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	
	public function search($keyword)
    {
        $this->db->like('username',$keyword);
        $query  =   $this->db->get('pemilik');
        return $query->result();
    }
	
	public function add($data)
	{
	$this->db->insert('pemilik',$data);
	}
	
	public function ambilData(){
		return $this->db->get("pemilik");
	}
	
	public function get_foto($username){
		 $p="SELECT image from pemilik where username='$username'";
        $query=$this->db->query($p);
        return $query->row();
		
	}
	
	public function update($username, $password, $nama, $email, $notelp)
	{
		$data = array(
		   'password' => $password ,
		   'nama' => $nama ,
		   'email' => $email,
		   'notelp' => $notelp
		);

		$this->db->where('username', $username);
		$this->db->update('pemilik', $data);
	}
	
	public function updateprofil($id, $nama, $email, $username, $password, $notelp)
	{
		$data = array(
		   'id_pemilik' => $id ,
		   'nama' => $nama ,
		   'email' => $email ,
		   'username' => $username,
		   'password' => $password,
		   'ktp'	=> $ktp,
		   'notelp' => $notelp
		);

		$this->db->where('id_pemilik', $id);
		$this->db->update('pemilik', $data);
	}
	
	public function update_no_pass($username, $nama, $email, $notelp)
	{
		$data = array(
		   'nama' => $nama ,
		   'email' => $email,
		   'notelp' => $notelp
		);

		$this->db->where('username', $username);
		$this->db->update('pemilik', $data);
	}
	
	public function delete($id_pemilik1)
	{
		$this->db->delete('pemilik', array('id_pemilik' => $id_pemilik1));
	}
	
	public function cek_username($str)
	{
		$this->db->where('username',$str);
		$query = $this->db->get('pemilik');
		if($query->num_rows() > 0)
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function cek_account($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('pemilik');
		
		if($query->num_rows() > 0)
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function get_all_user()
	{
		return $this->db->get('pemilik')->result();
	}
	
	
	public function get_user_by($id_pemilik1)
	{
		$this->db->where('id',$id_pemilik1);
		return $this->db->get('pemilik')->row();
	}
	
	public function get_user_byusername($username)
	{
		$this->db->where('username',$username);
		return $this->db->get('pemilik')->row();
	}
	
	public function num_rows_user()
	{
		return $this->db->get('pemilik')->num_rows();
	}
	
	public function get_user_id_by_session()
	{ 
		$usr_name = $this->session->userdata('username');
		$gry = $this->db->where('username',$usr_name)
						->select('id_pemilik')
						->get('pemilik');
				if($gry->num_rows() > 0 )
					{
							return $gry->row()->id_pemilik;
					}else{
						
							return 0;
						 }	
	}
	public function create($data_products){		
			//guery insert into database 	
			$this->db->insert('konfirmasi',$data_products);
				
		}
	
}