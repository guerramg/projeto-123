<?php

$setor = new Setores;

if(isset($_POST['botaoCadastrar']) == 'cadastrar'){
    $setor -> addSetor($_POST['setor']);
}
if(isset($_POST['botaoEditar']) == 'editar'){
   $setor -> editSetor($_POST['setor'], $id);
}

?>

<section class="bloco">

    <h2>
        <i class="fa-duotone fa-fax icones"></i>
        Setores > <?php print $id =='0' ? 'Novo Registro' : 'Editando Registro' ?>
    </h2>

    <form action="" method="post">
        
    <?php 
        if($id == '0' or null){
    ?>

        <div class="form-group">
            <label for="setor">Setor</label>
            <input type="text" name="setor" class="form-control" placeholder="Insira o nome do setor" required>
        </div>
        <button type="submit" name="botaoCadastrar" class="btn btn-cadastros" value="cadastrar"><i class="fa-duotone fa-plus btn-icon"></i>Cadastrar</button>

<?php
        }
        else{
            $dados = $setor -> showSetor($id);
    ?>

        <div class="form-group">
            <label for="setor">Setor</label>
            <input type="text" name="setor" class="form-control" value="<?=$dados['setor']?>" required>
        </div>
        <button type="submit" name="botaoEditar" class="btn btn-cadastros" value="editar"><i class="fa-duotone fa-pen-to-square btn-icon"></i>Editar</button>

    <?php
         }
    ?>
    </form>

</section>