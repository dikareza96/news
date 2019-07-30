<?php 

class Query extends CI_Model{
	

	function post_join(){
		$this->load->database();
		return $this->db->query('
			SELECT a.id, a.title, a.slug, a.img, b.title AS category_name, c.title AS subcategory_name
			FROM post a, category b, subcategory c
			WHERE (a.post_category=b.id AND a.post_subcategory=c.id );
			');
	}

	function subcategory_join(){
		$this->load->database();
		return $this->db->query('
			SELECT a.id, a.title, a.slug, a.parent_category, b.title AS category_name
			FROM subcategory a, category b
			WHERE (a.parent_category=b.id);
			');
	}
	function list_post_home(){
			$this->load->database(); 
			return $this->db->query('
					SELECT a.id, a.title, a.total_view, a.slug, a.img, b.title AS category_name, c.title AS subcategory_name
                    FROM post a
                    INNER JOIN category b
                    ON a.post_category =b.id
                    INNER JOIN subcategory c
                    ON a.post_subcategory =c.id
                     LIMIT 0,8;
                    ');
		}
	
}
