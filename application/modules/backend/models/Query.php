<?php 

class Query extends CI_Model{
	

	function post_join(){
		$this->load->database();
		return $this->db->query('
			SELECT a.id, a.title,  a.total_view, a.slug, a.img, a.created_at, b.title AS category_name, c.title AS subcategory_name
			FROM post a, category b, subcategory c
			WHERE (a.post_category=b.id AND a.post_subcategory=c.id )
			ORDER BY a.created_at DESC ;
			');
	}

	function subcategory_join(){
		$this->load->database();
		return $this->db->query('
			SELECT a.id, a.title, a.total_view, a.slug, a.parent_category, b.title AS category_name
			FROM subcategory a, category b
			WHERE (a.parent_category=b.id);
			');
	}
	

}
