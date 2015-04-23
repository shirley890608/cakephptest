<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="stylesheet" type="text/css" href="style.css" charset="utf-8" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="关键词" />
  <meta name="description" content="描述" />
  <link href="/app/webroot/css/Styles.css" rel="stylesheet" type="text/css"/>
  <script src="/app/webroot/js/jquery.js"></script>
  <script src="/app/webroot/js/banner.js"></script>
</head>
<body>
<div class="box">
   <!--头部 begin-->
   <div class="top">
        <div class="top_head">
             <div class="top_left"><a href="default.php" title="青岛科之润咖啡"></a></div>
             <div class="top_right">
             <h1></h1>
             <h2>
                    <form id="form1" name="form1" method="post" action="">
                    <input type="text" name="textfield" id="textfield" value="请输入要查询的内容" onblur="if(this.value =='') this.value='请输入要查询的内容'" onclick="if(this.value=='请输入要查询的内容') this.value=''" />
                    <input type="submit" name="button" id="button" value="" class="btn_search" />
                    </form>
             </h2>
             </div>       
        </div>
        
        <div class="top_menu">
            <ul>
             <li><a href="/">网站首页</a></li> <li class="li_li"></li>
             <li><a href="/about">关于我们</a></li> <li class="li_li"></li> 
             <li><a href="/product">咖啡设备</a></li> <li class="li_li"></li> 
             <li><a href="/case">开店方案</a></li> <li class="li_li"></li> 
             <li><a href="/material" >咖啡物料</a></li> <li class="li_li"></li> 
             <li><a href="/cooperation">合作伙伴</a></li> <li class="li_li"></li> 
             <li><a href="/">维修保养</a></li> <li class="li_li"></li> 
             <li><a href="/news">信息发布</a></li> <li class="li_li"></li> 
             <li><a href="/contact">联系我们</a></li>
             </ul>
        </div>
   </div>
   <!--头部 end-->
   
   <!--banner begin-->
   <div class="banner">
        <div class="banner_box" id="banner">
             <img src="/app/webroot/images/bar1.jpg" />
             <img src="/app/webroot/images/bar2.jpg" />
             <img src="/app/webroot/images/bar3.jpg" style="display:none;"/>
        </div>
   </div>
   <!--banner end-->
   <?php echo $this->fetch('content'); ?>

   <!-- link begin-->
   <div class="link">
        <div class="link_box">
        <a href="#">青岛科之润咖啡设备</a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href="#">KC快咖</a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href="#">星梦空间</a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href="#">中国咖啡网</a>&nbsp;&nbsp; | &nbsp;&nbsp;
        <a href="#">咖啡物料网</a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href="#">咖啡设备网</a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href="#">咖啡商城</a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href="#">咖啡信息网</a>
        </div>
   </div>
   <!--link end-->
   
   <!--foot begin-->
   <div class="foot">
        <div class="foot_box">
        版权所有 Copyright(C)2015   青岛科之润设备    网址：www.kzrcoffee.com
<br>手机（王德涛）：13953256337   手机（郝世杰)：18724771011   电话：0532-66613666    传真：0532-85855221   邮件：qdkzrcoffee@163.com
        </div>
   </div>
   <!--foot end-->
   
</div>   
</body>

</html>