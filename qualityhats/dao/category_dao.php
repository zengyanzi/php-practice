<?php 
/**
* 
*/
require_once(dirname(__FILE__).'/../utils/mysql.php');

class CategoryDao{
	public static $TABLE = "category";

	public static function getCategoryByParentId($parent_id){
		$db = DB::getInstance();
		$sql = "select * from category where parent_id=".$parent_id;
		$rt = $db->get_all($sql);
		if(is_null($rt)){
			return null;
		}else{
        	$res = array();
        	foreach ($rt as $ct) {
        		$category = new Category();
				$category->category_id=$ct['category_id'];
				$category->category_name=$ct['category_name'];
				$category->parent_id=$ct['parent_id'];
				$category->category_status=$ct['category_status'];
				$res[]  = $category;		
        	}

			return $res;
		}
	}
	public static function getCategoryById($cid){
		$db = DB::getInstance();
		$sql = "select * from category where category_id=".$cid;
		$rt = $db->get_one($sql);
		if(is_null($rt)){
			return null;
		}else{
        	$category = new Category();
			$category->category_id=$rt['category_id'];
			$category->category_name=$rt['category_name'];
			$category->parent_id=$rt['parent_id'];
			$category->category_status=$rt['category_status'];
			return $category;
        }
	}
	public static function getCategorys(){
		$db = DB::getInstance();
		$sql = "select * from category";
		$rt = $db->get_all($sql);
		if(is_null($rt)){
			return null;
		}else{
			$res = array();
			foreach ($rt as $ct) {
				$category = new Category();
				$category->category_id=$ct['category_id'];
				$category->category_name=$ct['category_name'];
				$category->parent_id=$ct['parent_id'];
				$category->category_status=$ct['category_status'];
			 	$res[] = $category;
			}
        	return $res;
        }
	}
}
 ?>