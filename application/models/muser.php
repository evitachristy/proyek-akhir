<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Muser extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	
	public function search($keyword)
    {
        $this->db->like('username',$keyword);
        $query  =   $this->db->get('user');
        return $query->result();
    }
	
	public function add($data)
	{
	$this->db->insert('user',$data);
	}
	
	public function ambilData(){
		return $this->db->get("user");
	}
	
	public function get_foto($username){
		 $q="SELECT image from user where username='$username'";
        $query=$this->db->query($q);
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
		$this->db->update('user', $data);
	}
	
	public function updateprofil($id, $nama, $email, $username, $password, $notelp)
	{
		$data = array(
		   'id_pelanggan' => $id ,
		   'nama' => $nama ,
		   'email' => $email ,
		   'username' => $username,
		   'password' => $password,
		   'notelp' => $notelp
		);

		$this->db->where('id_pelanggan', $id);
		$this->db->update('user', $data);
	}
	
	public function update_no_pass($username, $nama, $email, $notelp)
	{
		$data = array(
		   'nama' => $nama ,
		   'email' => $email,
		   'notelp' => $notelp
		);

		$this->db->where('username', $username);
		$this->db->update('user', $data);
	}
	
	public function delete($id_user)
	{
		$this->db->delete('user', array('id_pelanggan' => $id_user));
	}
	
	public function cek_username($str)
	{
		$this->db->where('username',$str);
		$query = $this->db->get('user');
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
		$query = $this->db->get('user');
		
		if($query->num_rows() > 0)
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function get_all_user($limit,$offset)
	{
		return $this->db->get('user',$limit,$offset)->result();
	}
	
	
	public function get_user_by($id_user)
	{
		$this->db->where('id',$id_user);
		return $this->db->get('user')->row();
	}
	
	public function get_user_byusername($username)
	{
		$this->db->where('username',$username);
		return $this->db->get('user')->row();
	}
	
	public function num_rows_user()
	{
		return $this->db->get('user')->num_rows();
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
	public function create($data_products){		
			//guery insert into database 	
			$this->db->insert('konfirmasi',$data_products);
				
		}
	
}