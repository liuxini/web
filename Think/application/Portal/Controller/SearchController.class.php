<?php

/**
 * 搜索结果页面
 */
namespace Portal\Controller;
use Common\Controller\HomeBaseController;
class SearchController extends HomeBaseController {
    //文章内页
    public function index($status=1,$is_findjob=0) {
    	$_GET = array_merge($_GET, $_POST);
		$k = I("get.keyword");
		
		$where_ands= array("helper_status=$status");
		array_push($where_ands, "is_findjob=$is_findjob");
		
		if (empty($k)) {
			$this -> error("关键词不能为空！请重新输入！");
		}
		$fields=array(								
				'keyword'  => array("field"=>"helpername","operator"=>"like")			
		);
		$fields1 = array(
				'type'  => array("field"=>"type","operator"=>"like")
		);
		
		if(!empty($k)){			
			foreach ($fields as $param =>$val){				
					$operator=$val['operator'];
					$field   =$val['field'];
					$fields = 'type';
					$get=$k;
					$_GET[$param]=$get;
					if($operator=="like"){
						$get="%$get%";
					}
					$temp = array("$fields $operator '$get'");					
					array_push($temp, "$field $operator '$get'");
							
					$where1= join(" or ", $temp);
					
					$where2['0']='(';
					$where2['1']=$where1;
					$where2['2']=')';
					$where3= join(" ", $where2);
															
					array_push($where_ands,$where3);															
				}
		}
		$where= join(" and ", $where_ands);
			
		$helper = M('helper');				
		$count=$helper->where($where)->count();			
		$page = $this->page($count, 6);									
		$posts=$helper->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->order("helperid DESC")->select();
			
		if(empty($posts)){
			$this->error("抱歉没有找到符合条件的人");
		}else{
			$this->assign("keyword",$k);
			$this->assign("Page", $page->show('Admin'));
			$this->assign("current_page",$page->GetCurrentPage());
			unset($_GET[C('VAR_URL_PARAMS')]);
			$this->assign("post",$posts);				
			$this -> display(":search");			
		}
	
    }    
    
}
