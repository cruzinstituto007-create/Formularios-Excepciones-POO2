<?php
require_once __DIR__ . "/calculadora-base.php";

class CalculadoraCientifica extends Calculadora {
    public function cuadrado() {
        return $this->num1 * $this->num1;
    }

    public function raiz() {
        if ($this->num1 < 0) {
            throw new Exception("No se puede calcular la raíz de un número negativo.");
        }
        return sqrt($this->num1);
    }
}