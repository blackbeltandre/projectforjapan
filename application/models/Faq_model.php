<?php
class faq_model extends CI_Model
    {
        function get_faq_list($limit, $start)
    {
        $sql = 'select * from faq order by id_faq desc limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function show_faq_id($id_faq){
        $query = $this->db->query("select * from faq where id_faq=".$id_faq);
        $result = $query->result_array();
    return $result;
    }
    function Get_show_faq(){   
        return $this->db->query("select * from faq order by faq.id_faq desc");
    }
    function getfaq(){
    return $this->db->query("select * from faq order by rand()");
    }
    function show_id_faq($id_faq)
    {
        return $this->db->query("select * from faq where faq.id_faq=".$id_faq);

    }
   

    function show_list_faq()
    {
        return $this->db->query("select * from faq order by rand()");

    }
   
   
        function multiple_delete() {
		    $action = $this->input->post('action');
		        if ($action == "delete") {
			        $delete = $this->input->post('selected');
			        for ($i=0; $i < count($delete) ; $i++) { 
                         $this->db->where('id_faq',$delete[$i]);
                        $query = $this->db->get('faq');
                        $row = $query->row();
                        $this->db->where('id_faq', $delete[$i]);
                        unlink("./assets/foto/$row->foto");
                        $this->db->delete('faq', array('foto' => $delete[$i]));
			     $this->db->where('id_faq', $delete[$i]);
		      $this->db->delete('faq');
			}
		}
    }
}
