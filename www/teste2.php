<?php
    try {
        $pdo = new PDO("mysql:dbname=teste;host=db",'root','root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
/*
TESTE 2:
MySql

Dada a seguinte tabela:

Tabela: cadastros
+----+--------------+---------------------+-----------------+-----------+
| id | nome         | email               | telefone        | id_estado |
+----+--------------+---------------------+-----------------+-----------+
+----+--------------+---------------------+-----------------+-----------+

Nossa API consulta um webservice para buscar leads, o webservice retornou o 
seguinte json:

{"13":{"id":"13","nome":"Cadastro 1","email":"cadastro1@mail.com","telefone":"(51) 99999-0001","id_estado":"12"},"34":{"id":"34","nome":"Cadastro 2","email":"cadastro2@mail.com","telefone":"(51) 99999-0002","id_estado":"31"},"7":{"id":"7","nome":"Cadastro 3","email":"cadastro3@mail.com","telefone":"(51) 99999-0003","id_estado":"43"},"19":{"id":"19","nome":"Cadastro 4","email":"cadastro4@mail.com","telefone":"(51) 99999-0004","id_estado":"23"},"24":{"id":"24","nome":"Cadastro 5","email":"cadastro5@mail.com","telefone":"(51) 99999-0005","id_estado":"26"},"11":{"id":"11","nome":"Cadastro 6","email":"cadastro6@mail.com","telefone":"(51) 99999-0006","id_estado":"12"},"28":{"id":"28","nome":"Cadastro 7","email":"cadastro7@mail.com","telefone":"(51) 99999-0007","id_estado":"42"},"16":{"id":"16","nome":"Cadastro 8","email":"cadastro8@mail.com","telefone":"(51) 99999-0008","id_estado":"43"},"9":{"id":"9","nome":"Cadastro 9","email":"cadastro9@mail.com","telefone":"(51) 99999-0009","id_estado":"22"},"23":{"id":"23","nome":"Cadastro 10","email":"cadastro10@mail.com","telefone":"(51) 99999-0010","id_estado":"43"}}

1. O campo id da tabela é auto incremental, efetue a alteração necessária para 
que o campo id seja preenchido pelo banco de dados.
 
2. Efetue alterações de maneira que consuma o mínimo possível de recursos do 
banco de dados, visto que o webservice pode trazer n resultados.

Não é necessário conectar com o banco de dados, caso necessário apenas informar
a querie adicional ou editar a(s) existente(s) e executar a função.

 * 
*/

################################################################################
# CONTROLLER 
################################################################################

function executaSql($sql){
    
    //CONSIDERE QUE A QUERIE FOI EXECUTADA
    echo '<pre>';
        var_dump($sql);
    echo '</pre>';
    
    return true;
    
}

$jsonRetornoAPI = '{"13":{"id":"13","nome":"Cadastro 1","email":"cadastro1@mail.com","telefone":"(51) 99999-0001","id_estado":"12"},"34":{"id":"34","nome":"Cadastro 2","email":"cadastro2@mail.com","telefone":"(51) 99999-0002","id_estado":"31"},"7":{"id":"7","nome":"Cadastro 3","email":"cadastro3@mail.com","telefone":"(51) 99999-0003","id_estado":"43"},"19":{"id":"19","nome":"Cadastro 4","email":"cadastro4@mail.com","telefone":"(51) 99999-0004","id_estado":"23"},"24":{"id":"24","nome":"Cadastro 5","email":"cadastro5@mail.com","telefone":"(51) 99999-0005","id_estado":"26"},"11":{"id":"11","nome":"Cadastro 6","email":"cadastro6@mail.com","telefone":"(51) 99999-0006","id_estado":"12"},"28":{"id":"28","nome":"Cadastro 7","email":"cadastro7@mail.com","telefone":"(51) 99999-0007","id_estado":"42"},"16":{"id":"16","nome":"Cadastro 8","email":"cadastro8@mail.com","telefone":"(51) 99999-0008","id_estado":"43"},"9":{"id":"9","nome":"Cadastro 9","email":"cadastro9@mail.com","telefone":"(51) 99999-0009","id_estado":"22"},"23":{"id":"23","nome":"Cadastro 10","email":"cadastro10@mail.com","telefone":"(51) 99999-0010","id_estado":"43"}}';

$arrRetornoApi = json_decode($jsonRetornoAPI, true);


if(count($arrRetornoApi) > 0){
    
    foreach($arrRetornoApi as $idRegistroApi => $ddRegistroApi){
        
        //$sql = "INSERT INTO cadastros (id,nome,email,telefone,id_estado) VALUES (".(implode(",",$ddRegistroApi)).");";
        
        $insertRegister = $pdo->prepare('INSERT INTO cadastros (nome, email, telefone, id_estado) VALUES (:nome, :email, :telefone, :id_estado)');
        $insertRegister->execute(array(
            ':nome' => $ddRegistroApi['nome'],
            ':email' => $ddRegistroApi['email'],
            ':telefone' => $ddRegistroApi['telefone'],
            ':id_estado' => $ddRegistroApi['id_estado']
        ));
        
        executaSql($insertRegister);
        
    }
    
}

