<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SessComponent extends Component
{
     var $components = array('Comm','Session');
    /**
     * 获取登录Session 并验证
     * @return boolean
     */
    function getSessionFromLogin()
    {
        $data = array(
            'username' => $this->Session->read('username'),
            'password' =>$this->Session->read('password'),
        );
        
        if($data['username'] == 'shirley' && $data['password'] == md5('123456'))
        {
            return TRUE;
        }
        else
        {   
            //登录控制函数
            $this->Comm->loginError();
        }
            
    }

}
