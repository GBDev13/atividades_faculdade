<?php

class Cliente {
  public int $codigo;
  public string $nome, $endereco, $telefone, $email;

  function __construct(int $codigo, string $nome, string $endereco, string $telefone, string $email) {
    $this->codigo = $codigo;
    $this->nome = $nome;
    $this->endereco = $endereco;
    $this->telefone = $telefone;
    $this->email = $email;
  }
}

class Produto {
  public int $codigo, $quantidadeEstoque;
  public float $valorVenda, $valorCusto;
  public string $descricao;

  function __construct(int $codigo, int $quantidadeEstoque, float $valorVenda, float $valorCusto, string $descricao) {
    $this->codigo = $codigo;
    $this->quantidadeEstoque = $quantidadeEstoque;
    $this->valorVenda = $valorVenda;
    $this->valorCusto = $valorCusto;
    $this->descricao = $descricao;
  }
}

$cliente = new Cliente(123, "Gabriel", "Rua Exemplar", "54981475862", "email@gmail.com");
$produto = new Produto(1234, 10, 20.50, 8.90, "Produto de qualidade");

var_dump($cliente);
var_dump($produto);
?>