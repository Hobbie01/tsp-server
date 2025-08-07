<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>

    <link href="jquery-ui.css" rel="stylesheet"> 
    <style type="text/css">
    /* Overide css code กำหนดความกว้างของปฏิทินและอื่นๆ */
    #ui-datepicker-div {display: none;}
    .ui-datepicker{
        width:220px;
        font-family:tahoma;
        font-size:12px;
        text-align:center;
    }
/*  css กำหนดปุ่ม ถ้ามีแสดง*/
    .ui-datepicker-trigger{
        border: 1px solid #cccccc;
        background: #ececec !important; 
        padding:3px;
    } 
    button.ui-datepicker-trigger{
        border:none;
        background: transparent!important;
    }
    </style>
</head>
<body>
 
<br>
<br>
<br>
<br>
<br>
<br>
 
<div class="container" style="margin:auto;width:500px;">

<br>

<br>
      <input name="dateInput" type="text" id="dateInput" value="" readonly />
      <input type="hidden" name="h_dateinput" value="" id="h_dateinput">
<br>
<br>
      <input name="dateInput2" type="text" id="dateInput2" value="" readonly />
<br>
<br>
<div id="inline_date"></div>
</div>
 
 
<br>
<br>
<input name="inputdate" type="text" id="inputdate" value=""/>

<script src="external/jquery/jquery.js"></script>
<script src="jquery-ui.js"></script>
<script src="jquery.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script src="jqueryui_datepicker_thai_min.js?1"></script>
<script type="text/javascript">
$(function(){
 
    $("#dateInput").datepicker_thai({
        dateFormat: 'dd-mm-yy',
        showOn: 'button',
        buttonText: "เลือกวันที่",
        buttonImage: "", // ใส่ path รุป
        buttonImageOnly: false,
        currentText: "วันนี้",
        closeText: "ปิด",
        showButtonPanel: true,
        showOn: "both",
        altField:"#h_dateinput",
        altFormat: "yy-mm-dd",
        langTh:true,
        yearTh:true,
        numberOfMonths: 3,
    }); 
     
     
    $("#dateInput2").datepicker_thai({
        dateFormat: 'dd/mm/yy',
        changeMonth: false,
        changeYear: true,       
        numberOfMonths: 2,
        langTh:true,
        yearTh:true,
    }); 
     
    $("#inline_date").datepicker_thai({
        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true,   
        langTh:true,
        yearTh: true,       
    });
      
    $("#inputdate").datepicker_thai({
        dateFormat: 'dd-mm-yy',
        changeMonth: true,
        changeYear: true,   
        showOn: 'button',
        //buttonText: "",
        buttonImage: "images/calendar.png", // ใส่ path รุป
        buttonImageOnly: false,
        currentText: "วันนี้",
        closeText: "ปิด",
        showButtonPanel: true,
        showOn: "both",
        langTh:true,
        yearTh: true,     
    });
      
});
</script>
</body>
</html>