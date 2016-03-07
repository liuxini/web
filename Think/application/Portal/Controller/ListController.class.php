<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
/**
 * 文章列表
*/
class ListController extends HomeBaseController {

	
	public function index() {
        $helpertype = I("get.type");
 		$this->_lists();
		$this->assign('type',$helpertype);
		$this->display(':list');
	}
	
	private function _lists( $status=1,$is_findjob=0 ){
		$where_ands= array("helper_status=$status ");
		array_push($where_ands, "is_findjob=$is_findjob");
		
		$helper = M('helper');
		$type = I('post.type');
		$age = I("post.age");
		$sort = I("post.sort");
		
		if(!empty($age)){
			if( $age=='35'){
				$fields=array(
					'province'=> array("field"=>"province","operator"=>"like"),
					'city'=> array("field"=>"city","operator"=>"like"),
					'school'=> array("field"=>"school","operator"=>"like"),
					'age'  => array("field"=>"age","operator"=>"<"),
					'type'  => array("field"=>"type","operator"=>"like"),
				);
				
			}else if( $age =='48'){
				$fields=array(
					'province'=> array("field"=>"province","operator"=>"like"),
					'city'=> array("field"=>"city","operator"=>"like"),
					'agehigh'=> array("field"=>"age","operator"=>"<"),
					'type'  => array("field"=>"type","operator"=>"like"),
					'school'=> array("field"=>"school","operator"=>"like"),
					);	
					array_push($where_ands, "age > 35");
			}else if( $age =='49'){
				$fields=array(
					'province'=> array("field"=>"province","operator"=>"like"),
					'city'=> array("field"=>"city","operator"=>"like"),
					'school'=> array("field"=>"school","operator"=>"like"),
					'age'  => array("field"=>"age","operator"=>">"),
					'type'  => array("field"=>"type","operator"=>"like"),
				);				
			}			
		}else{
			$fields=array(
					'province'=> array("field"=>"province","operator"=>"like"),
					'city'=> array("field"=>"city","operator"=>"like"),
					'school'=> array("field"=>"school","operator"=>"like"),
					'type'  => array("field"=>"type","operator"=>"like"),
				);
		}
		
		if(IS_POST){
			
			foreach ($fields as $param =>$val){
				if (isset($_POST[$param]) && !empty($_POST[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					$get=$_POST[$param];
					$_GET[$param]=$get;
					if($operator=="like"){
						$get="%$get%";
					}				
					array_push($where_ands, "$field $operator '$get'");
				}
			}
		}else{
			foreach ($fields as $param =>$val){
				if (isset($_GET[$param]) && !empty($_GET[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					$get=$_GET[$param];
					if($operator=="like"){
						$get="%$get%";
					}
					array_push($where_ands, "$field $operator '$get'");
				}
			}
		}
	
		$where= join(" and ", $where_ands);
//		var_dump($where);
//		die();

		$count=$helper->where($where)->count();			
		$page = $this->page($count, 6);
		
		
		if(!empty($sort)){
			$post=$helper->where($where)
				->limit($page->firstRow . ',' . $page->listRows)
				->order("hits DESC")->select();
		}else{
			$post=$helper->where($where)
				->limit($page->firstRow . ',' . $page->listRows)
				->order("helperid DESC")->select();
		}
		
		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
//		var_dump($type);
		
		$this->assign("formget",$_GET);
		$this->assign("post",$post);
		
	}

	
	public function sortlist(){
		$type = I('post.type');
		$this->_lists();
		$this->assign('type',$type);
		$this->display(':list');
	}

	public function reservationlist(){
		$this->re_list();
		$this->display(":listreservation");
	}

	public function sortrelist(){
		$this->re_list();
		$this->display(":listreservation");
	}

	private function re_list( ){
		$where_ands['status']= 0;
		$reservation = M('reservation');
		$type = I('post.type');
		$sort = I('post.sort');

		if(!empty($type)){
			$where_ands['type']= $type;
		}
		$count=$reservation->where($where_ands)->count();			
		$page = $this->page($count, 9);

		if(!empty($sort)){
				$post=$reservation->where($where_ands)
				->limit($page->firstRow . ',' . $page->listRows)
				->order("reservate_time")->select();
			}else{
				$post=$reservation->where($where_ands)
				->limit($page->firstRow . ',' . $page->listRows)
				->order("reserid ASC")->select();
			}

		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
//		var_dump($type);
		
		$this->assign("formget",$_POST);
		$this->assign("reservation",$post);

	}

}
