<pre>
    <?php
    require_once "../model/Produto.php";
    print_r($_GET);

    $novoProduto = new Produto();
    //$novoProduto->setNome($_GET["nome"]);
    //$novoProduto->setValor($_GET["valor"]);
    //$novoFeinovoProdutojao->setCor($_GET["cor"]);
    //$novoFeinovoProdutojao->setQuantidade($_GET["quantidade"]);
    //$novoFeinovoProdutojao->setMarca($_GET["cor"]);


    $novoProduto
        ->setNome($_GET["nome"])
        ->setValor($_GET["valor"])
        ->setQuantidade($_GET["quantidade"])
        ->setMarca($_GET["marca"])
        ->setId($_GET["id"]);
        
    print_r($novoProduto);

    if($novoProduto->getId() == ''){
        $novoProduto->salvar();
    }
    else{
        $novoProduto->atualizar();
    }
    header("Location: ../");
    ?>
</pre>