<style> th{width: 70px;}</style>
<link href="/app/webroot/js/ueditor/themes/default/css/ueditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" charset="utf-8" src="/app/webroot/js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/app/webroot/js/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/app/webroot/js/ueditor/ueditor_self.js"></script>
<script type="text/javascript" src="/app/webroot/js/ueditor/lang/zh-cn/zh-cn.js"></script>
<?php  $news = $this->data;?>
<?php echo $this->Form->create('Shop');?> 
    <div style="display:none">
        <input type="hidden" name="data[Shop][id]" value="<?php echo $news['Shop']['id'];?>"> 
        <input type="hidden" name="data[Shop][updatetime]" value="<?php echo $news['Shop']['updatetime'];?>">
    </div>
    <table class="table" style="width:100%;">
        <tr>
            <th style="min-width:70px;">标 题：</th>
            <td>
                <input type="text" style="width: 200px;" class="form-control" id="title" name="data[Shop][title]" value="<?php echo $news['Shop']['title'];?>">
            </td>
        </tr>

        <tr>
            <th>分 类：</th>
            <td>
                <select name="data[Shop][cateid]" id="cateidsel" class="form-control" style="width:200px;">
                    <option>请选择</option>
                    <?php foreach ($catedata as $k => $v) { ?>
                    <option value="<?php echo $k;?>"><?php echo $v;?></option>
                    <?php }?>
                </select>
            </td>
        </tr>

        <tr>
            <th>作 者：</th>
            <td>
                <input type="text" style="width: 200px;" class="form-control" id="author" name="data[Shop][author]" value="<?php echo $news['Shop']['author'];?>" placeholder="请输入作者">
            </td>
        </tr>
        
        <tr>
            <th>内 容：</th>
            <td>
                <textarea id="editor" name="data[Shop][content]"style="width:98%;min-height:200px;">
                    <?php echo $news['Shop']['content'];?> 
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
    $("#cateidsel").val("<?php echo $news['Shop']['cateid'];?>");
</script>