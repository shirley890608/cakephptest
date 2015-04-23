<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');
header("Content-type:text/html;charset=utf-8");
class NewcatesController extends AppController
{

    //表名
    var $name = 'Newcates';
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
        $this->set('title_for_layout', '信息分类列表-后台管理');
        $this->set('crumb', '信息分类列表');
        //模板
        $this->layout = 'Admin/default';

        //数据部分
        $newcates = $this->Newcate->find('all', array(
                'fields' => array(
                    'Newcate.id',
                    'Newcate.name',
                    'Newcate.status',
                    'Newcate.createtime'
                ),
                'order by' => 'Newcate.id DESC'
            )
        );
        //总记录数
        $this->set('allcount', count($newcates));
        //每页条数
        $this->set('number', 10);
        //分页参数
        $this->set('newcates', $newcates);
        //将分页写入到模板
        $this->set('newcates', $this->paginate());
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
        $this->set('title_for_layout', '添加资讯分类-后台管理');
        $this->set('crumb', '添加分类');
        //数据部分
        if (!empty($this->data))
        {
            if ($this->Newcate->find('all', array('conditions' => array('name' => $this->data['Newcate']['name']))))
            {
                $this->Comm->existYes('分类名已经存在', '/newcates/add');
            }
            else
            {
                $retid = $this->Newcate->save($this->data);
                $retid ? ($this->Comm->executeTxt('添加成功', '/newcates/index')) : ($this->Comm->executeTxt('添加失败', '/newcates/add'));
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
        $this->set('title_for_layout', '编辑新闻分类-后台管理');
        $this->set('crumb', '编辑分类');
        //数据部分
        if (!$id && empty($this->data))
        {
            $this->Session->setFlash('Invalid Newcate', true);
            $this->redirect(array('action' => 'index'));
        }
        if (empty($this->data))
        {
            $this->data = $this->Newcate->read(null, $id);
        }
        else
        {
            $data = $this->data;
            //排除当前id
            $data['Newcate']['id <>'] = $id;
            $exists = $this->Newcate->find('all', array('conditions' => $data['Newcate']));
            if ($exists)
            {
                $this->Comm->existYes('此分类名已经存在', '/newcates/edit/'.$id);
            }
            else
            {
                $this->Newcate->id = $id;
                $result = $this->Newcate->save($this->data);
                $result ? ($this->Comm->executeTxt('修改成功', '/newcates/index')) : ($this->Comm->executeTxt('修改失败', '/newcates/edit'));
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
            $this->Newcate->delete($id);
            $this->Comm->executeTxt('删除成功', '/newcates/index');
            exit;
        }
        else
        {
            $this->Comm->executeTxt('删除失败', '/newcates/index');
        }
    }
}
