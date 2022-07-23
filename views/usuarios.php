<section class="bloco">
    <h2>
        <i class="fa-duotone fa-users icones"></i>
        Usuários
    </h2>

    <div class="novo">
        <a href="<?=$urlBase?>/formUsuarios">
            <button class="button-icon btn-inserir"><i class="fa-duotone fa-plus btn-icon"></i>Inserir Novo</button>
        </a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Setor</th>
                <th>Usuário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

        <?php

            $dados = Usuarios::listUsuarios();

            if(count($dados) > 0){

            foreach($dados as $linhas){

        ?>  

            <tr>
                <td><?=$linhas['setor']?></td>
                <td><?=$linhas['usuario']?></td>
                <td>
                    <a href="<?=$urlBase?>/formUsuarios/<?=$linhas['idUsuario']?>" class="button-icon btn-editar"><i class="fa-duotone fa-pen-to-square"></i></a>
                    <a href="<?=$urlBase?>/excluir/<?=$linhas['idUsuario']?>/usuarios" class="button-icon btn-excluir"><i class="fa-duotone fa-trash-can"></i></a>
                </td>
            </tr>

            <?php
            }
        }else{
            ?>
            <tr>
                <td colspan="4">Sem registro no momento.</td>
            </tr>

            <?php
        }
        ?>
        </tbody>

    </table>

</section>
