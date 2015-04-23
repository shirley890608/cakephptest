<?php 
$uname = $this->Session->read('username'); 
if($uname == 'admin' )
{
    $pess =1;
}else{
    $pess = 0;
}
?>

<table class="table"> 
    <thead> 
    <!-- <th>ID</th> -->
    <th>分类名称</th>
    <th>添加时间</th>
    <th>修改时间</th>
    <?php if($pess == '1'){ ?>
    <th>操作</th> 
    <?php }?>
</thead> 
  <?php foreach($aboutcates as $cates): ?> 
<tr>
    <!-- <td><?php echo $cates['Aboutcate']['id']; ?></td>  -->
    <td><?php echo $cates['Aboutcate']['name']; ?></td> 
    <td><?php echo date('Y-m-d H:i:s',$cates['Aboutcate']['createtime']); ?></td>
    <td><?php echo date('Y-m-d H:i:s',$cates['Aboutcate']['updatetime']); ?></td> 
    <?php if($pess == '1') { ?>
    <td>
        <a href="/aboutcates/edit/<?php echo $cates['Aboutcate']['id'];?>">编辑</a>
        <a href="/aboutcates/del/<?php echo $cates['Aboutcate']['id'];?>">删除</a>
    </td>
    <?php }?>
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

