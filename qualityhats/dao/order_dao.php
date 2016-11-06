<?php 
/**
* 
*/
require_once(dirname(__FILE__).'/../utils/mysql.php');
class OrderDao{
	public static $TABLE = "order_list";

	public static function add($order){
		$db = DB::getInstance();
		$o = array(
			'customer_id' =>$order->customer_id,
			'ctime' => date('Y-m-d h:i:s'),
			'order_status' => 0,
			'grandtotal' => $order->grandtotal
		);
		return $db->insert(OrderDao::$TABLE, $o);
	}

	public static function getOrderById($order_id,$customer_id){
		$db = DB::getInstance();
		$sql = "select * from order_list where order_id=".$order_id." and customer_id=".$customer_id;
		$rt = $db->get_one($sql);
		if(is_null($rt)){
			return null;
		}else{
			$order = new Order();
			$order->order_id=$rt['order_id'];
			$order->grandtotal=$rt['grandtotal'];
			$order->ctime=$rt['ctime'];
			$order->order_status=$rt['order_status'];
			$order->customer_id=$rt['customer_id'];
			return $order;
		}
	}
	public static function getOrderByStatus($status){
		$db = DB::getInstance();
		$sql = "select * from order_list where order_status=".$status." order by ctime desc";
		$rt = $db->get_all($sql);
		if(is_null($rt)){
			return null;
		}else{
			$res = array();
        	foreach ($rt as $ct) {
        		$o = new Order();
				$o->order_id=$ct['order_id'];
				$o->customer_id=$ct['customer_id'];
				$o->ctime=$ct['ctime'];
				$o->order_status=$ct['order_status'];
				$o->grandtotal=$ct['grandtotal'];
				$res[]  = $o;		
        	}
        	return $res;
		}
	}
	public static function modifyStatus($order_id,$status){
		$db = DB::getInstance();
		$o = array(
			'order_status' => $status,
		);
		$condition = "order_id=".$order_id;
		$db->update(OrderDao::$TABLE,$o,$condition);
	}
}
 ?>