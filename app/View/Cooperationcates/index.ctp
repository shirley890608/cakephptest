<table class="table"> 
    <thead> 
    <!-- <th>ID</th> -->
    <th>分类名称</th>
    <th>添加时间</th>
    <th>修改时间</th>
    <th>操作</th> 
</thead> 
  <?php foreach($cooperationcates as $cates): ?> 
<tr>
    <!-- <td><?php echo $cates['Cooperationcate']['id']; ?></td>  -->
    <td><?php echo $cates['Cooperationcate']['name']; ?></td> 
    <td><?php echo date('Y-m-d H:i:s',$cates['Cooperationcate']['createtime']); ?></td>
    <td><?php echo date('Y-m-d H:i:s',$cates['Cooperationcate']['updatetime']); ?></td> 
    <td>
        <a href="/cooperationcates/edit/<?php echo $cates['Cooperationcate']['id'];?>">编辑</a>
        <a href="/cooperationcates/del/<?php echo $cates['Cooperationcate']['id'];?>">删除</a>
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

