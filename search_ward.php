<?php
include("header.php");
include("sidebar.php");
include("navbar.php");
?>


<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="typeahead.js"></script>
<style>
.typeahead {
    border: 1px solid #DDD;
    border-radius: 4px;
    padding: 8px 12px;
    max-width: 300px;
    min-width: 290px;
    background: #FFF;
    color: #000;
}

.tt-menu {
    width: 300px;
}

ul.typeahead {
    margin: 0px;
    padding: 10px 0px;
}

ul.typeahead.dropdown-menu li a {
    padding: 10px !important;
    border-bottom: #CCC 1px solid;
    color: #000;
}

ul.typeahead.dropdown-menu li:last-child a {
    border-bottom: 0px !important;
}

.bgcolor {
    max-width: 550px;
    min-width: 290px;
    max-height: 340px;
    background: ;
    padding: 100px 10px 130px;
    border-radius: 4px;
    text-align: center;
    margin: 10px;
}

.demo-label {
    font-size: 1em;
    color: #CCC;
    font-weight: 500;
    color: #000;
}

.dropdown-menu>.active>a,
.dropdown-menu>.active>a:focus,
.dropdown-menu>.active>a:hover {
    text-decoration: none;
    background-color: #EEE;
	color:#000;
    outline: 0;
}
</style>



<div class="container-fluid py-4">

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">

                        <div class="col-12">
                            <input type="text" name="txtCountry"
                                id="txtCountry" class="typeahead" />
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">

				<div class="col-6">
                                    <div class="datepickers">
                                        <div class="form-group">
                                            <label for="name" class="formcontrol-label">วันที่จำหน่วย</label>
                                            <div class="input-group date" id="id_1">
                                                <input type="text" name="date_out" id="date_out" value="<?=$sqlDate_c?>"
                                                    class="form-control" placeholder="MM/DD/YYYY hh:mm:ss" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#txtCountry').typeahead({
        source: function(query, result) {
            $.ajax({
                url: "server.php",
                data: 'query=' + query,
                dataType: "json",
                type: "POST",
                success: function(data) {
                    result($.map(data, function(item) {
                        return item;
                    }));
                }
            });
        }
    });
});
</script>
<!-- <script src="calendar-09/js/jquery.min.js"></script> -->
<script src="calendar-09/js/popper.js"></script>
<script src="calendar-09/js/bootstrap.min.js"></script>
<script src="calendar-09/js/moment-with-locales.min.js"></script>
<script src="calendar-09/js/bootstrap-datetimepicker.min.js"></script>
<script src="calendar-09/js/main.js"></script>
<?php
include("footer.php");
?>