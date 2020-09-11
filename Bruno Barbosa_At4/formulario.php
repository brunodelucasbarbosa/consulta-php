<?php
if (isset($_GET['erro'])){
    $erro = "Mensagem de erro: " . $_GET['erro'];
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu primeiro formulário</title>
</head>
<body>
    <form method="POST" name="formulario"
            enctype="multipart/form-data"
            action="processarCadastro.php">

            <h1>Cadastro de clientes</h1>

            <h3 style="color: red;"> <?php echo (isset($erro)?$erro:""); ?> </h3>

            <table width="100%">
                <tr>
                    <th width="18%"> Nome</th>
                    <td width="82%"> <input type="text" name="txtNome">
                    </td>
                </tr>
                <tr>
                    <th>CPF</th>
                    <td>
                        <input name="txtCPF" type="text" maxlength="14">
                    </td>
                </tr>
                <tr>
                    <th>Endereço</th>
                    <td><textarea name="txtEndereco" cols="30" rows="5"></textarea></td>
                </tr>
                <tr>
                    
                    <th>Estado</th>
                    <td>
                    <select name="listEstados">
                        <option value="Bahia">Bahia</option>
                        <option value="Espírito Santo">Espírito Santo</option>
                        <option value="Minas Gerais">Minas Gerais</option>
                        <option value="Rio de Janeiro">Rio de Janeiro</option>
                        <option value="São Paulo">São Paulo</option>
                </select> 
            </td>
            </tr>
            <tr>
                <th>Data de Nascimento</th>
                <td> <input name="txtData" type="text" maxlength="10"> </td>
            </tr>
            <tr>
                <th>Sexo</th>
                <td>
                    <input type="radio" name="sexo" value="Masculino" checked>
                    Masculino <BR>
                    <input type="radio" name="sexo" value="Feminino" />
                    Feminino 
                </td>
            </tr>
            <tr>
                <th>Áreas de Interesse</th>
                    <td>
                        <input name="checkInteresse" type="checkbox" value="Cinema"> Cinema <BR>
                        <input name="checkInteresse" type="checkbox" value="Musica"> Música <BR>
                        <input name="checkInteresse" type="checkbox" value="Informatica"> Informática <BR>
                    </td>
            </tr>
            <tr>
                <th>Login</th>
                <td><input name="txtLogin" type="text"> </td>
            </tr>

            <tr>
                <th>Senha</th>
                <td><input name="txtSenha1" type="password"> </td>
            </tr>

            <tr>
                <th>Confirmação de Senha</th>
                <td><input name="txtSenha2" type="password"> </td>
            </tr>

            <tr>
                <th>Foto</th>
                <td><input name="fotoPessoa" type="file"> </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" name="btnEnviar" value="Enviar">
                </td>
                <td>
                    <input type="reset" name="btnLimpar" value="Limpar">
                </td>
            </tr>
            
        </table>
    </form>
    
</body>
</html>