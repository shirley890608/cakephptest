<table class="table"> 
    <thead> 
    <th>ID</th>
    <th>分类</th>
    <th>标题</th>
    <th>作者</th>
    <th>添加时间</th>
    <th>修改时间</th>
    <th>操作</th> 
</thead> 
  <?php foreach($shops as $info): ?> 
<tr>
    <td><?php echo $info['Shop']['id']; ?></td>
    <td><?php echo ($info['Shop']['cateid'] >0) ? $catedata[$info['Shop']['cateid']] : $info['Shop']['cateid'];?></td>
    <td><?php echo $info['Shop']['title']; ?></td>
    <td><?php echo $info['Shop']['author']; ?></td>
    <td><?php echo date('m月d日H时',$info['Shop']['createtime']); ?></td>
    <td><?php echo date('m月d日H时',$info['Shop']['updatetime']); ?></td>
    <td>
        <a href="/shops/edit/<?php echo $info['Shop']['id'];?>">编辑</a>
        <a href="/shops/del/<?php echo $info['Shop']['id'];?>">删除</a>
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

