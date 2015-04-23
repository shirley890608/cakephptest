<?php

App::uses('AppController', 'Controller');
header("Content-type:text/html;charset=utf-8");

class ShopsController extends AppController
{

    //表名
    var $name = 'Shops';
    //设置每页多少条数据
    public $paginate = array('limit' => 10);
    //公共方法
    var $components = array('Comm', 'Sess', 'Cookie');

    /**
     * cate index list
     * @author shirley
     */
    function index()
    {
        //登录控制
        $this->Sess->getSessionFromLogin();
        //标题和面包屑
        $this->set('title_for_layout', '开店方案列表-后台管理');
        $this->set('crumb', '开店方案列表');
        //调用分类的Model    

        //数据部分
        $shops = $this->Shop->find('all');
        //总记录数
        $this->set('allcount', count($shops));
        //每页条数
        $this->set('number', 10);
        //分页参数
        $this->set('shops', $shops);
        //将分页写入到模板
        $this->set('shops', $this->paginate());
        //分类
        $this->set('catedata',$this->getCategoryLists());
        //模板
        $this->layout = 'Admin/default';	
    }

    /**
     * add 
     * @author shirley
     */
    function add()
    {
        //登录控制
        $this->Sess->getSessionFromLogin();
        
        //数据部分
        if (!empty($this->data))
        {
            if (!empty($this->data))
            {
                $this->Shop->create();
                $addid = $this->Shop->save($this->data);
            }
            $addid ? ($this->Comm->executeTxt('添加成功', '/shops/index')) : ($this->Comm->executeTxt('添加失败', '/shops/add'));
        }
        //标题和面包屑 添加方案-后台管理
        $this->set('title_for_layout', '添加方案-后台管理');
        $this->set('crumb', '添加资讯');
        //分类
        $this->set('catedata',$this->getCategoryLists());
        //模板部分
        $this->layout = 'Admin/default';
    }

    /**
     * edit 
     * @author shirley
     */
    function edit($id = null)
    {   
        //登录控制
        $this->Sess->getSessionFromLogin();

        //数据部分
        if (!$id && empty($this->data))
        {   
            $this->Comm->executeTxt('此方案已经不存在', '/shops/index');
        }
        if (empty($this->data))
        {
            $this->data = $this->Shop->read(null, $id);
        }
        else
        {
            //排除当前id
            $data['Shop']['title'] = $this->data['Shop']['title'];
            $data['Shop']['id <>'] = $id;
            $exists = $this->Shop->find('all', array('conditions' => $data['Shop']));
            
            if ($exists)
            {
                $this->Comm->existYes('此方案已经存在', '/shops/edit/'.$id);
            }
            else
            {
                $this->Shop->id = $id;
                $result = $this->Shop->save($this->data);
                $result ? ($this->Comm->executeTxt('修改成功', '/shops/index')) : ($this->Comm->executeTxt('修改失败', '/shops/edit'));
            }
        }

        //标题和面包屑
        $this->set('title_for_layout', '修改方案-后台管理');
        $this->set('crumb', '修改方案');
        //模板部分
        $this->layout = 'Admin/default';
        //分类
        $this->set('catedata',$this->getCategoryLists());
    }

    /**
     * delete
     * @param type $id
     */
    function del($id = null)
    {

        if ($id)
        {
            $this->Shop->delete($id);
            $this->Comm->executeTxt('删除成功', '/shops/index');
            exit;
        }
        else
        {
            $this->Comm->executeTxt('删除失败', '/shops/index');
        }
    }

     /**
     * 获取分类列表
     */
    function getCategoryLists()
    {   
        $data = array();

        //调用分类的Model
        $this->loadModel('Shopcate');
        $cates = $this->Shopcate->find('all');
        foreach ($cates as $v)
        {
            $data[$v['Shopcate']['id']] = $v['Shopcate']['name'];
        }
        return $data;
    }

}
