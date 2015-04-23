<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CommComponent extends Component
{
    /*
     * 添加成功提示函数
     * @author shirley
     * @param $titleField
     * @param $url 跳转的url地址
     */
    function executeTxt($title, $url)
    {
        echo "<script type='text/javascript'> alert('" . $title ."');location.href='" . $url . "';</script>";
    }
    


    /*
     * 存在 提示函数
     * @author shirley
     * @param $titleField
     * @param $url 跳转的url地址
     */
    function existYes($title, $url)
    {
        echo "<script type='text/javascript'> alert('" . $title . "');location.href='" . $url . "';</script>";
    }
    
    
    /*
     * 登录控制 提示函数
     * @author shirley
     */
    function loginError()
    {
        echo "<script type='text/javascript'> alert('请登录！');location.href='/admin/login';</script>";
    }
}
