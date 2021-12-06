<?php
 //iniciar a sessao e conectar no servidor e database
 session_start();
 $conectar = mysqli_connect('localhost','root','');
 $banco = mysqli_select_db($conectar, 'revenda');

 //se clicou no botao gravar

 if (isset($_POST['bt_gravar']))
 {
 $codmarca = $_POST['codmarca'];
 $nome = $_POST['nome'];
 //comando mysql para gravar
 $sql = "insert into marcas (codmarca,nome)
         values ('$codmarca','$nome')";
 //comando php para validar o insert
 $resultado = mysqli_query($conectar, $sql);

 if ($resultado == 1)
 {
  ?>
  <script>
      alert("Cadastro efetuado com sucesso.");
      location.href="marca.html";
  </script>
  <?php
 }
 else
 {
  ?>
  <script>
      alert("Erro... Nao foi possivel cadastrar. ");
      location.href="marca.html";
  </script>
  <?php
 }
}
  if (isset($_POST['bt_excluir'])) //se clicou no botao excluir
 {
  $codmarca = $_POST['codmarca'];
 $sql = "delete from marcas where codmarca like '$codmarca';";
 $resultado = mysqli_query($conectar, $sql);

 if ($resultado == 1)
 {
  ?>
  <script>
      alert("Exclusao efetuada com sucesso.");
      location.href="marca.html";
  </script>
  <?php
 }
 else
 {
  ?>
  <script>
      alert("Erro... Nao foi possivel excluir. ");
      location.href="marca.html";
  </script>
  <?php
 }
}

if (isset($_POST['bt_pesquisar']))
{
  $sql = "select * from marcas";
  $resultado = mysqli_query($conectar, $sql);
  while($linha = mysqli_fetch_array($resultado))
  {
    echo "Codigo da Marca:     ".$linha[0]."<br>";
    echo "Nome :            ".$linha[1]."<br>";
  }
}

 if (isset($_POST['bt_alterar'])) // se clicou no botão alterar
 {
$codmarca = $_POST['codmarca'];
$nome = $_POST['nome'];


  //comando mysql para gravar
  $sql = "update marcas set nome = '$nome'
          where codmarca = '$codmarca'";
    $resultado = mysqli_query($conectar,$sql);

    if ($resultado == 1)
            {

              ?>
              <script>
                  alert("Alteracao efetuada com sucesso.");
                  location.href="marca.html";
              </script>
              <?php

            }
        else
            {
              ?>
              <script>
                  alert("Erro... Nao foi possivel alterar. ");
                  location.href="marca.html";
              </script>
              <?php
            }
}

