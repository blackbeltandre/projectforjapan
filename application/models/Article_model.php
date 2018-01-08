<?php
class Article_model extends CI_Model
    {
        function get_article_list($limit, $start)
    {
        $sql = 'select article.id_article,article.id_category,article.counter,article.title,article.description,article.date_post,
                article.author,article.foto,
                     category.id_category,category.category,
                            article.status, case when article.status = 1 then "Publish"
                                when article.status = 0 then "Non Publish" else "Draft"
                                    end as status from article left join category on category.id_category=article.id_category 
                      order by id_article desc limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function show_article_id($id_article){
        $query = $this->db->query("select * from article where id_article=".$id_article);
        $result = $query->result_array();
    return $result;
    }
    function Get_show_article(){   
        return $this->db->query("select article.id_article,article.id_category,article.counter,article.title,article.description,article.date_post,
                article.author,article.foto,
                     category.id_category,category.category,
                            article.status, case when article.status = 1 then 'Publish'
                                when article.status = 0 then 'Non Publish' else 'Draft'
                                    end as status from article 
                            inner join category on article.id_category=category.id_category 
                       where
                article.id_category=category.id_category order by article.date_post desc");
    }
    function getcategory(){
    return $this->db->query("select article.*,category.id_category,category.category
                from article left join category on article.id_category=category.id_category 
                where article.id_category=category.id_category order by rand()");
    }
    function show_id_category($id_article)
    {
        return $this->db->query("select article.id_article,article.id_category,category.id_category,category.category 
            from article left join category on article.id_category=category.id_category where article.id_article=".$id_article);

    }
   

    function show_list_category()
    {
        return $this->db->query("select * from category order by rand()");

    }
   
   
        function multiple_delete() {
		    $action = $this->input->post('action');
		        if ($action == "delete") {
			        $delete = $this->input->post('selected');
			        for ($i=0; $i < count($delete) ; $i++) { 
                         $this->db->where('id_article',$delete[$i]);
                        $query = $this->db->get('article');
                        $row = $query->row();
                        $this->db->where('id_article', $delete[$i]);
                        unlink("./assets/foto/$row->foto");
                        $this->db->delete('article', array('foto' => $delete[$i]));
			     $this->db->where('id_article', $delete[$i]);
		      $this->db->delete('article');
			}
		}
    }
}
