<?php

/*
 * To change this template, choose Tools | Templates 
 * and open the template in the editor. 
 */

class Aboutcate extends AppModel
{
    public $about = 'Aboutcate';

    
    /**
     * 获取分类列表
     * @return array $data
     */
    public function getCategoryLists()
    {
        $data = array();
        $resultList = $this->query("select * from aboutcates where status=0");
        foreach ($resultList as $v)
        {
            $data[$v['aboutcates']['id']] = $v['aboutcates']['name'];
        }
        return $data;
    }
}