<?php
require ("./funcoes.php");
$funcionarios = lerArquivo("./funcionarios.json");

if(isset($_GET["buscarFuncionario"])){
    $funcionarios = buscarFuncionario($funcionarios, $_GET["buscarFuncionario"]);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Funcionários JSON</title>
</head>
<body>
    <h1>Funcionários da empresa X</h1>
    <?php
    $counter = 0;
    foreach($funcionarios as $funcionario)
    {
      if($funcionario == true)
        $counter++;
    }

    echo "A empresa conta com $counter funcionários.";
    
    ?>
    <form action="">
        <input type="text" value="<?=isset($_GET["buscarFuncionario"]) ? $_GET["buscarFuncionario"] : "" ?>" placeholder="Buscar Funcionario" name="buscarFuncionario">
        <button>Buscar</button>
    </form>

    <button id="btnAddFuncionario">Adicionar Funcionário</button>
    <div class="modal-form">
    
    <form id="form-funcionario" action="acoes.php" method="POST">
    <h1>Adicionar Funcionario</h1>
        <input type="text" placeholder="Digite o ID" name="id"> 
        <input type="text" placeholder="Digite o primeiro nome" name="first_name"> 
        <input type="text" placeholder="Digite o segundo nome" name="last_name"> 
        <input type="text" placeholder="Digite o e-mail" name="email"> 
        <input type="text" placeholder="Digite o gênero" name="Gender"> 
        <input type="text" placeholder="Digite o endereço de ip" name="ip_adress"> 
        <input type="text" placeholder="Digite o país" name="Country"> 
        <input type="text" placeholder="Digite o departamento" name="Department"> 
        <button>Salvar</button>
    </form>
    </div>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>E-mail</th>
            <th>Gender</th>
            <th>IP Adress</th>
            <th>Country</th>
            <th>Department</th>
        </tr>
        <?php
        foreach($funcionarios as $funcionario) :
            ?>
            <tr>
                <td><?=$funcionario->id?></td>
                <td><?=$funcionario->first_name?></td>
                <td><?=$funcionario->last_name?></td>
                <td><?=$funcionario->email?></td>
                <td><?=$funcionario->gender?></td>
                <td><?=$funcionario->ip_address?></td>
                <td><?=$funcionario->country?></td>
                <td><?=$funcionario->department?></td>
            </tr>
            <?php
        endforeach;
        ?>
    </table>
    <footer>
        <span> Copyright &copy; 2021 | Ana Oliveira</span>
    </footer>
</body>
</html>