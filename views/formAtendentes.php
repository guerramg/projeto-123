<?php

$atendente = new Atendentes;

if(isset($_POST['botaoCadastrar']) == 'cadastrar'){
    $atendente -> addAtendentes($_POST['atendente']);
}
if(isset($_POST['botaoEditar']) == 'editar'){
   $atendente -> editAtendentes($_POST['atendente'], $id);
}

?>

<section class="bloco">

    <h2>
        <i class="fa-duotone fa-user-headset icones"></i>
        Atendentes > <?php print $id =='0' ? 'Novo Registro' : 'Editando Registro' ?>
    </h2>

    <form action="" method="post">
        
    <?php 
        if($id == '0' or null){
    ?>

        <div class="form-group">
            <label for="atendente">Atendente</label>
            <input type="text" name="atendente" class="form-control" placeholder="Insira o nome do atendente" required>
        </div>
        <button type="submit" name="botaoCadastrar" class="btn btn-cadastros" value="cadastrar"><i class="fa-duotone fa-plus btn-icon"></i>Cadastrar</button>

<?php
        }
        else{
            $dados = $atendente -> showAtendentes($id);
    ?>

        <div class="form-group">
            <label for="atendente">Atendente</label>
            <input type="text" name="atendente" class="form-control" value="<?=$dados['atendente']?>" required>
        </div>
        <button type="submit" name="botaoEditar" class="btn btn-cadastros" value="editar"><i class="fa-duotone fa-pen-to-square btn-icon"></i>Editar</button>

    <?php
         }
    ?>
    </form>

</section>