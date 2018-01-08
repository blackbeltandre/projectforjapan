<?php
class Category_gallery_model extends CI_Model{
	

// Function To Fetch Selected Student Record

	
// Function To Fetch Selected Student Record
function show_category_gallery_id($data){
$this->db->select('*');
$this->db->from('category_gallery');
$this->db->where('id_category_gallery', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}function getcategory_gallery()
    {
 		return $this->db->query("select * from category_gallery order by rand()");

    }
function get_category_gallery_list($limit, $start)
    {
        $sql = 'select * from category_gallery order by id_category_gallery desc limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result_array();
    }
function multiple_delete() {
		$action = $this->input->post('action');
		if ($action == "delete") {
			$delete = $this->input->post('selected');
			for ($i=0; $i < count($delete) ; $i++) { 
				$this->db->where('id_category_gallery', $delete[$i]);
				$this->db->delete('category_gallery');
			}
		}}
}
