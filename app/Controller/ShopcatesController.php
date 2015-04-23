<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');
header("Content-type:text/html;charset=utf-8");

class ShopcatesController extends AppController
{

    //表名
    var $name = 'Shopcates';
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
        $this->set('title_for_layout', '开店方案分类-后台管理');
        $this->set('crumb', '开店方案分类');
        //模板
        $this->layout = 'Admin/default';

        //数据部分
        $shopcates = $this->Shopcate->find('all', array(
                'fields' => array(
                    'Shopcate.id',
                    'Shopcate.name',
                    'Shopcate.status',
                    'Shopcate.createtime',
                    'Shopcate.updatetime'
                ),
                'order by' => 'Shopcate.id DESC'
            )
        );
        //总记录数
        $this->set('allcount', count($shopcates));
        //每页条数
        $this->set('number', 10);
        //分页参数
        $this->set('shopcates', $shopcates);
        //将分页写入到模板
        $this->set('shopcates', $this->paginate());
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
            if ($this->Shopcate->find('all', array('conditions' => array('name' => $this->data['Shopcate']['name']))))
            {
                $this->Comm->existYes('分类名已经存在', '/shopcates/add');
            }
            else
            {
                $retid = $this->Shopcate->save($this->data);
                $retid ? ($this->Comm->executeTxt('添加成功', '/shopcates/index')) : ($this->Comm->executeTxt('添加失败', '/shopcates/add'));
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
            $this->Session->setFlash('Invalid Shopcate', true);
            $this->redirect(array('action' => 'index'));
        }
        if (empty($this->data))
        {
            $this->data = $this->Shopcate->read(null, $id);
        }
        else
        {
            $data = $this->data;
            //排除当前id
            $data['Shopcate']['id <>'] = $id;
            $exists = $this->Shopcate->find('all', array('conditions' => $data['Shopcate']));
            if ($exists)
            {
                $this->Comm->existYes('此分类名已经存在', '/shopcates/edit/'.$id);
            }
            else
            {
                $this->Shopcate->id = $id;
                $result = $this->Shopcate->save($this->data);
                $result ? ($this->Comm->executeTxt('修改成功', '/shopcates/index')) : ($this->Comm->executeTxt('修改失败', '/shopcates/edit'));
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
            $this->Shopcate->delete($id);
            $this->Comm->executeTxt('删除成功', '/shopcates/index');
            exit;
        }
        else
        {
            $this->Comm->executeTxt('删除失败', '/shopcates/index');
        }
    }
}
