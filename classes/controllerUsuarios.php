<?php

class Usuarios{

    //Adicionar
    public function addUsuario($usuario, $setor)
    {

        include 'controllerConexao.php';

        $sql = "INSERT INTO users (usuario, idSetor) VALUES ('$usuario', '$setor')";
        $query = $conexao->prepare($sql);

        try {
            $query->execute();

            print "<script>alert('Inserido com sucesso')</script>";
            print "<script>location=('usuarios')</script>";
        } catch (PDOException $erro) {
            print 'Erro: ' . $erro->getMessage();
        }
    }

    //Editar
    public function editUsuario($usuario, $id, $setor)
    {

        include 'controllerConexao.php';

        $sql = "UPDATE users SET usuario='$usuario', idSetor='$setor' WHERE idUsuario='$id'";
        $query = $conexao->prepare($sql);

        try {

            $query->execute();

            print "<script>alert('Editado com sucesso')</script>";
            print "<script>location=('../usuarios')</script>";
        } catch (PDOException $erro) {
            print 'Erro: ' . $erro->getMessage();
        }
    }

    //Excluir
    public function excluirUsuario($id)
    {

        include 'controllerConexao.php';

        $sql = "DELETE users WHERE idUsuario='$id'";
        $query = $conexao->prepare($sql);

        try {

            $query->execute();

            print "<script>alert('Excluido com sucesso')</script>";
            print "<script>location=('../../usuarios')</script>";
        } catch (PDOException $erro) {
            print 'Erro: ' . $erro->getMessage();
        }
    }

    //Listar
    public function listUsuarios()
    {

        include 'controllerConexao.php';

        $sql = "SELECT s.setor, u.idUsuario, u.usuario FROM users u INNER JOIN setores s ON u.idSetor = s.idSetor ORDER BY u.usuario, s.idSetor ASC";
        $query = $conexao->prepare($sql);

        try {

            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $erro) {
            print 'Erro: ' . $erro->getMessage();
        }
    }

    //Show
    public function showUsuario($id)
    {

        include 'controllerConexao.php';

        $sql = "SELECT idUsuario, usuario, idSetor FROM users WHERE idUsuario='$id'";
        $query = $conexao->prepare($sql);

        try {

            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            print 'Erro: ' . $erro->getMessage();
        }
    }
}
