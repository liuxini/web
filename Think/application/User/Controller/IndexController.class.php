<?php

/**
 * 会员注册登录
 */
namespace User\Controller;
use Common\Controller\HomeBaseController;
class IndexController extends HomeBaseController {
    //登录
	public function index() {
		$id=I("get.id");
		
		$users_model=M("Users");
		
		$user=$users_model->where(array("id"=>$id))->find();
		
		if(empty($user)){
			$this->error("查无此人！");
		}
		$this->assign($user);
		$this->display(":index");

    }

    //退出
    public function logout(){
    	$ucenter_syn=C("UCENTER_ENABLED");
    	$login_success=false;
    	if($ucenter_syn){
    		include UC_CLIENT_ROOT."client.php";
    		echo uc_user_synlogout();
    	}
    	session("user",null);//只有前台用户退出
    	redirect(__ROOT__."/");
    }
	
	public function logout2(){
    	$ucenter_syn=C("UCENTER_ENABLED");
    	$login_success=false;
    	if($ucenter_syn){
    		include UC_CLIENT_ROOT."client.php";
    		echo uc_user_synlogout();
    	}
		if(isset($_SESSION["user"])){
		$referer=$_SERVER["HTTP_REFERER"];
			session("user",null);//只有前台用户退出
			$_SESSION['login_http_referer']=$referer;
			$this->success("退出成功！",__ROOT__."/");
		}else{
			redirect(__ROOT__."/");
		}
    }
    	public function reservation(){

    		 if( isset($_SESSION["user"]) ){
    		 	$post = $_SESSION["user"];
    		 	$this->assign('post', $post);
    		 }else{
                   $post=I("post.post");
                   $this->assign('post', $post);
             }
    		$this->display(":reservation");
    	}

    	public function reservation_post(){
    		if (IS_POST) {
    			if($_SESSION['_verify_']['verify']!=strtolower($_POST['verify'])){
				$this->error("验证码错误！");
			}else{
				$reservation = M('reservation');
                $post=I("post.post");

				$post['create_time']=date('Y-m-d',time());
				if(empty($post['reservate_time'])){
					$post['reservate_time']=date('Y-m-d',time());
				}
    				if(isset($_SESSION["user"])){
    					$post['userid']=$_SESSION["user"]['id'];  					
    					$result = $reservation->add($post);
    					if($result){
    						$this->success("委托成功!",__ROOT__."/");
    					}else{
    						$this->error("委托失败");
    					}
    				}else{
    					$post['userid']=0;
    					$result = $reservation->add($post);
    					if($result){
    						$this->success("委托成功!",__ROOT__."/");
    					}else{
    						$this->error("委托失败");
    					}
    				}

    			}
    		}
    	}
    

}
