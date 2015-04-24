<?php

App::uses('AppController', 'Controller');
header("Content-type:text/html;charset=utf-8");

class WordsController extends AppController
{

    //表名
    var $name = 'Words';
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
        $this->set('title_for_layout', '在线留言列表-后台管理');
        $this->set('crumb', '在线留言列表');
        //调用分类的Model    

        //数据部分
        $words = $this->Word->find('all');
        //总记录数
        $this->set('allcount', count($words));
        //每页条数
        $this->set('number', 10);
        //分页参数
        $this->set('words', $words);
        //将分页写入到模板
        $this->set('words', $this->paginate());
        
        //模板
        $this->layout = 'Admin/default';	
    }

    /**
     * delete
     * @param type $id
     */
    function del($id = null)
    {

        if ($id)
        {
            $this->Word->delete($id);
            $this->Comm->executeTxt('删除成功', '/words/index');
            exit;
        }
        else
        {
            $this->Comm->executeTxt('删除失败', '/words/index');
        }
    }
}