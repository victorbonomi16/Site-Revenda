<?php

    //iniciar a sessao com o database

     session_start();
     $conectar = mysqli_connect('localhost','root','');
     $banco = mysqli_select_db($conectar, 'revenda');
     
     // se clicou no botao gravar
     
     if (isset($_POST['bt_cadastrar']))
    {
    $codmodelo     = $_POST['codmodelo'];
    $nome  = $_POST['nome'];
    $codmarca = $_POST['codmarca'];



    //comando mysql para gravar
    $sql  = "insert into modelos(codmodelo,nome,codmarca)
             values ('$codmodelo','$nome','$codmarca')";
            $resultado = mysqli_query($conectar, $sql);

    if ($resultado == 1)
            {
            ?>
            <script>
                alert("Cadastro efetuado com sucesso.");
                location.href="modelos.php";
            </script>
            <?php
            }
        else
            {
            ?>
            <script>
                alert("Erro... Nao foi possivel cadastrar. ");
                location.href="modelos.php";
            </script>
            <?php
            }
    }

     if (isset($_POST['bt_excluir'])) // se clicou no bot�o excluir
    {
    $codmodelo     = $_POST['codmodelo'];
    $nome  = $_POST['nome'];
    $codmarca = $_POST['codmarca'];

    //comando mysql para deletar
    $sql  = "delete from modelos where codmodelo = '$codmodelo'";
    $resultado = mysqli_query($conectar, $sql);



    if ($resultado == 1)
            {
            ?>
            <script>
                alert("Exclusao efetuada com sucesso.");
                location.href="modelos.php";
            </script>
            <?php
            }
        else
            {
            ?>
            <script>
                alert("Erro... Nao foi possivel excluir. ");
                location.href="modelos.php";
            </script>
            <?php
            }
    }
     if (isset($_POST['bt_alterar'])) // se clicou no bot�o alterar
     {
    $codmodelo     = $_POST['codmodelo'];
    $nome  = $_POST['nome'];
    $codmarca = $_POST['codmarca'];



    //comando mysql para alterar
    $sql  = "update modelos set nome = '$nome',
                                   codmarca = '$codmarca'
             where codmodelo = '$codmodelo'";
    $resultado = mysqli_query($conectar,$sql);


    if ($resultado == 1)
            {
            ?>
            <script>
                alert("Alteracao efetuada com sucesso.");
                location.href="modelos.php";
            </script>
            <?php
            }
        else
            {
            ?>
            <script>
                alert("Erro... Nao foi possivel alterar. ");
                location.href="modelos.php";
            </script>
            <?php
            }
    }
       if (isset($_POST['bt_pesquisar'])) // se clicou no bot�o pesquisar
    {
    //comando mysql para pesquisar



     $sql = "SELECT * FROM modelos";
     $resultado = mysqli_query($conectar, $sql);
     while($linha = mysqli_fetch_array($resultado))
     {
          echo "Codigo do Modelo    : ".$linha[0]."<br>";
          echo "Nome : ".$linha[1]."<br>";
          echo "Codigo da Marca: ".$linha[2]."<br><br>";
      }
    }
