<?php

$demanda = new Demandas;

if(isset($_POST['botaoCadastrar']) == 'cadastrar'){
    $demanda -> addDemanda($_POST['previsao'], $_POST['atendente'], $_POST['usuario'], $_POST['demanda'], $_POST['custo'], $_POST['obs']);
}

if(isset($_POST['botaoEditar']) == 'editar'){

    $_POST['termino'] =='' ? $termino = 'null' : $termino = $_POST['termino'];
   
    $demanda -> editDemanda($id, $_POST['previsao'], $termino, $_POST['atendente'], $_POST['usuario'], $_POST['demanda'], $_POST['custo'], $_POST['obs']);
}

?>

<section class="bloco">

    <h2>
        <i class="fa-duotone fa-comments-question icones"></i>
        Demandas > <?php print $id =='0' ? 'Novo Registro' : 'Editando Registro' ?>
    </h2>


        <form action="" method="post">

            <?php 
        if($id == '0' or null){
    ?>

            <div class="form-group">
                <label for="previsao">Data de Previsão</label>
                <input type="date" name="previsao" class="form-control" required>
            </div>

            <div class="form-group">
            <label for="atendente">Atendente</label>
            <select name="atendente" class="form-control" required>
                <option></option>
                <?php
                foreach(Atendentes::listAtendentes() as $atendente){

                ?>
                <option value="<?=$atendente['idAtendente']?>"><?=$atendente['atendente']?></option>
                <?php
                }
                ?>

            </select>
        </div>

        <div class="form-group">
            <label for="usuario">Usuário</label>
            <select name="usuario" class="form-control" required>
                <option></option>
                <?php
                foreach(Usuarios::listUsuarios() as $usuario){

                ?>
                <option value="<?=$usuario['idUsuario']?>"><?=$usuario['usuario']?></option>
                <?php
                }
                ?>

            </select>
        </div>

        <div class="form-group">
                <label for="demanda">Demanda</label>
                <input type="text" name="demanda" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="custo">Custo</label>
                <input type="text" name="custo" id="moeda" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="obs">OBS</label>
                <textarea name="obs" class="form-control"></textarea>
            </div>

            <button type="submit" name="botaoCadastrar" class="btn btn-cadastros" value="cadastrar"><i
                    class="fa-duotone fa-plus btn-icon"></i>Cadastrar</button>

            <?php
        }
        else{
            $dados = $demanda -> showDemanda($id);
    ?>

<div class="form-group">
                <label for="previsao">Data de Previsão</label>
                <input type="date" name="previsao" class="form-control" value="<?=$dados['dataPrevisao']?>" required>
            </div>

            <div class="form-group">
                <label for="termino">Data de Término</label>
                <input type="date" name="termino" class="form-control" value="<?=$dados['dataTermino']?>" >
            </div>

            <div class="form-group">
            <label for="atendente">Atendente</label>
            <select name="atendente" class="form-control" id="selectAtendentes" required>
                <option></option>
                <?php
                foreach(Atendentes::listAtendentes() as $atendente){

                ?>
                <option value="<?=$atendente['idAtendente']?>"><?=$atendente['atendente']?></option>
                <?php
                }
                ?>

            </select>
        </div>

        <div class="form-group">
            <label for="usuario">Usuário</label>
            <select name="usuario" class="form-control" id="selectUsuarios" required>
                <option></option>
                <?php
                foreach(Usuarios::listUsuarios() as $usuario){

                ?>
                <option value="<?=$usuario['idUsuario']?>"><?=$usuario['usuario']?></option>
                <?php
                }
                ?>

            </select>
        </div>

        <div class="form-group">
                <label for="demanda">Demanda</label>
                <input type="text" name="demanda" class="form-control" value="<?=$dados['descricao']?>"  required>
            </div>

            <div class="form-group">
                <label for="custo">Custo</label>
                <input type="text" name="custo" id="moeda" class="form-control" value="<?=$dados['custo']?>"  required>
            </div>

            <div class="form-group">
                <label for="obs">OBS</label>
                <textarea name="obs" class="form-control"><?=$dados['obs']?></textarea>
            </div>

            <input type="hidden" id="idUsuario" value="<?=$dados['idUsuario']?>">
            <input type="hidden" id="idAtendente" value="<?=$dados['idAtendente']?>">


            <button type="submit" name="botaoEditar" class="btn btn-cadastros" value="editar"><i
                    class="fa-duotone fa-pen-to-square btn-icon"></i>Editar</button>

            <?php
         }
    ?>
        </form>

</section>

<script>
const selectAtendentes = document.querySelector('#selectAtendentes');
const idAtendente = document.querySelector('#idAtendente')
const optionsAtendente = [...selectAtendentes.options]

optionsAtendente.forEach((option) => {

    if (option.value == idAtendente.value) {
        option.setAttribute('selected', '')
    }
})

const selectUsuarios = document.querySelector('#selectUsuarios');
const idUsuario = document.querySelector('#idUsuario')
const optionsUsuario = [...selectUsuarios.options]

optionsUsuario.forEach((option) => {

    if (option.value == idUsuario.value) {
        option.setAttribute('selected', '')
    }
})
</script>