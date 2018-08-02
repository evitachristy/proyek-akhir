<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Mrumah extends CI_Model {
 
	public function all(){
		$hasil = $this->db->get('rumah');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} 
	}
	
	public function halaman(){
	$q="SELECT r.id_rumah rid, r.name rnama, r.description rd, r.price rpr, r.image rim, r.jmlhkamar rkm, r.jmlhkamarmandi rkmi, r.luasb rlb, r.luast rlt, r.jmlhlantai rjmlhlantai, r.lokasi rlok, p.notelp pnt, p.nama pnama from rumah r left join pemilik p on r.id_pemilik=p.id_pemilik";
    $query=$this->db->query($q);
    return $query->result();
	}
	
	
	public function find($no){
		 $q="SELECT *  FROM  rumah WHERE id_rumah='$no'";
        $query=$this->db->query($q);
        return $query->row();
		
	}	

	
	function update($id_rumah, $name, $description, $price, $jmlhkamar, $jmlhkamarmandi, $luasb, $luast, $jmlhlantai, $lokasi,  $image)
	{
		$this->db->query("UPDATE rumah SET name='$name', description='$description', price='$price', jmlhkamar='$jmlhkamar', jmlhkamarmandi='$jmlhkamarmandi', luasb='$luasb', luast='$luast', jmlhlantai='$jmlhlantai', lokasi='$lokasi', image='$image' WHERE id_rumah='$id_rumah'");
        
	}
	
	public function get_detail_data($id){
	$q="SELECT r.id_rumah rid, r.name rnama, r.description rd, r.price rpr, r.image rim, r.jmlhkamar rkm, r.jmlhkamarmandi rkmi, r.luasb rlb, r.luast rlt, r.jmlhlantai rjmlhlantai, r.lokasi rlok, p.notelp pnt from rumah r left join pemilik p on r.id_pemilik=p.id_pemilik where r.id_rumah='$id'";
    $query=$this->db->query($q);
    return $query->row();
	}
	
	
	public function ambilDataSemua(){
		return $this->db->get('rumah')->result();
	}
	
	public function searchrum($keyword)
    {
        $this->db->like('name',$keyword)->or_like('description',$keyword)->or_like('price',$keyword);
        $query  =   $this->db->get('rumah');
        return $query->result();
    }
		
	
	public function ambilData($id_pemilik){
		
		$hasil = $this->db->get("rumah where id_pemilik='$id_pemilik'");
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else {
			return array();
		}
		
	}
	
	public function num_rows_user()
	{
		return $this->db->get('rumah')->num_rows();
	}
	
	public function create($data_products){		
			//guery insert into database 	
			$this->db->insert('rumah',$data_products);
				
		}//end function craete
		
	public function get_user_byid($id_pemilik)
	{
		$this->db->where('id_pemilik',$id_pemilik);
		return $this->db->get('rumah')->row();
	}
	
		public function delete($id_pemilik)
	{
		$this->db->delete('rumah', array('id_rumah' => $id_pemilik));
	}
}