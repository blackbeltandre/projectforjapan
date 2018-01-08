<?php
class Welcome_model extends CI_Model
    {
        function get_category_list($limit, $start)
    {
        $sql = 'select * from article where status=1 order by id_category desc limit ' . $start . ', ' . $limit;
        $query = $this->db->query($sql);
        return $query->result_array();
    } function list_category_id($id_category){
        return $this->db->query("select category.id_category,category.category,article.id_article,article.id_category,article.title,
        article.foto,article.author,article.date_post,article.status,article.counter from article left join category
        on article.id_category=category.id_category where article.id_category='$id_category' and status=1 group by category.id_category,category.category order by article.id_category desc");
    }function list_article_detail_id($id_article){
        return $this->db->query("select category.id_category,category.category,article.id_article,article.id_category,article.title,
        article.foto,article.author,article.date_post,article.status,article.counter from article left join category
        on article.id_category=category.id_category where article.id_article='$id_article'");
    }function get_pages_list($limit, $start)
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
    function GetContent($where = ''){
        return $this->db->query("select * from pages $where;");
    } function Get_gallery_detail($id){
        return $this->db->query('select gallery.id,gallery.id_category_gallery,gallery.title,gallery.counter,gallery.date_post,gallery.description,gallery.status,
                gallery.author,gallery.file,
                     category_gallery.id_category_gallery,category_gallery.category,
                            gallery.status, case when gallery.status = 1 then "Publish"
                                when gallery.status = 0 then "Draft" else "Draft"
                                    end as status from gallery left join category_gallery on category_gallery.id_category_gallery=gallery.id_category_gallery 
                       where gallery.id='.$id);
    }function show_media(){
        return $this->db->query('select gallery.id,gallery.id_category_gallery,gallery.title,gallery.counter,gallery.date_post,gallery.description,gallery.status,
                gallery.author,gallery.file,
                     category_gallery.id_category_gallery,category_gallery.category,
                            gallery.status, case when gallery.status = 1 then "Publish"
                                when gallery.status = 0 then "Draft" else "Draft"
                                    end as status from gallery left join category_gallery on category_gallery.id_category_gallery=gallery.id_category_gallery 
                      where gallery.status=1 and category_gallery.category="video" order by id desc limit 3');
    }function show_video(){
        return $this->db->query('select gallery.id,gallery.id_category_gallery,gallery.title,gallery.counter,gallery.date_post,gallery.description,gallery.status,
                gallery.author,gallery.file,
                     category_gallery.id_category_gallery,category_gallery.category,
                            gallery.status, case when gallery.status = 1 then "Publish"
                                when gallery.status = 0 then "Draft" else "Draft"
                                    end as status from gallery left join category_gallery on category_gallery.id_category_gallery=gallery.id_category_gallery 
                      where gallery.status=1 and category_gallery.category="video" order by id desc');
    }function show_foto(){
        return $this->db->query('select gallery.id,gallery.id_category_gallery,gallery.title,gallery.counter,gallery.date_post,gallery.description,gallery.status,
                gallery.author,gallery.file,
                     category_gallery.id_category_gallery,category_gallery.category,
                            gallery.status, case when gallery.status = 1 then "Publish"
                                when gallery.status = 0 then "Draft" else "Draft"
                                    end as status from gallery left join category_gallery on category_gallery.id_category_gallery=gallery.id_category_gallery 
                      where gallery.status=1 and category_gallery.category="foto" order by id desc');
    }function fotonya(){
        return $this->db->query('select gallery.id,gallery.id_category_gallery,gallery.title,gallery.counter,gallery.date_post,gallery.description,gallery.status,
                gallery.author,gallery.file,
                     category_gallery.id_category_gallery,category_gallery.category,
                            gallery.status, case when gallery.status = 1 then "Publish"
                                when gallery.status = 0 then "Draft" else "Draft"
                                    end as status from gallery left join category_gallery on category_gallery.id_category_gallery=gallery.id_category_gallery 
                      where gallery.status=1 and category_gallery.category="foto" order by id desc limit 3');
    }function show_audio(){
        return $this->db->query('select gallery.id,gallery.id_category_gallery,gallery.title,gallery.counter,gallery.date_post,gallery.description,gallery.status,
                gallery.author,gallery.file,
                     category_gallery.id_category_gallery,category_gallery.category,
                            gallery.status, case when gallery.status = 1 then "Publish"
                                when gallery.status = 0 then "Draft" else "Draft"
                                    end as status from gallery left join category_gallery on category_gallery.id_category_gallery=gallery.id_category_gallery 
                      where gallery.status=1 and category_gallery.category="audio" order by id desc');
    }function Get_detail_article($where = ''){
        return $this->db->query("select * from article $where;");
    }function show_detail_portfolio($id_portfolio){
        return $this->db->query("select 
            category_portfolio.id_category_portfolio,
            category_portfolio.category,
            portfolio.id_portfolio,
            portfolio.title,
            portfolio.description,
            portfolio.counter,
            portfolio.foto,
            portfolio.id_category_portfolio 
            from portfolio 
            left join category_portfolio on
            portfolio.id_category_portfolio=category_portfolio.id_category_portfolio where portfolio.id_portfolio='$id_portfolio'");
    }function Getarticle($where = ''){
        return $this->db->query("select * from article $where;");
    }function all_kontent_gallery(){
        return $this->db->query("select * from gallery ");
    }function partner(){
        return $this->db->query("select * from portfolio ");
    }
    function show_all_article($where= ''){
        $this->db->order_by("id_article","desc");
        return $this->db->query("select * from article $where;");
    }function show_latest_article(){
        return $this->db->query("select * from article order by counter desc limit 5");
    }function show_list_article(){
        return $this->db->query("select * from article where status=1 order by id_article desc limit 3");
    }function replay_komentar($id_article){
        return $this->db->query("select * from faq where id_article=$id_article and status=1");
    }function gallery_replay($id){
        return $this->db->query("select * from faq where id_gallery=$id and status=1");
    }function replay_komen($id){
        return $this->db->query("select * from faq where id=$id and status=1");
    }function replay_faq(){
        return $this->db->query("select * from faq where id=0 and id_gallery=0 and id_article=0 and status=1");
    }function komentar(){
        return $this->db->query("select * from faq order by id_faq desc");
    }function countkomentar(){
        return $this->db->query("select count(name) as count from faq order by id_faq desc");
    }function show_profil(){
        return $this->db->query("select page.id_page,page.page,pages.id,pages.id_page,pages.title,pages.description from pages
        left join page on pages.id_page=page.id_page where page.page='profil'");
    }function show_jasa(){
        return $this->db->query("select page.id_page,page.page,pages.id,pages.id_page,pages.title,pages.description from pages
        left join page on pages.id_page=page.id_page where page.page='bidang jasa'");
    }function show_article(){
        return $this->db->query("select * from article where status=1 order by counter desc");
    }function show_slider(){
        return $this->db->query("select * from slide order by id asc");
    }function slide_tunggal(){
        return $this->db->query("select max(id) as id,title,foto,description from slide ");
    }function all_koment(){
        return $this->db->query("select * from faq where status=1 order by date_sent desc limit 3 ");
    }function show_portfolio(){
        return $this->db->query("select category_portfolio.id_category_portfolio,category_portfolio.category,portfolio.id_category_portfolio,portfolio.title,portfolio.id_portfolio,portfolio.description,portfolio.foto,portfolio.id_portfolio from portfolio 
            left join category_portfolio on portfolio.id_category_portfolio=category_portfolio.id_category_portfolio order by portfolio.id_portfolio desc");
    }
    function show_list_portfolio(){
        return $this->db->query("select distinct(category) from category_portfolio ");
    }function show_list_category(){
        return $this->db->query("select category.id_category,category.category,article.id_category,article.title,article.id_article from article
                                  left join category on article.id_category=category.id_category group by category.id_category,category.category order by category.id_category,category.category");
    }function tags_category($id_article){
        return $this->db->query("select category.id_category,category.category,article.id_category,article.title,article.id_article from article
                                  left join category on article.id_category=category.id_category where article.id_article=$id_article group by category.id_category,category.category order by category.id_category,category.category");
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
   function get_page()
    {
        return $this->db->query("select * from pages");

    }

    function show_list_pages()
    {
        return $this->db->query("select distinct page from page order by id_page desc");

    }function detail_pages()
    {
        return $this->db->query("select *  from pages order by id desc");

    } function sambutan()
    {
        return $this->db->query("select page.id_page,page.page,pages.id,pages.id_page,pages.title,pages.description,pages.date_post,pages.foto,pages.counter from pages left join page
             on pages.id_page=page.id_page where page.page='sambutan' group by page.id_page,page.page order by pages.id asc");

    }function tentangku()
    {
        return $this->db->query("select page.id_page,page.page,pages.id,pages.id_page,pages.title,pages.description,pages.date_post,pages.foto,pages.counter from pages left join page
             on pages.id_page=page.id_page where page.page='tentangku' group by page.id_page,page.page order by pages.id asc");

    }function list_id_pages($id_page)
    {
        return $this->db->query("select page.id_page,page.page,pages.id_page,pages.title,pages.description,pages.date_post,pages.foto,pages.counter
         from pages left join page on pages.id_page=page.id_page where pages.id_page='$id_page'");

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
