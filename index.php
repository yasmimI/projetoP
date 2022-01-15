<?php
require_once "model/Produto.php";

if(isset($_GET["id"])){
    $produto = Produto::retornarPorId($_GET["id"]);
    //print_r($produto);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <div class="card" style="width: 76rem;">
      <div class="jumbotron">
  <h1 class="display-4">Cadastro de Produtos para limpeza</h1>
  <p>Área de cadastro destinada a produtos de limpeza!</p>
</div>

</head>
<body>
    <table class="container table">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Marca</th>
                <th>Valor (R$)</th>
                <th>Código de barras</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
    <?php
    $produto = Produto::retornarTodos();
    //print_r($produtos);
    foreach($produto as $p):
    ?>
    <!-- Comment -->
        <tr>
            <td> <?php echo $p->getId(); ?> </td>
            <td> <?= $p->getNome(); ?> </td>
            <td> <?= $p->getQuantidade(); ?> </td>
            <td> <?= $p->getNome(); ?> </td>
            <td> <?= $p->getMarca(); ?> </td>
            <td> <?= $p->getCdBarra(); ?> </td>
            <td> <?= $p->getValor(); ?> </td>

            <td>
        <a
        href="index.php?id=<?= $f->getId(); ?>"
        class="btn btn-secondary material-icons">
            edit
        </a>
            </td>
            <td>
        <a
        href="ws/deletar-produto.php?id=<?= $p->getId(); ?>"
        class="btn btn-danger material-icons">
            delete
        </a>
            </td>
        </tr>
    <?php 
    endforeach;
    ?>
    </table>
    <form action="ws/salvar-produto.php"
          class="container p-4">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome"
            id="nome" class="form-control"
            required value="<?= isset($feijao)? $feijao->getNome() : ''; ?>">
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="text" name="quantidade"
            id="quantidade" class="form-control"
            required
            value="<?= isset($feijao)? $feijao->getQuantidade() : ''; ?>">
        </div>
       
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" name="marca"
            id="marca" class="form-control"
             min="0" required
            value="<?= isset($feijao)? $feijao->getMarca() : ''; ?>">
        </div>
        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="number" name="valor"
            min="1" max="1000"
            id="valor" class="form-control"
            required
            value="<?= isset($feijao)? $feijao->getValor() : ''; ?>">
        </div>
        <div class="form-group">
            <label for="cdBarra">Código de Barras</label>
            <input type="text" name="cdBarra"
            id="cdBarra" class="form-control"
            required
            value="<?= isset($feijao)? $feijao->getCdBarra() : ''; ?>">
        </div>
        
        <input type="hidden" name="id" 
        value="<?= isset($feijao)? $feijao->getId() : ''; ?>">
        <input type="submit" value="Salvar"
        class="btn btn-success">
    </form>
</body>
<footer>
<div class="card">
  <div class="card-header">
    Direitos relacionados
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>Evelyn Beatriz, Emilly Ferreira, Maria Ludymilla, Naalliel Medeiros e Yasmim Ilíada</p>
      <div class="card-header">
    Sites parceiros
  </div>
            <a href=\"https://codigo-im-kafig.herokuapp.com/">Codigo-im</a>
      <a href=\"https://app-especiaisnba.herokuapp.com/">App-especiaisnba</a>
      <a href=\"https://ressacaliteraria.herokuapp.com/">Ressacaliteraria</a>
      <a href=\"https://ppi-julio-2022.herokuapp.com/">Site de Julio</a>

      



      <footer class="blockquote-footer"> <cite title="Source Title"></cite></footer>
    </blockquote>
  </div>
</div>

</footer>
</html>