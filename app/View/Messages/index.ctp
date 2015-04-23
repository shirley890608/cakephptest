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
  <?php foreach($messages as $info): ?> 
<tr>
    <td><?php echo $info['Message']['id']; ?></td>
    <td><?php echo ($info['Message']['cateid'] >0) ? $catedata[$info['Message']['cateid']] : $info['Message']['cateid'];?></td>
    <td><?php echo $info['Message']['title']; ?></td>
    <td><?php echo $info['Message']['author']; ?></td>
    <td><?php echo date('m月d日H时',$info['Message']['createtime']); ?></td>
    <td><?php echo date('m月d日H时',$info['Message']['updatetime']); ?></td>
    <td>
    <a href="/messages/edit/<?php echo $info['Message']['id'];?>">编辑</a>
    <a href="/messages/del/<?php echo $info['Message']['id'];?>">删除</a>
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

