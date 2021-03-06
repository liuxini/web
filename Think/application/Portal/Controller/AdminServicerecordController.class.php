<?php
namespace Portal\Controller;
use Common\Controller\AdminbaseController;
class AdminServicerecordController extends AdminbaseController {
	
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
			$helper = M('servicerecord');
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
		
		$helper =M('servicerecord');

		$post=$helper->where("servid=$id")->find();
		$this->assign("post",$post);
		$this->display();
	}
	
	public function edit(){
		$id=  intval(I("get.id"));
		
		$helper =M('servicerecord');

		$post=$helper->where("servid=$id")->find();
		$this->assign("post",$post);
		
		$this->display();
	}
	
	public function edit_post(){
		if (IS_POST) {
			
			$helper =M('servicerecord');
			$result=$helper->save($_POST['post']);
			//echo($this->posts_obj->getLastSql());die;
			if ($result!==false) {
				$this->success("保存成功！");
			} else {
				$this->error("保存失败！");
			}
		}
	}
	
	private  function _lists(){			
		$where_ands= array("status is not null");
		
		$fields=array(
				'start_time'=> array("field"=>"post_date","operator"=>">"),
				'end_time'  => array("field"=>"post_date","operator"=>"<"),
				'keyword'  => array("field"=>"username","operator"=>"like"),
				'type'  => array("field"=>"type","operator"=>"is"),
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
					if($operator=="is"){
						$operator="=";
						$get="$get";
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
		$helper = M('servicerecord');				
		$count=$helper->where($where)->count();			
		$page = $this->page($count, 15);
									
		$posts=$helper->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->order("servid DESC")->select();
		
		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);

	}	
		
	function delete(){		
		$helper=M('servicerecord');
		if(isset($_GET['id'])){
			$helperid = $_GET['id'];
						
			if ($helper->where("$helperid = servid")->delete() ) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}

	function showleave(){
		$servise = M('servicerecord');
		$id =$_GET['id'];

		if(isset($id)){
			$post = $servise->where("$id= servid" )->find();
		}	
		$this->assign( "post",$post);
		$this->display();
	}	
	
	function solve(){
		$service = M('servicerecord');

		$id['servid'] = $_GET['id'];
		
			
		if(!empty($id) && $_GET["success"]){
			$data["status"]=1;
			if ( $service->where($id)->save($data)!==false) {
				$this->success("操作成功！");
			} else {
				$this->error("操作失败！！");
			}
		}
		if(!empty($id) && $_GET["fail"]){
	
			$data["status"]=2;
			if ( $service->where($id)->save($data)) {
				$this->success("操作成功！");
			} else {
				$this->error("操作失败！");
			}
		}
	}
	
}