<?php
include("header.php");
include("sidebar.php");
include("navbar.php");
require("connect.php");

$stmt = $pdo->prepare("select * from news where news_id= ?");
$stmt->bindParam(1, $_GET["news_id"]);
$stmt->execute();
$row = $stmt->fetch() ;
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                

                <div class="card-body pt-4 p-3">
                    <div class="card-body px-0 pt-0 pb-2">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h2 class="mb-3 text-xl">หัวข้อข่าว: <?=$row["news_name"]?></h2>
                                    <span class="mb-2 text-l">ประเภทข่าว: <span
                                            class="text-dark font-weight-bold ms-sm-2 text-sm"><?=$row["news_type"]?></span></span>
                                    <span class="mb-2 text-l">รายละเอียด: <span
                                            class="text-dark ms-sm-2 text-sm"><?=$row["news_detail"]?></span></span>

                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="#"><i
                                            class="far fa-trash-alt me-2"></i>ลบ</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="#"><i
                                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>แก้ไช</a>
                                </div>
                            </li>

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include("footer.php");
?>