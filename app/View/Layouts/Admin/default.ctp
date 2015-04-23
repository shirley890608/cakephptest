<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title_for_layout; ?></title>
        <script type="text/javascript" src="/public/js/jquery.js"></script>
        <script type="text/javascript" src="/public/js/tendina.js"></script>
        <script type="text/javascript" src="/public/js/common.js"></script>
        
        <link rel="stylesheet" href="/public/css/add.css" type="text/css" media="screen">
        <link rel="stylesheet" href="/public/css/bootstrap.css" type="text/css" media="screen">
        <link rel="stylesheet" href="/public/css/index.css" type="text/css" media="screen">
    </head>
    <body>
        <!--顶部-->
        <div class="layout_top_header">
            <div style="float: left"><span style="font-size: 16px;line-height: 45px;padding-left: 20px;color: #8d8d8d"><?php echo __('ADMIN Manager');?></span></div>
            <div id="ad_setting" class="ad_setting">
                <a class="ad_setting_a" href="javascript:;">
                    <i class="icon-user glyph-icon" style="font-size: 20px"></i>
                    <span>管理员</span>
                    <i class="icon-chevron-down glyph-icon"></i>
                </a>
                <ul class="dropdown-menu-uu" style="display: none" id="ad_setting_ul">
                    <li class="ad_setting_ul_li"> <a href="javascript:;"><i class="icon-user glyph-icon"></i> 个人中心 </a> </li>
                    <li class="ad_setting_ul_li"> <a href="javascript:;"><i class="icon-cog glyph-icon"></i> 设置 </a> </li>
                    <li class="ad_setting_ul_li"> <a href="/admin/loginout"><i class="icon-signout glyph-icon"></i> <span class="font-bold">退出</span> </a> </li>
                </ul>
            </div>
        </div>
        <!--顶部结束-->
        <!--菜单-->
        <div class="layout_left_menu">
            <ul class="tendina" id="menu">
                <li class="childUlLi">
                    <a href="#" target="menuFrame"><i class="glyph-icon icon-home"></i>首页</a>
                    <ul style="display: none;">
                        <!-- <li><a href="#" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>用户添加</a></li> -->
                    </ul>
                </li>
                <li class="childUlLi">
                    <a href="#" target="menuFrame"> <i class="glyph-icon icon-reorder"></i>信息发布</a>
                    <ul style="display: none;">
                        <li><a href="/newcates/index"><i class="glyph-icon icon-chevron-right"></i>分类列表</a></li>
                        <li><a href="/newcates/add"><i class="glyph-icon icon-chevron-right"></i>添加分类</a></li>
                        <li><a href="/messages/index"><i class="glyph-icon icon-chevron-right"></i>信息资讯列表</a></li>
                        <li><a href="/messages/add"><i class="glyph-icon icon-chevron-right"></i>添加相关资讯</a></li>
                    </ul>
                </li>               
                <li class="childUlLi">
                    <a href="#" target="menuFrame"> <i class="glyph-icon icon-reorder"></i>开店方案</a>
                    <ul style="display: none;">
                        <li><a href="/shopcates/index"><i class="glyph-icon icon-chevron-right"></i>分类列表</a></li>
                        <li><a href="/shopcates/add"><i class="glyph-icon icon-chevron-right"></i>添加分类</a></li>
                        <li><a href="/shops/index"><i class="glyph-icon icon-chevron-right"></i>方案列表</a></li>
                        <li><a href="/shops/add"><i class="glyph-icon icon-chevron-right"></i>添加方案</a></li>
                    </ul>
                </li>
                 <li class="childUlLi">
                    <a href="#" target="menuFrame"> <i class="glyph-icon icon-reorder"></i>关于我们</a>
                    <ul style="display: none;">
                        <li><a href="/aboutcates/index"><i class="glyph-icon icon-chevron-right"></i>分类列表</a></li>
                        <li><a href="/aboutcates/add"><i class="glyph-icon icon-chevron-right"></i>添加分类</a></li>
                        <li><a href="/abouts/index"><i class="glyph-icon icon-chevron-right"></i>内容列表</a></li>
                        <li><a href="/abouts/add"><i class="glyph-icon icon-chevron-right"></i>添加内容</a></li>
                    </ul>
                </li>
                <li class="childUlLi">
                    <a href="" target="menuFrame"> <i class="glyph-icon icon-reorder"></i>在线留言</a>
                    <ul style="display: none;">
                        <!-- <li><a href="/newcates/index"><i class="glyph-icon icon-chevron-right"></i>分类列表</a></li>
                        <li><a href="/newcates/add"><i class="glyph-icon icon-chevron-right"></i>添加分类</a></li> -->
                    </ul>
                </li>
                <li class="childUlLi">
                    <a href="" target="menuFrame"> <i class="glyph-icon icon-reorder"></i>咖啡物料</a>
                    <ul style="display: none;">
                       <!--  <li><a href="#"><i class="glyph-icon icon-chevron-right"></i>咖啡豆</a></li>
                        <li><a href="#"><i class="glyph-icon icon-chevron-right"></i>咖啡机</a></li> -->
                    </ul>
                </li>
               
                <li class="childUlLi">
                    <a href="" target="menuFrame"> <i class="glyph-icon icon-reorder"></i>合作伙伴</a>
                    <ul style="display: none;">
                        <!-- <li><a href="#"><i class="glyph-icon icon-chevron-right"></i>咖啡豆</a></li>
                        <li><a href="#"><i class="glyph-icon icon-chevron-right"></i>咖啡机</a></li> -->
                    </ul>
                </li>
                 <li class="childUlLi">
                    <a href="" target="menuFrame"> <i class="glyph-icon icon-reorder"></i>广告管理</a>
                    <ul style="display: none;">
                        <!-- <li><a href="#"><i class="glyph-icon icon-chevron-right"></i>关于我们</a></li>
                        <li><a href="#"><i class="glyph-icon icon-chevron-right"></i>公司一角</a></li> -->
                    </ul>
                </li>
                <li class="childUlLi">
                    <a href=""> <i class="glyph-icon  icon-location-arrow"></i>联系我们</a>
                    <ul style="display: none;">
                         <!-- <li><a href="#" target="menuFrame"><i class="glyph-icon icon-chevron-right"></i>联系我们</a></li> -->
                    </ul>
                </li>
            </ul>
        </div>
        <div id="layout_right_content" class="layout_right_content">
            <div class="route_bg"> 
                <a href="/newcates/index">主页</a><i class="glyph-icon icon-chevron-right"></i>
                <a href="#"><?php echo isset($crumb) ? $crumb:'后台管理';?></a>
            </div>
            <div class="mian_content">
                <div id="page_content">
                <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        </div>
        <div class="layout_footer">
            <p>Copyright © 2015 - shirley</p>
        </div>
    </body></html>