<?php
class webmaster_model extends CI_Model{
	

// Function To Fetch Selected Student Record

	
// Function To Fetch Selected Student Record
function show_user_id($data){
$this->db->select('*');
$this->db->from('administrator');
$this->db->where('id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}function getwebmaster()
    {
 		return $this->db->query("select * from administrator order by rand()");

    }
function get_user_list($limit, $start)
    {
        $sql = 'select * from administrator order by id desc limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result_array();
    }
function multiple_delete() {
		$action = $this->input->post('action');
		if ($action == "delete") {
			$delete = $this->input->post('selected');
			for ($i=0; $i < count($delete) ; $i++) { 
				$this->db->where('id', $delete[$i]);
				$this->db->delete('administrator');
			}
		}}
}
