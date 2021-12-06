<?php

$host = "localhost";
$user = "root";
$pass = "";
$banco = "revenda";
$conectar = mysqli_connect($host, $user, $pass, $banco) or die ("Erro ao conectar-se");
mysqli_select_db($conectar, $banco) or die ("N�o foi poss�vel selecionar o banco");

//------- pesquisa marcas

$sql_marcas = "SELECT * FROM marcas ";
$pega_marcas = mysqli_query($conectar,$sql_marcas);

//------- pesquisa modelos
$sql_modelos = "SELECT * FROM modelos ";
$pega_modelos = mysqli_query($conectar,$sql_modelos);

$sql_categorias = "SELECT * FROM categorias ";
$pega_categorias = mysqli_query($conectar,$sql_modelos);

//------- falta ainda a pesquisa categorias ??????




if(!empty($_POST['pesquisar']))
{
$marca  = (empty($_POST['marca']))? 'null' : $_POST['marca'];

$modelo = (empty($_POST['modelo']))? 'null' : $_POST['modelo'];

$categoria = (empty($_POST['categoria']))? 'null' : $_POST['categoria'];

// falta a pesquisa categoria....


if (($marca <> 'null') and ($modelo == 'null') and ($categoria == 'null'))
{
     $sql_veiculos = "SELECT automovel.descricao,automovel.cor,automovel.ano,automovel.valor, automovel.foto1,categorias.nome
                      FROM automovel, modelos, marcas, categorias
                      WHERE automovel.codmodelo = modelos.codmodelo and
                      modelos.codmarca = marcas.codmarca and
                      automovel.codcategoria = categorias.codcategoria and
                      modelos.codmarca = $marca ";
     $seleciona_veiculos = mysqli_query($conectar,$sql_veiculos);
}
else
{
if (($marca == 'null') and ($modelo == 'null') and ($categoria <> 'null'))
{
       $sql_veiculos = "SELECT descricao,cor,ano,valor, foto1 FROM automovel
       WHERE codcategoria = $categoria";
       $seleciona_veiculos = mysqli_query($conectar,$sql_veiculos);
}
else
{
     $sql_veiculos = "SELECT descricao,cor,ano,valor, foto1 FROM automovel
                      WHERE codmodelo = $modelo";
     $seleciona_veiculos = mysqli_query($conectar,$sql_veiculos);
}
}
}

?>



<HTML>
    <HEAD>
     <TITLE>Home Revenda</TITLE>
     <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="home.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </HEAD>
    <BODY>
    
    <div id="bordaLogo">
       <img src="logo.png" class="logoPadrao">
	</div>
    
    <div id="bordaMenu">
        <form name="form" method="post" action="home.php" >
    <p>
    <ul>
    <li>  <i class="fas fa-arrow-alt-circle-right"></i> <a href="home.php">HOME</a></li>
    <li>  <i class="fas fa-arrow-alt-circle-right"></i> <a href="">CONTATO</a></li>
    <li>  <i class="fas fa-arrow-alt-circle-right"></i> <a href="intranet.html">INTRANET</a></li>
    <li><select name="marca" class="mar"><option value="0">MARCA</option>
        <?php
        $conectar = mysqli_connect('localhost','root','');
        $banco = mysqli_select_db($conectar, 'revenda');



             $sql1 = "SELECT codmarca, nome FROM marcas";
             $resultado1 = mysqli_query($conectar,$sql1);



             while($linha1 = mysqli_fetch_array($resultado1))
             {
             echo "<option value='".$linha1[0]."'>".$linha1[1]."</option>";
             }
             
             ?></select></li>


    <li><select name="categoria" class="cat"><option value="0">CATEGORIA</option>
    <?php
        $conectar = mysqli_connect('localhost','root','');
        $banco = mysqli_select_db($conectar, 'revenda');



             $sql1 = "SELECT codcategoria, nome FROM categorias";
             $resultado1 = mysqli_query($conectar,$sql1);



             while($linha1 = mysqli_fetch_array($resultado1))
             {
             echo "<option value='".$linha1[0]."'>".$linha1[1]."</option>";
             }
             ?></select></li>
    <li><select name="modelo" class="mod"><option value="0">MODELO</option>
    <?php
        $conectar = mysqli_connect('localhost','root','');
        $banco = mysqli_select_db($conectar, 'revenda');



             $sql1 = "SELECT codmodelo, nome, codmarca FROM modelos";
             $resultado1 = mysqli_query($conectar,$sql1);



             while($linha1 = mysqli_fetch_array($resultado1))
             {
             echo "<option value='".$linha1[0]."'>".$linha1[1]."</option>";
             }
             ?></select></li>
    <input type="submit" name="pesquisar" value="BUSCAR" class="entrarbt">
