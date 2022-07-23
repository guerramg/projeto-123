<?php

class Atendentes{

    //Adicionar
    public function addAtendentes($atendente)
    {

        include 'controllerConexao.php';

        $sql = "INSERT INTO atendentes (atendente) VALUES ('$atendente')";
        $query = $conexao->prepare($sql);

        try {
            $query->execute();

            print "<script>alert('Inserido com sucesso')</script>";
            print "<script>location=('atendentes')</script>";
        } catch (PDOException $erro) {
            print 'Erro: ' . $erro->getMessage();
        }
    }

    //Editar
    public function editAtendentes($atendente, $id)
    {

        include 'controllerConexao.php';

        $sql = "UPDATE atendentes SET atendente='$atendente' WHERE idAtendente='$id'";
        $query = $conexao->prepare($sql);

        try {

            $query->execute();

            print "<script>alert('Editado com sucesso')</script>";
            print "<script>location=('../atendentes')</script>";
        } catch (PDOException $erro) {
            print 'Erro: ' . $erro->getMessage();
        }
    }

    //Excluir
    public function excluirAtendentes($id)
    {

        include 'controllerConexao.php';

        $sql = "DELETE atendentes WHERE idAtendente='$id'";
        $query = $conexao->prepare($sql);

        try {

            $query->execute();

            print "<script>alert('Excluido com sucesso')</script>";
            print "<script>location=('../../atendentes')</script>";
        } catch (PDOException $erro) {
            print 'Erro: ' . $erro->getMessage();
        }
    }

    //Listar
    public function listAtendentes()
    {

        include 'controllerConexao.php';

        $sql = "SELECT idAtendente, atendente FROM atendentes ORDER BY atendente ASC";
        $query = $conexao->prepare($sql);

        try {

            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $erro) {
            print 'Erro: ' . $erro->getMessage();
        }
    }

    //Show
    public function showAtendentes($id)
    {

        include 'controllerConexao.php';

        $sql = "SELECT idAtendente, atendente FROM atendentes WHERE idAtendente='$id'";
        $query = $conexao->prepare($sql);

        try {

            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            print 'Erro: ' . $erro->getMessage();
        }
    }
}
