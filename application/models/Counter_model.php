<?php
class Counter_model extends CI_Model
    {
        function get_counter_list($limit, $start)
    {
        $sql = 'select * from pages order by id desc limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function show_counter_id($id){
        $query = $this->db->query("select * from pages where id=".$id);
        $result = $query->result_array();
    return $result;
    }
    function Get_show_counter(){   
        return $this->db->query("select * from counter order by counter.id desc");
    }
    function getcounter(){
    return $this->db->query("select * from pages order by rand()");
    }
    function show_id_counter($id)
    {
        return $this->db->query("select * from pages where pages.id=".$id);

    }
   

    function show_list_counter()
    {
        return $this->db->query("select * from pages order by rand()");

    }
   
   
        function multiple_delete() {
		    $action = $this->input->post('action');
		        if ($action == "delete") {
			        $delete = $this->input->post('selected');
			        for ($i=0; $i < count($delete) ; $i++) { 
                         $this->db->where('id',$delete[$i]);
                        $query = $this->db->get('pages');
                        $row = $query->row();
                        $this->db->where('id', $delete[$i]);
                        unlink("./assets/foto/$row->foto");
                        $this->db->delete('pages', array('foto' => $delete[$i]));
			     $this->db->where('id', $delete[$i]);
		      $this->db->delete('pages');
			}
		}
    }
}
