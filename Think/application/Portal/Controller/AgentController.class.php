<?php
namespace Portal\Controller;
use Common\Controller\HomeBaseController; 
/**
 * 首页
 */
class AgentController extends HomeBaseController {
	
    //首页
	public function index() {
    	$this->display(":agent");
    }   

}