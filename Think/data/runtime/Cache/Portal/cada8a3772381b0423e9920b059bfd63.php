<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
.lanrenzhijia_service{ width:40px; height:200px; background:url(http://demo.lanrenzhijia.com/2014/service0924/images/lanrenzhijia.png) no-repeat; position:fixed; right:0px; top:200px;}
.lanrenzhijia_service ul{ display:block; width:160px; height:200px; float:left; position:relative;}
.lanrenzhijia_service ul .right_bar{ position:absolute;width:40px; height:200px; left:0; top:0; display:block;}
.lanrenzhijia_service ul .right_qq{ position:absolute; width:120px; height:85px; right:0; top:0; display:block;}
.lanrenzhijia_service ul .right_phone{ position:absolute; width:120px; height:105px; padding-top:10px;right:0; bottom:0; display:block; text-align:center; color:#555; font-size:16px; font-family:'Microsoft Yahei'; text-decoration:none;}
</style>

<script language=javascript>
function checkpay(){
	var pay = document.getElementById("input_salary");
	var re_pay= new RegExp("^[^\%\'\"\?<*.>]*$");
	if(!re_pay.test(pay.value)){
		input_salary.setCustomValidity('不能包含特殊字符');
	}else{
		input_salary.setCustomValidity('');
	}
}

function checkage(){
	var age = document.getElementById("input_age");
	var re_age= new RegExp("^[^\%\'\"\?<*.>]*$");
	if(!re_age.test(age.value)){
		input_age.setCustomValidity('不能包含特殊字符');
	}else{
		input_age.setCustomValidity('');
	}
}

function checkself(){
	var selfdesc = document.getElementById("selfdesc");
	var re_selfdesc = new RegExp("^[^\%\'\"\?<*.>]*$");
	if(!re_selfdesc.test(selfdesc.value)){
		selfdesc.setCustomValidity('自我描述不能包含特殊字符');
	}else{
		selfdesc.setCustomValidity('');
	}
}
</script>

</head>
 <body>
 <script type="text/javascript" src="/Think/tpl/simplebootx/Public/js/jquery.js"></script>	
 <script type="text/javascript" src="/Think/tpl/simplebootx/Public/js/TestAddress1.js"></script>
 <script type="text/javascript" src="/Think/tpl/simplebootx/Public/js/TestChooseAddress.js"></script> 
 
 <script language="JavaScript">
function loadProvince(regionId){
  $("#id_provSelect").html("");
  $("#id_provSelect").append("<option value=''>请选择省份</option>");
  var jsonStr = getAddress(regionId,0);
  for(var k in jsonStr) {
	$("#id_provSelect").append("<option value='"+k+"'>"+jsonStr[k]+"</option>");
  }
  if(regionId.length!=6) {
	$("#id_citySelect").html("");
    $("#id_citySelect").append("<option value=''>请选择城市</option>");
  } else {
	 $("#id_provSelect").val(regionId.substring(0,2)+"0000");
	 loadCity(regionId);
  }
}

function loadCity(regionId){
  $("#id_citySelect").html("");
  $("#id_citySelect").append("<option value=''>请选择城市</option>");
  if(regionId.length==6) {
	var jsonStr = getAddress(regionId,1);
    for(var k in jsonStr) {
	  $("#id_citySelect").append("<option value='"+jsonStr[k]+"'>"+jsonStr[k]+"</option>");
    }	
  }
}
</script>
 	
       <div id="wrapper-outer" >
    <div id="wrapper">
        <div id="wrapper-inner">
	  
    
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
	<div id="content">
		<div class="container">
            	       <div id="main">
	           <div class="row">
	           	  <h1 class="page-header">提交工作申请</h1>
                   <form  action="<?php echo U('index/findjob_post');?>" method="post">

                <div class="login-register">
                            <div class="row">
                              <div class="span6 box-shadow-1">
                                
                                    <div class="tab-content">
                                      <div class="tab-pane active" id="register">
                                    
                                           <div class="control-group1">
                                       
                                        <div class="controls1">
                                        	 <label class="field">真实姓名： </label>
                                           <div class="inputfind"> <input type="text" id="input_helpername" name="post[helpername]" required placeholder="<?php echo ($post["user_nicename"]); ?>" value="<?php echo ($post["user_nicename"]); ?>" class="span3" pattern="^[\u4e00-\u9fa5]+$" 
                                            title="姓名只能为中文"></div>
                                        </div>
                                    </div>
                                    
                                      <div class="control-group1">
                                       
                                        <div class="controls1">
                                        	 <label class="field">手机号： </label>
                                            <div class="inputfind"><input type="text" id="input_phonenum" name="post[phonenum]" required placeholder="<?php echo ($post["userphone"]); ?>" value="<?php echo ($post["userphone"]); ?>" class="span3" pattern="[0-9]{11,15}$" title="手机号格式不符">
                                        </div></div>
                                    </div>

                                    <div class="control-group1">
                                         <div class="controls1">
                                        	 <label class="field">身份证号： </label>
                                            <div class="inputfind">
                                            	<input type="text" id="input_idcard" name="post[idcard]" required placeholder="<?php echo ($post["idcard"]); ?>" class="span3" pattern="[0-9]{15,18}$" title="身份证格式不符">
                                        	</div>
                                         </div>
                                    </div>

                                    <div class="control-group1">
                                         <div class="controls1">
                                        	  <label class="field">工种： </label>
                                        	 <div class="inputfind">
                                            <select name="post[type]" id="type">  
                                              <option value ="月嫂">月嫂</option>  
                                              <option value ="育儿嫂">育儿嫂</option>  
                                              <option value="家务员">家务员</option>  
                                              <option value="临时小时工">临时小时工</option>  
                                              <option value ="包月小时工">包月小时工</option>  
                                              <option value ="老年陪护">老年陪护</option>  
                                            </select>  
                                           </div>
                                        </div>
                                    </div>

                                    <div class="control-group1">
                                         <div class="controls1">
                                        	 <label class="field">可接受工资： </label>
                                        	 <div class="inputfind">
                                            <input type="text" id="input_salary" name="post[salary]" required placeholder="默认为xx/月" class="span3" onchange="checkpay()">
                                        </div>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group1">
                                        <div class="controls1">
                                        	<label class="field">现居地： </label>
                                        	<div class="inputfind">
                                            <select id="id_provSelect" name="post[province]" onChange="loadCity(this.value);">
							                 <option value="">请选择区域</option>
							              	</select>
							                <select id="id_citySelect" name="post[city]">
							                    <option value="">请选择城市</option>
							                </select>
                                        </div>
                                         </div>
                                    </div>
                                    <script language="JavaScript">loadProvince('110101');</script>  

                                      <div class="control-group1">
                                        <div class="controls1">
                                        	<label class="field">详细地址： </label>
                                        	<div class="inputfind"> 
                                            	<input type="text" id="input_livenow" name="post[livenow]" required placeholder="<?php echo ($post["address"]); ?>" value="<?php echo ($post["address"]); ?>" class="span3" pattern="[a-zA-Z0-9\u4E00-\u9FA5]{2,}$"
                                            title="现居地至少需要2个字">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <tr>
          							<td><input type="hidden" name="post[post_date]" id="updatetime" value="<?php echo date('Y-m-d',time());?>" size="21" class="input length_3 J_datetime "></td>
        							</tr>

                                    <div class="control-group1">
                                         <div class="controls1">
                                        	 <label class="field">民族： </label>
                                        	<div class="inputfind">  
                                            	<input type="text" id="input_nation" name="post[nation]" required class="span3" pattern="^[\u4e00-\u9fa5]+$" title="只能为汉字">
                                        	</div>
                                        </div>
                                    </div>

                                    <div class="control-group1">
                                         <div class="controls1">
                                        	 <label class="field">年龄： </label>
                                        	<div class="inputfind">    
                                            <input id="input_age" type="text"  name="post[age]" required class="span3" onchange="checkage()">
                                       	</div>
                                         </div>
                                    </div>

                                    <div class="control-group1">
                                         <div class="controls1">
                                        	<label class="field">学历：</label>
                                        	<div class="inputfind"> 
                                            <select name="post[school]" id="school">  
                                                <option value ="小学">小学</option>  
                                                <option value="初中">初中</option>  
                                                <option value="高中">高中</option>  
                                                <option value ="大专">大专</option>  
                                                <option value ="本科">本科</option>  
                                                <option value ="其他">其他</option>  
                                            </select>  
                                        </div>
                                        </div>
                                    </div>

                                    <div class="control-group1">
                                        <div class="controls1">
                                        	<label class="field">验证码： </label>
                                        	<div class="inputfind"> 
                                          	<input type="text" id="input_verify" required name="verify" placeholder="请输入验证码" class="span3">
                                          <?php echo sp_verifycode_img('code_len=4&font_size=15&width=100&height=35&charset=1234567890');?></input>
                                         </div>
                                    </div>
                                   </div> 

                                   <div class="control-group2">
                                  <div class="controls1">
                                       <label class="field">自我描述： </label>
                                        <div class="inputfind">	
                                    	<textarea name='post[selfdesc]' id='selfdesc'  required style='width:50%;height:80px;' placeholder='请填写您的详细介绍，如:工作经验，技能特长等'onchange="checkself()"></textarea> </td>
                                	</div> 
                                	</div> 
                                </div>    
                                <div class="control-group1">                               	 
                                	<div class="inputfind">
                                		<div class="form-actions1">
		               				 	<input type="submit" value="同意用户协议并提交 " class="btn btn-primary btn-large">		               				 	
		            					</div>
		            				</div>                                 
                                    </div>  

                                    </div><!--tabpane-->
                                </div><!--tabcontent-->
                                                   
                                </form>  
                              </div><!--span8-->
                            </div><!--row-->
                      </div><!--login-register-->
	           </div><!--row-->
	       </div><!--main-->
	   </div><!--container-->
	   </div>
	  </div>
	 </div>
      <script type="text/javascript" src="/Think/statics/js/wind.js"></script>
 	<!--<script type="text/javascript" src="/Think/tpl/simplebootx/Public/js/jquery.js"></script>-->
    <script type="text/javascript" src="/Think/statics/js/content_addtop.js"></script>
    
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


</div>
</div>

</body>
</html>