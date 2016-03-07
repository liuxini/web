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
<script type="text/javascript">
    var catid = "12";
</script>
<style type="text/css">
.col-auto {
	overflow: hidden;
	_zoom: 1;
	_float: left;
	border: 1px solid #c2d1d8;
}
.col-right {
	float: right;
	width: 210px;
	overflow: hidden;
	margin-left: 6px;
	border: 1px solid #c2d1d8;
}

body fieldset {
	border: 1px solid #D8D8D8;
	padding: 10px;
	background-color: #FFF;
}
body fieldset legend {
    background-color: #F9F9F9;
    border: 1px solid #D8D8D8;
    font-weight: 700;
    padding: 3px 8px;
}
.list-dot{ padding-bottom:10px}
.list-dot li,.list-dot-othors li{padding:5px 0; border-bottom:1px dotted #c6dde0; font-family:"宋体"; color:#bbb; position:relative;_height:22px}
.list-dot li span,.list-dot-othors li span{color:#004499}
.list-dot li a.close span,.list-dot-othors li a.close span{display:none}
.list-dot li a.close,.list-dot-othors li a.close{ background: url("/Think/statics/images/cross.png") no-repeat left 3px; display:block; width:16px; height:16px;position: absolute;outline:none;right:5px; bottom:5px}
.list-dot li a.close:hover,.list-dot-othors li a.close:hover{background-position: left -46px}
.list-dot-othors li{float:left;width:24%;overflow:hidden;}
</style>
</head>
<body class="J_scroll_fixed">
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
     <li><a href="<?php echo U('AdminPost/index');?>">所有阿姨</a></li>
     <li class="active"><a href="<?php echo U('AdminPost/add');?>"  target="_self">添加阿姨</a></li>
  </ul>
  <form name="myform" id="myform" action="<?php echo u('AdminPost/add_post');?>" method="post" class="form-horizontal J_ajaxForms" enctype="multipart/form-data">
  <div class="col-right">
    <div class="table_full">
      <table width="100%">
         <tr>
          <td><b>缩略图</b></td>
        </tr>
        <tr>
          <td>
          	<div  style="text-align: center;"><input type='hidden' name='smeta[thumb]' id='thumb' value=''>
			<a href='javascript:void(0);' onclick="flashupload('thumb_images', '附件上传','thumb',thumb_images,'1,jpg|jpeg|gif|png|bmp,1,,,1','','','');return false;">
			<img src='/Think/statics/images/icon/upload-pic.png' id='thumb_preview' width='135' height='113' style='cursor:hand' /></a>
			<!-- <input type="button" class="btn" onclick="crop_cut_thumb($('#thumb').val());return false;" value="裁减图片">  -->
            <input type="button"  class="btn" onclick="$('#thumb_preview').attr('src','/Think/statics/images/icon/upload-pic.png');$('#thumb').val('');return false;" value="取消图片">
            </div>
			</td>
        </tr>
        
        <tr>
          <td><input type="text" name="post[post_date]" id="updatetime" value="<?php echo date('Y-m-d',time());?>" size="21" class="input length_3 J_datetime "></td>
        </tr>
  
        <tr>
          <td><b>状态</b></td>
        </tr>
        <tr>
          <td>
          	<span class="switch_list cc">
			<label><input type="radio" name="post[status]" value="1" checked><span>审核通过</span></label>
			<label><input type="radio" name="post[status]" value="0"  ><span>待审核</span></label>
		 	</span>
		 </td>
        </tr>
      </table>
    </div>
  </div>
  <div class="col-auto">
    <div class="table_full">
      <table width="100%" cellpadding="2" cellspacing="2">

      	   <tr>
              <th width="60">姓名</th>
              <td>
              	<input type="text" style="width:200px;"  name="post[helpername]" id="helpername"  required value="" style="color:" class="input input_hd J_title_color" placeholder="请输入姓名" onkeyup="strlen_verify(this, 'title_len', 160)" />
              	<span class="must_red">*</span>
              </td>
            </tr>

      	
            <tr>
              <th width="60">类型</th>
              <td>
              	 <select name="post[type]" id="type">  
		  <option value ="月嫂">月嫂</option>  
		  <option value ="育儿嫂">育儿嫂</option>  
		  <option value="家务员">家务员</option>  
		  <option value="临时小时工">临时小时工</option>  
		  <option value ="包月小时工">包月小时工</option>  
		  <option value ="老年陪护">老年陪护</option>  
		  <option value="经纪人">经纪人</option>  
		</select>  
              </td>
            </tr>

            <tr>
              <th width="80">身份证</th>
              <td>
              	<input type="text" style="width:200px;" name="post[idcard]" id="idcard"  required value="" style="color:" class="input input_hd J_title_color" placeholder="请输入身份证号" onkeyup="strlen_verify(this, 'title_len', 160)" />
              	<span class="must_red">*</span>
              </td>
            </tr>

            <tr>
              <th width="80">民族</th>
              <td>
              	<input type="text" style="width:200px;" name="post[nation]" id="nation"  required value="" style="color:" class="input input_hd J_title_color" placeholder="请输入民族" onkeyup="strlen_verify(this, 'title_len', 160)" />
              	<span class="must_red">*</span>
              </td>
            </tr>

            <tr>
              <th width="80">手机号</th>
              <td>
              	<input type="text" style="width:200px;" name="post[phonenum]" id="phonenum"  required value="" style="color:" class="input input_hd J_title_color" placeholder="请输入手机号"/>
              	<span class="must_red">*</span>
              </td>
            </tr>

            <tr>
              <th width="80">年龄</th>
              <td>
              	<input type="text" style="width:200px;" name="post[age]" id="age"  required value="" style="color:" class="input input_hd J_title_color" placeholder="请输入年龄"/>
              	<span class="must_red">*</span>
              </td>
            </tr>
            
             <tr>
              <th width="80">工资</th>
              <td>
              	<input type="text" style="width:200px;" name="post[salary]" id="livenow"  required value="" style="color:" class="input input_hd J_title_color" placeholder="请输入期望工资" />
              	<span class="must_red">*</span>
              </td>
            </tr>

             <tr>
              <th width="80">学历</th>
              <td>
              	<select name="post[school]" id="school" >  
				  <option value ="小学">小学</option>  
				  <option value="初中">初中</option>  
				  <option value="高中">高中</option>  
				  <option value ="大专">大专</option>  
				  <option value ="本科">本科</option>  
				  <option value ="其他">其他</option>  
		  
				</select>  
              </td>
            </tr>

            <tr>
              <th width="80">经纪人id</th>
              <td>
              	<input type="text" style="width:200px;" name="post[brokerid]" id="brokerid"  required value="" style="color:" class="input input_hd J_title_color" placeholder="请输入经纪人ID"/>
              	<span class="must_red">*</span>
              </td>
            </tr>
            
            <tr>
              <th width="80">现居地</th>
              <td>
              	
              	<select id="id_provSelect" name="post[province]" onChange="loadCity(this.value);">
                 <option value="">请选择区域</option>
              	</select>
                <select id="id_citySelect" name="post[city]">
                    <option value="">请选择城市</option>
                </select>              
              </td>           
            </tr>
             <script language="JavaScript">loadProvince('110101');</script> 

            <tr>
              <th width="80">详细地址</th>
              <td>
              	<input type="text" style="width:400px;" name="post[livenow]" id="livenow"  required value="" style="color:" class="input input_hd J_title_color" placeholder="请输入现居地" />
              	<span class="must_red">*</span>
              </td>
            </tr>

            <tr>
              <th width="80">自我描述</th>
              <td><input type='text' name='post[selfdesc]' id='selfdesc' value='' style='width:400px'   class='input' placeholder='请输入自我描述'> </td>
            </tr>
            <tr>
              <th width="80">经纪人描述 </th>
              <td><textarea name='post[brokerdesc]' id='brokerdesc'  required style='width:98%;height:50px;' placeholder='请填写经纪人描述'></textarea> </td>
            </tr>
       
                    
       <!-- </tbody>-->
      </table>
    </div>
  </div>
 <div class="form-actions">
        <button class="btn btn_submit J_ajax_submit_btn" type="submit">提交</button>
        <a class="btn" href="<?php echo U('AdminPost/index');?>">返回</a>
  </div>
 </form>
</div>
<script type="text/javascript" src="/Think/statics/js/common.js"></script>
<script type="text/javascript" src="/Think/statics/js/content_addtop.js"></script>

</body>
</html>