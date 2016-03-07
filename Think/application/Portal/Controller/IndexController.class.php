<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController; 
/**
 * 首页
 */
class IndexController extends HomeBaseController {
	
    //首页
	public function index() {
		
		$helper = M('helper');
		$reser = M('reservation');
		$count=$helper->where("recommended = 1 and helper_status=1")->count();			
		$countreser = $reser->where( "recommended = 1 and status = 0" )->count();

		if($count<8){
			$recomenmend = $helper->where("recommended = 1 and helper_status=1")->select();
			if( is_null($recomenmend)){
				$helperinfo = $helper->where("recommended = 0 and is_findjob=0 and helper_status=1")->order('helperid DESC')->limit(10)->select();	
           
			}else{
				$sort = $helper->where("recommended = 0 and  is_findjob=0 and helper_status=1")->order('helperid DESC')->limit(10)->select();						
				$helperinfo = array_merge($recomenmend, $sort);        
			}
         
		}else{
			$helperinfo = $helper->where("recommended = 1 ")->select();
		}

		if($countreser<6){
			$recommen = $reser->where("recommended = 1 and status = 0")->select();			
			if( is_null($recommen)){
				$reserinfo  = $reser->where("recommended = 0 and status = 0")->order('reserid DESC')->limit(6)->select();				
			}else{
				$temp = 6-$countreser;
				$sort = $reser->where("recommended = 0 and status = 0")->order('reserid DESC')->limit($temp)->select();			
				$reserinfo = array_merge ($recommen, $sort);	
			}			
		}else{
			$reserinfo = $reser->where("recommended = 1 and status = 0 ")->limit(6)->select();
		}
		
	

		$this->assign('helper',$helperinfo);
		$this->assign('reservation',$reserinfo);
		$this->display(":index");
		
   	 }   

   	 function findjob(){

   	 	if(isset($_SESSION['user'])){
   	 		$post=$_SESSION['user'];
   	 		$this->assign('post',$post);
   	 	}
   	 	$this->display(":findjob");
   	 }

   	 function findjob_post(){
   	 	if($_SESSION['_verify_']['verify']!=strtolower($_POST['verify'])){
    		$this->error("验证码错误！");
    	}
               if (IS_POST) {
                     if(!empty($_POST['photos_alt']) && !empty($_POST['photos_url'])){
                           $url=$_POST['photos_url'];
                           $_POST['smeta']['photo'][]=array("url"=>$photourl,"alt"=>$_POST['photos_alt'][$key]);
                        }
                        $_POST['smeta']['thumb'] = sp_asset_relative_url($_POST['smeta']['thumb']);
                        $_POST['post']['smeta']=json_encode($_POST['smeta']);                  
   	 	$helper =M('helper');
   	 	
   	 	$_POST['post']['is_findjob']='1';
        
   	 	$result=$helper->add($_POST['post']);
   	 	if($result){
   	 		$this->success("申请成功，请等待我们的审核!",__ROOT__."/");

   	 	}else{
   	 		$this->error("申请失败，请再尝试一次!");
   	 	}
            }
   	}

   	 function hits(){
   	 	$id = intval(I("get.id"));
   	 	if(isset($_SESSION['user'])){
   	 		$helper=M('helper');
   	 		$favorite=M('user_favorites');
 
   	 		$where['uid']=$_SESSION['user']['id']; 	 		
   	 		$where['helperid']=$id;
   	 		$count = $favorite->where($where)->count();
   	 		 	 		
   	 		if($count>0){
   	 			$this->error("你已经收藏过她了");
   	 		}else{
   	 			$whereis['helperid']=$id;

   	 			$helperinfo=$helper->where($whereis)->find();	   	 		
	   	 		$count =$helperinfo['hits']+1;
	   	 		$helperinfo['hits'] = (string)$count;
	   	 		
	   	 		$result = $helper->where($whereis)->save($helperinfo);

   	 			$where['createtime']=date('Y-m-d',time());
				$where['type']=$helperinfo['type'];
				$where['helpername']=$helperinfo['helpername'];
   	 			$result=$favorite->add($where);
   	 			if($result){
   	 				$this->success("收藏成功");
   	 			}else{
   	 				$this->error("收藏失败");
   	 			}
   	 		}
   	 		
   	 	}else{
   	 		$this->display('tpl/simplebootx/User/login.html');
   	 	}

   	 }


	
}


