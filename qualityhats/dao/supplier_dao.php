<?php 
/**
* 
*/
require_once(dirname(__FILE__).'/../utils/mysql.php');
class SupplierDao{
	public static $TABLE = "supplier";

	public static function add($supplier){
		$db = DB::getInstance();
		$s = array(
			'supplier_name' => $supplier->supplier_name,
			'supplier_description' => $supplier->supplier_description,
			'supplier_status' => $supplier->supplier_status
		);
		return $db->insert(SupplierDao::$TABLE, $s);
	}
	public static function getSupplier(){
		$db = DB::getInstance();
		$sql = "select * from supplier";
		$rt = $db->get_all($sql);
		if(is_null($rt)){
			return null;
		}else{
			$res = array();
        	foreach ($rt as $ct) {
        		$s = new Supplier();
				$s->supplier_id=$ct['supplier_id'];
				$s->supplier_name=$ct['supplier_name'];
				$s->supplier_description=$ct['supplier_description'];
				$s->supplier_status=$ct['supplier_status'];
				$res[]  = $s;		
        	}
        	return $res;
		}
	}

}
 ?>