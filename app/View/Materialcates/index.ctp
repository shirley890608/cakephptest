<table class="table"> 
    <thead> 
    <!-- <th>ID</th> -->
    <th>分类名称</th>
    <th>添加时间</th>
    <th>修改时间</th>
    <th>操作</th> 
</thead> 
  <?php foreach($materialcates as $cates): ?> 
<tr>
    <!-- <td><?php echo $cates['Materialcate']['id']; ?></td>  -->
    <td><?php echo $cates['Materialcate']['name']; ?></td> 
    <td><?php echo date('Y-m-d H:i:s',$cates['Materialcate']['createtime']); ?></td>
    <td><?php echo date('Y-m-d H:i:s',$cates['Materialcate']['updatetime']); ?></td> 
    <td>
        <a href="/materialcates/edit/<?php echo $cates['Materialcate']['id'];?>">编辑</a>
        <a href="/materialcates/del/<?php echo $cates['Materialcate']['id'];?>">删除</a>
    </td>
</tr> 
  <?php endforeach; ?> 
</table>

<!--分页部分-->
<?php 
    if($allcount > $number)
    {
        echo $this->Paginator->first('首页');
        echo '&nbsp;&nbsp;&nbsp;';
        echo $this->Paginator->prev('上一页');
        echo '&nbsp;&nbsp;&nbsp;';
        echo $this->Paginator->numbers();
        echo '&nbsp;&nbsp;&nbsp;';
        echo $this->Paginator->next('下一页');
        echo '&nbsp;&nbsp;&nbsp;';
        echo $this->Paginator->last('尾页');
        echo '&nbsp;&nbsp;&nbsp;';
        echo $this->Paginator->counter(
            '共{:pages} 页&nbsp;'
        );
    }
    echo $this->Paginator->counter(
            '共{:count}条记录'
        );
?>

