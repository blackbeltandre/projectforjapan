<?php
class portfolio_model extends CI_Model
    {
        function get_portfolio_list($limit, $start)
    {
        $sql = 'select category_portfolio.*,portfolio.*
         from portfolio left join category_portfolio on category_portfolio.id_category_portfolio=portfolio.id_category_portfolio order by id_portfolio desc limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function show_portfolio_id($id_portfolio){
        $query = $this->db->query("select * from portfolio where id_portfolio=".$id_portfolio);
        $result = $query->result_array();
    return $result;
    }
    function Get_show_portfolio(){   
        return $this->db->query("select * from portfolio order by portfolio.id_portfolio desc");
    }
    function getportfolio(){
    return $this->db->query("select * from portfolio order by rand()");
    }
    function show_id_portfolio($id_portfolio)
    {
        return $this->db->query("select category_portfolio.id_category_portfolio,category_portfolio.category,portfolio.*
         from portfolio left join category_portfolio on category_portfolio.id_category_portfolio=portfolio.id_category_portfolio
         where portfolio.id_portfolio=".$id_portfolio);

    }
   function show_id_portfolio_get($id_portfolio)
    {
        return $this->db->query("select category_portfolio.*,portfolio.*
         from portfolio left join category_portfolio on category_portfolio.id_category_portfolio=portfolio.id_category_portfolio
         where portfolio.id_portfolio=".$id_portfolio);

    }

    function show_list_portfolio()
    {
        return $this->db->query("select * from category_portfolio order by rand()");

    }
   
   
        function multiple_delete() {
		    $action = $this->input->post('action');
		        if ($action == "delete") {
			        $delete = $this->input->post('selected');
			        for ($i=0; $i < count($delete) ; $i++) { 
                         $this->db->where('id_portfolio',$delete[$i]);
                        $query = $this->db->get('portfolio');
                        $row = $query->row();
                        $this->db->where('id_portfolio', $delete[$i]);
                        unlink("./assets/foto/$row->foto");
                        $this->db->delete('portfolio', array('foto' => $delete[$i]));
			     $this->db->where('id_portfolio', $delete[$i]);
		      $this->db->delete('portfolio');
			}
		}
    }
}
