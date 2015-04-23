<div class="users form">


<?php //echo $this->Form->create('Newcate');?>
<form id="PostAddForm" method="post" action="/users/add">
	<table class="table" style="width:300px;">
	    <tr>
	        <td>
	            <input type="text" style="width: 200px;" class="form-control" id="username" name="username" placeholder="请输入用户名">
	            <input type="text" style="width: 200px;" class="form-control" id="password" name="password" placeholder="请输入密码">
	            <input type="hidden"class="form-control" id="created" name="created" value="<?php echo time();?>">
	            <input type="hidden"class="form-control" id="modified" name="modified" value="<?php echo time();?>">
	        </td>
	        <td>
	            <button type="submit" class="btn btn-default">提交</button>            
	        </td>
	    </tr>    
	</table>
</form>
</div>


