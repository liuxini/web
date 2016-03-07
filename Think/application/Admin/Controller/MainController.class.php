<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class MainController extends AdminbaseController {
	
	function _initialize() {
	}
    public function index(){
    	
		$reservation = M('reservation');
		$date['create_time']=date('Y-m-d',time());
		$reser['all'] = $reservation->where("1=1")->count();
		$reser['today'] = $reservation->where($date)->count();
    	$reser['success'] = $reservation->where("status = 1")->count();
		$reser['fail'] = $reservation->where("status = 2")->count();
		$reser['wait'] = $reservation->where("status = 0")->count();
		
		$service =M('servicerecord');
		$servi['all'] = $service->where("1=1")->count();
		$servi['today'] = $service->where($date)->count();
		$servi['success'] = $service->where("status = 1")->count();
		$servi['fail'] = $service->where("status = 2")->count();
		$servi['wait'] = $service->where("status = 0")->count();
		
		$post['helper_status'] = '1';
		$post['is_findjob'] = '1';
		$helper = M('helper');
		$helperinfo['all'] = $helper->where($post)->count();
		$post['post_date'] = date('Y-m-d',time());
		$helperinfo['today'] = $helper->where($post)->count();
		
    	$mysql= mysql_get_server_info();
    	$mysql=empty($mysql)?"未知":$mysql;
    	//服务器信息
    	$info = array(
    			'操作系统' => PHP_OS,
    			'运行环境' => $_SERVER["SERVER_SOFTWARE"],
    			'PHP运行方式' => php_sapi_name(),
    			'MYSQL版本' =>$mysql,
    			'上传附件限制' => ini_get('upload_max_filesize'),
    			'执行时间限制' => ini_get('max_execution_time') . "秒",
    			'剩余空间' => round((@disk_free_space(".") / (1024 * 1024)), 2) . 'M',
    	);
		$this->assign('reser', $reser);
		$this->assign('servi', $servi);
		$this->assign('findjob', $helperinfo);
    	$this->assign('server_info', $info);
    	$this->display();
    }
}