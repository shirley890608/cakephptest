<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');
header("Content-type:text/html;charset=utf-8");

class MaterialcatesController extends AppController
{

    //表名
    var $name = 'Materialcates';
    //设置每页多少条数据
    public $paginate = array('limit' => 10);
    //公共方法
    var $components = array('Comm', 'Sess', 'Cookie');

    /**
     * cate index list
     */
    function index()
    {   
        //登录控制
        $this->Sess->getSessionFromLogin();

        //标题和面包屑
        $this->set('title_for_layout', '咖啡物料分类-后台管理');
        $this->set('crumb', '咖啡物料分类');
        

        //数据部分
        $materialcates = $this->Materialcate->find('all', array(
                'fields' => array(
                    'Materialcate.id',
                    'Materialcate.name',
                    'Materialcate.status',
                    'Materialcate.createtime',
                    'Materialcate.updatetime'
                ),
                'order by' => 'Materialcate.id DESC'
            )
        );
        //总记录数
        $this->set('allcount', count($materialcates));
        //每页条数
        $this->set('number', 10);
        //分页参数
        $this->set('materialcates', $materialcates);
        //将分页写入到模板
        $this->set('materialcates', $this->paginate());
        //模板咖啡物料
        $this->layout = 'Admin/default';
    }

    /**
     * add news
     * @author shirley
     */
    function add()
    {   
        //登录控制
        $this->Sess->getSessionFromLogin();

        //标题和面包屑
        $this->set('title_for_layout', '开店方案分类列表-后台管理');
        $this->set('crumb', '添加开店方案分类');
        //数据部分
        if (!empty($this->data))
        {
            if ($this->Materialcate->find('all', array('conditions' => array('name' => $this->data['Materialcate']['name']))))
            {
                $this->Comm->existYes('分类名已经存在', '/materialcates/add');
            }
            else
            {
                $retid = $this->Materialcate->save($this->data);
                $retid ? ($this->Comm->executeTxt('添加成功', '/materialcates/index')) : ($this->Comm->executeTxt('添加失败', '/materialcates/add'));
            }
        }
        //模板部分
        $this->layout = 'Admin/default';
    }

    /**
     * edit
     * @author shirley
     * @param type $id
     */
    function edit($id = null)
    {   
        //登录控制
        $this->Sess->getSessionFromLogin();

        //标题和面包屑
        $this->set('title_for_layout', '编辑开店方案分类-后台管理');
        $this->set('crumb', '编辑分类');
        //数据部分
        if (!$id && empty($this->data))
        {
            $this->Session->setFlash('Invalid Materialcate', true);
            $this->redirect(array('action' => 'index'));
        }
        if (empty($this->data))
        {
            $this->data = $this->Materialcate->read(null, $id);
        }
        else
        {
            $data = $this->data;
            //排除当前id
            $data['Materialcate']['id <>'] = $id;
            $exists = $this->Materialcate->find('all', array('conditions' => $data['Materialcate']));
            if ($exists)
            {
                $this->Comm->existYes('此分类名已经存在', '/materialcates/edit/'.$id);
            }
            else
            {
                $this->Materialcate->id = $id;
                $result = $this->Materialcate->save($this->data);
                $result ? ($this->Comm->executeTxt('修改成功', '/materialcates/index')) : ($this->Comm->executeTxt('修改失败', '/materialcates/edit'));
            }
        }

        //模板部分
        $this->layout = 'Admin/default';
    }
    
    /**
     * delete
     * @param type $id
     */
    function del($id = null)
    {   

        if($id)
        {           
            $this->Materialcate->delete($id);
            $this->Comm->executeTxt('删除成功', '/materialcates/index');
            exit;
        }
        else
        {
            $this->Comm->executeTxt('删除失败', '/materialcates/index');
        }
    }
}
