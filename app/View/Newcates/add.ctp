<?php //echo $this->Form->create('Newcate');?>
<form id="PostAddForm" method="post" action="/Newcates/add">
	<div style="display:none">
        <input type="hidden" name="data[Newcate][createtime]" value="<?php echo time();?>">
        <input type="hidden" name="data[Newcate][updatetime]" value="<?php echo time();?>">
    </div>
	<table class="table" style="width:400px;">
    <tr>
        <td>
           <input type="text" name="data[Newcate][name]" placeholder="请输入名称">
           <button type="submit" class="btn btn-default">提交</button>
        </td>
    </tr>
</table>
</form>
