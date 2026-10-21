<?php

namespace App;

use InvalidArgumentException;

class Estudante{
    public function __construct(
        private string $nome,
        private string $RA,
        private float $nota,
    ){
        if (ctype_digit($RA) == False or strlen($RA)!=7) {
            throw new InvalidArgumentException('RA inválido ');
        }
        if (trim($nome)=="") {
            throw new InvalidArgumentException('Nome inválido ');
        }
        if ($nota < 0) {
            throw new InvalidArgumentException('Nota inválida');
        }
    }

    public function getNome(): string{
        return $this->nome;
    }
    public function getRA(): string{
        return $this->RA;
    }
    public function getNota(): float{
        return $this->nota;
    }
}

?>