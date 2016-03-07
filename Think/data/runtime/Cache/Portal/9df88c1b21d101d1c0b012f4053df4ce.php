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
        
</head>
 <body>
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
						<div class="row">
		 					<div class="span9">
                                 <div class="property-detail box-shadow-1">
                                      <div class="pull-left overview">
										<h2><a text-align：center><?php echo ($post["helpername"]); ?></a></h2>
                                         <div class="row" style="width: 222px;">
                                             <div class="image span13">
                                                 <?php $smeta=json_decode($post['smeta'],true); ?>
                                                 <div class="content">  
														<a href="<?php echo leuu('portal/detail/index',array('id'=>$post.helperid));?>"></a>
                                                       <?php if(empty($smeta['thumb'])): ?><img src="/Think/tpl/simplebootx/Public/images/property-small-1.png" width ="150" height="200" alt=""/>
                                                       <?php else: ?> 
                                                               <img src="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" width ="150" height="200" alt="" /><?php endif; ?>
                                                                  <!-- /.bathrooms -->
                                                  </div><!-- /.image -->                                                                                                 
                                              </div>
                                              
                                                    <form method='post' action="<?php echo U('detail/book');?>">
                                                        <input type="submit" class="btn btn-primary arrow-right" value="预约 ">
                                                        <input type="hidden" name="helperid" value="<?php echo ($post["helperid"]); ?>"/>                                    
                                                        <input type="hidden" name="type" value="<?php echo ($post["type"]); ?>"/>
                                                    </form>
                                                                                             
                                         </div><!-- /.row -->
									</div><!-- /.pull-left -->
                                    
                                <?php $province = array("110000"=>"北京市","120000"=>"天津市","130000"=>"河北省","140000"=>"山西省","150000"=>"内蒙古自治区", "210000"=>"辽宁省","220000"=>"吉林省","230000"=>"黑龙江省","310000"=>"上海市","320000"=>"江苏省", "330000"=>"浙江省","340000"=>"安徽省","350000"=>"福建省","360000"=>"江西省","370000"=>"山东省", "410000"=>"河南省","420000"=>"湖北省","430000"=>"湖南省","440000"=>"广东省","450000"=>"广西壮族自治区", "460000"=>"海南省","500000"=>"重庆市","510000"=>"四川省","520000"=>"贵州省","530000"=>"云南省", "540000"=>"西藏自治区","610000"=>"陕西省","620000"=>"甘肃省","630000"=>"青海省","640000"=>"宁夏回族自治区", "650000"=>"新疆维吾尔自治区","710000"=>"台湾省","810000"=>"香港特别行政区","820000"=>"澳门特别行政区","900000"=>"外国" ); ?>
                                    
                                           
									<div class="detail_right">
                                        <ul class="tab">
                                             <li><span class="current" data-for="area1">基本信息</span></li>
                                         </ul>
                                         <div class="summary area1" style="display: block;">                                                                                                           
                                                <p><strong><th width="180"> 姓名 : </th></strong><?php echo ($post["helpername"]); ?> </p>
                                                <p><strong> 工作类型 : </strong><?php echo ($post["type"]); ?> </p>
                                                <p><strong> 现居地 : </strong><?php echo ($province[$post['province']]); echo ($post["city"]); echo ($post["livenow"]); ?> </p>
                                                <p><strong> 年龄 : </strong><?php echo ($post["age"]); ?> </p>
                                                 <p><strong> 民族 : </strong><?php echo ($post["nation"]); ?> </p>                                                                                                                       
                                                 <p><strong> 学历 : </strong><?php echo ($post["school"]); ?> </p>
                                                 <p><strong> 自我描述 : </strong><?php echo ($post["selfdesc"]); ?> </p>
                                                 <p><strong> 经纪人描述 : </strong><?php echo ($post["brokerdesc"]); ?> </p>
                                                 <p></p>
                                                 <a href="<?php echo leuu('portal/index/hits',array('id'=>$post['helperd']));?>">收藏</a>

                                        </div>    
                                    </div>
                                         
                    </div><!--property-->
                    <h2>用户印象</h2>
                    <div class="property-detail box-shadow-1">
                           <div class="clr"></div>
                           <?php if(is_array($comment_list)): $i = 0; $__LIST__ = $comment_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="reviewmain">
                                    <p><strong><?php echo ($vo["full_name"]); ?></strong> 说道：</BR></BR>
                                        <?php echo ($vo["content"]); ?></BR></p>
                                        <input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
                                 </div><?php endforeach; endif; else: echo "" ;endif; ?>
                           <div class="clr"></div>
                           <div class="clr"></div>
                            <div class="pagination"><?php echo ($Page); ?></div> 
                           <div class="clr"></div>                   
                           <?php if($controller == 1): ?><div class="property-detail">                              
                                <form id="form1" method='post' action="<?php echo U('detail/putreview');?>">
                                     <table cellpadding=2 cellspacing=2>                                                                
                                         <tr><td >评价</td><td><textarea name="content" id="content" rows="5" cols="45"></textarea></td></tr>
                                         <td><input type="submit" class="button" value="提交"></td>
                                     </table>
                                     <input type="hidden" name="helperid" value="<?php echo ($post["helperid"]); ?>"/>
                                     <input type="hidden" name="helpername" value="<?php echo ($post["helpername"]); ?>"/>
                                 </form>                               
                                 </div>
                                  <?php else: ?> <h5>你是游客/该阿姨没有为您服务过，不能评价她</h5><?php endif; ?>
                         </div>
                                                                                                                                                  								            	
		</div><!-- /.span9-->

                       <div class="sidebar span3">
                <div class="widget our-agents">
    <div class="title">
        <h2>门店</h2>
    </div><!-- /.title -->

    <div class="content">
        <div class="agent">
            <div class="image">
                <img src="assets/img/photos/emma-small.png" alt="">
            </div><!-- /.image -->
            <div class="name">Victoria Summer</div><!-- /.name -->
            <div class="phone">333-666-777</div><!-- /.phone -->
            <div class="email"><a href="mailto:victoria@example.com">victoria@example.com</a></div><!-- /.email -->
        </div><!-- /.agent -->

        <div class="agent">
            <div class="image">
                <img src="assets/img/photos/john-small.png" alt="">
            </div><!-- /.image -->
            <div class="name">John Doe</div><!-- /.name -->
            <div class="phone">111-222-333</div><!-- /.phone -->
            <div class="email"><a href="mailto:john.doe@example.com">victoria@example.com</a></div><!-- /.email -->
        </div><!-- /.agent -->
    </div><!-- /.content -->
