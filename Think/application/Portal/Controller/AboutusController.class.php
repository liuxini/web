<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController; 
/**
 * 首页
 */
class AboutusController extends HomeBaseController {
	
	public function aboutus(){
		$this->display(':aboutus');
	}
	
	public function ourteam(){
		$this->display(':ourteam');
	}
	
	public function ourpromise(){
		$this->display(':ourpromise');
	}
	
	public function law(){
		$this->display(':law');
	}
}