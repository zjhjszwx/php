<?php

session_start();
if(!isset($_SESSION['user'])){
    // echo "<script>location.href='login.php'</script>";
}



require_once "../tools.php";
$db = conn();
$pageNum = get('page');
if($pageNum=="") $pageNum=1;
$pageSize = 5;

$sql = "select a.*,t.name from nx_article as a,nx_type as t where a.type_id = t.id order by a.id asc limit :pageNum,:pageSize";
$stmt = $db->prepare($sql);
$stmt->bindValue(':pageNum',($pageNum-1)*$pageSize,PDO::PARAM_INT);
$stmt->bindValue(':pageSize',$pageSize,PDO::PARAM_INT);
$stmt->execute();//[':pageNum'=>$pageNum,':pageSize'=>$pageSize]
$articles = $stmt->fetchAll();
// print_r($articles);

$sql = "select count(*) as tiaoshu from nx_article";

$stmt = $db->prepare($sql);
$stmt->execute();
$res = $stmt->fetch();
$tiaoshu = $res['tiaoshu'];


$maxPageNum = ceil($tiaoshu/$pageSize);
?>


<?php require_once "top.php"; ?>

    <?php require_once "header.php"; ?>

    <?php require_once "side.php"; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                文章列表
                <small>在这里管理文章</small>
            </h1>
            <!-- <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
                <li><a href="#">分类管理</a></li>
                <li class="active">分类列表</li>
            </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">分类列表</h3>

                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tr>
                                    <th>编号</th>
                                    <th>分类名称</th>
                                    <th>文章标题</th>
                                    <th>发布时间</th>
                                    <th>操作</th>
                                </tr>
                                <?php
                                foreach ($articles as $type){
                                ?>
                                <tr>
                                    <td><?=$type['id']?></td>
                                    <td><a href="../article?id=<?=$type['id']?>"><?=$type['title']?></a></td>
                                    <td><?=$type['name']?></td>
                                    <td><?=$type['create_at']?></td>
                                    
                                    <td>
                                        <a href="./articleDelete.php?id=<?=$type['id']?>" class="btn btn-danger btn-sm">删除</a>
                                        <a href="./articleEdit.php?id=<?=$type['id']?>" class="btn btn-info btn-sm">编辑</a>
                                    </td>
                                </tr>
                                <?php }?>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="articleAdd.php" class="btn btn-primary">添加文章</a>
                        </div>
                    </div>
                    <!-- /.box -->
                    <div class="box-footer">
                        <nav aria-label="">
                            <ul class="pager">
                                <li><a href="<?php if($pageNum-1==0){ ?>#<?php }else{ ?>?page=<?=$pageNum-1?><?php } ?>">上一页</a></li>
                                <?php
                                if($maxPageNum<$pageNum+1){
                                    ?>
                                    <li><a href="#">下一页</a></li>
                                    <?php
                                }else{
                                    ?>
                                    <li><a href="?page=<?=$pageNum+1?>">下一页</a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </nav>
                        <nav aria-label="page navigation">
                            <ul class="pager">
                                <li>
                                    <a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
                                </li>
                                <?php for($i = 1; $i <= $maxPageNum; $i++){?>
                                    <li <?php echo $pageNum==$i?" class=\"active\"":""; ?>><a href="?page=<?=$i?>"><?=$i?></a></li>
                                <?php } ?>
                                <li>
                                    <a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
                                </li>
                                
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php require_once "footer.php";?>

</body>
</html>