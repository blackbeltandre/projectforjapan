<?php
class Counter_article_model extends CI_Model
    {
        function get_counter_article_list($limit, $start)
    {
        $sql = 'select * from article order by id_article desc limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function show_counter_article_id($id_article){
        $query = $this->db->query("select * from article where id_article=".$id_article);
        $result = $query->result_array();
    return $result;
    }
    function Get_show_counter_article(){   
        return $this->db->query("select * from article order by article.id_article desc");
    }
    function getcounter_article(){
    return $this->db->query("select * from article order by rand()");
    }
    function show_id_counter_article($id_article)
    {
        return $this->db->query("select * from article where article.id_article=".$id_article);

    }
   

    function show_list_counter_article()
    {
        return $this->db->query("select * from article order by rand()");

    }
   
   
        function multiple_delete() {
		    $action = $this->input->post('action');
		        if ($action == "delete") {
			        $delete = $this->input->post('selected');
			        for ($i=0; $i < count($delete) ; $i++) { 
                         $this->db->where('id',$delete[$i]);
                        $query = $this->db->get('article');
                        $row = $query->row();
                        $this->db->where('id', $delete[$i]);
                        unlink("./assets/foto/$row->foto");
                        $this->db->delete('article', array('foto' => $delete[$i]));
			     $this->db->where('id', $delete[$i]);
		      $this->db->delete('article');
			}
		}
    }
}
