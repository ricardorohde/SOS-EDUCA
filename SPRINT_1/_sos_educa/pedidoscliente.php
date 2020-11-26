<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>bs4 account tickets - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript"></script>
    <?php
    session_start();  
    ?>
    <style type="text/css">
    	body{
    background:url("https://lohcus.com.br/wp-content/uploads/2015/09/Fundo-Artigos-videos-04.png");    
    }
    .main-container{
        margin-top:40px; 
    
        
    }
    .widget-author {
    margin-bottom: 58px;
    }
    .author-card {
    position: relative;
    padding-bottom: 48px;
    background-color: #fff;
    box-shadow: 0 12px 20px 1px rgba(64, 64, 64, .09);
    
    
    }
    .author-card .author-card-cover {
    position: relative;
    width: 100%;
    height: 100px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    }
    .author-card .author-card-cover::after {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    content: '';
    opacity: 0.5;
    }
    .author-card .author-card-cover > .btn {
    position: absolute;
    top: 12px;
    right: 12px;
    padding: 0 10px;
    }
    .author-card .author-card-profile {
    display: table;
    position: relative;
    margin-top: -22px;
    padding-right: 15px;
    padding-bottom: 16px;
    padding-left: 20px;
    z-index: 5;
    
    }
    .author-card .author-card-profile .author-card-avatar, .author-card .author-card-profile .author-card-details {
    display: table-cell;
    vertical-align: middle;
    
    }
    .author-card .author-card-profile .author-card-avatar {
    width: 85px;
    border-radius: 50%;
    box-shadow: 0 8px 20px 0 rgba(0, 0, 0, .15);
    overflow: hidden;
    }
    .author-card .author-card-profile .author-card-avatar > img {
    display: block;
    width: 100%;
    }
    .author-card .author-card-profile .author-card-details {
    padding-top: 20px;
    padding-left: 15px;
    }
    .author-card .author-card-profile .author-card-name {
    margin-bottom: 2px;
    font-size: 14px;
    font-weight: bold;
    }
    .author-card .author-card-profile .author-card-position {
    display: block;
    color: #8c8c8c;
    font-size: 12px;
    font-weight: 600;
    }
    .author-card .author-card-info {
    margin-bottom: 0;
    padding: 0 25px;
    font-size: 13px;
    
    }
    .author-card .author-card-social-bar-wrap {
    position: absolute;
    bottom: -18px;
    left: 0;
    width: 100%;
    }
    .author-card .author-card-social-bar-wrap .author-card-social-bar {
    display: table;
    margin: auto;
    background-color: #fff;
    box-shadow: 0 12px 20px 1px rgba(64, 64, 64, .11);
    }
    .btn-style-1.btn-white {
        background-color: #fff;
    }
    .list-group-item i {
        display: inline-block;
        margin-top: -1px;
        margin-right: 8px;
        font-size: 1.2em;
        vertical-align: middle;
    }
    .mr-1, .mx-1 {
        margin-right: .25rem !important;
    }

    .list-group-item.active:not(.disabled) {
        border-color: #e7e7e7;
        background: #fff;
        color: #ac32e4;
        cursor: default;
        pointer-events: none;
    }
    .list-group-flush:last-child .list-group-item:last-child {
        border-bottom: 0;
    }

    .list-group-flush .list-group-item {
        border-right: 0 !important;
        border-left: 0 !important;
    }

    .list-group-flush .list-group-item {
        border-right: 0;
        border-left: 0;
        border-radius: 0;
    }
    .list-group-item.active {
        z-index: 2;
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }
    .list-group-item:last-child {
        margin-bottom: 0;
        border-bottom-right-radius: .25rem;
        border-bottom-left-radius: .25rem;
    }
    a.list-group-item, .list-group-item-action {
        color: #404040;
        font-weight: 600;
    }
    .list-group-item {
        padding-top: 16px;
        padding-bottom: 16px;
        -webkit-transition: all .3s;
        transition: all .3s;
        border: 1px solid #e7e7e7 !important;
        border-radius: 0 !important;
        color: #404040;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .08em;
        text-transform: uppercase;
        text-decoration: none;
    }
    .list-group-item {
        position: relative;
        display: block;
        padding: .75rem 1.25rem;
        margin-bottom: -1px;
        background-color: #fff;
        border: 1px solid rgba(0,0,0,0.125);
    }
    
    <?php include('conexao.php');?>
    </style>
    <title>Login Cliente</title>
</head>
    <body>

        <div class="col-lg-8 pb-5">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead >
                        <tr >
                        <th>Quantidade</th>
                        <th>Itens</th>
                        <th>Data da Compra</th>
                        <th>Total </th>
                        <th>Forma pagamento</th>
                        </tr>
                    </thead>  
                    <script>
                        function data($data){
                        return date("d/m/Y", strtotime($data));
                    }
                    </script>
                        <?php
                        $pesquisa = $_SESSION['id_cliente'];
                        $resultado=mysqli_query($conexao,  "SELECT vd.* from vendas as vd  WHERE vd.id_cliente=$pesquisa" );
                    
                        
                        if($resultado){
                            while($row = mysqli_fetch_assoc($resultado)){
                            $idVenda = $row['id_venda'];
                            $itensVendidos=mysqli_query($conexao,  "SELECT it.*,pr.* from itens_venda as it, produtos as pr  WHERE (it.id_produto=pr.id_produto) AND (it.id_venda='$idVenda')" );
                        ?>
                            <tbody style="text-align: center;">
                                        <tr>
                                            <td>
                                            <?php echo ($row['qtd_itens']);?>
                                            </td>
                                            <td>
                                            
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne<?=$row['id_venda']?>" aria-expanded="false" aria-controls="collapseOne">
                                                Clique aqui para verificar os Itens comprados
                                                </button>
                                                <div id="collapseOne<?=$row['id_venda']?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                <ul>
                                                    <?php while($rowItem = mysqli_fetch_assoc($itensVendidos)){
                                                    ?>
                                                    <li><?=$rowItem['nome_prod']?></li>
                                                    <?php
                                                }
                                                ?>
                                                </ul>
                                                </div>
                                            </td>
                                            <td>
                                            <?php echo date("d/m/Y", strtotime($row['data_venda'])); ?>
                                            </td>
                                            <td>
                                            <?php echo "R$: ".($row['total']);?>
                                            </td>
                                            <td>
                                            <?php echo ($row['forma_pagamento']);?>
                                            </td>
                                        
                                        </tr>
                            </tbody>
                                    
                            
                                <?php
                                
                                    }//fim do while
                                }//fim do if

                                ?>
                </table>
            </div>
        </div>
    </body>
</html>