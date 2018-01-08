<?php
class category_model extends CI_Model{
	

// Function To Fetch Selected Student Record

	
// Function To Fetch Selected Student Record
function show_category_id($data){
$this->db->select('*');
$this->db->from('category');
$this->db->where('id_category', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}function getcategory()
    {
 		return $this->db->query("select * from category order by rand()");

    }
function get_category_list($limit, $start)
    {
        $sql = 'select * from category order by id_category desc limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result_array();
    }
function multiple_delete() {
		$action = $this->input->post('action');
		if ($action == "delete") {
			$delete = $this->input->post('selected');
			for ($i=0; $i < count($delete) ; $i++) { 
				$this->db->where('id_category', $delete[$i]);
				$this->db->delete('category');
			}
		}}
}
