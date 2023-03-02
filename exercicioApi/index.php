<!DOCTYPE html>
<link rel = "stylesheet" href = "grid_estilo.css">
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="path-para-seu-script"></script>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Exercicio API Covid</title>
    </head>
    <body>
        <div class="text-center">
            <h1>API Covid - Países</h1>
        </div>
        <?php
        // url1 = brazil, url2 = australia, url3 = canada
        $url = "https://dev.kidopilabs.com.br/exercicio/covid.php?pais=Brazil";
        $url2 = "https://dev.kidopilabs.com.br/exercicio/covid.php?pais=Australia";
        $url3 = "https://dev.kidopilabs.com.br/exercicio/covid.php?pais=Canada";
        $urlP = "https://dev.kidopilabs.com.br/exercicio/covid.php?listar_paises=1";
       
        $resultado = json_decode(file_get_contents($url));
        $resultadoP = json_decode(file_get_contents($urlP), true);
        $resultado2 = json_decode(file_get_contents($url2));
        $resultado3 = json_decode(file_get_contents($url3));
       
        // conexão do banco

        $localhost = "localhost";
        $user = "root";
        $password = "";
        $banco = "exercicio-api";

        // PDO
        $pdo = new PDO("mysql:dbname=".$banco."; host=".$localhost, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->query("SELECT * FROM acesso");
        $sql->execute();

        $sql = "SELECT MAX(id_acesso) as id_acesso FROM acesso";
        $sql = $pdo->query($sql);
        $row = $sql->fetch();

        $ultimo_id = $row['id_acesso'];

        $sql = "SELECT data, pais FROM acesso WHERE id_acesso='$ultimo_id'";
        $sql = $pdo->query($sql);
        $row = $sql->fetch();

        $data = $row['data'];
        $pais = $row['pais'];

     
// SELECIONA 3 PAISES
?> <br> </br> 
    <h4> Escolha um dos 3 países abaixo para saber mais: </h4>
<style>
.Brazil,.Australia,.Canada,.DivBrazil,.DivAustralia,.DivCanada{display:none;}  

    
</style>   
       
<form id="form" action="#" method='POST'>
        <div class="Container">
        
            <select name="SelectOptions" style="width:200px;height:40px;" id="SelectOptions" required>
                <option value="">Selecione um país</option>
                <option value="Brazil"><?=$resultadoP[24]?></option>
                <option value="Australia"><?=$resultadoP[9]?></option>
                <option value="Canada"><?=$resultadoP[33]?></option>
            </select>
       

        <?php
   
        $query = "INSERT INTO acesso (data, pais) VALUES (:data, :pais)";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['data' => date('Y-m-d H:i:s'), 'pais' => $_POST['SelectOptions'] ]);

        ?>
    
        <div class="DivPai">
            <div class="Brazil">
                <h3>Brazil</h3> 
                <?php

                //BRAZIL
                    $soma = 0;
                    $somaConfirmados = 0;
                    foreach($resultado as $somaM){
                        $soma += $somaM->Mortos;
                        $somaConfirmados += $somaM->Confirmados;
                    }
                    
                    echo "Quantidade Total de Casos Confirmados de Covid: " . $somaConfirmados; ?>  <br> </br> <?php
                    echo "Quantidade Total de Mortos pela Covid: " . $soma; ?>  
                    
                    <br> </br>
                   
                    <button type="button" id="btn1-mostrar"class="btn btn-primary"><span></span>Mostrar Detalhes</button>
                    <br> </br>
            </div>
            <div class="DivBrazil">   
                        <?php
                    
                            //foreach do Brazil       
                            foreach($resultado as $chave){
                                echo "Estado: " . $chave->ProvinciaEstado; ?>  <br> </br> <?php
                                echo "Total de Casos Confirmados: " . $chave->Confirmados;?>  <br> </br> <?php
                                echo "Número de Mortos: " . $chave->Mortos;?>  <br> </br> <?php
                                echo "<hr>";
                            }
                        ?>
                    
            </div>
    
            <div class="Australia">
                <h3>Australia</h3>
                <?PHP

                //AUSTRALIA
                    $soma = 0;
                    $somaConfirmados = 0;
                    foreach($resultado2 as $somaA){
                        $soma += $somaA->Mortos;
                        $somaConfirmados += $somaA->Confirmados;
                    }
                    
                    echo "Quantidade Total de Casos Confirmados de Covid: " . $somaConfirmados; ?>  <br> </br> <?php
                    echo "Quantidade Total de Mortos pela Covid: " . $soma; ?>  
                    <br> </br>
                    <button type="button" id="btn2-mostrar"class="btn btn-primary"><span></span>Mostrar Detalhes</button>
                    <br> </br>
            </div>
            <div class="DivAustralia">
                <?php

                    // foreach do Australia
                    foreach($resultado2 as $chaveA){
                        echo "Estado: " . $chaveA->ProvinciaEstado; ?>  <br> </br> <?php
                        echo "Total de Casos Confirmados: " . $chaveA->Confirmados;?>  <br> </br> <?php
                        echo "Número de Mortos: " . $chaveA->Mortos;?>  <br> </br> <?php
                        echo "<hr>";
                    }
                ?>    
            </div>
    
            <div class="Canada">
             <h3>Canada</h3> 
                <?php
                //CANADA
                    $soma = 0;
                    $somaConfirmados = 0;
                    foreach($resultado3 as $somaC){
                        $soma += $somaC->Mortos;
                        $somaConfirmados += $somaC->Confirmados;
                    }
                    
                    echo "Quantidade Total de Casos Confirmados de Covid: " . $somaConfirmados; ?>  <br> </br> <?php
                    echo "Quantidade Total de Mortos pela Covid: " . $soma; ?>  
                    <br> </br>
                    <button type="button" id="btn3-mostrar"class="btn btn-primary"><span></span>Mostrar Detalhes</button> 
                    <br> </br>
            </div>
            <div class="DivCanada"
                <?php
                
                    // foreach da Canada
                    foreach($resultado3 as $chaveC){
                        echo "Estado: " . $chaveC->ProvinciaEstado; ?>  <br> </br> <?php
                        echo "Total de Casos Confirmados: " . $chaveC->Confirmados;?>  <br> </br> <?php
                        echo "Número de Mortos: " . $chaveC->Mortos;?>  <br> </br> <?php
                        echo "<hr>";
                    }
                ?>
            </div>
        </div>
    </div> 
