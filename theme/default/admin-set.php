<?php if (!defined ('SYSTEM_ROOT')) exit (); ?>
<!-- 头部引入 -->
<?php require_once 'header.php'; ?>

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="callout callout-info">
                    <h4>授权信息</h4>
                    <p>标识符 : <?php echo $siteinfo['api']['skey']; ?></p>
                </div>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">站点管理</h3>
                    </div>
                    
                    <div class="box-body table-responsive">
                        <div>
                            <div>
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td>站点地址</td>
                                            <td><input type="text" name="siteurl" id="siteurl" value="<?php echo $siteinfo['url']; ?>" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>站点名称</td>
                                            <td><input type="text" name="sitename" id="sitename" value="<?php echo $siteinfo['name']; ?>" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>备案号</td>
                                            <td><input type="text" name="beian" id="beian" value="<?php echo system_getbeian(); ?>" class="form-control"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <input type="submit" id="set" class="btn btn-primary" value="执行操作">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
  
<!-- 底部引入 -->
<script src="<?php echo $siteinfo['theme']['url']; ?>/assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="<?php echo $siteinfo['theme']['url']; ?>/assets/plugins/notice/notice.js"></script>

<script>
$("#set").click(function(){ 
    var siteurl = $("#siteurl").val();  
    var sitename = $("#sitename").val(); 
    var beian = $("#beian").val(); 
    
    // Ajax 提交开始
    $.ajax({ 
        type: "post", 
        url : "./ajax.php?mod=admin-set", 
        dataType: "json",
        data: "siteurl="+siteurl+"&sitename="+sitename+"&sitebeian="+beian, 
        success: function(result){
            if (result.code == 0) {
                notie('success', '提交成功', true)
            } else if (result.code == -1) {
                notie('error', result.msg, true)
            }
        } 
    });
});

</script>

<?php require_once 'footer.php'; ?>

