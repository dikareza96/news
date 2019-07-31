<?php 

class Query extends CI_Model{

	function list_gallery_home(){
			$this->load->database(); 
			return $this->db->query('
					SELECT title, img
                    FROM gallery 
                     ORDER BY id DESC LIMIT 0,6;
                    ');
	}
	
	function list_post_home(){
			$this->load->database(); 
			return $this->db->query('
					SELECT a.id, a.title, a.total_view, a.content, a.slug, a.img, a.created_at,b.title AS category_name, c.title AS subcategory_name
                    FROM post a
                    INNER JOIN category b
                    ON a.post_category =b.id
                    INNER JOIN subcategory c
                    ON a.post_subcategory =c.id
                     ORDER BY a.created_at DESC LIMIT 0,4;
                    ');
	}

	function qount(){
		 $sql = "SELECT a.id, a.title, a.total_view, a.slug, a.content, a.img, a.created_at,b.title AS category_name, c.title AS subcategory_name
			FROM post a, category b, subcategory c
			WHERE (a.post_category=b.id AND a.post_subcategory=c.id )
			";
      $q = $this->db->query($sql);

      return $q->num_rows();
	}
	function gallery_count(){
		 $sql = "SELECT *
			FROM gallery
			";
      $q = $this->db->query($sql);

      return $q->num_rows();
	}
	function list_popular_home(){
			$this->load->database(); 
			return $this->db->query('
				SELECT a.id, a.title, a.total_view, a.content, a.slug, a.img, a.created_at,b.title AS category_name, c.title AS subcategory_name
				FROM post a, category b, subcategory c
				WHERE (a.post_category=b.id AND a.post_subcategory=c.id ) 
				ORDER BY total_view DESC LIMIT 0,5
				;');
		}
		function list_popular_slide(){
			$this->load->database(); 
			return $this->db->query('
				SELECT a.id, a.title, a.total_view, a.content, a.slug, a.img, a.created_at,b.title AS category_name, c.title AS subcategory_name
				FROM post a, category b, subcategory c
				WHERE (a.post_category=b.id AND a.post_subcategory=c.id ) 
				ORDER BY total_view DESC LIMIT 0,3
				;');
		}

	function list_data($perPage, $uri){
		

			$this->db->select('post.id, post.title, post.content, post.total_view, post.slug, post.img, post.created_at,category.title AS category_name, subcategory.title AS subcategory_name'); 
			$this->db->from('post', 'category','subcategory');
			$this->db->join('category', 'post.post_category = category.id', 'INNER');
			$this->db->join('subcategory', 'post.post_subcategory = subcategory.id', 'INNER');
			$this->db->order_by('created_at', 'desc');
			
			$getData = $this->db->get( '', $perPage, $uri);

		if ($getData->num_rows() > 0)
		{
			return $getData->result();
		}
		else{
			return null;
			
		}
	}
	function list_gallery($perPage, $uri){
		

			$this->db->select('id , title , img'); 
			$this->db->from('gallery');
			
			$getData = $this->db->get( '', $perPage, $uri);

			if ($getData->num_rows() > 0)
			{
				return $getData->result();
			}
			else{
				return null;
				
			}
	}

	function get_by_slug($slug)
	{
			$this->db->select('post.id, post.title, post.total_view, post.content, post.slug, post.img, post.created_at,category.title AS category_name, subcategory.title AS subcategory_name'); 
			$this->db->from('post', 'category','subcategory');
			$this->db->join('category', 'post.post_category = category.id', 'INNER');
			$this->db->join('subcategory', 'post.post_subcategory = subcategory.id', 'INNER');
			$this->db->where('post.slug',$slug);
			$res = $this->db->get();
			return $res->result();
			
	}
	function update_counter($slug)
    {
        
        $this->db->where('slug', urldecode($slug));
        $this->db->select('total_view'); $count = $this->db->get('post')->row();
       
        $this->db->where('slug', urldecode($slug));
        $this->db->set('total_view', ($count->total_view + 1));
        $this->db->update('post');
    }
    function get_related2($slug)
	{
		$sql = "
		SELECT 
		a.id, a.title, a.total_view, a.content, a.slug, a.img, a.created_at,b.title AS category_name, c.title AS subcategory_name,
		MATCH(a.title,a.slug) AGAINST('$slug') AS score
		 			FROM post a
                    INNER JOIN category b
                    ON a.`post_category` = b.`id`
                    INNER JOIN subcategory c
                    ON a.`post_subcategory` = c.`id`
                    WHERE MATCH(a.title,a.slug) AGAINST ('$slug')
                  ORDER BY score DESC LIMIT 3


		";
		return $this->db->query($sql)->result();
	}
	function get_kategori($where){	
    	$sql="SELECT 
    	a.id, a.title, a.total_view, a.content, a.slug, a.img, a.created_at,b.title AS category_name, c.title AS subcategory_name
                   FROM post a
                    INNER JOIN category b
                    ON a.`post_category` = b.`id`
                    INNER JOIN subcategory c
                    ON a.`post_subcategory` = c.`id`
                    WHERE b.slug ='$where'
                    ";
		return $this->db->query($sql)->result();
	}
	function get_subkategori($where){	
    	$sql="SELECT 
    	a.id, a.title, a.total_view, a.content, a.slug, a.img, a.created_at,b.title AS category_name, c.title AS subcategory_name
                   FROM post a
                    INNER JOIN category b
                    ON a.`post_category` = b.`id`
                    INNER JOIN subcategory c
                    ON a.`post_subcategory` = c.`id`
                    WHERE c.slug ='$where'
                    ";
		return $this->db->query($sql)->result();
	}
	 function search1($keyword)
		{
		$sql = "SELECT 
		a.id, a.title, a.total_view, a.content, a.slug, a.img, a.created_at,b.title AS category_name, c.title AS subcategory_name
		 FROM post a
                    INNER JOIN category b
                    ON a.`post_category` = b.`id`
                    INNER JOIN subcategory c
                    ON a.`post_subcategory` = c.`id`
		WHERE MATCH(a.title,a.slug, a.content) AGAINST('$keyword'  IN NATURAL LANGUAGE MODE) 
		" ;
		return $this->db->query($sql)->result();
		}

}
