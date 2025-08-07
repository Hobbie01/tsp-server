<?php
include("header.php");
include("sidebar.php");
include("navbar.php");
require("connect.php");

$stmt = $pdo->prepare("select*from new_data");
$stmt->execute();
?>




<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>ข่าวทั้งหมด</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase textsecondary text-xs font-weight-bolder opacity-7">#
                                    </th>
                                    <th
                                        class="text-center textuppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        หัวข้อข่าว</th>
                                    <th class="text-uppercase textsecondary text-xs font-weight-bolder opacity-7 ps-2">
                                        ประเภทข่าว</th>
                                    <th
                                        class="text-left textuppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        เครื่องมือ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $stmt->fetch()) :?>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <p class="text-l fontweight-bold mb-0"><?= $row["idnew_data"] ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="news_detail.php?news_id=<?= $row["idnew_data"] ?>">
                                            <p class="text-l fontweight-bold mb-0"><?= $row["news_title"] ?></p>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <p class="text-l fontweight-bold mb-0"><?= $row["news_type"] ?></p>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <a href="edit_news.php?news_id=<?= $row["idnew_data"] ?>"
                                            class="btn btn-outlinesuccess #fbfbfbpx-3 py-2"><i
                                                class="fa fa-pencil">แก้ไข</i>
                                        </a>
                                        <a href="delete_news.php?news_id=<?= $row["idnew_data"] ?>"
                                            class="btn btn-outlinedanger px-3 py-2"><i class="fa fa-trash"></i> ลบ</a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php
include("footer.php");
?>