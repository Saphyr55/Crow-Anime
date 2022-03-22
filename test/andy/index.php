<?php include_once '../../core/backend/params_head.php' ?>
<body>
    <?php 
    var_dump($bdd->request('SELECT * FROM `test_anime`'));
    ?>
</body>
</html>