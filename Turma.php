<?php
namespace App;

use InvalidArgumentException;

class Turma{
    private array $estudantes = [];

    public function __construct(
        private string $identificacao,
        private int $capacidade
    ){
         if (trim($identificacao)=="") {
            throw new InvalidArgumentException('Identificação inválida ');
        }
        if ($capacidade <= 0) {
            throw new InvalidArgumentException('Capacidade inválida ');
        }
    }

    public function cadastrarEstudante(Estudante $estudante): bool{
        if (count($this->estudantes) > $this->capacidade) {
            echo "Nenhuma vaga disponível. ".PHP_EOL;
            return False;
        }
        foreach ($this->estudantes as $estudanteCadastrado) {
            if ($estudanteCadastrado->getRA() == $estudante->getRA()) {
                echo "Estudante já cadastrado. ".PHP_EOL;
                return False;
            }
        }
        $this->estudantes[] = $estudante;
        echo "Estudante cadastrado! ".PHP_EOL;
        return True;
    }

    public function aprovados(): int{
        $contador = 0;
        echo "Aprovados da Turma $this->identificacao: ";
        foreach ($this->estudantes as $estudante) {
            if ($estudante->getNota() >= 6) {
                $contador += 1;
            }
        }
        return $contador;
    }

    public function calcularMediaGeral(): float{
        $media = 0.0;
        if (count($this->estudantes) > 0) {
            foreach ($this->estudantes as $estudante) {
                $media += $estudante->getNota();
            }
            $media = $media/count($this->estudantes);
            echo "Média geral: ";
        }
        echo "Nenhum estudante cadastrado. ".PHP_EOL;
        return round($media, 2);
    }

    public function listarEstudantes(): void{
        echo "Estudantes da Turma $this->identificacao: ";
        foreach ($this->estudantes as $estudante) {
            echo "{$estudante->getNome()} | RA: {$estudante->getRA()} | Nota: {$estudante->getNota()} ".PHP_EOL;
        }
    }


}
?>