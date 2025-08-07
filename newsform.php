<?php
include("header.php");
include("sidebar.php");
include("navbar.php");
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6> เพิ่มข้อมูลใหม่ </h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" action="insertnews.php" method="post">
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="name" class="formcontrol-label">ชื่อข่าว</label>
                                    <input class="form-control" type="text" name="news_title" id="news_title">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="news_type" class="formcontrol-label">ประเภทข่าว</label>
                                    <select class="form-control" name="news_type" id="news_type">
                                        <option value="ไม่ระบุ">ไม่ระบุ</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <textarea id="tiny" name="tiny"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn bg-gradient-success px-3 py-2"><i class="fa fa-save">  บันทึก</i></button>
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