<?php

$setor = new Setores;
$atendente = new Atendentes;
$usuario = new Usuarios;
$demanda = new Demandas;

switch ($atual[2]){

    case 'setores';
    $dados = $setor -> showSetor($atual[1]);
    $titulo = $dados['setor'];
    break;

    case 'atendentes';
    $dados = $atendente -> showAtendentes($atual[1]);
    $titulo = $dados['atendente'];
    break;

    case 'usuarios';
    $dados = $usuario -> showUsuario($atual[1]);
    $titulo = $dados['usuario'];
    break;

    case 'demandas';
    $dados = $demanda -> showDemanda($atual[1]);
    $dadosDemanda = $usuario -> showUsuario($dados['idUsuario']);
    $titulo = $dados['descricao'].' de '.$dadosDemanda['usuario'];
    break;


}

if(isset($_POST['botao']) == 'sim'){

    switch ($atual[2]){

        case 'setores';
        $setor -> excluirSetor($atual[1]);
        break;
    
        case 'atendentes';
        $atendente -> excluirAtendentes($atual[1]);
        break;

        case 'usuarios';
        $usuario -> excluirUsuario($atual[1]);
        break;

        case 'demandas';
        $demanda -> excluirDemanda($atual[1]);
        break;
    
    }
}
?>

<section class="bloco texto-central">
    <i class="fa-duotone fa-hexagon-exclamation icon-atencao"></i>
    <h1>
        Tem certeza que deseja excluir o registro atual?
    </h1>
    <h6>
        <?=$atual[2]?> > <?=$titulo?>
    </h6>

    <form action="" method="POST">
        <button name="botao" value="sim" class="confirm">
            <i class="fa-duotone fa-hexagon-check btn-icon"></i>Sim
        </button>
    </form>
    <button class="confirm" onclick="nao(`<?=$urlBase?>/<?=$atual[2]?>`)">
        <i class="fa-duotone fa-hexagon-xmark btn-icon"></i>nao
    </button>
</section>

<script>

function nao(valor){
    location=(valor)
}

</script>
