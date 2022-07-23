<section class="bloco">
    <h2>
        <i class="fa-duotone fa-user-headset icones"></i>
        Atendentes
    </h2>

    <div class="novo">
        <a href="<?=$urlBase?>/formAtendentes">
            <button class="button-icon btn-inserir"><i class="fa-duotone fa-plus btn-icon"></i>Inserir Novo</button>
        </a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Atendente</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

        <?php

            $dados = Atendentes::listAtendentes();

            if(count($dados) > 0){

            foreach($dados as $linhas){

        ?>  

            <tr>
                <td><?=$linhas['atendente']?></td>
                <td>
                    <a href="<?=$urlBase?>/formAtendentes/<?=$linhas['idAtendente']?>" class="button-icon btn-editar"><i class="fa-duotone fa-pen-to-square"></i></a>
                    <a href="<?=$urlBase?>/excluir/<?=$linhas['idAtendente']?>/atendentes" class="button-icon btn-excluir"><i class="fa-duotone fa-trash-can"></i></a>
                </td>
            </tr>

            <?php
            }
        }else{
            ?>
            <tr>
                <td colspan="3">Sem registro no momento.</td>
            </tr>

            <?php
        }
        ?>
        </tbody>

    </table>

</section>
