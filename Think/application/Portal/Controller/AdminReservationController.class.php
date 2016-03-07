<?php
namespace Portal\Controller;
use Common\Controller\AdminbaseController;
class AdminReservationController extends AdminbaseController {
	
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
					if($operator=="is"){
						$get="=$get";
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

	public function recommend(){
		
		$helper=M('reservation');
		
		if(isset($_POST['ids']) && $_GET["recommend"]){
			$data["recommended"]=1;
			$ids=join(",",$_POST['ids']);
			if ( $helper->where("reserid in ($ids)")->save($data)!==false) {
				$this->success("推荐成功！");
			} else {
				$this->error("推荐失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["unrecommend"]){
	
			$data["recommended"]=0;
			$ids=join(",", $_POST['ids']);
			if ( $helper->where("reserid in ($ids)")->save($data)) {
				$this->success("取消推荐成功！");
			} else {
				$this->error("取消推荐失败！");
			}
		}
	}
		
	public function delete(){		
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
	
	public function yuyue(){
		$reservation=M('reservation');
		if(isset($_GET['id'])){
			$reserid = $_GET['id'];
			$data['status']=2;
			if ($reservation->where("$reserid = reserid")->save($data)) {
				$this->success("操作成功！");
			} else {
				$this->error("操作失败！");
			}
		}
	}
	
	public function choose(){		
		$reservation=M('reservation');
		$serve = M('servicerecord');
		$helper = M('helper');	
		$helperid = $_GET['id'];
		$helperinfo = $helper->where("$helperid=helperid")->find();
		$reserid = I('post.reserid');
		
		$data['status']=1;
			
		if(isset($_GET['reserid'])){
			$reserid = $_GET['reserid'];			
			$reserinfo = $reservation->where("$reserid = reserid")->find();

			$serveinfo['helperid'] = $helperinfo['helperid'];			
			$serveinfo['helpername']=$helperinfo['helpername'];
			
			$serveinfo['userid']=$reserinfo['userid'];
			$serveinfo['username']=$reserinfo['username'];
			$serveinfo['userphone']=$reserinfo['userphone'];
			$serveinfo['address']=$reserinfo['address'];
			$serveinfo['pay']=$reserinfo['pay'];
			$serveinfo['type']=$reserinfo['type'];
			$serveinfo['message']=$reserinfo['message'];
			$serveinfo['create_time']=date("Y-m-d H:i:s",time());
			$serveinfo['service_time']=$reserinfo['reservate_time'];
									
			$result = $serve->add($serveinfo);
			
			if($result){
				$this->success("操作成功,生成新订单！");
				$reservation->where("$reserid = reserid")->save($data);
			}else{
				$this->error("操作失败！");
			}
			
		}
		
	}
}