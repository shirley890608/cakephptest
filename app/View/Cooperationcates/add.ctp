<?php //echo $this->Form->create('Newcate');?>
<form id="PostAddForm" method="post" action="/Cooperationcates/add">
	<div style="display:none">
        <input type="hidden" name="data[Cooperationcate][createtime]" value="<?php echo time();?>">
        <input type="hidden" name="data[Cooperationcate][updatetime]" value="<?php echo time();?>">
    </div>
	<table class="table" style="width:400px;">
    <tr>
        <td>
           <input type="text" name="data[Cooperationcate][name]" placeholder="请输入名称">
           <button type="submit" class="btn btn-default">提交</button>
        </td>
    </tr>
</table>
</form>





