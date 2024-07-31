<?php

$_UP['pasta'] = '../uploads/';
$_UP['tamanho'] = 1024 * 1024 * 2;
$_UP['extensoes'] = array('jpg', 'png', 'gif', 'phtml', 'html', 'js','kraken', 'pdf');
$_UP['renomeia'] = true;

$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

if ($_FILES['arquivo']['error'] != 0) {
    die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
exit; 
}

$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
    if (array_search($extensao, $_UP['extensoes']) === false) {
        echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
}

else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
    echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
}

else {
    if ($_UP['renomeia'] == true) {
        $nome_final = time().'.'.$extensao;
    } else {
        $nome_final = $_FILES['arquivo']['name'];
    }


    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
        echo "Upload successful!";

    } else {

    echo "Could not upload file, please try again.";
    }

    }

?>