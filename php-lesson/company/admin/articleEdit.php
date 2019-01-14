<?php
    require_once "../tools.php";
    $db = conn();
    $id = get('id');
    $sql = "select * from nx_type";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $types = $stmt->fetchAll();
    //区分提交操作
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // print_r($_POST);
        $type = $_POST['type'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $sql = "update nx_article set type_id=:type_id,title=:title,content=:content where id=:id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':type_id'=>$type,':title'=>$title,':content'=>$content,':id'=>$id]);
        //查看影响的行数，是否成功
        $row = $stmt->rowCount();

        if($row > 0){
            header('Location:articleList.php');
        }
        // exit('error');
    }
    if(isset($id)){
        $sql = "select * from nx_article where id=:id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id'=>$id]);
        $article = $stmt->fetch();
        // print_r($article);
    }
    
    
    // print_r($types);
?>
<?php require_once "top.php"; ?>

    <?php require_once "header.php"; ?>

    <?php require_once "side.php"; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                编辑文章
                <small>it all starts here</small>
            </h1>
            <!-- <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <!-- <h3 class="box-title">文章</h3> -->

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <form method="post">
                        <div class="form-group">
                            <label>文章标题</label>
                            <input value="<?=$article['title']?>" type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>选择分类</label>
                            <select name="type" id="" class="form-control">
                                <option value="">选择分类</option>
                                <?php foreach($types as $type){?>
                                    <option <?php echo $article['type_id']==$type['id']?"selected":"";?> value=<?=$type['id']?>><?=$type['name']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>文章内容</label>
                            <textarea name="content"  class="form-control" id="" cols="30" rows="10"><?=$article['content']?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="编辑文章">
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
                <!-- <div class="box-footer">
                    Footer
                </div> -->
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php require_once "footer.php";?>

</body>
</html>