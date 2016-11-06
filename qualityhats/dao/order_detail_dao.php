<?php 
/**
* 
*/
require_once(dirname(__FILE__).'/../utils/mysql.php');
class OrderDetailDao{
	public static $TABLE = "order_detail";

	public static function add($od){
		$db = DB::getInstance();
		$o = array(
			'order_id' =>$od->order_id,
			'item_id' => $od->item_id,
			'number' => $od->number,
			'price' => $od->price,
			'discount' => $od->discount,
			'grandtotal' => $od->grandtotal
		);
		return $db->insert(OrderDetailDao::$TABLE, $o);
	}
	public static function getOrderDetailsByOrderId($order_id){
		$db = DB::getInstance();
		$sql = "select * from order_detail where order_id=".$order_id;
		$rt = $db->get_all($sql);
		if(is_null($rt)){
			return null;
		}else{
        	$res = array();
        	foreach ($rt as $ct) {
        		$od = new OrderDetail();
				$od->order_detail_id=$ct['order_detail_id'];
				$od->order_id=$ct['order_id'];
				$od->item_id=$ct['item_id'];
				$od->number=$ct['number'];
				$od->price=$ct['price'];
				$od->discount=$ct['discount'];
				$od->grandtotal=$ct['grandtotal'];
				$res[]  = $od;		
        	}

			return $res;
		}
	}

	
}
 ?>