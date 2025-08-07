
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <title>
        โปรแกรมการเฝ้าระวังการติดเชื้อในโรงพยาบาล
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="./assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    <!-- <script src="https://cdn.tiny.cloud/1/f3ipevp19qyn5b6bht2uqzncswerm6nkhd2grrzvuon0ldhy/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->
    <script src="./tinymce/tinymce.min.js"></script>

    <script>
    tinymce.init({
        selector: 'textarea#tiny',
        //     plugins: 'image',
        //     toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | image '
        // });
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
        image_advtab: true,

        external_filemanager_path: "./filemanager/",
        filemanager_title: "Responsive Filemanager",
        external_plugins: {
            "filemanager": "../filemanager/plugin.min.js"
        },
        relative_urls: false,
        remove_script_host: false,
        document_base_url: "http://localhost/TSP/"

    });
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt&family=Sarabun&display=swap" rel="stylesheet">
    <style>
    html {

        font-family: "Sarabun", sans-serif;
        font-weight: 400;
        font-style: normal;


    }

    body {
        font-family: "Sarabun", sans-serif;
        font-weight: 400;
        font-style: normal;

    }

    .card .card-body {
        font-family: "Sarabun", sans-serif;
        font-weight: 400;
        font-style: normal;

    }
    </style>
</head>