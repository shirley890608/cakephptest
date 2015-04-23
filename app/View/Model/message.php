<?php

/*
 * To change this template, choose Tools | Templates 
 * and open the template in the editor. 
 */

class Message extends AppModel
{

    public $name = 'Message';

    /**
 * Blog validate rule
 *
 * @var array
 * @access public
 */
	var $validate = array(
		'title' => array(  
         'rule' => 'notEmpty',  
         'message' => 'This field cannot be left blank'  
     )
	);
    
}