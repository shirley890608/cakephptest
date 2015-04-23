<?php

class User extends AppModel
{

    var $name = "User";
    //此处是对各字段规则校验，如果需要了解的可参考我的博文：cakephp如何实现数据校验

    var $validate = array(
        'username' => array(
            array(
                'rule' => 'notEmpty',
                'message' => 'Username must not be empty!'
            ),
            array(
                'rule' => 'isUnique',
                'message' => 'Username must be Unique!'
            )
        ),
        'password' => array(
            array(
                'rule' => 'NotEmpty',
                'message' => 'Password must not be empty!'
            ),
            array(
                'rule' => array('minLength', '8'),
                'message' => 'password must be at least 8 characters!'
            )
        )
    );

}

?>