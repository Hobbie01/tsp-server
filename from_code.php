
<?php

 $TAG_NUMBER=$_GET["TAG_NUMBER"];
 $ASSET_ID=$_GET["ASSET_ID"];
 include("config/connect.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
<?php include("head.php");?>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php include("menu.php") ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php include("Navbar_start.php") ?>

			<!-- Form Start -->


            <div class="container-fluid pt-4 px-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">เพิ่มหมายเลขครุภัณฑ์</h6>

<form class="imgForm" action="form_image44.php" method="post" enctype="multipart/form-data">                           
<table width="80%" cellpadding="5" cellspacing="5" style="width: 100%">
    <tbody>
      <tr>
        <td width="20%" align="right">เลขคุมครุภัณฑ์</td>
        <td><input name="ASSET_ID" type="text" id="ASSET_ID"></td>
      </tr>
      <tr>
        <td width="20%" align="right">หมายเลขครุภัณฑ์</td>
        <td><input name="TAG_NUMBER" type="text" id="TAG_NUMBER"></td>
      </tr>
      <tr>
        <td align="right">เลขที่สัญญา/ข้อตกลง</td>
        <td><input name="X_AGREEMENT_ID" type="text" id="X_AGREEMENT_ID"></td>
      </tr>
	  <tr>
        <td align="right">วันที่หมดประกัน</td>
        <td><input name="END_DATE" type="text" id="END_DATE"></td>
      </tr>
	  <tr>
        <td align="right">ผู้ขาย</td>
        <td><input name="VNDR_FIELD_C30_A" type="text" id="VNDR_FIELD_C30_A"></td>
      </tr>
    </tbody>
  </table>
  <br>
  <input type="submit" name="Submit" value="บันทึก">

  
</form>


                            
                        </div>
                    </div>
                </div>
            <!-- Form End -->





           <!-- Form End -->

            <!-- Footer Start -->
<?php include("Footer.php");	?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->
    <!-- Back to Top -->
        <a href="" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>