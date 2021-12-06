<?php

    //iniciar a sessao com o database

     session_start();
     $conectar = mysqli_connect('localhost','root','');
     $banco = mysqli_select_db($conectar, 'revenda');
     
     // se clicou no botao gravar
     
     if (isset($_POST['bt_cadastrar']))
    {
    $codcategoria     = $_POST['codcategoria'];
    $nome  = $_POST['nome'];



    //comando mysql para gravar
    $sql  = "insert into categorias(codcategoria,nome)
             values ('$codcategoria','$nome')";
 $resultado = mysqli_query($conectar, $sql);

    if ($resultado == 1)
            {
            ?>
            <script>
                alert("Cadastro efetuado com sucesso.");
                location.href="categoria.html";
            </script>
            <?php
            }
        else
            {
            ?>
            <script>
                alert("Erro... Nao foi possivel cadastrar. ");
                location.href="categoria.html";
            </script>
            <?php
            }
    }

     if (isset($_POST['bt_excluir'])) // se clicou no bot�o excluir
    {
    $codcategoria     = $_POST['codcategoria'];
    $nome  = $_POST['nome'];



    //comando mysql para gravar
    $sql  = "delete from categorias where codcategoria = '$codcategoria'";
    $resultado = mysqli_query($conectar, $sql);



    if ($resultado == 1)
            {
            ?>
            <script>
                alert("Exclusao efetuada com sucesso.");
                location.href="categoria.html";
            </script>
            <?php
            }
        else
            {
            ?>
            <script>
                alert("Erro... Nao foi possivel excluir. ");
                location.href="categoria.html";
            </script>
            <?php
            }
    }
     if (isset($_POST['bt_alterar'])) // se clicou no bot�o alterar
     {
    $codcategoria   = $_POST['codcategoria'];
    $nome  = $_POST['nome'];

    //comando mysql para alterar
    $sql  = "update categorias set nome = '$nome'
             where codcategoria = '$codcategoria'";
 $resultado = mysqli_query($conectar, $sql);



    if ($resultado == 1)
            {
            ?>
            <script>
                alert("Alteracao efetuada com sucesso.");
                location.href="categoria.html";
            </script>
            <?php
            }
        else
            {
            ?>
            <script>
                alert("Erro... Nao foi possivel alterar. ");
                location.href="categoria.html";
            </script>
            <?php
            }
    }
       if (isset($_POST['bt_pesquisar'])) // se clicou no bot�o pesquisar
    {
    //comando mysql para pesquisar



     $sql = "SELECT * FROM categorias";
     $resultado = mysqli_query($conectar, $sql);
     while($linha = mysqli_fetch_array($resultado))
     {
          echo "Codigo categoria    : ".$linha[0]."<br>";
          echo "Nome : ".$linha[1]."<br>";
      }
    }
