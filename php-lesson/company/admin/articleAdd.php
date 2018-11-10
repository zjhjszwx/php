<?php
    require_once "../tools.php";
    $db = conn();

    //区分提交操作
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // print_r($_POST);
        $type = $_POST['type'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $sql = "insert into nx_article(type_id,title,content) values (:type_id,:title,:content)";
        $stmt = $db->prepare($sql);
        $stmt->execute([':type_id'=>$type,':title'=>$title,':content'=>$content]);
        //查看影响的行数，是否成功
        $row = $stmt->rowCount();
        if($row > 0){
            echo "<script>location.href='articleList.php'</script>";
        }else {
            
            exit('error');
        }
    }
    $sql = "select * from nx_type";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $types = $stmt->fetchAll();
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
                添加文章
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
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>选择分类</label>
                            <select name="type" id="" class="form-control">
                                <option value="">选择分类</option>
                                <?php foreach($types as $type){?>
                                    <option value=<?=$type['id']?>><?=$type['name']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>文章内容</label>
                            <!-- <textarea name="content" class="form-control" id="" cols="30" rows="10"></textarea>
                             -->
                             <script id="container" name="content"></script>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="添加文章">
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

<script src="./editor/ueditor.config.js"></script>
    <script src="./editor/ueditor.all.js"></script>
    <script>
        var ue = UE.getEditor("container");

    </script>
<?php require_once "footer.php";?>

</body>
</html>

