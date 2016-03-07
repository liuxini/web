<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController; 
/**
 * 首页
 */
class DetailController extends HomeBaseController {
	
    //首页
	public function index(){
		$id=  intval(I("get.id"));
        $helper =M('helper');
		$post=$helper->where("helperid=$id")->find();
		$where['type'] = $post['type'];
		$sametype = $helper->where($where)->select();
		$this->assign("sametype",$sametype);
		$this->assign("post",$post);
   
        $comment = M('comments');
        $whereid['helperid'] = $id;
		$whereid['status'] = '1';

        $count=$comment->where($whereid)->count();
        $page = $this->page($count, 5);// 实例化分页类 传入总记录数和每页显示的记录数
        $comment_list = $comment->where($whereid)
      					->limit($page->firstRow . ',' . $page->listRows)
						->order("createtime DESC")->select();
		
        $this->assign('comment_list',$comment_list);
        if (isset($_SESSION['user'])){
            $currect_user = $_SESSION['user']['id'];
           
            $servicerecord = M('servicerecord');
			$whereid['status'] = '';
            $whereid['userid'] = $currect_user;
            $servicecount = $servicerecord->where($whereid)->count();
           
            if ($servicecount >0){
                $controller = true;
            }
            else
                $controller = false;
        }
        else
            $controller = false;
      	
		
		$this->assign("current_page",$page->GetCurrentPage());
        $this->assign('controller',$controller);
         $this->assign("Page", $page->show('Admin'));
		$this->display(':detail');
	}

     public function book(){
        
        if( !isset($_SESSION["user"]) ){
            $this->display('tpl/simplebootx/User/login.html');
        }else{
        	  
              $post['userid'] = ($_SESSION["user"]["id"]);
              $post['username'] = ($_SESSION["user"]["user_nicename"]);
              $post['userphone'] = ($_SESSION["user"]["userphone"]);
              $post['address'] = ($_SESSION["user"]["adress"]);                                    
              $this->assign('post',$post);        
			  $helper = M('helper');
	        $where['helperid'] =   I('post.helperid');
	        $helperinfo = $helper->where($where)->find();
	        $this->assign('helper',$helperinfo);
	        $this->display(':book');                            
        }
		
    }

        public function book_post(){
           if (IS_POST) {
                    if($_SESSION['_verify_']['verify']!=strtolower($_POST['verify'])){
                        $this->error("验证码错误！");
                    }else{
                        $service = M('servicerecord');
                        $helper = I("post.helper");
                        $post = I("post.post");
                        $post['create_time']=date('Y-m-d ',time());
                        $post['helperid']=$helper['helperid'];
                        $post['helpername']=$helper['helpername'];
                        $post['type']=$helper['type'];

                    if(isset($_SESSION["user"])){
                        $post['userid']=$_SESSION["user"]['id']; 
                        $result = $service->add($post);
                        if($result){
                            $this->success("预约成功!",__ROOT__."/");
                        }else{
                            $this->error("预约失败,请再试一次",__ROOT__."/");
                        }
            }else{
                 $post['userid']=0; 
                 $result =$service->add($post);
                        if($result){
                            $this->success("预约成功!",__ROOT__."/");
                        }else{
                            $this->error("预约失败,请再试一次",__ROOT__."/");
                        }
            }
        }
    }
}

            public function putreview(){
                $user = M('users');
                $comment = M('comments');
                $serviece = M('servicerecord');

                $userid['id'] = $_SESSION['user']['id'];
                $userinfo = $user->where($userid)->find();

                $where['helperid'] = $_POST['helperid'];
                $where['uid'] = $_SESSION['user']['id'];

                $whereser['helperid'] = $where['helperid'];
                $whereser['userid'] =$where['uid'];
                
                $count1 = $comment->where($where)->count();
                $count = $serviece->where($whereser)->count();

                if( $count>$count1){

                        $servi = $serviece->where($whereser)->order('servid DESC')->select();
                        $where['servid']= $servi['0']['servid']+$count-$count1;
                        $where['content'] = $_POST['content'];
                        $where['helpername'] = $_POST['helpername'];
                        $where['full_name'] = $userinfo['user_login'];
                        $where['phonenum'] = $userinfo['userphone'];
                        $where['email'] = $userinfo['user_email'];						
                        $where['createtime'] = date('Y-m-d H:i:s',time());
                        $result = $comment->add($where);
                        if($result){
                             $this->success("评论成功");
                        }else{
                            $this->error("评论失败");
                        }
                }else{
                        $this->error("评论失败，您的评论次数多于阿姨的服务次数.");
                }
               
            }
		function showreser(){

			$where['reserid']=I('get.id');
			
			$reservation = M('reservation');
			$post=$reservation->where($where)->find();
			
			
			$province = $post['province'];
			$reserid = $post['reserid'];
			$here1 = array(" status = '0' ");
			if(!empty($post['province'])){
				array_push($here1," province = $province ");
			}
			
			array_push($here1, " reserid != $reserid ");
			$here = join(" and ", $here1);
			
			$count=$reservation->where($here)->count();
        	$page = $this->page($count, 6);
			$reservate = $reservation->where($here)
				->limit($page->firstRow . ',' . $page->listRows)
				->order("reserid DESC")->select();
				
			$this->assign("Page", $page->show('Admin'));
			$this->assign("current_page",$page->GetCurrentPage());
			unset($_GET[C('VAR_URL_PARAMS')]);
			$this->assign('post',$post);			
			$this->assign('reservation',$reservate);
			$this->display(":showreservation");
		}


}

