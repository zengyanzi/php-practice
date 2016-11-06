<?php 
/**
* 
*/
require_once(dirname(__FILE__).'/../utils/mysql.php');
 
class CustomerDao{
	public static $TABLE = "customer";

	public static function add($customer){
		$db = new DB();
		$customer = array(
			'customer_name' =>$customer->name,
			'customer_pwd' => $customer->password,
			'phone' => $customer->phone,
			'email' => $customer->email,
			'status' => $customer->status
		);
		return $db->insert(CustomerDao::$TABLE, $customer);
	}
	public static function login($name,$password){
		$db = new DB();
		$sql = "select * from customer where customer_name='".$name."' and customer_pwd='".$password."' and status=0";
		$rt = $db->get_one($sql);
		if(is_null($rt)){
			return null;
		}else{
			$customer = new Customer();
			$customer->customer_id=$rt['customer_id'];
			$customer->customer_name=$rt['customer_name'];
			$customer->phone=$rt['phone'];
			$customer->email=$rt['email'];
			return $customer;
		}
	}
	public static function getCustomerById($customer_id){
		$db = new DB();
		$sql = "select * from customer where customer_id=".$customer_id;
		$rt = $db->get_one($sql);
		if(is_null($rt)){
			return null;
		}else{
			$customer = new Customer();
			$customer->customer_id=$rt['customer_id'];
			$customer->customer_name=$rt['customer_name'];
			$customer->phone=$rt['phone'];
			$customer->email=$rt['email'];
			return $customer;
		}
	}
	public static function getCustomers(){
		$db = new DB();
		$sql = "select * from customer";
		$rt = $db->get_all($sql);
		if(is_null($rt)){
			return null;
		}else{
			$res = array();
			foreach ($rt as $ct) {
				$customer = new Customer();
				$customer->customer_id=$ct['customer_id'];
				$customer->customer_name=$ct['customer_name'];
				$customer->phone=$ct['phone'];
				$customer->email=$ct['email'];
				$res[] = $customer;
			}
			return $res;
		}
	}
	public static function search($search){
		$db = new DB();
		$sql = "select * from customer where customer_name like '%".$search."%'";
		$rt = $db->get_all($sql);
		if(is_null($rt)){
			return null;
		}else{
			$res = array();
			foreach ($rt as $ct) {
				$customer = new Customer();
				$customer->customer_id=$ct['customer_id'];
				$customer->customer_name=$ct['customer_name'];
				$customer->phone=$ct['phone'];
				$customer->email=$ct['email'];
				$res[] = $customer;
			}
			return $res;
		}
	}
	
}
 ?>