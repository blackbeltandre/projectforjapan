<?php
class page_model extends CI_Model{
	

// Function To Fetch Selected Student Record

	
// Function To Fetch Selected Student Record
function show_page_id($data){
$this->db->select('*');
$this->db->from('page');
$this->db->where('id_page', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}function getpage()
    {
 		return $this->db->query("select * from page order by rand()");

    }
function get_page_list($limit, $start)
    {
        $sql = 'select * from page order by id_page desc limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result_array();
    }
function multiple_delete() {
		$action = $this->input->post('action');
		if ($action == "delete") {
			$delete = $this->input->post('selected');
			for ($i=0; $i < count($delete) ; $i++) { 
				$this->db->where('id_page', $delete[$i]);
				$this->db->delete('page');
			}
		}}
}
