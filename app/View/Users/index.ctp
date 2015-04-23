
<div class="users index">
	<a><?php echo $this->Html->link('添加新用户', array('action' => 'add')); ?></a>
	<table class="table" cellpadding="0" cellspacing="0">
	<tr>
			<th>ID</th>
			<th>用户名</th>
			<th>添加时间</th>
			<th>修改时间</th>
			<th class="actions">操作</th>
	</tr>
	<?php
	foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['group_id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link('查看', array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link('修改', array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink('删除', array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>	

	<div class="paging">
	<?php		
		echo $this->Paginator->prev('上一页', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ' '));
		echo $this->Paginator->next('下一页', array(), null, array('class' => 'next disabled'));
		echo $this->Paginator->counter(array('format' => '第{:page}页 共 {:count}条数据'));
	?>
	</div>
</div>






