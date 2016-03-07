<?php
namespace Portal\Controller;
use Common\Controller\AdminbaseController;
class AdminPostController extends AdminbaseController {
	
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
			if($_POST['post']['school']!='小学'&&$_POST['post']['school']!='初中'&&$_POST['post']['school']!='高中'&&$_POST['post']['school']!='大专'&&$_POST['post']['school']!='本科'&&$_POST['post']['school']!='其他')
			{
				$this->error("学历选择有误，请重新添加！");
			}
			$helper = M('helper');
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
		
		$helper =M('helper');

		$post=$helper->where("helperid=$id")->find();
		$this->assign("post",$post);
		$this->assign("smeta",json_decode($post['smeta'],true));
		
		$this->display();
	}

	public function detailfind(){
		$id=  intval(I("get.id"));
		
		$helper =M('helper');

		$post=$helper->where("helperid=$id")->find();
		$this->assign("post",$post);
		$this->assign("smeta",json_decode($post['smeta'],true));
		
		$this->display();
	}
	
	public function edit(){
		$id=  intval(I("get.id"));
		
		$helper =M('helper');

		$post=$helper->where("helperid=$id")->find();
		$this->assign("post",$post);
		$this->assign("smeta",json_decode($post['smeta'],true));
		
		$this->display();
	}

	public function editfind(){
		$id=  intval(I("get.id"));
		
		$helper =M('helper');

		$post=$helper->where("helperid=$id")->find();
		$this->assign("post",$post);
		$this->assign("smeta",json_decode($post['smeta'],true));
		
		$this->display();
	}
	
	public function edit_post(){
//		$id=  intval(I("get.id"));
		if (IS_POST) {
			if(!empty($_POST['photos_alt']) && !empty($_POST['photos_url'])){
				
					$url=$_POST['photos_url'];
					$photourl=sp_asset_relative_url($url);
					$_POST['smeta']['photo'][]=array("url"=>$photourl,"alt"=>$_POST['photos_alt'][$key]);				
			}
			$_POST['smeta']['thumb'] = sp_asset_relative_url($_POST['smeta']['thumb']);
			$_POST['post']['smeta']=json_encode($_POST['smeta']);
			$id = $_POST['post']['helperid'];
			$helper =M('helper');
			
			$result=$helper->where("helperid=$id")->save($_POST['post']);
			
			if ($result!==false) {
				$this->success("保存成功！");
			} else {
				$this->error("保存失败！");
			}
		}
	}
	public function edit_postfind(){
//		$id=  intval(I("get.id"));
		if (IS_POST) {
			if(!empty($_POST['photos_alt']) && !empty($_POST['photos_url'])){
				
					$url=$_POST['photos_url'];
					$photourl=sp_asset_relative_url($url);
					$_POST['smeta']['photo'][]=array("url"=>$photourl,"alt"=>$_POST['photos_alt'][$key]);				
			}
			$_POST['smeta']['thumb'] = sp_asset_relative_url($_POST['smeta']['thumb']);
			$_POST['post']['smeta']=json_encode($_POST['smeta']);
			$id = $_POST['post']['helperid'];
			$helper =M('helper');
			
			$result=$helper->where("helperid=$id")->save($_POST['post']);
			
			if ($result!==false) {
				$this->success("保存成功！");
			} else {
				$this->error("保存失败！");
			}
		}
	}
	
	private  function _lists( $status=1,$is_findjob=0 ){
				
		$where_ands= array("helper_status=$status ");
		array_push($where_ands, "is_findjob=$is_findjob");
		
		$fields=array(
				'province'=> array("field"=>"province","operator"=>"like"),
				'city'  => array("field"=>"city","operator"=>"like"),
				'keyword'  => array("field"=>"helpername","operator"=>"like"),
				'type'  => array("field"=>"type","operator"=>"like"),
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
		$helper = M('helper');				
		$count=$helper->where($where)->count();			
		$page = $this->page($count, 15);
									
		$posts=$helper->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->order("helperid DESC")->select();
		
		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);

	}	
		
	function delete(){		
		$helper=M('helper');
		if(isset($_GET['id'])){
			$helperid = $_GET['id'];
			
			$data['helper_status']=0;
			if ($helper->where("$helperid = helperid")->save($data)) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}

	function recommend(){
		
		$helper=M('helper');
		
		if(isset($_POST['ids']) && $_GET["recommend"]){
			$data["recommended"]=1;
			$ids=join(",",$_POST['ids']);
			if ( $helper->where("helperid in ($ids)")->save($data)!==false) {
				$this->success("推荐成功！");
			} else {
				$this->error("推荐失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["unrecommend"]){
	
			$data["recommended"]=0;
			$ids=join(",", $_POST['ids']);
			if ( $helper->where("helperid in ($ids)")->save($data)) {
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
		$helper=M('helper');
		if(isset($_POST['ids'])){
			$ids = implode(",", $_POST['ids']);
			$data=array("post_status"=>"0");
			$status=$helper->where("helperid in ($ids)")->delete();
	
			if ($status!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}else{
			if(isset($_GET['id'])){
				$id = intval(I("get.id"));				
				$status=$helper->where("helperid=$id")->delete();
				if ($status!==false) {
					$this->success("删除成功！");
				} else {
					$this->error("删除失败！");
				}
			}
		}
	}
	
	function restore(){
		$helper = M('helper');
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data=array("helperid"=>$id,"helper_status"=>"1");
			if ($helper->save($data)) {
				$this->success("还原成功！");
			} else {
				$this->error("还原失败！");
			}
		}
	}
	
	function choose(){
		if(isset($_GET['reserid'])){
			$this->assign("reserid",$_GET['reserid']);		
		}
		if(isset($_POST['reserid'])){
			$this->assign("reserid",$_POST['reserid']);		
		}
		$this->_lists();
		$this->display();
	}

	function findjob(){
		$this->_lists(1,1);
		$this->display();
	}

	function pass(){
		$helper = M('helper');
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data=array("helperid"=>$id,"is_findjob"=>"0");
			if ($helper->save($data)) {
				$this->success("成功！");
			} else {
				$this->error("失败！");
			}
		}

	}
			
}