<?php

/*
 * To change this template, choose Tools | Templates 
 * and open the template in the editor. 
 */

class Shopcate extends AppModel
{
    public $name = 'Shopcate';
    /**
     * add data field
     * @param type $data
     */
    public function addName($data)
    {
        $sql = "insert into shopcates(name,createtime) values('" . $data['name'] . "','" . $data['createtime'] . "')";
        $this->query($sql);
        $lastid = $this->query("select last_insert_id()");
        return ($lastid[0][0]['last_insert_id()']);
    }

    /**
     * 获取分类列表
     * @return array $data
     */
    public function getCategoryLists()
    {
        $data = array();
        $resultList = $this->query("select * from shopcates where status=0");
        foreach ($resultList as $v)
        {
            $data[$v['shopcates']['id']] = $v['shopcates']['name'];
        }
        return $data;
    }
}
