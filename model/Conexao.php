<?php

class Conexao{

    public static function
    selectById($tabela, $colunas, $id){
        $sql = "SELECT $colunas FROM $tabela 
        WHERE id=$id;";
        $recurso = self::getConexao()
            ->prepare($sql);
        $recurso->execute();

        return $recurso->fetchAll();
    }

    public static function select($tabela, $colunas){
        $sql = "SELECT $colunas FROM $tabela;";
        
        echo $sql;
        
        // // $recurso = self::getConexao()->prepare($sql);
        // $recurso->execute();
        
        // return $recurso->fetchAll();
    }

    public static function
    update($tabela, $parametros, $id){
        $sql = "UPDATE $tabela SET $parametros 
        WHERE id=$id;";
        $recurso = self::getConexao()
            ->prepare($sql);
        $recurso->execute();

    }

    public static function 
    delete($tabela, $id){
        $sql = "DELETE FROM $tabela WHERE 
        id=$id;";
        Conexao::getConexao()->exec($sql);
        echo $sql;
    }

    public static function 
    insert($tabela, $colunas, $valores){
        $sql = "INSERT INTO ". $tabela . "
        (" . $colunas . ") VALUES 
        (". $valores .");";
        Conexao::getConexao()->exec($sql);
        echo $sql;
    }

    private static function getConexao(){
        try{
            $conexao = new PDO(
                "pgsql:host=ec2-184-73-243-101.compute-1.amazonaws.com;port=5432;dbname=d1jsh1hvnbhe1m",
                "zwizlefjpuiuxw",
                "35b8a6666539da5a2d7d0acbe59d2eb8e8af87d01533c8b725d0ea93530ca4af"
            );

            $conexao->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
            //echo "Voilá !";
            return $conexao;
        }
        catch(PDOException $e){
            echo "Deu tiut: " . $e->getMessage();
        }
    }
}