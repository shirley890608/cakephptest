<table class="table"> 
    <thead> 
    <th>ID</th>
    <th>姓名</th>
    <th>邮箱</th>
    <th>手机</th>
    <th>传真</th>
    <th>地址</th>
    <th>内容</th>
    <th>添加时间</th>
    <th>操作</th>
</thead> 
  <?php foreach($words as $info): ?> 
<tr>
    <td><?php echo $info['Word']['id']; ?></td>
    <td><?php echo $info['Word']['name']; ?></td>
    <td><?php echo $info['Word']['email']; ?></td>
    <td><?php echo $info['Word']['phone']; ?></td>
    <td><?php echo $info['Word']['fax']; ?></td>
    <td><?php echo $info['Word']['address']; ?></td>
    <td>
    <div style="max-width:300px;max-height:140px;overflow:hidden;display:block;word-break: break-all;word-wrap: break-word;">
        <?php echo $info['Word']['content']; ?>
    </div>
    </td>
    <td><?php echo date('m月d日H时',$info['Word']['createtime']); ?></td>    <td>
        <a href="/words/del/<?php echo $info['Word']['id'];?>">删除</a>
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

