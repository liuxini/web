<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en-US">
<head>	
 <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Aviators - byaviators.com">
<link href="/Think/tpl/simplebootx/Public/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="/Think/tpl/simplebootx/Public/images/logo.png" type="image/png">
    <style>
            .caption-wraper{position: absolute;left:50%;bottom:2em;}
            .caption-wraper .caption{
            position: relative;left:-50%;
            background-color: rgba(0, 0, 0, 0.54);
            padding: 0.4em 1em;
            color:#fff;
            -webkit-border-radius: 1.2em;
            -moz-border-radius: 1.2em;
            -ms-border-radius: 1.2em;
            -o-border-radius: 1.2em;
            border-radius: 1.2em;
            }
            @media (max-width: 767px){
                .sy-box{margin: 12px -20px 0 -20px;}
                .caption-wraper{left:0;bottom: 0.4em;}
                .caption-wraper .caption{
                left: 0;
                padding: 0.2em 0.4em;
                font-size: 0.92em;
                -webkit-border-radius: 0;
                -moz-border-radius: 0;
                -ms-border-radius: 0;
                -o-border-radius: 0;
                border-radius: 0;}
            }
        </style>       
        <title><?php echo ($site_name); ?></title>
	<meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
	<meta name="description" content="<?php echo ($site_seo_description); ?>">
	<meta name="author" content="hit_student">
        

