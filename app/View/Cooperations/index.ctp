<table class="table"> 
    <thead> 
    <th>ID</th>
    <th>分类</th>
    <th>合作伙伴名称</th>
    <th>添加时间</th>
    <th>修改时间</th>
    <th>操作</th> 
</thead> 
  <?php foreach($cooperations as $info): ?> 
<tr>
    <td><?php echo $info['Cooperation']['id']; ?></td>
    <td><?php echo ($info['Cooperation']['cateid'] >0) ? $catedata[$info['Cooperation']['cateid']] : $info['Cooperation']['cateid'];?></td>
    <td><?php echo $info['Cooperation']['name']; ?></td>
    <td><?php echo date('m月d日H时',$info['Cooperation']['createtime']); ?></td>
    <td><?php echo date('m月d日H时',$info['Cooperation']['updatetime']); ?></td>
    <td>
        <a href="/cooperations/edit/<?php echo $info['Cooperation']['id'];?>">编辑</a>
        <a href="/cooperations/del/<?php echo $info['Cooperation']['id'];?>">删除</a>
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