</form>
    </ul>
    </p>
    </div>
    <br>
    <div id="semanas">
        <p class="semana">
            MELHORES DA SEMANA
        </p>
            </div>
            

    <div id="central"> 

    <div class=carros>
    <div class="listaCarros">
        <img 
          src="porsche.jpg" 
          alt=""
          class="imagemCarro">
        <p class="modeloCarro">
            PORSCHE TAYCAN
        </p>
        <p class="anoCarro">
            Ano:
        </p>
        <p class="anoCarroValor">
            2020/2021
        </p>
 
        <p class="KMCarro">
            KM:
        </p>
        <p class="KMCarroValor">
            1.100
          </p>
        <p class="valorCarro">
          DE: R$ 859.000,00
        </p>
        <p class="valorCarroDesconto">
          POR: R$ 830.190,00
          </p>
    </div>
 
    <div class="listaCarros">
        <img 
          src="up.jpg" 
          alt=""
          class="imagemCarro">
        <p class="modeloCarro">
            UP 
        </p>
        <p class="anoCarro">
            Ano:
        </p>
        <p class="anoCarroValor">
            2018/2019
        </p>
 
        <p class="KMCarro">
            KM:
        </p>
        <p class="KMCarroValor">
            46.775
          </p>
        <p class="valorCarro">
            DE: R$ 51.900,00
        </p>
        <p class="valorCarroDesconto">
            POR: R$ 48.540,00
          </p>
    </div>
 
    <div class="listaCarros">
        <img 
          src="s10.jpg" 
          alt=""
          class="imagemCarro">
        <p class="modeloCarro">
            S10
        </p>
        <p class="anoCarro">
            Ano:
        </p>
        <p class="anoCarroValor">
            2018/2019
        </p>
 
        <p class="KMCarro">
            KM:
        </p>
        <p class="KMCarroValor">
            61.830
          </p>
    
        <p class="valorCarro">
            DE: R$ 139.990,00
        </p>
        <p class="valorCarroDesconto">
            POR: R$ 129.000,00
          </p>
    </div>       
   </div>
   </div> 
   <div id="barra"> 
   <img src="procure.png" class="logoo">
   </div>  

<div id="pesquisas">
   <?php
if(!empty($_POST['pesquisar']))
{
if(mysqli_num_rows($seleciona_veiculos) == 0)
{
echo '<h1>Desculpe, mas sua busca nao retornou resultados ... </h1>';
}
else
{
echo '<link rel="stylesheet" type="text/css" href="cards.css"';

while($resultado = mysqli_fetch_array($seleciona_veiculos))
{


    echo'<div class="carrosPes">';
    echo'<div class="listaCarrosPes">';
    echo ''.utf8_encode('<img src="'.$resultado['foto1'].'"  height="180" width="220" class="imagemCarrosPes" />');
    echo '<p class="modeloCarroPes">';
    echo ''.utf8_encode($resultado['descricao']);
    echo '</p>';
    echo '<p class="anoCarroPes">';
    echo 'Ano: '.utf8_encode($resultado['ano']);
    echo '</p>';
    echo '<p class="KMCarroPes">';
    echo 'Cor: '.utf8_encode($resultado['cor']);
    echo '</p>';
    echo '<p class="valorCarroPes">';
    echo 'Valor: '.utf8_encode($resultado['valor']);
    echo '</p>';
    


}
}
}
?>
</div>


</body>
</HTML>



