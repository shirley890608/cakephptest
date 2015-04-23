<?php

/*
 * To change this template, choose Tools | Templates 
 * and open the template in the editor. 
 */

class Newcate extends AppModel
{

    public $name = 'Newcate';
    //验证
    var $validate = array
        (
        'name' => array
            (
            'rule' => 'notEmpty', //or: array('ruleName', 'param1', 'param2' ...) 
            'required' => true,
            'allowEmpty' => false,
            'on' => 'create', //or: 'update'  
            'message' => 'Error Message'
        )
    );


    /**
     * 获取分类列表
     * @return array $data
     */
    public function getCategoryLists()
    {
        $data = array();
        $resultList = $this->query("select id,name from newcates where status=0");
        foreach ($resultList as $v)
        {
            $data[$v['newcates']['id']] = $v['newcates']['name'];
        }
        return $data;
    }

}
