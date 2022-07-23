<?php
        try{
            $conexao = new PDO("sqlsrv:Server=DESKTOP-F2BHRTM\SQLEXPRESS;Database=milhas", 'guerra', 12345678);
            return $conexao;

        }catch(PDOException $erro){
            print_r( 'Error: '.$erro -> getMessage());
        }
?>