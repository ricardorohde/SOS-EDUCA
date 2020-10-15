<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <?php include("cabecalho.php");?>
    <title>SOS Educa - Carrinho</title>
  </head>

  <body>
    <?php include("navbar.php") ?>
    
    <?php $conexao = mysqli_connect("localhost", "root", "","sos_educa") ?>

    <h3 style="margin-top: 60px">Fitros de Pesquisa</h3>

    <form name="cons" method="post" action="index_carrinho_cliente.php">
      <h4>Escolha uma categoria</h4>

      <select name='sel_cat'>
        <?php 
          $resultado = mysqli_query($conexao,"SELECT * FROM categorias");

          while($item = mysqli_fetch_assoc($resultado)): ?>
            <option value="<?= $item['id_cat'] ?>">
              <?= $item['nome_cat'] ?>
            </option>
          <?php endwhile ?>
      </select> 

      <button type="submit" style="background-color:green;color:white">Consultar</button>
    </form>

    <div class="container-fluid">
      <div class="row">
          <?php
            //Declaração da página inicial
            //Calculando o registro inicial
            @$pagina = $_GET['pagina'];
            @$idcat = $_POST['sel_cat'];

            if($pagina==""){
              $pagina="1";
            }

            //Máximo de registros por páginas
            $maximo = 8;
            $inicio = $pagina - 1;
            $inicio = $maximo * $inicio;

            $query = "SELECT * FROM produtos";

            if ($idcat) {
              $query .= " WHERE id_categoria = $idcat";
            }
            
            //Conta os resultados no total da query
            $total = mysqli_num_rows(mysqli_query($conexao, $query));

            if (!$idcat) {
            //   $query .= " WHERE id_categoria=$idcat";
            // } else {
              $query .= " limit $inicio, $maximo";
            }

            $sql=mysqli_query($conexao, $query);
          ?>

          <?php while($linha=mysqli_fetch_object($sql)): // CONTENT ?>
            <div class="col-md-3 col-sm-6">
              <div class="product-card">
                <div class="product-card-image" style="background-image: url(imagens/<?= $linha->imagem ?>)">
                  <div class="product-card-description">
                    <strong>Descrição</strong>

                    <?= $linha->descricao ?>
                  </div>
                </div>

                <strong><?= $linha->nome_prod ?></strong>

                <footer>
                  <div class="price">
                    <?= number_format($linha->preco, 2, ',', '.') ?>
                  </div>

                  <a class="cart-button" href="carrinho_cliente.php?acao=add&id=<?= $linha->id_produtos ?>">
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                  </a>
                </footer>
              </div>
            </div>
          <?php endwhile /* END OF CONTENT */ ?>
      </div>
    </div>

    <?php // PAGINATION SETTINGS
      $menos = $pagina - 1;
      $mais = $pagina + 1;
      $pgs = ceil($total / $maximo);
    ?>

    <?php if ($pgs > 1): // PAGINATION ?>
      <div class="col-md-12 text-center">
        <ul class="pagination">
          <?php if ($menos > 0): ?>
            <li>
              <a href="<?= $_SERVER['PHP_SELF'] ?>?pagina=<?= $menos ?>">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
            </li>
          <?php endif ?>
          
          <?php for ($i = 1; $i <= $pgs; $i++): ?>
            <?php if ($i == $pagina): ?>
              <li class="active">
                <span><?= $i ?></span>
              </li>
            <?php else: ?>
              <li>
                <a href="<?= $_SERVER['PHP_SELF'] ?>?pagina=<?= $i ?>"><?= $i ?></a>
              </li>
            <?php endif ?>
          <?php endfor ?>
                
          <?php if ($mais <= $pgs): ?>
            <li>
              <a href="<?= $_SERVER['PHP_SELF'] ?>?pagina=<?= $mais ?>">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </li>
          <?php endif ?>
        </ul>
      </div>
    <?php endif // END OF PAGINATION ?>

    <?php include("rodape.php");?>
  </body>
</html>
