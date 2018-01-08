<?php
class gallery_model extends CI_Model
    {
        function get_gallery_list($limit, $start)
    {
      $sql = 'select gallery.id,gallery.id_category_gallery,gallery.title,gallery.counter,gallery.date_post,gallery.description,gallery.status,
                gallery.author,gallery.file,
                     category_gallery.id_category_gallery,category_gallery.category,
                            gallery.status, case when gallery.status = 1 then "Publish"
                                when gallery.status = 0 then "Draft" else "Draft"
                                    end as status from gallery left join category_gallery on category_gallery.id_category_gallery=gallery.id_category_gallery 
                      order by id desc limit ' . $start . ', ' . $limit;
                              $query = $this->db->query($sql);
        return $query->result_array();
    }
    function show_gallery_id($id){
        $query = $this->db->query('select gallery.id,gallery.id_category_gallery,gallery.title,gallery.counter,gallery.date_post,gallery.description,gallery.status,
                gallery.author,gallery.file,
                     category_gallery.id_category_gallery,category_gallery.category,
                            gallery.status from gallery left join category_gallery on category_gallery.id_category_gallery=gallery.id_category_gallery where gallery.id='.$id);
        $result = $query->result_array();
    return $result;
    }
    function Get_show_gallery(){   
        return $this->db->query("select * from gallery order by gallery.id desc");
    }
    function getgallery(){
    return $this->db->query("select * from gallery order by rand()");
    }
    function show_id_gallery($id)
    {
        return $this->db->query("select * from gallery where gallery.id=".$id);

    }
   

    function show_list_gallery()
    {
        return $this->db->query("select distinct(category)as category ,id_category_gallery from category_gallery order by id_category_gallery desc");

    }
   
   
        function multiple_delete() {
		    $action = $this->input->post('action');
		        if ($action == "delete") {
			        $delete = $this->input->post('selected');
			        for ($i=0; $i < count($delete) ; $i++) { 
                         $this->db->where('id',$delete[$i]);
                        $query = $this->db->get('gallery');
                        $row = $query->row();
                        $this->db->where('id', $delete[$i]);
                        unlink("./assets/files/$row->file");
                        $this->db->delete('gallery', array('file' => $delete[$i]));
			     $this->db->where('id', $delete[$i]);
		      $this->db->delete('gallery');
			}
		}
    }
}
