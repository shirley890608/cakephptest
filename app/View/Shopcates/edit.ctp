<?php

echo $this->Form->create('Shopcate');?>
<div style="display:none">
        <input type="hidden" name="data[Shopcate][updatetime]" value="<?php echo strtotime('now');?>">        
    </div>
<table class="table" style="width:400px;">
    <tr>
        <td>
            <fieldset> 
                <?php 
                    echo $this->Form->input(
                         'name',
                            array('label' => '分类名称：')
                );
                ?> 
            </fieldset>
        </td>
        <td>
            <button type="submit" class="btn btn-default">提交</button>
        </td>
    </tr>
</table>
