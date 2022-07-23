<section class="bloco">
    <h2>
        <i class="fa-duotone fa-comments-question icones"></i>
        Demandas
    </h2>

    <div class="d-in">
        <a href="<?=$urlBase?>/formDemandas">
            <button class="button-icon btn-inserir"><i class="fa-duotone fa-plus btn-icon"></i>Inserir Novo</button>
        </a>
    </div>

    <div class="d-in">
        <a href="<?=$urlBase?>/resultBusca">
            <button class="button-icon btn-buscar"><i class="fa-duotone fa-magnifying-glass btn-icon"></i>Buscar</button>
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Cadastro</th>
                <th>Previsão</th>
                <th>Atendente</th>
                <th>Usuário</th>
                <th>Demanda</th>
                <th>Custo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

            <?php

            $dados = Demandas::listDemandas();

            if(count($dados) > 0){

            foreach($dados as $linhas){


        ?>

            <tr>
                <td><?=Demandas::dataBrasil($linhas['dataCadastro'])?></td>
                <td><?=Demandas::dataBrasil($linhas['dataPrevisao'])?></td>
                <td><?=$linhas['atendente']?></td>
                <td><?=$linhas['usuario']?></td>
                <td><?=$linhas['descricao']?></td>
                <td>R$ <?=number_format($linhas['custo'], 2, ',', '.')?></td>

                <td>
                    <a href="<?=$urlBase?>/formDemandas/<?=$linhas['idDemanda']?>" class="button-icon btn-editar"><i
                            class="fa-duotone fa-pen-to-square"></i></a>
                    <a href="<?=$urlBase?>/excluir/<?=$linhas['idDemanda']?>/demandas"
                        class="button-icon btn-excluir"><i class="fa-duotone fa-trash-can"></i></a>
                </td>
            </tr>

            <?php
            }
        }else{
            ?>
            <tr>
                <td colspan="7">Sem registro no momento.</td>
            </tr>

            <?php
        }
        ?>
        </tbody>

    </table>

</section>