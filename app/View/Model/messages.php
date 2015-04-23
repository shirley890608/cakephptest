<?php
/**
* 
*/
class Messages extends AppModel
{
	public $validate = array(
		'name' => array(
				'rule'		=> 'notEmpty',
				'message'	=> 'Enter your name'
			),
		'email' => array(
				'rule'		=> 'email',
				'message'	=> 'Enter a valid email address'
			),
		'message'=> array(
				'rule'		=> 'notEmpty',
				'message'	=> 'Enter your message'
			)
	);
}