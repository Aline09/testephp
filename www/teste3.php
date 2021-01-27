<?php
/*
TESTE 3
PHP, MySql

Dadas as seguintes tabelas no banco de dados:

Tabela: estados
+----------+-------+---------------+
| id | sigla | nome                |
+----------+-------+---------------+
| 12 | AC    | Acre                |
| 27 | AL    | Alagoas             |
| 13 | AM    | Amazonas            |
| 16 | AP    | Amapá               |
| 29 | BA    | Bahia               |
| 23 | CE    | Ceará               |
| 53 | DF    | Distrito Federal    |
| 32 | ES    | Espírito Santo      |
| 52 | GO    | Goiás               |
| 21 | MA    | Maranhão            |
| 31 | MG    | Minas Gerais        |
| 50 | MS    | Mato Grosso do Sul  |
| 51 | MT    | Mato Grosso         |
| 15 | PA    | Pará                |
| 25 | PB    | Paraíba             |
| 26 | PE    | Pernambuco          |
| 22 | PI    | Piauí               |
| 41 | PR    | Paraná              |
| 33 | RJ    | Rio de Janeiro      |
| 24 | RN    | Rio Grande do Norte |
| 11 | RO    | Rondônia            |
| 14 | RR    | Roraima             |
| 43 | RS    | Rio Grande do Sul   |
| 42 | SC    | Santa Catarina      |
| 28 | SE    | Sergipe             |
| 35 | SP    | São Paulo           |
| 17 | TO    | Tocantins           |
+----------+-------+---------------+

Tabela: cadastros
+----+--------------+---------------------+-----------------+-----------+
| id | nome         | email               | telefone        | id_estado |
+----+--------------+---------------------+-----------------+-----------+
| 13 | Cadastro 1   | cadastro1@mail.com  | (51) 99999-0001 |        12 |
| 34 | Cadastro 2   | cadastro2@mail.com  | (51) 99999-0002 |        31 |
|  7 | Cadastro 3   | cadastro3@mail.com  | (51) 99999-0003 |        43 |
| 19 | Cadastro 4   | cadastro4@mail.com  | (51) 99999-0004 |        23 |
| 24 | Cadastro 5   | cadastro5@mail.com  | (51) 99999-0005 |        26 |
| 11 | Cadastro 6   | cadastro6@mail.com  | (51) 99999-0006 |        12 |
| 28 | Cadastro 7   | cadastro7@mail.com  | (51) 99999-0007 |        42 |
| 16 | Cadastro 8   | cadastro8@mail.com  | (51) 99999-0008 |        43 |
|  9 | Cadastro 9   | cadastro9@mail.com  | (51) 99999-0009 |        22 |
| 23 | Cadastro 10  | cadastro10@mail.com | (51) 99999-0010 |        43 |
+----+--------------+---------------------+-----------------+-----------+

1. Efetue a alteração necessária para que na lista de cadastros a coluna Estado 
seja exibido a sigla do estado.

2. Ajuste o formulário do filtro para que dados sejam enviados no corpo da 
requisição HTTP e os campos preenchidos no formulário fiquem preenchidos
conforme foi submetido, não é necessário funcionar o filtro nos resultados.

*/

