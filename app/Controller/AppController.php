<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    //public $components = array('DebugKit.Toolbar', 'Session');
    public $components = array('Session','Cookie','Comm','Sess');
    public $actsAs = array('Tree'); //Behaviors

    public function __construct($request = null, $response = null)
    {
        parent::__construct($request, $response);
       
        //显示客户端IP
        $this->set('get_client_ip', $this->clientIp(TRUE));
        
    }

    /**
     * 获取客户端IP地址
     */
    public function clientIp($safe = true)
    {
        if (!$safe && env('HTTP_X_FORWARDED_FOR'))
        {
            $ipaddr = preg_replace('/(?:,.*)/', '', env('HTTP_X_FORWARDED_FOR'));
        }
        else
        {
            if (env('HTTP_CLIENT_IP'))
            {
                $ipaddr = env('HTTP_CLIENT_IP');
            }
            else
            {
                $ipaddr = env('REMOTE_ADDR');
            }
        }
        if (env('HTTP_CLIENTADDRESS'))
        {
            $tmpipaddr = env('HTTP_CLIENTADDRESS');
            if (!$tmpipaddr)
            {
                $ipaddr = preg_replace('/(?:,.*)/', '', $tmpipaddr);
            }
        }
        return trim($ipaddr);
    }

}
