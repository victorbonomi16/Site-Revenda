<?php

    //iniciar a sessao com o database

    session_start();
    $conectar = mysqli_connect('localhost','root','');
    $banco    = mysqli_select_db($conectar,'revenda');
     
     // se clicou no botao gravar
     
if (isset($_POST['bt_cadastrar']))
{
    $codautomovel   = $_POST['codautomovel'];
    $descricao  = $_POST['descricao'];
    $codmodelo = $_POST['codmodelo'];
    $codcategoria = $_POST['codcategoria'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];
    $placa = $_POST['placa'];
    $localizacao = $_POST['localizacao'];
    $tipocombustivel = $_POST['tipocombustivel'];
    $opcionais = $_POST['opcionais'];
    $valor = $_POST['valor'];
    $foto1       = $_FILES['foto1']; 
    $foto2       = $_FILES['foto2'];
    $foto3      = $_FILES['foto3']; 
    $error = 0;

    if (!empty($foto1['name']))
    {
        // Largura maxima em pixels
        $largura = 2000;
        // Altura maxima em pixels
        $altura = 2000;
        // Tamanho maximo do arquivo em bytes
        $tamanho = 15000;

        // Verifica se o arquivo nao e uma imagem (extensoes)
        if(!preg_match("/^image\/(jpg|jpeg|png|gif|bmp)$/",$foto1['type'])){
            $error[1] = "NAO é uma imagem...";
            }

        // capturar as dimensoes da imagem
        $dimensoes = getimagesize($foto1['tmp_name']);

        // Verifica se a largura da imagem maior que a largura permitida
        if($dimensoes[0] > $largura) {
            $error[2] = "A largura da imagem nÃ£o deve ultrapassar 200 pixels";
        }

        // Verifica se a altura da imagem  maior que a altura permitida
        if($dimensoes[1] > $altura) {
            $error[3] = "Altura da imagem nÃ£o deve ultrapassar 200 pixels";
        }

        // Verifica se o tamanho da imagem maior que o tamanho permitido
        if($foto1['size'] > $tamanho) {
                $error[4] = "A imagem deve ter no mÃ¡ximo 5000 bytes";
        }

        // Se nao houver nenhum erro
        if ($error == 0)
        {
            // Pega extensao da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i",$foto1['name'],$ext);
            $nome_imagem1 = md5(uniqid(time())).".".$ext[1];
            $caminho_imagem1 = "fotos/".$nome_imagem1;
            move_uploaded_file($foto1['tmp_name'],$caminho_imagem1);

            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i",$foto2['name'],$ext);
            $nome_imagem2 = md5(uniqid(time())).".".$ext[1];
            $caminho_imagem2 = "fotos/".$nome_imagem2;
            move_uploaded_file($foto2['tmp_name'],$caminho_imagem2);

            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i",$foto3['name'],$ext);
            $nome_imagem3 = md5(uniqid(time())).".".$ext[1];
            $caminho_imagem3 = "fotos/".$nome_imagem3;
            move_uploaded_file($foto3['tmp_name'],$caminho_imagem3);


             $query = "INSERT INTO automovel (codautomovel, descricao, codmodelo, codcategoria, ano, cor, placa, localizacao, tipocombustivel, opcionais, valor, foto1,foto2,foto3)
             VALUES ('$codautomovel','$descricao','$codmodelo','$codcategoria','$ano','$cor','$placa','$localizacao','$tipocombustivel','$opcionais','$valor','$caminho_imagem1','$caminho_imagem2','$caminho_imagem3')"; 

            $insert = mysqli_query($conectar,$query) or die(' Erro na query:' . $query . ' ' . mysqli_error($conectar) );

 
            if($insert){
            echo"<script language='javascript' type='text/javascript'>
            alert('Automovel cadastrado com sucesso!');
            window.location.href='automovel.html'</script>";
            }
            else
            {
            echo"<script language='javascript' type='text/javascript'>
            alert('Nao foi possivel cadastrar este automovel!');
            window.location.href='automovel.html'</script>";
            }
        }
    }

}  

