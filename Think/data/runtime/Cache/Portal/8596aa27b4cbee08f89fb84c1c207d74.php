<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en-US">
<head>
	<tp_include file="Public:head"/>
	
<script language=javascript>
function checkusername(){
	
	var input_username = document.getElementById("input_username");
	var stripChar = '?<*.>\'"';
	
	var re_name= new RegExp("^[0-9]+$");
	var re_name1= new RegExp("^[^\%\'\"\?<*.>]*$");
	if(re_name.test(input_username.value)){
		input_username.setCustomValidity("用户名不能全为数字！");
	}else{

		if(!( re_name1.test(input_username.value))){
			input_username.setCustomValidity("用户名不能包含特殊字符！");
		}else{
	
			input_username.setCustomValidity(''); 
		}
	}	
}
</script>
		
</head>
<body >
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
            		<h1 class="page-header">用户登陆</h1>
            		<div class="login-register">
	  				 <div class="row">
						<div class="span4 box-shadow-1">
   						 <div class="tab-content">
       
 					<div class="tab-pane active" id="login">
            <form action="<?php echo U('user/login/dologin');?>" method="post">
            	
                <div class="control-group">
                    <label class="control-label" for="input_username">账号</label>
                    <div class="controls">
                        <input type="text" id="input_username" name="username" placeholder="请输入用户名/邮箱/手机号" class="span3" onchange="checkusername()">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="input_password" >密码</label>                      
                    <div class="controls">
                         <input type="password" id="input_password" name="password" placeholder="请输入密码" class="span3">  
                    </div>
                </div>
                <!-- /.control-group -->

                <div class="control-group">
                    <label class="control-label" for="input_verify">验证码</label>
                    <div class="controls">
                        <input type="text" id="input_verify" name="verify" required placeholder="请输入验证码" class="span3">                                   
                          <?php echo sp_verifycode_img('code_len=4&font_size=15&width=100&height=35&charset=1234567890');?>
                  
                    </div>
                    <!-- /.controls -->
                </div>
                <!-- /.control-group -->

               <div class="control-group">
                                <label class="control-label" for="input_repassword"></label>
                                <div class="controls">
                                    <button class="btn btn-primary J_ajax_submit_btn" type="submit">立即登陆</button>
                                </div><!--control-->
                            </div><!--control-group-->
          
                 <div class="control-group">
                                <label class="control-label" for="input_repassword"></label>
                                <div class="controls">
                                    <ul class="inline">
                                    <li><a href="<?php echo U('user/register/index');?>">现在注册</a></li>
                                    <li><a href="<?php echo U('user/login/forgot_password');?>">忘记密码</a></li>
                                    </ul>
                                </div>
                            </div>
                        
                <!-- /.form-actions -->
            </form>
        </div>
        <!-- /.tab-pane -->
     
    </div>
    <!-- /.tab-content -->
</div>
<!-- /.span4-->

<div class="span18">
    <div class="images row">
        <div class="item span2">
            <img src="/Think/tpl/simplebootx/Public/images/icons/circle-dollar.png" alt="">

            <h3>低价</h3>
        </div>
        <!-- /.item -->
        <div class="item span2">
            <img src="/Think/tpl/simplebootx/Public/images/icons/circle-search.png" alt="">

            <h3>方便</h3>
        </div>
        <!-- /.item -->
        <div class="item span2">
            <img src="/Think/tpl/simplebootx/Public/images/icons/circle-global.png" alt="">

            <h3>快捷</h3>
        </div>
        <!-- /.item -->
        <div class="item span2">
            <img src="/Think/tpl/simplebootx/Public/images/icons/circle-package.png" alt="">

            <h3>全面</h3>
        </div>
        <!-- /.item -->
    </div>
    <!-- /.row -->

    <hr class="dotted">

    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ullamcorper libero sed ante auctor vel
        gravida nunc placerat. Suspendisse molestie posuere sem, in viverra dolor venenatis sit amet. Aliquam
        gravida nibh quis justo pulvinar luctus. Phasellus a malesuada massa.
    </p>

    <ul class="unstyled dotted">
        <li>
        <span class="inner">
            <strong>Lorem ipsum dolor sit amet</strong><br>

             Consectetur adipiscing elit. Proin aliquam lorem sed urna viverra
             accumsan. Aliquam sit amet dui et diam rutrum aliquet. Sed vulputate,
             arcu vitae aliquet facilisis, ligula sem posuere nisl, sit amet pretium
             ligula dolor

        </span>
        </li>

        <li>
           <span class="inner">
              <strong>Lorem ipsum dolor sit amet</strong><br>
                 Consectetur adipiscing elit. Proin aliquam lorem sed urna viverra
                 accumsan. Aliquam sit amet dui et diam rutrum aliquet. Sed vulputate,
                 arcu vitae aliquet facilisis, ligula sem posuere nisl, sit amet pretium
                 ligula dolor
              </span>
        </li>       
    </ul>
	</div><!-- /.span8 -->
	</div><!-- /.row -->
</div><!-- /.login-register -->        
        </div><!--main-->
   
</div><!-- /container -->
    </div><!-- /#content -->
	</div><!--wrapinner-->
    
    
	
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


    <script type="text/javascript" src="/Think/tpl/simplebootx/Public/js/jquery.js"></script> 
<script type="text/javascript" src="/Think/tpl/simplebootx/Public/js/jquery.ezmark.js"></script>
<script type="text/javascript" src="/Think/tpl/simplebootx/Public/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/Think/tpl/simplebootx/Public/js/retina.js"></script>
<script type="text/javascript" src="/Think/tpl/simplebootx/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Think/tpl/simplebootx/Public/js/carousel.js"></script>

<script type="text/javascript" src="/Think/tpl/simplebootx/Public/libraries/jquery-ui-1.10.2.custom/js/jquery-ui-1.10.2.custom.min.js"></script>
<script type="text/javascript" src="/Think/tpl/simplebootx/Public/libraries/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="/Think/tpl/simplebootx/Public/libraries/iosslider/_src/jquery.iosslider.min.js"></script>
<script type="text/javascript" src="/Think/tpl/simplebootx/Public/js/realia.js"></script>


	




    </div>
</div>
</body>
</html>