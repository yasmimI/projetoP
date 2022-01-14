<?php

require_once "Conexao.php";

class Produto{
    private $cdBarra;
    private $id;
    private $nome;
    private $valor;
    private $quantidade;
    private $marca;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }
    
    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
        return $this;
    }
    public function getQuantidade(){
        return $this->quantidade;
    }

    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
        return $this;
    }
    public function getMarca(){
        return $this->marca;
    }

    public function setMarca($marca){
        $this->marca = $marca;
        return $this;
    }
    public function getCdBarra(){
        return $this->cdBarra;
    }

    public function setCdBarra($marca){
        $this->cdBarra = $cdBarra;
        return $this;
    }
   
   

    public function atualizar(){
        $tabela = "produtos";
        $parametros = "nome='". $this->nome ."',
         valor=".$this->valor.",
        quantidade='".$this->quantidade.
        ", marca='".$this->marca.",
        cdBarra='".$this->cdBarra."'";

        
        
        Conexao::update($tabela,
        $parametros, $this->id);
    }

    public function salvar(){
        //$c = new Conexao();
        //$c->getConexao();
        $tabela = "produtos";
        $colunas = "nome, valor, quantidade, marca";
        $valores = "'". $this->nome ."', "
                . $this->valor . ", '"
                . $this->quantidade . "'"
                . $this->cdBarra . "'"
                . $this->marca . ", '";
                
        Conexao::insert($tabela, $colunas, $valores);
    }

    public static function retornarTodos(){
        $tabela = "produtos";
        $colunas = "id, nome, valor, quantidade, marca";

        $dados = Conexao::select($tabela, $colunas);
        $produtos = [];
        foreach($dados as $d){
            $produto = new Produto();
            $produto->id = $d["id"];
            $produto->nome = $d["nome"];
            $produto->valor = $d["valor"];
            $produto->quantidade = $d["quantidade"];
            $produto->cdBarra = $d["cdBarra"];
            $produto->marca = $d["marca"];

            $produtos[] = $produto;
        }
        return $produtos;
    }

    public static function retornarPorId($id){
        $tabela = "produtos";
        $colunas = "id, nome, valor, quantidade, cdBarra, marca";

        $dados = Conexao::
            selectById($tabela, $colunas, $id);
        
        foreach($dados as $d){
            $produto = new Produto();
            $produto->id = $d["id"];
            $produto->nome = $d["nome"];
            $produto->valor = $d["valor"];
            $produto->quantidade = $d["quantidade"];
            $produto->cdBarra = $d["cdBarra"];
            $produto->marca = $d["marca"];
            return $produto;
        }
        return null;
    }

    public static function deletar($id){
        Conexao::delete("produtos", $id);
    }

}