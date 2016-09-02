<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="theme-color" content="#605ca8">
<link rel="icon" sizes="192x192" href="../icon.png">
<!-- Bootstrap 3.3.5 -->
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
<!--<!-- Ionicons -->
<!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
<!-- Theme style -->
<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="../plugins/iCheck/flat/purple.css">
<!-- Morris chart -->
<!--    <link rel="stylesheet" href="../plugins/morris/morris.css">-->
<!-- jvectormap -->
<!--    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">-->
<!-- Date Picker -->
<!--    <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">-->
<!-- Daterange picker -->
<link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<!-- Icone-->
<link rel="shortcut icon" href="../favicon.ico"/>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>-->
<!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
<!--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->

<?php
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 08/06/2016
 * Time: 11:38
 */

$json = "menu.json";
$info = file_get_contents($json);

$filhoDoJ = json_decode($info);
foreach ($filhoDoJ->menus as $item) {

    echo "<ul>
              <li class=\"treeview\">
                 <a href=\"#\">
                     <i class=\"fa $item->icone\"></i> <span>$item->descricao</span> <i
                                class=\"fa fa-angle-left pull-right\"></i>
                 </a>              
                 <ul class=\"treeview-menu\">";
    if (isset($item->menuList)) {
        foreach ($item->menuList as $i) {
            echo "     <li>
                       <a href=\"";
            if (isset($i->url)) echo $i->url;
            echo "\" 
                          target=\"iframePrincipal\"><i class=\"fa fa-" . $i->icone . "\"></i> " . $i->descricao . "</a>
                   </li>";
        }
    }
    echo "
                   </li>
                </ul>
                    </li>
                    </ul>";
}
