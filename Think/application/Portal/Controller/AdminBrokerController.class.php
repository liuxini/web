<?php
namespace Portal\Controller;
use Common\Controller\AdminbaseController;
class AdminBrokerController extends AdminbaseController {
	
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
			if(!empty($_POST['photos_alt']) && !empty($_POST['photos_url'])){

				$url=$_POST['photos_url'];
				$_POST['smeta']['photo'][]=array("url"=>$photourl,"alt"=>$_POST['photos_alt'][$key]);
			}
			$_POST['smeta']['thumb'] = sp_asset_relative_url($_POST['smeta']['thumb']);
			
			$_POST['post']['smeta']=json_encode($_POST['smeta']);

			$helper = M('broker');

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
		
		$helper =M('broker');

		$post=$helper->where("brokerid=$id")->find();
		$this->assign("post",$post);
		$this->assign("smeta",json_decode($post['smeta'],true));
		
		$this->display();
	}

	public function detailfind(){
		$id=  intval(I("get.id"));
		
		$helper =M('broker');

		$post=$helper->where("brokerid=$id")->find();
		$this->assign("post",$post);
		$this->assign("smeta",json_decode($post['smeta'],true));
		
		$this->display();
	}
	
	public function edit(){
		$id=  intval(I("get.id"));
		
		$helper =M('broker');

		$post=$helper->where("brokerid=$id")->find();
		$this->assign("post",$post);
		$this->assign("smeta",json_decode($post['smeta'],true));
		
		$this->display();
	}

	public function editfind(){
		$id=  intval(I("get.id"));
		
		$helper =M('broker');

		$post=$helper->where("brokerid=$id")->find();
		$this->assign("post",$post);
		$this->assign("smeta",json_decode($post['smeta'],true));
		
		$this->display();
	}
	
	public function edit_post(){
		if (IS_POST) {
			if(!empty($_POST['photos_alt']) && !empty($_POST['photos_url'])){
				
					$url=$_POST['photos_url'];
					$photourl=sp_asset_relative_url($url);
					$_POST['smeta']['photo'][]=array("url"=>$photourl,"alt"=>$_POST['photos_alt'][$key]);				
			}
			$_POST['smeta']['thumb'] = sp_asset_relative_url($_POST['smeta']['thumb']);
			$_POST['post']['smeta']=json_encode($_POST['smeta']);
			
			$helper =M('broker');
			$result=$helper->save($_POST['post']);
			//echo($this->posts_obj->getLastSql());die;
			if ($result!==false) {
				$this->success("保存成功！");
			} else {
				$this->error("保存失败！");
			}
		}
	}
	
	private  function _lists($status=1,$is_findjob=0){
				
		$where_ands= array("broker_status=$status");
		array_push($where_ands, "is_findjob=$is_findjob");
		
		$fields=array(
				'start_time'=> array("field"=>"post_date","operator"=>">"),
				'end_time'  => array("field"=>"post_date","operator"=>"<"),
				'keyword'  => array("field"=>"brokername","operator"=>"like"),
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
		$helper = M('broker');				
		$count=$helper->where($where)->count();			
		$page = $this->page($count, 15);
			
						
		$posts=$helper->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->order("brokerid DESC")->select();
		
		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);

	}
	
	
	function delete(){
		
		$helper=M('broker');
		if(isset($_GET['id'])){
			$helperid = $_GET['id'];
			
			$data['broker_status']=0;
			if ($helper->where("$helperid = brokerid")->save($data)) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
	
	
	function recommend(){
		$helper=M('broker');
		// $a= array('id' => cat );
		// var_dump($a);
		// die();
		if(isset($_POST['ids']) && $_GET["recommend"]){
			$data["recommended"]=1;
			$ids=join(",",$_POST['ids']);
			if ( $helper->where("brokerid in ($ids)")->save($data)!==false) {
				$this->success("推荐成功！");
			} else {
				$this->error("推荐失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["unrecommend"]){
	
			$data["recommended"]=0;
			$ids=join(",", $_POST['ids']);
			if ( $helper->where("brokerid in ($ids)")->save($data)) {
				$this->success("取消推荐成功！");
			} else {
				$this->error("取消推荐失败！");
			}
		}
	}
	
	function recyclebin(){
		$this->_lists(0,0);
		$this->display();
	}
	
	function clean(){
		$helper=M('broker');
		if(isset($_POST['ids'])){
			$ids = implode(",", $_POST['ids']);
			$data=array("post_status"=>"0");
			$status=$helper->where("brokerid in ($ids)")->delete();
	
			if ($status!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}else{
			if(isset($_GET['id'])){
				$id = intval(I("get.id"));				
				$status=$helper->where("brokerid=$id")->delete();
				if ($status!==false) {
					$this->success("删除成功！");
				} else {
					$this->error("删除失败！");
				}
			}
		}
	}
	
	function restore(){
		$helper = M('broker');
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data=array("brokerid"=>$id,"broker_status"=>"1");
			if ($helper->save($data)) {
				$this->success("还原成功！");
			} else {
				$this->error("还原失败！");
			}
		}
	}
	function findjob(){
		$this->_lists(1,1);
		$this->display();
	}

	function pass(){
		$helper = M('broker');
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data=array("brokerid"=>$id,"is_findjob"=>"0");
			if ($helper->save($data)) {
				$this->success("成功！");
			} else {
				$this->error("失败！");
			}
		}

	}
	
	
}