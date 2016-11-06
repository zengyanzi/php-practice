<?php 
/**
* 
*/
require_once(dirname(__FILE__).'/../utils/mysql.php');
 
class ItemDao{
	public static $TABLE = "item";

	public static function add($item){
		$db = DB::getInstance();
		$customer = array(
			'item_name' =>$item->item_name,
			'img' => $item->img,
			'category_id' => $item->category_id,
			'supplier_id' => $item->supplier_id,
			'item_description' => $item->item_description,
			'item_price' => $item->item_price,
			'status' => 0
		);
		return $db->insert(CustomerDao::$TABLE, $item);
	}
	public static function getItemById($item_id){
		$db = DB::getInstance();
		$sql = "select * from item where item_id=".$item_id;
		$rt = $db->get_one($sql);
		if(is_null($rt)){
			return null;
		}else{
			$item = new Item();
			$item->item_id=$rt['item_id'];
			$item->item_name=$rt['item_name'];
			$item->img=$rt['img'];
			$item->category_id=$rt['category_id'];
			$item->supplier_id=$rt['supplier_id'];
			$item->item_description=$rt['item_description'];
			$item->item_price=$rt['item_price'];
			$item->status=$rt['status'];
			return $item;
		}
	}
	public static function getItemByCid($cid,$page_no){
		$db = DB::getInstance();
		$pid = CategoryDao::getCategoryById($cid) -> parent_id;
		if($pid == 0){
			$cats = CategoryDao::getCategoryByParentId($cid);
			foreach ($cats as $cat ) {
				$cids[] = $cat->category_id;
			}
			$cids = "(".join(",",$cids).")";
		}else{
			$cids = "(".$cid.")";
		}
		$sql = "select * from item where category_id in ".$cids." limit ".($page_no*20).",20";
		$rt = $db->get_all($sql);
		if(is_null($rt)){
			return null;
		}else{
			$res = array();
        	foreach ($rt as $ct) {
        		$item = new Item();
				$item->item_id=$ct['item_id'];
				$item->item_name=$ct['item_name'];
				$item->img=$ct['img'];
				$item->category_id=$ct['category_id'];
				$item->supplier_id=$ct['supplier_id'];
				$item->item_description=$ct['item_description'];
				$item->item_price=$ct['item_price'];
				$item->status=$ct['status'];
				$res[]  = $item;		
        	}
        	return $res;
		}
	}
	public static function getCount($cid){
		$db = DB::getInstance();
		$pid = CategoryDao::getCategoryById($cid) -> parent_id;
		if($pid == 0){
			$cats = CategoryDao::getCategoryByParentId($cid);
			foreach ($cats as $cat ) {
				$cids[] = $cat->category_id;
			}
			$cids = "(".join(",",$cids).")";
		}else{
			$cids = "(".$cid.")";
		}
		$sql = "select count(*) as count from item where category_id in ".$cids;
		$rt = $db->get_one($sql);
		if(is_null($rt)){
			return null;
		}else{
        	return $rt['count'];
		}
	}
	public static function getItem(){
		$db = DB::getInstance();
		$sql = "select * from item";
		$rt = $db->get_all($sql);
		if(is_null($rt)){
			return null;
		}else{
			$res = array();
        	foreach ($rt as $ct) {
        		$item = new Item();
				$item->item_id=$ct['item_id'];
				$item->item_name=$ct['item_name'];
				$item->img=$ct['img'];
				$item->category_id=$ct['category_id'];
				$item->supplier_id=$ct['supplier_id'];
				$item->item_description=$ct['item_description'];
				$item->item_price=$ct['item_price'];
				$item->status=$ct['status'];
				$res[]  = $item;		
        	}
        	return $res;
		}
	}
	public static function search($search){
		$db = DB::getInstance();
		$sql = "select * from item where item_name like '%".$search."%'";
		$rt = $db->get_all($sql);
		if(is_null($rt)){
			return null;
		}else{
			$res = array();
        	foreach ($rt as $ct) {
        		$item = new Item();
				$item->item_id=$ct['item_id'];
				$item->item_name=$ct['item_name'];
				$item->img=$ct['img'];
				$item->category_id=$ct['category_id'];
				$item->supplier_id=$ct['supplier_id'];
				$item->item_description=$ct['item_description'];
				$item->item_price=$ct['item_price'];
				$item->status=$ct['status'];
				$res[]  = $item;		
        	}
        	return $res;
		}
	}
	
}
 ?>