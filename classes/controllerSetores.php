<?php

class Setores{

    //Adicionar
    public function addSetor($setor)
    {

        include 'controllerConexao.php';

        $sql = "INSERT INTO setores (setor) VALUES ('$setor')";
        $query = $conexao->prepare($sql);

        try {
            $query->execute();

            print "<script>alert('Inserido com sucesso')</script>";
            print "<script>location=('setores')</script>";
        } catch (PDOException $erro) {
            print 'Erro: ' . $erro->getMessage();
        }
    }

    //Editar
    public function editSetor($setor, $id)
    {

        include 'controllerConexao.php';

        $sql = "UPDATE setores SET setor='$setor' WHERE idSetor='$id'";
        $query = $conexao->prepare($sql);

        try {

            $query->execute();

            print "<script>alert('Editado com sucesso')</script>";
            print "<script>location=('../setores')</script>";
        } catch (PDOException $erro) {
            print 'Erro: ' . $erro->getMessage();
        }
    }

    //Excluir
    public function excluirSetor($id)
    {

        include 'controllerConexao.php';

        $sql = "DELETE setores WHERE idSetor='$id'";
        $query = $conexao->prepare($sql);

        try {

            $query->execute();

            print "<script>alert('Excluido com sucesso')</script>";
            print "<script>location=('../../setores')</script>";
        } catch (PDOException $erro) {
            print 'Erro: ' . $erro->getMessage();
        }
    }

    //Listar
    public function listSetor()
    {

        include 'controllerConexao.php';

        $sql = "SELECT idSetor, setor FROM setores ORDER BY setor ASC";
        $query = $conexao->prepare($sql);

        try {

            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            print 'Erro: ' . $erro->getMessage();
        }
    }

    //Show
    public function showSetor($id)
    {

        include 'controllerConexao.php';

        $sql = "SELECT idSetor, setor FROM setores WHERE idSetor='$id'";
        $query = $conexao->prepare($sql);

        try {

            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            print 'Erro: ' . $erro->getMessage();
        }
    }
}
