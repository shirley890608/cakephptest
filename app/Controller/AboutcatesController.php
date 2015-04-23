<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');
header("Content-type:text/html;charset=utf-8");

class AboutcatesController extends AppController
{

    //表名
    var $name = 'Aboutcates';
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
        $this->set('title_for_layout', '关于我们分类-后台管理');
        $this->set('crumb', '关于我们分类');
        //模板
        $this->layout = 'Admin/default';

        //数据部分
        $aboutcates = $this->Aboutcate->find('all', array(
                'fields' => array(
                    'Aboutcate.id',
                    'Aboutcate.name',
                    'Aboutcate.status',
                    'Aboutcate.createtime',
                    'Aboutcate.updatetime'
                ),
                'order by' => 'Aboutcate.id DESC'
            )
        );
        //总记录数
        $this->set('allcount', count($aboutcates));
        //每页条数
        $this->set('number', 10);
        //分页参数
        $this->set('aboutcates', $aboutcates);
        //将分页写入到模板
        $this->set('aboutcates', $this->paginate());
    }

    /**
     * add aboutcates
     * @author shirley
     */
    function add()
    {   
        //登录控制
        $this->Sess->getSessionFromLogin();
        
        //标题和面包屑
        $this->set('title_for_layout', '关于我们分类列表-后台管理');
        $this->set('crumb', '添加关于我们分类');
        //数据部分
        if (!empty($this->data))
        {
            if ($this->Aboutcate->find('all', array('conditions' => array('name' => $this->data['name']))))
            {
                $this->Comm->existYes('分类名已经存在', '/aboutcates/add');
            }
            else
            {
                $retid = $this->Aboutcate->save($this->data);
                $retid ? ($this->Comm->executeTxt('添加成功', '/aboutcates/index')) : ($this->Comm->executeTxt('添加失败', '/aboutcates/add'));
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
            $this->Session->setFlash('Invalid Aboutcate', true);
            $this->redirect(array('action' => 'index'));
        }
        if (empty($this->data))
        {
            $this->data = $this->Aboutcate->read(null, $id);
        }
        else
        {
            $data = $this->data;
            //排除当前id
            $data['Aboutcate']['id <>'] = $id;
            $exists = $this->Aboutcate->find('all', array('conditions' => $data['Aboutcate']));
            if ($exists)
            {
                $this->Comm->existYes('此分类名已经存在', '/aboutcates/edit/'.$id);
            }
            else
            {
                $this->Aboutcate->id = $id;
                $result = $this->Aboutcate->save($this->data);
                $result ? ($this->Comm->executeTxt('修改成功', '/aboutcates/index')) : ($this->Comm->executeTxt('修改失败', '/aboutcates/edit'));
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
            $this->Aboutcate->delete($id);
            $this->Comm->executeTxt('删除成功', '/aboutcates/index');
            exit;
        }
        else
        {
            $this->Comm->executeTxt('删除失败', '/aboutcates/index');
        }
    }
}
