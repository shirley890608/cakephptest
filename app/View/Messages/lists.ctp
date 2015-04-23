<h1>Lists</h1>

<table>
	<tr>
		<td>ID</td>
		<td>Name</td>
		<td>Email</td>
		<td>Messages</td>
		<td>Operation</td>
	</tr>
	<?php foreach ($lists as $v):?>
	<tr>
		<td><?php echo $v['Message']['id'];?></td>
		<td><?php echo $v['Message']['name'];?></td>
		<td><?php echo $v['Message']['email'];?></td>
		<td><?php echo $v['Message']['message'];?></td>
		<td>
			<?php echo $this->Html->link('查看',array('action'=>'view',$v['Message']['id'])); ?>
			<?php echo $this->Html->Link('编辑',array('controller'=>'messages','action'=>'edit'),$v['Message']['id']); ?>
		</td>
	</tr>
<?php endforeach;  ?>
<?php unset($lists);?>
</table>