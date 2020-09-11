<?php

//Atribuição de variáveis 
$nome = $_POST['txtNome'];
$endereco = $_POST["txtEndereco"];
$cpf = $_POST["txtCPF"];
$estado = $_POST["listEstados"];
$dataNascimento = $_POST["txtData"];
$sexo = $_POST["sexo"];
$checkInteresse = $_POST["checkInteresse"];
$boolean_cinema = 0;
$boolean_informatica = 0;
$boolean_musica = 0;

    if ($checkInteresse == "Informatica") {
        $boolean_informatica = 1;
    }

    if ($checkInteresse == "Cinema") {
        $boolean_cinema = 1;
    }

    if ($checkInteresse == "Musica") {
        $boolean_musica = 1;
    }

$login = $_POST["txtLogin"];
$senha1 = $_POST["txtSenha1"];
$senha2 = $_POST["txtSenha2"];

//Alterar a data de nascimento de dia/mes/ano para ano/mes/dia

$arrayDataNascimento = explode("/", $dataNascimento);
$arrayDataNascimento[0];
$arrayDataNascimento[1];
$arrayDataNascimento[2];

$dataNascimento_sql = $arrayDataNascimento[2] . "-" . $arrayDataNascimento[1] . "-" . $arrayDataNascimento[0];




if ($senha1 != $senha2) {
    header("location:formulario.php?erro=Senhas não conferem.");
    die();
}


echo var_dump ($_POST);


if ($nome != "") {
        
    include_once "conexaobd.php";

    try {
        $comando_SQL = "INSERT INTO `cliente`
        (`estado_sigla`, `nome`, `cpf`, `endereco`,
        `data_nascimento`, `sexo`, `login`, `senha`, `cinema`,
        `musica`, `informatica`) 
    
        VALUES 
        ('$estado','$nome','$cpf','$endereco',
        '$dataNascimento_sql','$sexo','$login','$senha1','$boolean_cinema',
        '$boolean_musica','$boolean_informatica')";


        $retorno = $conexaoBanco->query($comando_SQL);

        echo ("Registro inserido com sucesso!");
    } catch (Exception $ex) {
        echo ("Erro ao tentar inserir!");
    }



    $consulta_SQL = "SELECT
     `id_cliente`, `estado_sigla`, `nome`, `cpf`, `endereco`,
      `data_nascimento`, `sexo`, `login`, `senha`, `cinema`,
       `musica`, `informatica` 
       FROM `cliente` 
       WHERE 1=1";

       $retorno_consulta = $conexaoBanco->Query($consulta_SQL);

       //imprimir tabela

        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Código</th>";
        echo "<th>Nome</th>";
        echo "<th>CPF</th>";
        echo "<th>Endereço</th>";
        echo "<th>Estado</th>";
        echo "<th> Data de nascimento</th>";
        echo "<th>Sexo</th>";
        echo "<th>Login</th>";
        echo "<th>Interesse Cinema</th>"; 
        echo "<th>Interesse Música</th>"; 
        echo "<th>Interesse Informática</th>";      
        echo "</tr>";  


       while ($registro = $retorno_consulta -> fetch(PDO::FETCH_ASSOC)) {
           $id_cliente = $registro["id_cliente"];
           $estado_sigla = $registro["estado_sigla"];
           $nome = $registro["nome"];
           $cpf = $registro["cpf"];
           $endereco = $registro["endereco"];
           $dataNascimento = $registro["data_nascimento"];
           $sexo = $registro["sexo"];
           $estado_sigla = $registro["estado_sigla"];
           $login = $registro["login"];
           $senha = $registro["senha"];
           $cinema = $registro["cinema"];
           $musica = $registro["musica"];
           $informatica = $registro["informatica"];
           
          
           echo "<tr>";
           echo "<td>$id_cliente</td>";
           echo "<td>$nome</td>";
           echo "<td>$cpf</td>";
           echo "<td>$endereco</td>";
           echo "<td>$estado_sigla</td>";
           echo "<td>$dataNascimento</td>";
           echo "<td>$sexo</td>";
           echo "<td>$login</td>";
           echo "<td>$cinema</td>"; 
           echo "<td>$musica</td>"; 
           echo "<td>$informatica</td>";      
           echo "</tr>";  

       }

       echo "</table>";
       die("Consulta realizada e registros existentes retornados!");

}

else {
    die("Preencha o nome!");
}