################################################################################
# MODEL 
################################################################################
function listaEstados($idEstado=0){
    
    if($idEstado!=0){
        $filtro = "WHERE id = ".$idEstado;
    }
    
    $sql = "SELECT * FROM estados ".$filtro." ORDER BY nome";
    
    //NÂO É NECESSÁRIO EFETUAR A CONEXÃO COM O BANCO
    //CASO NECESSÁRIO EDITE APENAS A QUERIE E O RESULTADO NO ARRAY
    //RESULTADO PARA A QUERIE ATUAL SENDO ESTADO = 0:
    //NOTAR QUE O ID DO CAMPO É UTILIZADO COMO CHAVE DO ARRAY
    $arrEstados[1] = ['id'=>'1','sigla'=>'AC','nome'=>'Acre'];
    $arrEstados[2] = ['id'=>'2','sigla'=>'AL','nome'=>'Alagoas'];
    $arrEstados[3] = ['id'=>'3','sigla'=>'AM','nome'=>'Amazonas'];
    $arrEstados[4] = ['id'=>'4','sigla'=>'AP','nome'=>'Amapá'];
    $arrEstados[5] = ['id'=>'5','sigla'=>'BA','nome'=>'Bahia'];
    $arrEstados[6] = ['id'=>'6','sigla'=>'CE','nome'=>'Ceará'];
    $arrEstados[7] = ['id'=>'7','sigla'=>'DF','nome'=>'Distrito Federal'];
    $arrEstados[8] = ['id'=>'8','sigla'=>'ES','nome'=>'Espírito Santo'];
    $arrEstados[9] = ['id'=>'9','sigla'=>'GO','nome'=>'Goiás'];
    $arrEstados[10] = ['id'=>'10','sigla'=>'MA','nome'=>'Maranhão'];
    $arrEstados[11] = ['id'=>'11','sigla'=>'MG','nome'=>'Minas Gerais'];
    $arrEstados[12] = ['id'=>'12','sigla'=>'MS','nome'=>'Mato Grosso do Sul'];
    $arrEstados[13] = ['id'=>'13','sigla'=>'MT','nome'=>'Mato Grosso'];
    $arrEstados[14] = ['id'=>'14','sigla'=>'PA','nome'=>'Pará'];
    $arrEstados[15] = ['id'=>'15','sigla'=>'PB','nome'=>'Paraíba'];
    $arrEstados[16] = ['id'=>'16','sigla'=>'PE','nome'=>'Pernambuco'];
    $arrEstados[17] = ['id'=>'17','sigla'=>'PI','nome'=>'Piauí'];
    $arrEstados[18] = ['id'=>'18','sigla'=>'PR','nome'=>'Paraná'];
    $arrEstados[19] = ['id'=>'19','sigla'=>'RJ','nome'=>'Rio de Janeiro'];
    $arrEstados[20] = ['id'=>'20','sigla'=>'RN','nome'=>'Rio Grande do Norte'];
    $arrEstados[21] = ['id'=>'21','sigla'=>'RO','nome'=>'Rondônia'];
    $arrEstados[22] = ['id'=>'22','sigla'=>'RR','nome'=>'Roraima'];
    $arrEstados[23] = ['id'=>'23','sigla'=>'RS','nome'=>'Rio Grande do Sul'];
    $arrEstados[24] = ['id'=>'24','sigla'=>'SC','nome'=>'Santa Catarina'];
    $arrEstados[25] = ['id'=>'25','sigla'=>'SE','nome'=>'Sergipe'];
    $arrEstados[26] = ['id'=>'26','sigla'=>'SP','nome'=>'São Paulo'];
    $arrEstados[27] = ['id'=>'27','sigla'=>'TO','nome'=>'Tocantins'];
    
    return $arrEstados;
    
}

