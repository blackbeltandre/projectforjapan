<?php
class dashboard_model extends CI_Model{ 

	function dashboard_model()
	{
		parent::__construct();
	}
	
	function chart2(){
		$series='';
		$limit = ('5');
$this->db->select('*')->from('article')->join('category','category.id_category=article.id_category','left')->group_by('category.id_category,category.id_category');
$query = $this->db->get('',  $limit,'desc');
			 if ($query->num_rows() >0) {
				foreach ($query->result() as $row) {
								$series.="{ name: '".$row->category."', data: [".$row->id_category."] },"; 

							}
						}
					return $series;
				}
				
			}
	
	
	

