<?php require __DIR__ . '/views/layouts/header.php'; ?>

<body>

<?php require __DIR__ . '/views/layouts/navbar.php'; ?>

<?php 
    if($user->tipo == "asociado"){
        require __DIR__ . '/views/_panelAsociado.php';
    }
    else if($user->tipo == "cliente"){
        require __DIR__ . '/views/_panelCliente.php';
    }

?>

<?php require __DIR__ . '/views/layouts/footer.php'; ?>

</body></html>
