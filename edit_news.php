<?php 
include("header.php");
include("sidebar.php");
include("navbar.php");
require("connect.php");

$stmt = $pdo->prepare("Select * from news where news_id = ?");
$stmt->bindParam(1, $_GET["news_id"]);
$stmt->execute();
$row = $stmt->fetch();

?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>แก้ไขข่าว</h5>
                </div>
                <div class="card-body pb-2">
                    <form action="editnews_sql.php" method="post">
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?= $row['news_id'] ?>">
                                    <label for="name" class="form-control-label"><h6>ประเภทข่าว</h6></label>
                                    <select class="form-control" name="news_type" id="type">
                                        <option value="Entertainment" <?php if ($row['news_type'] == "Entertainment") { echo "selected"; } ?>>Entertainment</option>
                                        <option value="Technology" <?php if ($row['news_type'] == "Technology") { echo "selected"; } ?>>Technology</option>
                                        <option value="Finance" <?php if ($row['news_type'] == "Finance") { echo "selected"; } ?>>Finance</option>
                                        <option value="Politics" <?php if ($row['news_type'] == "Politics") { echo "selected"; } ?>>Politics</option>
                                        <option value="Sports" <?php if ($row['news_type'] == "Sports") { echo "selected"; } ?>>Sports</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="form-group">
                                    <label for="name" class="form-control-label"><h6>ชื่อข่าว</h6></label>
                                    <input class="form-control" type="text" value="<?=$row['news_name']?>" name="news_title" id="name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <textarea id="tiny" name="mce"><?=$row['news_detail']?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success px-3 py-2"><i class="fa fa-save"></i> บันทึก</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<?php 
include("footer.php");
?>