<html>
<head>
    <!-- Bootstrap 3.3.5 -->
    <link rel='stylesheet' href='../bootstrap/css/bootstrap.min.css'>
    <!-- Font Awesome -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
    <!-- Ionicons -->
    <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
    <!-- Theme style -->
    <link rel='stylesheet' href='../dist/css/AdminLTE.min.css'>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel='stylesheet' href='../dist/css/skins/_all-skins.min.css'>
    <!-- iCheck -->
    <link rel='stylesheet' href='../plugins/iCheck/flat/blue.css'>
    <!-- Morris chart -->
    <link rel='stylesheet' href='../plugins/morris/morris.css'>
    <!-- jvectormap -->
    <link rel='stylesheet' href='../plugins/jvectormap/jquery-jvectormap-1.2.2.css'>
    <!-- Date Picker -->
    <link rel='stylesheet' href='../plugins/datepicker/datepicker3.css'>
    <!-- Daterange picker -->
    <link rel='stylesheet' href='../plugins/daterangepicker/daterangepicker-bs3.css'>
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel='stylesheet' href='../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'>
    <!-- Icone-->
    <link rel="shortcut icon" href="../favicon.ico"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src='https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js'></script>
    <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
    <![endif]-->
    <style>

        img {
            max-width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            height: auto;
            background: #fff;
            box-shadow: 1px 1px 7px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 3em;
            line-height: 1;
            margin-bottom: 0.5em;
        }

        p {
            margin-bottom: 1.5em;
        }

        .thumbnails {
            width: 380px;
            height: 70px;
            list-style: none;
            margin-bottom: 1.5em;
        }

        .main-image {

            margin-bottom: 0.75em;
        }

        .thumbnails li {
            display: inline;
            margin: 0 10px 0 0;
        }

        .thumbnails img {
            width: 70px;
            height: 70px;
        }

        .pag2 {

            width: 380px;
            height: 70px;
            list-style: none;
            display: none;

        }

        .pag1 {
            width: 380px;
            height: 70px;

            list-style: none;

        }

        .previous {
            height: 70px;;
        }

        .next {
            height: 70px;
        }

        a {
            color: #232527;
        }

        a:hover {
            color: #37393b;
        }


    </style>

    <script>
        $(window).resize(function () {
            $("body").setHeight($(window).height());
        });
    </script>
</head>
<body>
<div class='container'>

    <div class='row' style='margin-bottom: 150px;'>
        <h1 class='text-red'><?php echo ucfirst($this->tabela) ?>s</h1>
        <hr>
    </div>
</div>
</body>
            
            