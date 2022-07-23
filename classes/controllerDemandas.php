<?php

class Demandas{

    //Adicionar
    public function addDemanda($dPrevisao, $idAtendente, $idUsuario, $descricao, $custo, $obs)
    {

        include 'controllerConexao.php';

        $dataAtual = date('Y-m-d');

        $sql = "INSERT INTO demandas (dataCadastro, dataPrevisao, idAtendente, idUsuario, descricao, custo, obs) VALUES ('$dataAtual', '$dPrevisao', '$idAtendente', '$idUsuario', '$descricao', '$custo', '$obs')";
        $query = $conexao->prepare($sql);

        try {
            $query->execute();

            print "<script>alert('Inserido com sucesso')</script>";
            print "<script>location=('demandas')</script>";
        } catch (PDOException $erro) {
            print 'Erro: ' . $erro->getMessage();
        }
    }

    //Editar
    public function editDemanda($id, $dPrevisao, $dTermino, $idAtendente, $idUsuario, $descricao, $custo, $obs)
    {

        include 'controllerConexao.php';

        if($dTermino == 'null'){
            $termino = 'null';
        }
        else{
            $termino = "'$dTermino'";
        }

        $sql = "UPDATE demandas SET dataPrevisao='$dPrevisao', dataTermino=$termino, idAtendente='$idAtendente', idUsuario='$idUsuario', descricao='$descricao', custo='$custo', obs='$obs' WHERE idDemanda='$id'";
        $query = $conexao->prepare($sql);

        try {

            $query->execute();

            print "<script>alert('Editado com sucesso')</script>";
            print "<script>location=('../demandas')</script>";
        } catch (PDOException $erro) {
            print 'Erro: ' . $erro->getMessage();
        }
    }

    //Excluir
    public function excluirDemanda($id)
    {

        include 'controllerConexao.php';

        $sql = "DELETE demandas WHERE idDemanda='$id'";
        $query = $conexao->prepare($sql);

        try {

            $query->execute();

            print "<script>alert('Excluido com sucesso')</script>";
            print "<script>location=('../../demandas')</script>";
        } catch (PDOException $erro) {
            print 'Erro: ' . $erro->getMessage();
        }
    }

    //Listar
    public function listDemandas()
    {

        include 'controllerConexao.php';

        $sql = "SELECT d.idDemanda, d.dataCadastro, d.dataPrevisao, d.custo, d.descricao, u.usuario, a.atendente FROM demandas d INNER JOIN users u ON d.idUsuario = u.idUsuario INNER JOIN atendentes a ON d.idAtendente = a.idAtendente ORDER BY d.dataCadastro DESC";
        $query = $conexao->prepare($sql);

        try {

            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $erro) {
            print 'Erro: ' . $erro->getMessage();
        }
    }

        //Filtro
        public function filtroDemandas($cadastro=null, $situacao='0', $atendente=null, $usuario=null)
        {
    
            include 'controllerConexao.php';


            switch ($situacao){
                case 1;
                $parametro = ' AND dataTermino IS NULL ';
                break;

                case 2;
                $parametro = " AND dataTermino != '' ";
                break;

                case 0;
                $parametro = '';
                break;
            }


            $sql = "SELECT * FROM demandas WHERE dataCadastro LIKE '%$cadastro%' $parametro AND idAtendente LIKE '%$atendente%' AND idUsuario LIKE '%$usuario%' ORDER BY dataCadastro DESC";
            $query = $conexao->prepare($sql);
    
            try {
    
                $query->execute();
                return $query->fetchAll(PDO::FETCH_ASSOC);
                
            } catch (PDOException $erro) {
                print 'Erro: ' . $erro->getMessage();
            }
        }

    //Show
    public function showDemanda($id)
    {

        include 'controllerConexao.php';

        $sql = "SELECT * FROM demandas WHERE idDemanda='$id'";
        $query = $conexao->prepare($sql);

        try {

            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            print 'Erro: ' . $erro->getMessage();
        }
    }

    //Formatar Data
    public function dataBrasil($data)
    {
        $newData = explode('-', $data);
        
            return $newData[2].'/'.$newData[1].'/'.$newData[0];
    }

    public function dataAmerica($data)
    {
        $newData = explode('/', $data);
        
            return $newData[0].'-'.$newData[1].'-'.$newData[2];
    }

}
