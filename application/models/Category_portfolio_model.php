<?php
class Category_portfolio_model extends CI_Model{
	

// Function To Fetch Selected Student Record

	
// Function To Fetch Selected Student Record
function show_category_portfolio_id($data){
$this->db->select('*');
$this->db->from('category_portfolio');
$this->db->where('id_category_portfolio', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}function getcategory_portfolio()
    {
 		return $this->db->query("select * from category_portfolio order by rand()");

    }
function get_category_portfolio_list($limit, $start)
    {
        $sql = 'select * from category_portfolio order by id_category_portfolio desc limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result_array();
    }
function multiple_delete() {
		$action = $this->input->post('action');
		if ($action == "delete") {
			$delete = $this->input->post('selected');
			for ($i=0; $i < count($delete) ; $i++) { 
				$this->db->where('id_category_portfolio', $delete[$i]);
				$this->db->delete('category_portfolio');
			}
		}}
}
