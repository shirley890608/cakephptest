<?php

App::uses('AppController', 'Controller');
header("Content-type:text/html;charset=utf-8");

class CooperationsController extends AppController
{

    //表名
    var $name = 'Cooperations';
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
        $this->set('title_for_layout', '合作伙伴列表-后台管理');
        $this->set('crumb', '合作伙伴列表');
        //调用分类的Model    

        //数据部分
        $cooperations = $this->Cooperation->find('all');
        //总记录数
        $this->set('allcount', count($cooperations));
        //每页条数
        $this->set('number', 10);
        //分页参数
        $this->set('cooperations', $cooperations);
        //将分页写入到模板
        $this->set('cooperations', $this->paginate());
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
                $this->Cooperation->create();
                $addid = $this->Cooperation->save($this->data);
            }
            $addid ? ($this->Comm->executeTxt('添加成功', '/cooperations/index')) : ($this->Comm->executeTxt('添加失败', '/cooperations/add'));
        }
        //标题和面包屑 添加合作伙伴-后台管理
        $this->set('title_for_layout', '合作伙伴列表-后台管理');
        $this->set('crumb', '合作伙伴列表');
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
            $this->Comm->executeTxt('此条数据已经不存在', '/cooperations/index');
        }
        if (empty($this->data))
        {
            $this->data = $this->Cooperation->read(null, $id);
        }
        else
        {
            //排除当前id
            $data['Cooperation']['name'] = $this->data['Cooperation']['name'];
            $data['Cooperation']['id <>'] = $id;
            $exists = $this->Cooperation->find('all', array('conditions' => $data['Cooperation']));
            
            if ($exists)
            {
                $this->Comm->existYes('此合作伙伴已经存在', '/cooperations/edit/'.$id);
            }
            else
            {
                $this->Cooperation->id = $id;
                $result = $this->Cooperation->save($this->data);
                $result ? ($this->Comm->executeTxt('修改成功', '/cooperations/index')) : ($this->Comm->executeTxt('修改失败', '/cooperations/edit'));
            }
        }

        //标题和面包屑
        $this->set('title_for_layout', '修改合作伙伴-后台管理');
        $this->set('crumb', '修改合作伙伴');
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
            $this->Cooperation->delete($id);
            $this->Comm->executeTxt('删除成功', '/cooperations/index');
            exit;
        }
        else
        {
            $this->Comm->executeTxt('删除失败', '/cooperations/index');
        }
    }

     /**
     * 获取分类列表
     */
    function getCategoryLists()
    {   
        $data = array();

        //调用分类的Model
        $this->loadModel('Cooperationcate');
        $cates = $this->Cooperationcate->find('all');
        foreach ($cates as $v)
        {
            $data[$v['Cooperationcate']['id']] = $v['Cooperationcate']['name'];
        }
        return $data;
    }
}
