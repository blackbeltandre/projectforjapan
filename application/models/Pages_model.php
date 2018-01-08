<?php
class Pages_model extends CI_Model
    {
        function get_pages_list($limit, $start)
    {
        $sql = 'select pages.id,pages.id_page,pages.counter,pages.title,pages.description,pages.date_post,
                pages.foto,
                     page.id_page,page.page from pages 
                            inner join page on pages.id_page=page.id_page 
                       where
                pages.id_page=page.id_page order by id desc limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function show_pages_id($id){
        $query = $this->db->query("select * from pages where id=".$id);
        $result = $query->result_array();
    return $result;
    }
    function Get_show_pages(){   
        return $this->db->query("select pages.id,pages.id_pages,pages.counter,pages.title,pages.description,pages.date_post,
                pages.author,pages.foto,
                     pages.id_pages,pages.pages,
                            pages.status, case when pages.status = 1 then 'Publish'
                                when pages.status = 0 then 'Non Publish' else 'Draft'
                                    end as status from pages 
                            inner join pages on pages.id_pages=pages.id_pages 
                       where
                pages.id_pages=pages.id_pages order by pages.date_post desc");
    }
    function getpages(){
    return $this->db->query("select pages.*,pages.id_pages,pages.pages
                from pages left join pages on pages.id_pages=pages.id_pages 
                where pages.id_pages=pages.id_pages order by rand()");
    }
    function show_id_page($id)
    {
        return $this->db->query("select pages.id,pages.id_page,page.id_page,page.page 
            from pages left join page on pages.id_page=page.id_page where pages.id=".$id);

    }
   

    function show_list_pages()
    {
        return $this->db->query("select * from page order by rand()");

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
