<?php
error_reporting(0);
if(isset($_GET['cadastro']) and $_GET['cadastro'] != null OR isset($_GET['situacao']) and $_GET['situacao'] != null OR isset($_GET['atendente']) and $_GET['atendente'] != null OR isset($_GET['usuario']) and $_GET['usuario'] != null){
    $sqlBusca = Demandas::filtroDemandas($_GET['cadastro'], $_GET['situacao'], $_GET['atendente'],$_GET['usuario']);
}
else{
    $sqlBusca = Demandas::filtroDemandas();
}

?>

<section class="bloco">
    <h2>
        <i class="fa-duotone fa-comments-question icones"></i>
        Demandas > Filtro
    </h2>

    <form action="<?=$urlBase?>/resultBusca" method="get">
        <div class="form-container">


            <div class="form-group d-in">
                <label for="cadastro">Data de Cadastro</label>
                <input type="date" name="cadastro" class="form-control">
            </div>

            <div class="form-group d-in">
                <label for="situacao">Situação</label>
                <select name="situacao" class="form-control">
                    <option value="0">Todos</option>
                    <option value="1">Pendente</option>
                    <option value="2">Finalizada</option>
                </select>
            </div>

            <div class="form-group d-in">
                <label for="atendente">Atendente</label>
                <select name="atendente" class="form-control">
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

            <div class="form-group d-in">
                <label for="usuario">Usuário</label>
                <select name="usuario" class="form-control">
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

            <button type="submit" class="btn btn-cadastros" value="cadastrar"><i
                    class="fa-duotone fa-filter-list icones"></i>Filtrar</button>

        </div>
    </form>


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

            $dados = $sqlBusca;

            if(count($dados) > 0){

            foreach($dados as $linhas){

                $dadosUsuario = Usuarios::showUsuario($linhas['idUsuario']);
                $dadosAtendente = Atendentes::showAtendentes($linhas['idAtendente']);
                $total = $total + $linhas['custo'];
                


        ?>

            <tr>
                <td><?=Demandas::dataBrasil($linhas['dataCadastro'])?></td>
                <td><?=Demandas::dataBrasil($linhas['dataPrevisao'])?></td>
                <td><?=$dadosAtendente['atendente']?></td>
                <td><?=$dadosUsuario['usuario']?></td>
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
            <td colspan="7">Sem registro de busca no momento.</td>
        </tr>

        <?php
        }
        ?>
        </tbody>

        <tfoot>
            <tr>
                <td colspan="5">Total de Custos</td>
                <td colspan="2">R$ <?=number_format($total, 2, ',', '.')?></td>
            </tr>
        </tfoot>

    </table>

</section>