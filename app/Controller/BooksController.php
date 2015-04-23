<?php

/*
 * To change this template, choose Tools | Templates 
 * and open the template in the editor. 
 */
App::uses('AppController', 'Controller');

class BooksController extends AppController
{

    var $name = 'Books';

    //var $scaffold; 去掉脚手架自动创建的CURD模型

    function index()
    {
        $books = $this->Book->find('all', array(
            'fields' => array(
                'Book.id',
                'Book.isbn',
                'Book.title',
                'Book.author_name'
            ),
            'order' => 'Book.id DESC'
                )
        );
        $this->set('books', $books);
    }

    function add()
    {
        if (!empty($this->data))
        {
            $this->Book->create();
            if (!!$this->Book->save($this->data))
            {
                $this->Session->setFlash('Book is Saved!', true);
                //跳转到首页
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function edit($id = null)
    {
        if (!$id && empty($this->data))
        {
            $this->Session->setFlash('Invalid Book', true);
            $this->redirect(array('action' => 'index'));
        }
        if (empty($this->data))
        {
            $this->data = $this->Book->read(null, $id);
        }
        else
        {
            $this->Book->create();
            if (!!$this->Book->save($this->data))
            {
                $this->Session->setFlash('已经更新', true);
                $this->redirect(array('action' => 'index'), null, true);
            }
        }
    }

    function delbooks($id = NULL)
    {
        if (!$id)
        {
            $this->Session->setFlash('Invalid Book', true);
        }
        else if ($this->Book->delete($id))
        {
            $this->Session->setFlash('已经删除', true);
        }
        else
        {
            $this->Session->setFlash('删除失败', true);
        }
        $this->redirect(array('action' => 'index'), null, true);
    }

}