<HTML>
    <HEAD>
     <TITLE>Modelos - Bonicars</TITLE>
     <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="modelos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    </HEAD>
    <BODY>
    
    <div id="bordaLogo">
       <img src="logo.png" class="logoPadrao">
	</div>
    
    <div id="bordaMenu">
    <p>
    <ul>
    <li>  <i class="fas fa-arrow-alt-circle-right"></i> <a href="home.php">HOME</a></li>
    <li>  <i class="fas fa-arrow-alt-circle-right"></i> <a href="">CONTATO</a></li>
    <li>  <i class="fas fa-arrow-alt-circle-right"></i> <a href="cadastros.html">CADASTROS</a></li>
    </ul>
    </p>
    </div>
  
<div id="central">
<form name="form" method="post"  action="modelos1.php" >
    <br> 
CADASTRO DOS MODELOS
    <br><br> 
 
<table border=0>
<tr>

<td><input type="text" name="codmodelo" size=20 class="Log" placeholder="Codigo do Modelo" required> </td>
</tr>
<tr>

<td><input type="text" name="nome" size=20 class="nom" placeholder="Nome" > </td>
</tr>
<tr>

<td><select name="codmarca">
          <option value="0">Marca</option>
              <?php
              $conectar = mysqli_connect('localhost','root','');
             $banco = mysqli_select_db($conectar, 'revenda');
             
              $sql1 = "SELECT codmarca, nome FROM marcas";
              $resultado1 = mysqli_query($conectar, $sql1);
             
              while($linha1 = mysqli_fetch_array($resultado1))
              {
              echo "<option value='".$linha1[0]."'>".$linha1[1]."</option>";
              }
              ?>
     </select>
    <BR><BR> </td>
</tr>

</table>

    <input type="submit" name="bt_cadastrar" value="CADASTRAR" class="entrarbt">
    <input type="submit" name="bt_excluir"   value="EXCLUIR" class="entrarbt">
    <input type="submit" name="bt_alterar"   value="ALTERAR" class="entrarbt">
    <input type="submit" name="bt_pesquisar" value="PESQUISAR" class="entrarbt">


</form>
	  
	 
</div>

<div id="rodape"> 
	 @2020 CopyRight Revendedora Bonicars - Powered by: Victor
</div>   
</body>
</html>