if (isset($_POST['bt_excluir'])) // se clicou no bot�o excluir
{
    $codautomovel   = $_POST['codautomovel'];
    $descricao  = $_POST['descricao'];
    $codmodelo = $_POST['codmodelo'];
    $codcategoria = $_POST['codcategoria'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];
    $placa = $_POST['placa'];
    $localizacao = $_POST['localizacao'];
    $tipocombustivel = $_POST['tipocombustivel'];
    $opcionais = $_POST['opcionais'];
    $valor = $_POST['valor'];
    $foto1      = $_FILES['foto1'];
    $foto2       = $_FILES['foto2']; 
    $foto3       = $_FILES['foto3'];   
    
    //comando mysql para deletarr
    $sql  = "delete from automovel where codautomovel = '$codautomovel'";
    $resultado = mysqli_query($conectar,$sql);



    if ($resultado == 1)
            {
            ?>
            <script>
                alert("Exclusao efetuada com sucesso.");
                location.href="automovel.html";
            </script>
            <?php
            }
    else
            {
            ?>
            <script>
                alert("Erro... Nao foi possivel excluir. ");
                location.href="automovel.html";
            </script>
            <?php
            }
}


if (isset($_POST['bt_alterar'])) // se clicou no bot�o alterar
{
    $codautomovel   = $_POST['codautomovel'];
    $descricao  = $_POST['descricao'];
    $codmodelo = $_POST['codmodelo'];
    $codcategoria = $_POST['codcategoria'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];
    $placa = $_POST['placa'];
    $localizacao = $_POST['localizacao'];
    $tipocombustivel = $_POST['tipocombustivel'];
    $opcionais = $_POST['opcionais'];
    $valor = $_POST['valor'];
    $foto1       = $_FILES['foto1']; 
    $foto2       = $_FILES['foto2'];
    $foto3      = $_FILES['foto3']; 



    //comando mysql para alterar
    $sql  = "update automovel set descricao = '$descricao',
                                   codmodelo = '$codmodelo',
                                   codcategoria = '$codcategoria',
                                   ano = '$ano',
                                   cor = '$cor',
                                   placa = '$placa',
                                   localizacao = '$localizacao',
                                   tipocombustivel = '$tipocombustivel',
                                   opcionais = '$opcionais',
                                   valor = '$valor',
                                   foto1 = '$foto1',
                                   foto2 = '$foto2',
                                   foto3 = '$foto3'
             where codautomovel = '$codautomovel'";
             $resultado = mysqli_query($conectar,$sql) or die(' Erro na query:' . $sql . ' ' . mysqli_error($conectar) );



    if ($resultado == 1)
            {
            ?>
            <script>
                alert("Alteracao efetuada com sucesso.");
                location.href="automovel.html";
            </script>
            <?php
            }
        else
            {
            ?>
            <script>
                alert("Erro... Nao foi possivel alterar. ");
                location.href="automovel.html";
            </script>
            <?php
            }
    
}

if (isset($_POST['bt_pesquisar'])) // se clicou no bot�o pesquisar
{
    //comando mysql para pesquisar

    $sql = ("SELECT * FROM automovel");
    $select = mysqli_query($conectar,$sql);



    while ($automovel = mysqli_fetch_object($select))
    {
    
            echo "<b>Automoveis :</b>"."</td></tr>";

            
            echo "<table><tr><td>Codigo do Automovel: ".$automovel->codautomovel." </td></tr>";
            echo "<tr><td>Descricao : ". $automovel->descricao." </td></tr>";
            echo "<tr><td>Codigo do modelo: ". $automovel->codmodelo." </td></tr>";
            echo "<tr><td>Codigo da Categoria: ". $automovel->codcategoria." </td></tr>";
            echo "<tr><td>Ano: ". $automovel->ano." </td></tr>";
            echo "<tr><td>Cor: ". $automovel->cor." </td></tr>";
            echo "<tr><td>Placa: ". $automovel->placa." </td></tr>";
            echo "<tr><td>Localizacao: ". $automovel->localizacao." </td></tr>";
            echo "<tr><td>Tipo de Combustivel: ". $automovel->tipocombustivel." </td></tr>";
            echo "<tr><td>Opcionais: ". $automovel->opcionais." </td></tr>";
            echo "<tr><td>Valor: ". $automovel->valor." </td></tr>";
            echo "<tr><td><img src='".$automovel->foto1."' width=100 height=100/></td></tr>";
            echo "<tr><td><img src='".$automovel->foto2."' width=100 height=100/></td></tr>";
            echo "<tr><td><img src='".$automovel->foto3."' width=100 height=100/></td></tr>";
            echo "</tr></table></div>";
    }
}

?>