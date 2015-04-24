<style> th{width: 70px;}</style>
<link href="/app/webroot/js/ueditor/themes/default/css/ueditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" charset="utf-8" src="/app/webroot/js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/app/webroot/js/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/app/webroot/js/ueditor/ueditor_self.js"></script>
<script type="text/javascript" src="/app/webroot/js/ueditor/lang/zh-cn/zh-cn.js"></script>
<?php  $news = $this->data;?>
<?php echo $this->Form->create('Cooperation');?> 
    <div style="display:none">
        <input type="hidden" name="data[Cooperation][id]" value="<?php echo $news['Cooperation']['id'];?>"> 
        <input type="hidden" name="data[Cooperation][updatetime]" value="<?php echo $news['Cooperation']['updatetime'];?>">
    </div>
    <table class="table" style="width:100%;">       
        <tr>
            <th>分 类：</th>
            <td>
                <select name="data[Cooperation][cateid]" id="cateidsel" class="form-control" style="width:200px;">
                    <option>请选择</option>
                    <?php foreach ($catedata as $k => $v) { ?>
                    <option value="<?php echo $k;?>"><?php echo $v;?></option>
                    <?php }?>
                </select>
            </td>
        </tr>
        
        <tr>
            <th style="min-width:130px;">物料头图：</th>
            <td>
              <input type="text" style="width: 200px;" class="form-control" id="pic" name="data[Cooperation][pic]" value="<?php echo $news['Cooperation']['pic'];?>">
            </td>
        </tr>


        <tr>
            <th style="min-width:130px;">物料名称：</th>
            <td>
                <input type="text" style="width: 200px;" class="form-control" id="name" name="data[Cooperation][name]" value="<?php echo $news['Cooperation']['name'];?>">
            </td>
        </tr>

        <tr>
            <th>物料详情：：</th>
            <td>
                <textarea id="editor" name="data[Cooperation][detail]"style="width:98%;min-height:200px;">
                    <?php echo $news['Cooperation']['detail'];?> 
                </textarea>
            </td>
        </tr>
        <tr>
            <th></th>
            <td><button type="submit" class="btn btn-default">提 交</button></td>
        </tr>
    </table>

<script type="text/javascript">
    //默认分类
    $("#cateidsel").val("<?php echo $news['Cooperation']['cateid'];?>");
</script>