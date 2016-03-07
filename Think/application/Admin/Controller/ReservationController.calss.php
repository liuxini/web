<?php
namespace Portal\Controller;
use Common\Controller\AdminbaseController;
class ReservationController extends AdminbaseController {
	
	function _initialize() {
		parent::_initialize();
	}
	function index(){
		$this->_lists();		
		$this->display();
	}
	
	function add(){
		$this->display();
	}
	
	function add_post(){		
		if (IS_POST) {			
			$helper = M('reservation');
			$result=$helper->add($_POST['post']);
			if ($result) {				
				$this->success("添加成功！");				
			} else {
				$this->error("添加失败！");
			}
			 
		}
	}

	public function detail(){
		$id=  intval(I("get.id"));
		
		$helper =M('reservation');

		$post=$helper->where("reserid=$id")->find();
		$this->assign("post",$post);
		$this->display();
	}
	
	public function edit(){
		$id=  intval(I("get.id"));
		
		$helper =M('reservation');

		$post=$helper->where("reserid=$id")->find();
		$this->assign("post",$post);
		
		$this->display();
	}
	
	public function edit_post(){
		if (IS_POST) {
			
			$helper =M('reservation');
			$result=$helper->save($_POST['post']);
			//echo($this->posts_obj->getLastSql());die;
			if ($result!==false) {
				$this->success("保存成功！");
			} else {
				$this->error("保存失败！");
			}
		}
	}
	
	private  function _lists($status=1){			
		$where_ands= array("reservation_status=$status");
		
		$fields=array(
				'start_time'=> array("field"=>"post_date","operator"=>">"),
				'end_time'  => array("field"=>"post_date","operator"=>"<"),
				'keyword'  => array("field"=>"status","operator"=>"like"),
		);
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
		$helper = M('reservation');				
		$count=$helper->where($where)->count();			
		$page = $this->page($count, 15);
									
		$posts=$helper->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->order("reserid DESC")->select();
		
		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);

	}	
		
	function delete(){		
		$helper=M('reservation');
		if(isset($_GET['id'])){
			$helperid = $_GET['id'];
						
			if ($helper->where("$helperid = reserid")->delete() ) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
	

}