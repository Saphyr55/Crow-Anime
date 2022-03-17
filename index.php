<?php 
include_once "core/backend/params_head.php";
$title="Accueil";
include_once "core/backend/head.php";
?>
<head>
    <title><?=$title?></title>
    <link rel="stylesheet" href="core/frontend/css/home.css">
</head>
<body>
        <?php include "core/frontend/components/header.php" ?>
        <?php include "core/frontend/components/home.php" ?>
        <?php include "core/frontend/components/footer.php" ?>
    </body>
</html>