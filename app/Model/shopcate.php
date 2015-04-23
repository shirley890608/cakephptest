<?php

/*
 * To change this template, choose Tools | Templates 
 * and open the template in the editor. 
 */

class Shopcate extends AppModel
{
    public $name = 'Shopcate';   

    /**
     * 获取分类列表
     * @return array $data
     */
    public function getCategoryLists()
    {
        $data = array();
        $resultList = $this->find('all');
        foreach ($resultList as $v)
        {
            $data[$v['Shopcate']['id']] = $v['Shopcate']['name'];
        }
        return $data;
    }
}