</form>
  <br> </br>
    </body>
    <footer>
        <div class="container">
            <div class="row gy-3">
                <div class="col">
                    <h3>Data de acesso</h3>
                    <h2><span class="material-icons"></span><?php echo $data?></h2>  
                </div>
                <div class="col">
                    <h3>País</h3>
                    <h2><span class="material-icons"></span><?php echo $pais?></h2> 
                </div>  
            </div>
        </div>
    </footer>
</html>

<script>
//Funções após a leitura do documento
$(document).ready(function() {
    //Select para mostrar e esconder divs
    $('#SelectOptions').on('change',function(){
        var SelectValue='.'+$(this).val();
        $('.DivPai div').hide();
        
        $('.Brazil div').show();
        $('.DivBrazil div').hide();

        $('.Australia div').show();
        $('.DivAustralia div').hide();

        $('.Canada div').show();
        $('.DivCanada div').hide();
        

        $(SelectValue).toggle();
    });
});

//evento do btn brazil
var btn1 = document.querySelector("#btn1-mostrar");
var container = document.querySelector(".DivBrazil");

btn1.addEventListener('click', function(){

if(container.style.display === 'block'){
    container.style.display = 'none';
    document.getElementById("form").submit();
} else {
    container.style.display = 'block';
  
 
}
});

//evento do btn australia
var btn2 = document.querySelector("#btn2-mostrar");
var containerA = document.querySelector(".DivAustralia");

btn2.addEventListener('click', function(){

if(containerA.style.display === 'block'){
    containerA.style.display = 'none';
    document.getElementById("form").submit();
} else {
    containerA.style.display = 'block';
}
});

//evento do btn canada
var btn3 = document.querySelector("#btn3-mostrar");
var containerC = document.querySelector(".DivCanada");

btn3.addEventListener('click', function(){

if(containerC.style.display === 'block'){
    containerC.style.display = 'none';
    document.getElementById("form").submit();
} else {
    containerC.style.display = 'block';
}
});
</script>    