<style>
*{ margin:0; padding:0; list-style:none}
img{ border:0;}
.lanrenzhijia_service{ width:40px; height:200px; background:url("/Think/tpl/simplebootx/Public/images/lanrenzhijia.png") no-repeat; position:fixed; right:0px; top:200px;}
.lanrenzhijia_service ul{ display:block; width:160px; height:200px; float:left; position:relative;}
.lanrenzhijia_service ul .right_bar{ position:absolute;width:40px; height:200px; left:0; top:0; display:block;}
.lanrenzhijia_service ul .right_qq{ position:absolute; width:120px; height:85px; right:0; top:0; display:block;}
.lanrenzhijia_service ul .right_phone{ position:absolute; width:120px; height:105px; padding-top:10px;right:0; bottom:0; display:block; text-align:center; color:#555; font-size:16px; font-family:'Microsoft Yahei'; text-decoration:none;}
</style>

</head>

<body >
		
<div id="wrapper-outer" >
    <div id="wrapper">
        <div id="wrapper-inner">
            <!-- BREADCRUMB -->
             
    
    <link href="/Think/tpl/simplebootx/Public/css/slippry/slippry.css" rel="stylesheet">
    
    <link rel="stylesheet" href="/Think/tpl/simplebootx/Public/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/Think/tpl/simplebootx/Public/css/bootstrap-responsive.css" type="text/css">
    <link rel="stylesheet" href="/Think/tpl/simplebootx/Public/libraries/chosen/chosen.css" type="text/css">
    <link rel="stylesheet" href="/Think/tpl/simplebootx/Public/libraries/bootstrap-fileupload/bootstrap-fileupload.css" type="text/css">
    <link rel="stylesheet" href="/Think/tpl/simplebootx/Public/libraries/jquery-ui-1.10.2.custom/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" type="text/css">
    <link rel="stylesheet" href="/Think/tpl/simplebootx/Public/css/realia-blue.css" type="text/css" id="color-variant-default">
   

<link rel="shortcut icon" href="/Think/tpl/simplebootx/Public/img/favicon.png" type="image/png">

<div class="breadcrumb-wrapper">
        <div class="container">
                <div class="row">
                    <div class="span12">
                        <ul class="breadcrumb pull-left">
                            <li><a href="<?php echo u('portal/index/index');?>">Home</a></li> 
                        </ul>

                         <div class="account pull-right">
                         	 <?php
 $effected_id=""; $filetpl="<a href='\$href' target='\$target'>\$label</a>"; $foldertpl="<a href='\$href' target='\$target' class='dropdown-toggle' data-toggle='dropdown'>\$label <b class='caret'></b></a>"; $ul_class="dropdown-menu" ; $li_class="" ; $style="nav"; $showlevel=6; $dropdown='dropdown'; ?>
                                
                              <ul class="nav pull-right" id="main-menu-left">
                                                    <li class="dropdown">
                                                         <?php if(sp_is_user_login()): ?><a class="dropdown-toggle user" data-toggle="dropdown" href="#">
                                                                <?php if(empty($user['avatar'])): else: ?>
                                                                    <img height="26px" width="26px" src="<?php echo sp_get_user_avatar_url($user['avatar']);?>" class="headicon"/><?php endif; ?>
                                                                 <?php echo ($user["user_nicename"]); ?><b class="caret"></b></a>
                                                                <ul class="dropdown-menu pull-right">
                                                                        <li><a href="<?php echo u('user/center/index');?>"><i class="fa fa-user"></i> &nbsp;个人中心</a></li>
                                                                        <li class="divider"></li>
                                                                        <li><a href="<?php echo u('user/index/logout');?>"><i class="fa fa-sign-out"></i> &nbsp;退出</a></li>
                                                                </ul>
                                                            <?php else: ?>
                                                                    <a class="dropdown-toggle user" data-toggle="dropdown" href="#">
                                                                        		登录<b class="caret"></b>
                                                                     </a>
                                                                <ul class="dropdown-menu pull-right">
                                                                        <li><a href="<?php echo U('api/oauth/login',array('type'=>'sina'));?>"><i class="fa fa-weibo"></i> &nbsp;微博登录</a></li>
                                                                         <li><a href="<?php echo U('api/oauth/login',array('type'=>'qq'));?>"><i class="fa fa-qq"></i> &nbsp;QQ登录</a></li>
                                                                         <li><a href="<?php echo u('user/login/index');?>"><i class="fa fa-sign-in"></i> &nbsp;登录</a></li>
                                                                         <li class="divider"></li>
                                                                        <li><a href="<?php echo u('user/register/index');?>"><i class="fa fa-user"></i> &nbsp;注册</a></li>
                                                                </ul><?php endif; ?>
                                                        </li>
                                                    </ul>
                             </ul>
                        </div>
                    </div><!-- /.span12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.breadcrumb-wrapper -->
		
            <!-- HEADER -->
            <div id="header-wrapper">
                <div id="header">
                    <div id="header-inner">
                        <div class="container">
                            <div class="navbar">
                                <div class="navbar-inner">
                                    <div class="row">
                                        <div class="logo-wrapper span4">
                                            <a href="#nav" class="hidden-desktop" id="btn-nav">Toggle navigation</a>

                                            <div class="logo">
                                                <a href="<?php echo u('portal/index/index');?>" title="Home">
                                                    <img src="/Think/tpl/simplebootx/Public/images/logo.png" alt="Home">
                                                </a>
                                            </div><!-- /.logo -->

                                            <div class="site-name">
                                                <a href="<?php echo u('portal/index/index');?>" title="Home" class="brand">阿姨Coming</a>
                                            </div><!-- /.site-name -->

                                            <!--<div class="site-slogan">-->
                                                <!--<span>Real estate &amp; Rental<br>made easy</span>-->
                                            <!--</div>&lt;!&ndash; /.site-slogan &ndash;&gt;-->
                                        <!--</div>&lt;!&ndash; /.logo-wrapper &ndash;&gt;-->

                                        <!--<div class="info">-->
                                            <!--<div class="site-email">-->
                                                <!--<a href="mailto:info@byaviators.com">info@byaviators.com</a>-->
                                            <!--</div>&lt;!&ndash; /.site-email &ndash;&gt;-->

                                            <div class="site-phone">
                                                <span>333-666-777</span>
                                            </div><!-- /.site-phone -->
                                        </div><!-- /.info -->
                                       <div class="nav-collapse collapse" id="main-menu">                                     
                                                <div class="pull-right">
                                                    <form method="post" class="form-inline" action="<?php echo U('portal/search/index');?>" style="margin:18px 0;">
                                                         <input type="text" class="" placeholder="查找" required="required" name="keyword" value="<?php echo ($keyword); ?>"/>
                                                         <input type="submit" class="btn btn-info" value="Go" style="margin:0"/>
                                                    </form>
                                                </div>
                                               </div>
                                    </div><!-- /.row -->
                                </div><!-- /.navbar-inner -->
                            </div><!-- /.navbar -->
                        </div><!-- /.container -->
                    </div><!-- /#header-inner -->
                </div><!-- /#header -->
            </div><!-- /#header-wrapper -->
            <!-- NAVIGATION -->
            <div id="navigation">
                <div class="container">
                    <div class="navigation-wrapper">
                        <div class="navigation clearfix-normal">

                            <ul class="nav" font-family:"Microsoft YaHei",微软雅黑,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu>
                                <li><a href= "<?php echo u('portal/index/index');?>">主页</a></li>
                                <li><a href= "<?php echo leuu('portal/list/index',array('type'=>'月嫂'));?>">月嫂</a></li>
                                <li><a href="<?php echo leuu('portal/list/index',array('type'=>'育儿嫂'));?>">育儿嫂</a></li>
                                <li><a href="<?php echo leuu('portal/list/index',array('type'=>'家务员'));?>">家务员</a></li>
                                <li class="menuparent">
                                    <span class="menuparent nolink">小时工</span>
                                    <ul>
                                        <li><a href="<?php echo leuu('portal/list/index',array('type'=>'临时小时工'));?>">临时小时工</a></li>
                                        <li><a href="<?php echo leuu('portal/list/index',array('type'=>'包月小时工'));?>">包月小时工</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo leuu('portal/list/index',array('type'=>'老年陪护'));?>">老年陪护</a></li>
                                 <li><a href="<?php echo leuu('portal/list/index',array('type'=>'经纪人'));?>"> 经纪人</a></li>                                
                                <li><a href="<?php echo leuu('portal/list/reservationlist');?>">委托</a></li>
                                <li><a href="<?php echo leuu('portal/index/findjob');?>">找工作</a></li>
                            </ul>
                            
                        </div><!-- /.navigation -->
                    </div><!-- /.navigation-wrapper -->
                </div><!-- /.container -->
            </div><!-- /.navigation -->
		
            <!-- CONTENT -->
            <div id="content">
                <div class="map-wrapper">
                <div class="map">
                    <div id="map" class="map-inner"></div><!-- /.map-inner -->

                    <div class="container">
                        <div class="row">
                            <div class="span3">
                                <!-- <h3>找阿姨</h3> -->
                                <div class="property-filter pull-right">
                                    <div class="content">

                                        <form id="choose" method="post" action="<?php echo u('user/index/reservation');?>">
                                        	<div class="control-group">
                                        		 <label class="control-label" for="input_userphone">姓名</label>
                                                <div class="controls">
                                                	<input type="text" id="input_username" name="post[user_nicename]" placeholder="请输入姓名">
                                                </div><!-- /.controls -->
                                            </div>

                                           <div class="control-group">
                                              <label class="control-label" for="input_userphone">电话号码</label>
                                              <div class="controls">
                                                       <input type="text" id="input_userphone" name="post[userphone]" placeholder="请输入电话号码">
                                              </div><!-- /.controls -->
                                           </div>

                                            <div class="control-group">
                                                <label class="control-label" for="inputLoginLogin">详细地点</label>
                                                <div class="controls">
                                                      <input type="text" id="inputLoginLogin" name="post[address]">
                                                </div><!-- /.controls -->
                                            </div>

                                            <div class="type control-group">
                                                <div class="controls">
                                                	<label class="control-label" for="inputLoginLogin">
                                                	 	工种
                                                    </label>
                                                    <select name="post[type]" id="type" value="$post.type">
                                                        <option id="月嫂">月嫂</option>
                                                         <option id="育儿嫂">育儿嫂</option>
                                                        <option id="家务员">家务员</option>
                                                         <option id="临时小时工">临时小时工</option>
                                                        <option id="包月小时工">包月小时工</option>
                                                         <option id="老年陪护">老年陪护</option>
                                                        <option id="经纪人">经纪人</option>
                                                    </select>
                                                </div><!-- /.controls -->
                                            </div><!-- /.control-group -->

                                            <div class="form-actions">
                                                <input type="submit" value="快速预定" class="btn btn-primary btn-large">
                                            </div><!-- /.form-actions -->
                                        </form>

                                      
                                    </div><!-- /.content -->
                                </div><!-- /.property-filter -->
                            </div><!-- /.span3 -->
                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </div><!-- /.map -->
            </div><!-- /.map-wrapper -->
                <div class="container">
                    <div id="main">
                        <div class="carousel">
			<h1 class="page-header">阿姨</h1>
							
			  <div class="content box-shadow-1">
			     <a class="carousel-prev" href="detail.html">Previous</a>
			     <a class="carousel-next" href="detail.html">Next</a>
                  <ul>
                     <?php if(is_array($helper)): foreach($helper as $key=>$vo): $smeta=json_decode($vo['smeta'],true); ?>
		                 <li>
		                    <div class="image">		                          
		                        <a href="<?php echo leuu('portal/detail/index',array('id'=>$vo['helperid']));?>"></a>
		                         <?php if(empty($smeta['thumb'])): ?><img src="/Think/tpl/simplebootx/Public/images/property-small-1.png" alt=""/>
						         <?php else: ?> 
						  			<img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" alt="" /><?php endif; ?>		                                            
		                                   		                              
		                           </div><!-- /.image -->
		                           <div class="title">
                    					<h3><a href="<?php echo leuu('portal/detail/index',array('id'=>$vo['helperid']));?>"><?php echo ($vo["helpername"]); ?></a></h3>
                					</div><!-- /.title -->
		                                       
		                          <div class="area">
                    				<span class="key"></span>
                    				<span class="value"><?php echo ($vo["type"]); ?></span>
                				</div><!-- /.area -->	                                     
		                       
		                           <div class="bathrooms"><div class="inner">
		                           	<a href="<?php echo leuu('portal/index/hits',array('id'=>$vo['helperid']));?>">收藏</a>
		                           </div></div><!-- /.bathrooms -->               					
		                        </li><?php endforeach; endif; ?>
		                        		                        
		                  </ul>
						
                           </div><!-- /.content -->
                        </div><!-- /.carousel -->
                       <!-- <div class="dark"></div>-->
                       <div class="row">
                       	<div class="span9">
                            <h1 class="page-header">预约</h1>

                            <div class="properties-grid">
                            	<div class="row">
                            		 <?php if(is_array($reservation)): foreach($reservation as $key=>$vo): ?><div class="property span3">
                            				<div class="title">
                                            	<h2><a href="<?php echo leuu('portal/detail/showreser',array('id'=>$vo['reserid']));?>"><?php echo ($vo["username"]); ?></a></h2>
                                        	</div>
                                        	
                                        <div class="area">
                                            <span class="key">所需类型：</span>
                                            <span class="value"><?php echo ($vo["type"]); ?></span>
                                        </div><!-- /.area -->
                                       
                                       <?php $province = array("110000"=>"北京市","120000"=>"天津市","130000"=>"河北省","140000"=>"山西省","150000"=>"内蒙古自治区", "210000"=>"辽宁省","220000"=>"吉林省","230000"=>"黑龙江省","310000"=>"上海市","320000"=>"江苏省", "330000"=>"浙江省","340000"=>"安徽省","350000"=>"福建省","360000"=>"江西省","370000"=>"山东省", "410000"=>"河南省","420000"=>"湖北省","430000"=>"湖南省","440000"=>"广东省","450000"=>"广西壮族自治区", "460000"=>"海南省","500000"=>"重庆市","510000"=>"四川省","520000"=>"贵州省","530000"=>"云南省", "540000"=>"西藏自治区","610000"=>"陕西省","620000"=>"甘肃省","630000"=>"青海省","640000"=>"宁夏回族自治区", "650000"=>"新疆维吾尔自治区","710000"=>"台湾省","810000"=>"香港特别行政区","820000"=>"澳门特别行政区","900000"=>"外国" ); ?>
                                        <div class="area">
                                            <span class="key">地址：</span>
                                            <span class="value"><?php echo ($province[$vo['province']]); echo ($vo["city"]); echo ($vo["address"]); ?></span>
                                        </div><!-- /.area -->
                                       
                                        <div class="area">
                                            <span class="key">可接受工资：</span>
                                            <span class="value"><?php echo ($vo["pay"]); ?></span>
                                        </div><!-- /.area -->
                                        	
                            			</div><?php endforeach; endif; ?>
                            	</div>                               
                            </div><!-- /.propertygrid -->
                            </div><!-- /.span9 -->
                            <div class="sidebar span3">
                            	<div class="widget our-agents">
							    <div class="title">
							        <h2>门店</h2>
							    </div><!-- /.title -->
							
							    <div class="content">
							        <div class="agent">
							            <div class="image">
							                <img src="/Think/tpl/simplebootx/Public/img/photos/emma-small.png" alt="">
							            </div><!-- /.image -->
							            <div class="name">Victoria Summer</div><!-- /.name -->
							            <div class="phone">333-666-777</div><!-- /.phone -->
							            <div class="email"><a href="mailto:victoria@example.com">victoria@example.com</a></div><!-- /.email -->
							        </div><!-- /.agent -->
							
							        <div class="agent">
							            <div class="image">
							                <img src="/Think/tpl/simplebootx/Public/img/photos/john-small.png" alt="">
							            </div><!-- /.image -->
							            <div class="name">John Doe</div><!-- /.name -->
							            <div class="phone">111-222-333</div><!-- /.phone -->
							            <div class="email"><a href="mailto:john.doe@example.com">victoria@example.com</a></div><!-- /.email -->
							        </div><!-- /.agent -->
							    </div><!-- /.content -->
							</div><!-- /.our-agents -->
                            </div>
                        </div><!-- /.row -->
                        </div><!-- /.main-->
                        </div><!-- /#container-->
                        
                        
                        
						 <div class="bottom-wrapper box-shadow-1">
						 	 <div class="bottom container ">
						 	  <div class="bottom-inner row">
                        <div class="row">
                        	<p><h2>对雇主的承诺</h2></p>
                            <div class="item span4">
                                <div class="row">
                                	
                                    <div class="icon span1">
                                        <img src="/Think/tpl/simplebootx/Public/images/icons/features-seo.png" alt="">
                                    </div><!-- /.icon -->

                                    <div class="text span3">
                                      
                                        <p>提供规范的服务范本，半年内无限次换人，业内行情查询与阿姨工资管理。</p>
                                    </div><!-- /.logo -->
                                </div><!-- /.row -->
                            </div><!-- /.item -->

                            <div class="item span4">
                                <div class="row">
                                    <div class="icon span1">
                                        <img src="/Think/tpl/simplebootx/Public/images/icons/features-retina.png" alt="">
                                    </div><!-- /.icon -->

                                    <div class="text span3">
                                       
                                        <p>帮助雇主进行解约续约，受理雇主投诉，进行纠纷调解，保护雇主隐私与权益。</p>
                                    </div><!-- /.logo -->
                                </div><!-- /.row -->
                            </div><!-- /.item -->

                            <div class="item span4">
                                <div class="row">
                                    <div class="icon span1">
                                        <img src="/Think/tpl/simplebootx/Public/images/icons/features-custom-widgets.png" alt="">
                                    </div><!-- /.icon -->

                                    <div class="text span3">                                  
                                        <p>支持管家、家政猎头等高端家政服务，为阿姨办理雇佣责任保险，提供详细背景调查资料。</p>
                                    </div><!-- /.logo -->
                                </div><!-- /.row -->
                            </div><!-- /.item -->

                        </div><!-- /row -->
                        <div class="row">
                        	<p><h2>对阿姨的承诺</h2></p>
                            <div class="item span4">
                                <div class="row">
                                    <div class="icon span1">
                                        <img src="/Think/tpl/simplebootx/Public/images/icons/features-bootstrap.png" alt="">
                                    </div><!-- /.icon -->

                                    <div class="text span3">                                    
                                        <p>首次报到车站迎接，提供正规工服，免费基础培训，3-7日安排上岗。</p>
                                    </div><!-- /.logo -->
                                </div><!-- /.row -->
                            </div><!-- /.item -->

                            <div class="item span4">
                                <div class="row">
                                    <div class="icon span1">
                                        <img src="/Think/tpl/simplebootx/Public/images/icons/features-pencil.png" alt="">
                                    </div><!-- /.icon -->

                                    <div class="text span3">                                     
                                        <p>上户后一对一岗中辅导，提供意外及伤害保险，可参加各种家政评比。</p>
                                    </div><!-- /.logo -->
                                </div><!-- /.row -->
                            </div><!-- /.item -->

                            <div class="item span4">
                                <div class="row">
                                    <div class="icon span1">
                                        <img src="/Think/tpl/simplebootx/Public/images/icons/features-responsive.png" alt="">
                                    </div><!-- /.icon -->

                                    <div class="text span3">
                                        <p>被客户微博、微信或信件公开表扬有奖励！可以帮助解决家属困难。</p>
                                    </div><!-- /.span3 -->
                                </div><!-- /.row -->
                            </div><!-- /.item -->                          
                        </div><!-- /.row -->
                      </div>  
                    </div><!-- /.item -->
                 
           
			
			</div>
            </div><!-- /#content -->
        </div><!-- /#wrapper-inner -->
        
 <div class="lanrenzhijia_service">
  <ul>
    <span class="right_bar"></span>
    <a href="http://wpa.qq.com/msgrd?v=3&uin=525945990&site=qq&menu=yes" class="right_qq" target="_blank"></a>
    <span class="right_phone">12345678956</span>
  </ul>
</div>       
  <script type="text/javascript" src="/Think/tpl/simplebootx/Public/js/jquery.js"></script> 
  <script type="text/javascript" src="/Think/tpl/simplebootx/Public/js/carousel.js"></script>     
 <script>
$(function(){
	$(".lanrenzhijia_service").hover(function(){
		$(this).animate({width:'160px'});
	},function(){
		$(this).animate({width:'40px'});
	});
});
</script>
 
<div id="footer-wrapper">
    <div id="footer-top">
         <div id="footer-top-inner" class="container">
            <div class="row">
                <div class="widget properties span3">
                    <div class="title">
                        <h2>关于我们</h2>
                    </div><!-- /.title -->
					 <div class="content">
                        <ul class="menu nav">
                            <li class="first leaf"><a href="<?php echo U('portal/aboutus/aboutus');?>">公司简介</a></li>
                            <li class="leaf"><a href="<?php echo U('portal/aboutus/ourteam');?>">团队介绍</a></li>
                            <li class="leaf"><a href="<?php echo U('portal/aboutus/ourpromise');?>">服务承诺</a></li>
                            <li class="leaf"><a href="<?php echo U('portal/aboutus/law');?>">法律声明</a></li>
                        </ul>
                    </div><!-- /.content -->
                
                </div><!-- /.properties-small -->

                <div class="widget span3">
                    <div class="title">
                        <h2>联系我们</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <table class="contact">
                            <tbody>
                            <tr>
                                <th class="address">地址：</th>
                                <td>1900 Pico Blvd<br>Santa Monica, CA 90405<br>United States<br></td>
                            </tr>
                            <tr>
                                <th class="phone">电话：</th>
                                <td>+48 123 456 789</td>
                            </tr>
                            <tr>
                                <th class="email">邮箱：</th>
                                <td><a href="mailto:info@yourcompany.com">info@example.com</a></td>
                            </tr>
                            
                            <tr>
                                <th class="gps">GPS：</th>
                                <td>34.016811<br>-118.469009</td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /.content -->
                </div><!-- /.widget -->
                
                 <div class="widget span3">
                    <div class="title">
                        <h2>关注我们</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <table class="contact">
                            <tbody>
                            <tr>
                                <th class="sina">地址：</th>
                                <td>1900 Pico Blvd<br>Santa Monica, CA 90405<br>United States<br></td>
                            </tr>
                            <tr>
                                <th class="sina">电话：</th>
                                <td>+48 123 456 789</td>
                            </tr>
                            <tr>
                                <th class="sina">邮箱：</th>
                                <td><a href="mailto:info@yourcompany.com">info@example.com</a></td>
                            </tr>
                            
                            <tr>
                                <th class="sina">GPS：</th>
                                <td>34.016811<br>-118.469009</td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /.content -->
                </div><!-- /.widget -->
                
                 <div class="widget span3">
                    <div class="title">
                        <h2>友情链接</h2>
                    </div><!-- /.title -->

                    <div class="content">
                        <table class="contact">
                            <tbody>
                            <tr>
                                <th class="address">地址：</th>
                                <td>1900 Pico Blvd<br>Santa Monica, CA 90405<br>United States<br></td>
                            </tr>
                            <tr>
                                <th class="phone">电话：</th>
                                <td>+48 123 456 789</td>
                            </tr>
                            <tr>
                                <th class="email">邮箱：</th>
                                <td><a href="mailto:info@yourcompany.com">info@example.com</a></td>
                            </tr>
                            
                            <tr>
                                <th class="gps">GPS：</th>
                                <td>34.016811<br>-118.469009</td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /.content -->
                </div><!-- /.widget -->           
       
            </div><!-- /.row -->
        </div><!-- /#footer-top-inner -->
    </div><!-- /#footer-top -->

    <div id="footer" class="footer container">
        <div id="footer-inner">
            <div class="row">
                <div class="copyright">
                    <p>© Copyright 2015 by 阿姨coming </a>  <a target="_blank"></a> 版权所有</p>
                </div><!-- /.copyright -->          
            </div><!-- /.row -->
        </div><!-- /#footer-inner -->
    </div><!-- /#footer -->
    
</div><!-- /#footer-wrapper -->

<script type="text/javascript" src="/Think/tpl/simplebootx/Public/js/jquery.ezmark.js"></script>
<script type="text/javascript" src="/Think/tpl/simplebootx/Public/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/Think/tpl/simplebootx/Public/js/retina.js"></script>
<script type="text/javascript" src="/Think/tpl/simplebootx/Public/js/bootstrap.min.js"></script>

<script type="text/javascript" src="/Think/tpl/simplebootx/Public/libraries/jquery-ui-1.10.2.custom/js/jquery-ui-1.10.2.custom.min.js"></script>
<script type="text/javascript" src="/Think/tpl/simplebootx/Public/libraries/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="/Think/tpl/simplebootx/Public/libraries/iosslider/_src/jquery.iosslider.min.js"></script>
<script type="text/javascript" src="/Think/tpl/simplebootx/Public/js/realia.js"></script>

      		
 </div><!-- /.wrapper -->
</div><!-- /.wapperout -->
 
</body>
</html>