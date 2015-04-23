<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');

class AdminController extends AppController
{
    //公共方法
    var $components = array('Session','Cookie');
    /**
     * 首页
     * @author hxsd
     */
    public function index()
    {   //登录控制
        $this->Sess->getSessionFromLogin();
        $this->set('title_for_layout', '后台管理');        
        $this->layout = 'Admin/default';
    }

    /**
     * 登录页
     * @author hxsd
     */
    function login()
    {
        //清空用户名和密码的session       
        $this->layout = 'ajax';
    }

    function ajaxlogin()
    {   
        //登录控制
       // $this->Sess->getSessionFromLogin();

        $errors = array(); //错误数组
        $data = array(); //结果数组
        $postdata = $this->request->data;

        // 验证变量
        if (empty($postdata['name']))
        {
            $errors['name'] = '姓名不能为空!';
        }

        if (empty($postdata['userpassword']))
        {
            $errors['userpassword'] = '密码不能为空!';
        }

        if ( !($postdata['name']== 'shirley' || $postdata['name'] == 'admin') )
        {
            $errors['name'] = '用户名不存在!';
        }

        if ( !(md5($postdata['userpassword']) == md5('123456') && $postdata['name'] == 'shirley'  ||  $postdata['name'] == 'admin' && md5($postdata['userpassword'])== md5('shirley1989')))
        {
            $errors['userpassword'] = '密码不正确!';
        }

        // 响应
        //结果数组
        if (!empty($errors))
        {
            $data['success'] = false;
            $data['errors'] = $errors;
            $data['author'] = 'shirley';
        }
        else
        {
            $data['success'] = true;
            $data['messages'] = '验证成功!';
            $data['author'] = 'shirley';
            //session
            $this->Session->write('username',$postdata['name']);
            $this->Session->write('password',md5($postdata['userpassword']));
           // echo $this->Session->read('username');
            
        }

        // Ajax调用
        echo json_encode($data);

        exit;
    }

    /**
     * 退出
     * 
     */
    function loginout()
    {
        //清空用户名和密码的session
        $this->Session->write('username','');
        $this->Session->write('password','');

        echo "<script type='text/javascript'>;location.href='/admin/login';</script>";
        //$this->redirect('/admin/login');
    }

}
