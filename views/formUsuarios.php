<?php

$usuario = new Usuarios;

if(isset($_POST['botaoCadastrar']) == 'cadastrar'){
    $usuario -> addUsuario($_POST['usuario'], $_POST['setor']);
}

if(isset($_POST['botaoEditar']) == 'editar'){
   $usuario -> editUsuario($_POST['usuario'], $id, $_POST['setor']);
}

?>

<section class="bloco">

    <h2>
        <i class="fa-duotone fa-users icones"></i>
        Usuários > <?php print $id =='0' ? 'Novo Registro' : 'Editando Registro' ?>
    </h2>

    <form action="" method="post">

        <?php 
        if($id == '0' or null){
    ?>

        <div class="form-group">
            <label for="usuario">Setor</label>
            <select name="setor" class="form-control" required>
                <option></option>
                <?php
                foreach(Setores::listSetor() as $setor){

                ?>
                <option value="<?=$setor['idSetor']?>"><?=$setor['setor']?></option>
                <?php
                }
                ?>

            </select>
        </div>

        <div class="form-group">
            <label for="usuario">Usuário</label>
            <input type="text" name="usuario" class="form-control" placeholder="Insira o nome do usuario" required>
        </div>
        <button type="submit" name="botaoCadastrar" class="btn btn-cadastros" value="cadastrar"><i
                class="fa-duotone fa-plus btn-icon"></i>Cadastrar</button>

        <?php
        }
        else{
            $dados = $usuario -> showUsuario($id);
    ?>

        <div class="form-group">
            <label for="usuario">Setor</label>
            <select name="setor" class="form-control" id="selectSetores" required>
                <option></option>
                <?php
                foreach(Setores::listSetor() as $setor){

                ?>
                <option value="<?=$setor['idSetor']?>"><?=$setor['setor']?></option>
                <?php
                }
                ?>

            </select>
        </div>

        <div class="form-group">
            <label for="usuario">Usuário</label>
            <input type="hidden" id="idSetor" value="<?=$dados['idSetor']?>">
            <input type="text" name="usuario" class="form-control" value="<?=$dados['usuario']?>" required>
        </div>
        <button type="submit" name="botaoEditar" class="btn btn-cadastros" value="editar"><i
                class="fa-duotone fa-pen-to-square btn-icon"></i>Editar</button>

        <?php
         }
    ?>
    </form>

</section>

<script>

         const selectSetores = document.querySelector('#selectSetores');
         const idSetor = document.querySelector('#idSetor')
         const options = [...selectSetores.options]

         options.forEach((option) =>{

            if(option.value == idSetor.value){
                option.setAttribute('selected', '')
            }
         })


</script>