<?php

/*
 * To change this template, choose Tools | Templates 
 * and open the template in the editor. 
 */
App::uses('AppController', 'Controller');

class CakesessionsController extends AppController
{
    /**
     * 保存session
     */
    function add()
    {
            $this->Session->create();
            $this->Session->save($this->data);
            return true;        
    }

}
