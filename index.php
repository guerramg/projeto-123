<?php
//Carregando controllers
include 'load.php';

/********************************************* FUNÇÕES PARA URL AMIGAVEL *********************/
$inicio = 'resultBusca';
$atual		=		(isset($_GET['url'])) ? $_GET['url'] : $inicio;
$pasta		=		'views';
$permissao	=		array(
    '404',
    'setores',
    'formSetores',
    'atendentes',
    'formAtendentes',
    'usuarios',
    'formUsuarios',
    'demandas',
    'formDemandas',
    'resultBusca',
    'excluir'
);

if(substr_count($atual, '/') > 0){
$atual		=	explode('/', $atual);
$pagina		=	(file_exists("{$pasta}/".$atual[0].'.php') && in_array($atual[0], $permissao)) ? $atual[0] : '404';
$id		=		intval($atual[1]);
}
else{
$pagina		=	(file_exists("{$pasta}/".$atual.'.php') && in_array($atual, $permissao)) ? $atual : '404';
$id = 0;
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="123 milhas.....">
    <meta name="description" content="Projeto Teste">
    <meta name="author" content="Raphael Guerra">
    <meta name="robots" content="noindex,nofollow">
    <title>Projeto 123 Milhas</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="https://compredopequeno.com.br/wp-content/uploads/2021/11/123-milhas-telefone.png"
        type="image/x-icon">

    <!-- CSS base -->
    <link href="<?=$urlBase?>/externos/css/principal.css" rel="stylesheet">

    <!-- Kit Fontawesome -->
    <link href="https://kit-pro.fontawesome.com/releases/v6.1.1/css/pro.min.css" rel="stylesheet">


</head>

<body>

    <div class="bt-menu-responsivo" onclick="menu('menu')">

            <i class="fa-duotone fa-bars-filter fa-2x"></i>

    </div>

    <main class="container">
        <header class="g1" id="menu">
            <aside class="lado-esquerdo">
                <nav>
                    <ul>
                        <a id="ativo" href="<?=$urlBase?>/resultBusca">
                            <li class="itens ativo" id="atendimentos">
                            <i class="fa-duotone fa-chart-network"></i>
                                <span>Dashboard</span>
                            </li>
                        </a>

                        <a href="<?=$urlBase?>/demandas">
                            <li class="itens" id="atendimentos">
                                <i class="fa-duotone fa-comments-question"></i>
                                <span>Demandas</span>
                            </li>
                        </a>

                        <a class="" href="<?=$urlBase?>/setores">
                            <li class="itens" id="setores">
                                <i class="fa-duotone fa-fax"></i>
                                <span>Setores</span>
                            </li>
                        </a>

                        <a class="" href="<?=$urlBase?>/usuarios">
                            <li class="itens" id="usuarios">
                                <i class="fa-duotone fa-users"></i>
                                <span>Usuários</span>
                            </li>
                        </a>

                        <a class="" href="<?=$urlBase?>/atendentes">
                            <li class="itens" id="atendentes">
                                <i class="fa-duotone fa-user-headset"></i>
                                <span>Atendentes</span>
                            </li>
                        </a>

                    </ul>
                </nav>
            </aside>
        </header>

        <div class="separador g0"></div>

        <!-- Conteudo dinâmico-->
        <div class="conteudo g2">
            <?php
                require("{$pasta}/{$pagina}.php");
            ?>
        </div>
    </main>

    <!--Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Jquery Mask -->
    <script src="https://cdn.jsdelivr.net/gh/plentz/jquery-maskmoney@master/dist/jquery.maskMoney.min.js"></script>

    <!--Funções -->
    <script src="externos/js/funcoes.js"></script>


</body>

</html>