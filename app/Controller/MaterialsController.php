<?php

App::uses('AppController', 'Controller');
header("Content-type:text/html;charset=utf-8");

class MaterialsController extends AppController
{

    //表名
    var $name = 'Materials';
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
        $this->set('title_for_layout', '咖啡物料列表-后台管理');
        $this->set('crumb', '咖啡物料列表');
        //调用分类的Model    

        //数据部分
        $materials = $this->Material->find('all');
        //总记录数
        $this->set('allcount', count($materials));
        //每页条数
        $this->set('number', 10);
        //分页参数
        $this->set('materials', $materials);
        //将分页写入到模板
        $this->set('materials', $this->paginate());
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
                $this->Material->create();
                $addid = $this->Material->save($this->data);
            }
            $addid ? ($this->Comm->executeTxt('添加成功', '/materials/index')) : ($this->Comm->executeTxt('添加失败', '/materials/add'));
        }
        //标题和面包屑 添加咖啡物料-后台管理
        $this->set('title_for_layout', '咖啡物料列表-后台管理');
        $this->set('crumb', '咖啡物料列表');
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
            $this->Comm->executeTxt('此物料已经不存在', '/materials/index');
        }
        if (empty($this->data))
        {
            $this->data = $this->Material->read(null, $id);
        }
        else
        {
            //排除当前id
            $data['Material']['name'] = $this->data['Material']['name'];
            $data['Material']['id <>'] = $id;
            $exists = $this->Material->find('all', array('conditions' => $data['Material']));
            
            if ($exists)
            {
                $this->Comm->existYes('此物料已经存在', '/materials/edit/'.$id);
            }
            else
            {
                $this->Material->id = $id;
                $result = $this->Material->save($this->data);
                $result ? ($this->Comm->executeTxt('修改成功', '/materials/index')) : ($this->Comm->executeTxt('修改失败', '/materials/edit'));
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
            $this->Material->delete($id);
            $this->Comm->executeTxt('删除成功', '/materials/index');
            exit;
        }
        else
        {
            $this->Comm->executeTxt('删除失败', '/materials/index');
        }
    }

     /**
     * 获取分类列表
     */
    function getCategoryLists()
    {   
        $data = array();

        //调用分类的Model
        $this->loadModel('Materialcate');
        $cates = $this->Materialcate->find('all');
        foreach ($cates as $v)
        {
            $data[$v['Materialcate']['id']] = $v['Materialcate']['name'];
        }
        return $data;
    }
}