function listaCadastros($idCadastro=0){
    
    if($idCadastro!=0){
        $filtro = "WHERE id = ".$idCadastro. "AND ca.id_estado = es.id";
    }
    
    $sql = "SELECT ca.id, ca.nome, ca.email, ca.telefone, ca.id_estado, es.sigla FROM cadastros ca, estados es ".$filtro." ORDER BY nome";
    
    //NÂO É NECESSÁRIO EFETUAR A CONEXÃO COM O BANCO
    //CASO NECESSÁRIO EDITE APENAS A QUERIE E O RESULTADO NO ARRAY
    //RESULTADO PARA A QUERIE ATUAL SENDO ESTADO = 0:
    //NOTAR QUE O ID DO CAMPO É UTILIZADO COMO CHAVE DO ARRAY
    $arrCadastros[13] = ['id'=>'13','nome'=>'Cadastro 1','email'=>'cadastro1@mail.com','telefone'=>'(51) 99999-0001','id_estado'=>'12', 'sigla' => 'AC'];
    $arrCadastros[34] = ['id'=>'34','nome'=>'Cadastro 2','email'=>'cadastro2@mail.com','telefone'=>'(51) 99999-0002','id_estado'=>'31', 'sigla' => 'MG'];
    $arrCadastros[7] =  ['id'=>'7' ,'nome'=>'Cadastro 3','email'=>'cadastro3@mail.com','telefone'=>'(51) 99999-0003','id_estado'=>'43', 'sigla' => 'RS'];
    $arrCadastros[19] = ['id'=>'19','nome'=>'Cadastro 4','email'=>'cadastro4@mail.com','telefone'=>'(51) 99999-0004','id_estado'=>'23', 'sigla' => 'CE'];
    $arrCadastros[24] = ['id'=>'24','nome'=>'Cadastro 5','email'=>'cadastro5@mail.com','telefone'=>'(51) 99999-0005','id_estado'=>'26', 'sigla' => 'PE'];
    $arrCadastros[11] = ['id'=>'11','nome'=>'Cadastro 6','email'=>'cadastro6@mail.com','telefone'=>'(51) 99999-0006','id_estado'=>'12', 'sigla' => 'AC'];
    $arrCadastros[28] = ['id'=>'28','nome'=>'Cadastro 7','email'=>'cadastro7@mail.com','telefone'=>'(51) 99999-0007','id_estado'=>'42', 'sigla' => 'SC'];
    $arrCadastros[16] = ['id'=>'16','nome'=>'Cadastro 8','email'=>'cadastro8@mail.com','telefone'=>'(51) 99999-0008','id_estado'=>'43', 'sigla' => 'RS'];
    $arrCadastros[9] =  ['id'=>'9' ,'nome'=>'Cadastro 9','email'=>'cadastro9@mail.com','telefone'=>'(51) 99999-0009','id_estado'=>'22', 'sigla' => 'RR'];
    $arrCadastros[23] = ['id'=>'23','nome'=>'Cadastro 10','email'=>'cadastro10@mail.com','telefone'=>'(51) 99999-0010','id_estado'=>'43', 'sigla' => 'RS'];
    
    return $arrCadastros;
    
}

################################################################################
# CONTROLLER 
################################################################################

$arrEstados = listaEstados();
$arrCadastros = listaCadastros();


################################################################################
# VIEW 
################################################################################
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
        
        <style>
            body{width:80%;margin: 0 auto;}
            .pd10 {padding: 10px;}
            .left{float: left;}
            .w100{width: 100%;}
        </style>
    </head>

    <body>
        <form class="pd10">
            <div class="row form-group">
                <div class="col-3">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="name" />
                </div>
                <div class="col-3">
                    <label>Tipo Pessoa</label>
                    <select type="text" class="form-control" name="choosePerson">
                        <option value="">Selecione</option>
                        <option value="F">Física</option>
                        <option value="J">Jurídica</option>
                    </select>
                </div>
                <div class="col-3">
                    <label>Estado</label>
                    <select type="text" class="form-control" name="chooseState">
                        <option value="">Selecione</option>
                        <?php
                        if($arrEstados){
                            foreach($arrEstados as $idEstado => $ddEstado){
                                ?>
                                <option value="<?=$idEstado?>"><?=$ddEstado['sigla']." - ".$ddEstado['nome']?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-3">
                    <label>&nbsp;</label>
                    <input class="left w100" type="submit" class="button" value="FILTRAR" />
                </div>
            </div>
        </form>
        <hr>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($arrCadastros){
                    foreach($arrCadastros as $idCadastro => $ddCadastro){
                        ?>
                        <tr>
                            <td><?=$idCadastro?></td>
                            <td><?=$ddCadastro['nome']?></td>
                            <td><?=$ddCadastro['email']?></td>
                            <td><?=$ddCadastro['telefone']?></td>
                            <td><?=$ddCadastro['sigla']?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
<?php