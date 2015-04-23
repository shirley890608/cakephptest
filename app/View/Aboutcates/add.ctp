<form id="PostAddForm" method="post" action="/aboutcates/add">
	<div style="display:none">
        <input type="hidden" id="createtime" name="createtime" value="<?php echo time();?>">
	    <input type="hidden" name="updatetime" id="updatetime" value="<?php echo strtotime('now');?>"> 
    </div>

	<table class="table" style="width:300px;">
	    <tr>
	        <td>
	            <input type="text" style="width: 200px;" class="form-control" id="name" name="name" placeholder="请输入名称">

	        </td>
	        <td>
	            <button type="submit" class="btn btn-default">提交</button>            
	        </td>
	    </tr>    
	</table>
</form>







