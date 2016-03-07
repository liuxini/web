<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/Think/statics/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/Think/statics/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/Think/statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/Think/statics/simpleboot/font-awesome/4.2.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		.length_3{width: 180px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/Think/statics/simpleboot/font-awesome/4.2.0/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/Think/",
    JS_ROOT: "statics/js/",
    TOKEN: ""
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/Think/statics/js/jquery.js"></script>
    <script src="/Think/statics/js/wind.js"></script>
    <script src="/Think/statics/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<body class="J_scroll_fixed" style="min-width:800px;">
	<script type="text/javascript" src="/Think/statics/js/TestAddress1.js"></script>
 <script type="text/javascript" src="/Think/statics/js/TestChooseAddress.js"></script> 
 
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
//	 $("#id_provSelect").val(regionId.substring(0,2)+"0000");
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
	var str = regionId.substring(0,2);
	if(str=="11" || str=="12" || str=="31" || str=="50") {
	   $("#id_citySelect").val(regionId);
	} else {
	   $("#id_citySelect").val(regionId.substring(0,4)+"00");
	}
  }
}
</script>
<div class="wrap J_check_wrap">
  <ul class="nav nav-tabs">
     <li class="active"><a href="javascript:;">所有阿姨 </a></li>
     <li><a href="<?php echo U('AdminPost/add');?>"  target="_self">添加阿姨</a></li>
  </ul>
 <form class="well form-search" method="post" action="<?php echo u('AdminPost/index');?>">
    <div class="search_type cc mb10">
      <div class="mb10"> 
        <span class="mr20">
        
        &nbsp;&nbsp;地区：
        
        <select id="id_provSelect" name="province" style="width:200px;" value="<?php echo ((isset($formget["province"]) && ($formget["province"] !== ""))?($formget["province"]):''); ?>" onChange="loadCity(this.value);">
                 <option value="">请选择区域</option>
              	</select>
                <select id="id_citySelect" name="city" style="width:200px;" value="<?php echo ((isset($formget["city"]) && ($formget["city"] !== ""))?($formget["city"]):''); ?>">
                    <option value="">请选择城市</option>
         </select> 
          <script language="JavaScript">loadProvince('110000');</script> 

          &nbsp; &nbsp;姓名：
        <input type="text" class="input length_2" name="keyword" style="width:100px;" value="<?php echo ($formget["keyword"]); ?>" placeholder="请输入姓名...">

         &nbsp; &nbsp;类型：

       <select name="type" id="type" style="width:200px;" value="<?php echo ($formget["type"]); ?>">  
          <option value = >全部</option>  
      <option value ="月嫂">月嫂</option>  
      <option value ="育儿嫂">育儿嫂</option>  
      <option value="家务员">家务员</option>  
      <option value="临时小时工">临时小时工</option>  
      <option value ="包月小时工">包月小时工</option>  
      <option value ="老年陪护">老年陪护</option>  
      <option value="经纪人">经纪人</option>  
    </select>                   
        <input type="submit" class="btn" value="搜索"/>
        </span>
      </div>
    </div>
  </form>

  <form class="J_ajaxForm" action="" method="post">
    <div class="table_list">
      <table width="100%" class="table table-hover">
        <thead>
             <tr>
              <th width="16"><label><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></label></th>
              <th width="45">ID</th>
              <th width="60">姓名</th>
              <th width="45">年龄</th>
              <th width="80">工作类型</th>
              <th width="80">现居地</th>
              <th width="80">薪资</th>
              
                <th width="45">照片</th>
              <th width="60">经纪人id</th>
              <th width="45">收藏量</th>
              
              <th width="120"><span>时间</span></th>
              <th width="45">状态</th>
              <th width="120">操作</th>
            </tr>
        </thead>

         <?php $recommend_status=array("1"=>"已推荐","0"=>"未推荐"); ?>
          <?php if(is_array($posts)): foreach($posts as $key=>$vo): ?><tr>
                <td><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="ids[]" value="<?php echo ($vo["helperid"]); ?>" ></td>
               
                <td><a><?php echo ($vo["helperid"]); ?></a></td>
                <td>
                  <a href="<?php echo U('AdminPost/detail',array('id'=>$vo['helperid']));?>" >
                    <span><?php echo ($vo["helpername"]); ?></span>
                  </a>
                </td>
                <td><a><?php echo ($vo["age"]); ?></a></td>
                <td><a><?php echo ($vo["type"]); ?></a></td>
                <td><a><?php echo ($vo["livenow"]); ?></a></td>
                <td><a><?php echo ($vo["salary"]); ?></a></td>
                <td>
                  <?php $smeta=json_decode($vo['smeta'],true); ?>
                    <?php if(!empty($smeta['thumb'])): ?><a href="<?php echo sp_get_asset_upload_path($smeta['thumb']);?>" target='_blank'>查看</a><?php endif; ?>
                  </td>
                <td><a><?php echo ($vo["brokerid"]); ?></a></td>
                <td><?php echo ($vo["hits"]); ?></td>
                                   
                <td><?php echo ($vo["post_date"]); ?></td>
                <td><?php echo ($recommend_status[$vo['recommended']]); ?></td>
                <td>                
                  <a href="<?php echo U('AdminPost/detail',array('id'=>$vo['helperid']));?>">查看</a>|
                  <a href="<?php echo U('AdminPost/edit',array('id'=>$vo['helperid']));?>">修改</a>|                 
                  <a href="<?php echo U('AdminPost/delete',array('id'=>$vo['helperid']));?>" class="J_ajax_del" >删除</a>|
                  <a href="javascript:open_iframe_dialog('<?php echo u('comment/commentadmin/index',array('post_id'=>$vo['id']));?>','评论列表')">查看评论</a> 
          </td>
              </tr><?php endforeach; endif; ?>
          </table>
          <div class="pagination"><?php echo ($Page); ?></div>
     
    </div>
    <div class="form-actions">
        <label class="checkbox inline" for="check_all"><input type="checkbox" class="J_check_all" data-direction="y" data-checklist="J_check_y" id="check_all">全选</label>                
       <button class="btn btn-primary J_ajax_submit_btn" type="submit" data-action="<?php echo u('AdminPost/recommend',array('recommend'=>1));?>" data-subcheck="true" >推荐</button>
        <button class="btn btn-primary J_ajax_submit_btn" type="submit" data-action="<?php echo u('AdminPost/recommend',array('unrecommend'=>1));?>" data-subcheck="true" >取消推荐</button>
    </div>
  </form>
</div>
<script src="/Think/statics/js/common.js"></script>
</body>
</html>