</div><!-- /.our-agents -->
                <div class="widget contact">
    <div class="title">
        <h2 class="block-title">Contact agent</h2>
    </div><!-- /.title -->

    <div class="content">
        <form method="post">
            <div class="control-group">
                <label class="control-label" for="inputName">
                    Name
                    <span class="form-required" title="This field is required.">*</span>
                </label>
                <div class="controls">
                    <input type="text" id="inputName">
                </div><!-- /.controls -->
            </div><!-- /.control-group -->

            <div class="control-group">
                <label class="control-label" for="inputEmail">
                    Email
                    <span class="form-required" title="This field is required.">*</span>
                </label>
                <div class="controls">
                    <input type="text" id="inputEmail">
                </div><!-- /.controls -->
            </div><!-- /.control-group -->

            <div class="control-group">
                <label class="control-label" for="inputMessage">
                    Message
                    <span class="form-required" title="This field is required.">*</span>
                </label>

                <div class="controls">
                    <textarea id="inputMessage"></textarea>
                </div><!-- /.controls -->
            </div><!-- /.control-group -->

            <div class="form-actions">
                <input type="submit" class="btn btn-primary arrow-right" value="Send">
            </div><!-- /.form-actions -->
        </form>
    </div><!-- /.content -->
</div><!-- /.widget -->
            </div>
                     
					</div><!-- /.row-->
				</div><!-- /.main-->
            </div><!-- /.container-->
        </div><!-- /.content-->
      </div><!--./wrapper-inner-->
     
            
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


	




     </div><!--./wrapper-->
   </div><!--./wrapper-out-->
</body>
</html>