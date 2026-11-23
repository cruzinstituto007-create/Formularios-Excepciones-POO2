<?php
class Calculadora {
    public int $num1;
    public int $num2;

    public function __construct(int $num1, int $num2) {
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function sumar() {
        return $this->num1 + $this->num2;
    }

    public function restar() {
        return $this->num1 - $this->num2;
    }

    public function multiplicar() {
        return $this->num1 * $this->num2;
    }

    public function dividir() {
        if ($this->num2 == 0) {
            throw new Exception("No se puede dividir entre 0");
        }
        return $this->num1 / $this->num2;
    }
}