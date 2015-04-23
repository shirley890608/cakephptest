<?php

/*
 * To change this template, choose Tools | Templates 
 * and open the template in the editor. 
 */

class Shop extends AppModel
{

    public $name = 'Shop';

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