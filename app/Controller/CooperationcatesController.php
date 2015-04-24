<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');
header("Content-type:text/html;charset=utf-8");

class CooperationcatesController extends AppController
{

    //表名
    var $name = 'Cooperationcates';
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
        $this->set('title_for_layout', '合作伙伴分类-后台管理');
        $this->set('crumb', '合作伙伴分类');
        

        //数据部分
        $cooperationcates = $this->Cooperationcate->find('all', array(
                'fields' => array(
                    'Cooperationcate.id',
                    'Cooperationcate.name',
                    'Cooperationcate.status',
                    'Cooperationcate.createtime',
                    'Cooperationcate.updatetime'
                ),
                'order by' => 'Cooperationcate.id DESC'
            )
        );
        //总记录数
        $this->set('allcount', count($cooperationcates));
        //每页条数
        $this->set('number', 10);
        //分页参数
        $this->set('cooperationcates', $cooperationcates);
        //将分页写入到模板
        $this->set('cooperationcates', $this->paginate());
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
        $this->set('title_for_layout', '合作伙伴分类列表-后台管理');
        $this->set('crumb', '添加合作伙伴分类');
        //数据部分
        if (!empty($this->data))
        {
            if ($this->Cooperationcate->find('all', array('conditions' => array('name' => $this->data['Cooperationcate']['name']))))
            {
                $this->Comm->existYes('分类名已经存在', '/cooperationcates/add');
            }
            else
            {
                $retid = $this->Cooperationcate->save($this->data);
                $retid ? ($this->Comm->executeTxt('添加成功', '/cooperationcates/index')) : ($this->Comm->executeTxt('添加失败', '/cooperationcates/add'));
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
        $this->set('title_for_layout', '编辑合作伙伴分类-后台管理');
        $this->set('crumb', '编辑合作伙伴分类');
        //数据部分
        if (!$id && empty($this->data))
        {
            $this->Session->setFlash('Invalid Cooperationcate', true);
            $this->redirect(array('action' => 'index'));
        }
        if (empty($this->data))
        {
            $this->data = $this->Cooperationcate->read(null, $id);
        }
        else
        {
            $data = $this->data;
            //排除当前id
            $data['Cooperationcate']['id <>'] = $id;
            $exists = $this->Cooperationcate->find('all', array('conditions' => $data['Cooperationcate']));
            if ($exists)
            {
                $this->Comm->existYes('此分类名已经存在', '/cooperationcates/edit/'.$id);
            }
            else
            {
                $this->Cooperationcate->id = $id;
                $result = $this->Cooperationcate->save($this->data);
                $result ? ($this->Comm->executeTxt('修改成功', '/cooperationcates/index')) : ($this->Comm->executeTxt('修改失败', '/cooperationcates/edit'));
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
            $this->Cooperationcate->delete($id);
            $this->Comm->executeTxt('删除成功', '/cooperationcates/index');
            exit;
        }
        else
        {
            $this->Comm->executeTxt('删除失败', '/cooperationcates/index');
        }
    }
}
