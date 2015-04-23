<?php

App::uses('AppController', 'Controller');
header("Content-type:text/html;charset=utf-8");

class MessagesController extends AppController
{

    //表名
    var $name = 'Messages';
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
        $this->set('title_for_layout', '信息列表-后台管理');
        $this->set('crumb', '信息资讯列表');
        //调用分类的Model
        Controller::loadModel();
        $this->loadModel('Newcate'); 
        //数据部分
        $messages = $this->Message->find('all');
        //总记录数
        $this->set('allcount', count($messages));
        //每页条数
        $this->set('number', 10);
        //分页参数
        $this->set('messages', $messages);
        //将分页写入到模板
        $this->set('messages', $this->paginate());
        //分类
        $this->set('catedata',$this->Newcate->getCategoryLists());
        //模板
        $this->layout = 'admin/default';	
    }

    /**
     * add 
     * @author shirley
     */
    function add()
    {
        //登录控制
        $this->Sess->getSessionFromLogin();
        
        //调用分类的Model
        Controller::loadModel();
        $this->loadModel('Newcate');        
        
        //数据部分
        if (!empty($this->data))
        {
            if (!empty($this->data))
            {
                $this->Message->create();
                $addid = $this->Message->save($this->data);
            }
            $addid ? ($this->Comm->executeTxt('添加成功', '/messages/index')) : ($this->Comm->executeTxt('添加失败', '/messages/add'));
        }
        //标题和面包屑 添加资讯-后台管理
        $this->set('title_for_layout', '添加资讯-后台管理');
        $this->set('crumb', '添加资讯');
        $this->set('catedata',$this->Newcate->getCategoryLists());
        //模板部分
        $this->layout = 'admin/default';
    }

    /**
     * edit 
     * @author shirley
     */
    function edit($id = null)
    {   
        //登录控制
        $this->Sess->getSessionFromLogin();

        //调用分类的Model
        Controller::loadModel();
        $this->loadModel('Newcate'); 

        //数据部分
        if (!$id && empty($this->data))
        {   
            $this->Comm->executeTxt('此文章已经不存在', '/messages/index');
        }
        if (empty($this->data))
        {
            $this->data = $this->Message->read(null, $id);
        }
        else
        {
            //排除当前id
            $data['Message']['title'] = $this->data['Message']['title'];
            $data['Message']['id <>'] = $id;
            $exists = $this->Message->find('all', array('conditions' => $data['Message']));
            
            if ($exists)
            {
                $this->Comm->existYes('此文章已经存在', '/messages/edit/'.$id);
            }
            else
            {
                $this->Message->id = $id;
                $result = $this->Message->save($this->data);
                $result ? ($this->Comm->executeTxt('修改成功', '/messages/index')) : ($this->Comm->executeTxt('修改失败', '/messages/edit'));
            }
        }

        //标题和面包屑
        $this->set('title_for_layout', '修改资讯-后台管理');
        $this->set('crumb', '修改资讯');
        //模板部分
        $this->layout = 'admin/default';
        $this->set('catedata',$this->Newcate->getCategoryLists());
    }

    /**
     * delete
     * @param type $id
     */
    function del($id = null)
    {

        if ($id)
        {
            $this->Message->delete($id);
            $this->Comm->executeTxt('删除成功', '/messages/index');
            exit;
        }
        else
        {
            $this->Comm->executeTxt('删除失败', '/messages/index');
        }
    }

}
