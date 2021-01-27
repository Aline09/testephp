<?php

/*
TESTE 1:  
HTML, jQuery

1.Os campos referentes ao tipo de pessoa devem iniciar ocultos, ao selecionar uma 
opção do tipo de pessoa os respectivos campos devem ser exibidos.

2.Os campos referentes a preferência de contato devem iniciar ocultos, ao 
selecionar uma opção os respectivos campos devem ser exibidos.

3.Ajustar o formulário para que os dados sejam enviados no corpo da requisição 
HTTP a fim de serem consumidos por uma aplicação PHP.

*/

################################################################################
# VIEW 
################################################################################
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulário de Cadastro</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
        <script src="js/teste1.js"></script>
        <link rel="stylesheet" href="css/teste1.css">
        <style>
            form{width:50%;margin: 0 auto;background: #DDD;}
            .pd10 {padding: 10px;}
        </style>
    </head>

    <body>
        <form class="pd10" action="receiveForm.php" method="POST">
            <div class="row">
                <div class="col-12">
                    <label>Tipo Pessoa</label>
                    <select id="choosePerson" name="choosePerson" type="text" class="form-control">
                        <option value="" selected="selected">Selecione</option>
                        <option value="F">Física</option>
                        <option value="J">Jurídica</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-4 personOption F J">
                    <div class="form-group">
                        <label>Nome</label>
                        <input name="name" type="text" class="form-control" />
                    </div>
                </div>
                <div class="col-4 personOption F">
                    <div class="form-group">
                        <label>CPF</label>
                        <input name="cpf" type="text" class="form-control" />
                    </div>
                </div>
                <div class="col-4 personOption F">
                    <div class="form-group">
                        <label>Nascimento</label>
                        <input name="birthdate" type="text" class="form-control" />
                    </div>
                </div>
                <div class="col-4 personOption J">
                    <div class="form-group">
                        <label>CNPJ</label>
                        <input name="cnpj" type="text" class="form-control" />
                    </div>
                </div>
                <div class="col-4 personOption J">
                    <div class="form-group">
                        <label>Fundação</label>
                        <input name="foundation" type="text" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-6">
                    <label>Preferência de Contato</label>
                    <select name="chooseContact" id="chooseContact" type="text" class="form-control">
                        <option value="" selected="selected">Selecione</option>
                        <option value="1">E-mail</option>
                        <option value="2">Telefone</option>
                    </select>
                </div>
                <div class="col-6">
                    <div id="1" class="form-group contactOption">
                        <label>E-mail</label>
                        <input name="email" type="email" class="form-control"/>
                    </div>
                    <div id="2" class="form-group contactOption">
                        <label>Telefone</label>
                        <input name="phone" type="tel" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-success d-block w-100">Enviar</button>
                </div>
            </div>
        </form>
    </body>
</html>