<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Vetor
 *
 * @author luciano
 */
class Vetor {
    
    private $vetor;
    
    public function __construct() {
        $this->vetor = array();
    }
    
    public function toString(){
        echo "[";
        for($indice = 0; $indice < $this->tamanho(); $indice++){
            echo $this->get($indice);
            if($indice < $this->tamanho() - 1)
                echo ", ";
        }
        echo "]";
    }
    
    public function adicionarNoFinal($elemento){
        $this->vetor[$this->tamanho()] = $elemento;
    }
    
    public function adicionarNoInicio($elemento){
        $indice = $this->tamanho();
        $this->adicionarNoFinal($elemento);
        $this->trocarElementoDoFinalAteOIndice(0);
    }
    
    public function adicionar($elemento, $indice){
        $this->validarIndice($indice);
        $this->adicionarNoFinal($elemento);
        $this->trocarElementoDoFinalAteOIndice($indice);
    }
    
    public function remover($indice){
        $this->validarIndice($indice);
        $this->trocarElementoDoIndiceAteOFinal($indice);
        unset($this->vetor[$this->tamanho() - 1]);
    }
    
    public function get($indice){
        return $this->vetor[$indice];
    }
    
    public function set($indice, $elemento){
        $this->validarIndice($indice);
        $this->vetor[$indice] = $elemento;
    }
    
    public function tamanho(){
        return count($this->vetor);
    }
    
    public function estaVazio(){
        if($this->tamanho() == 0){
            return true;
        }else{
            return false;
        }
    }
    
    public function trocarElementos($indiceUm, $indiceDois){
        $temp = $this->vetor[$indiceUm];
        $this->vetor[$indiceUm] = $this->vetor[$indiceDois];
        $this->vetor[$indiceDois] = $temp;
    }
    
    public function contemIndice($indice){
        foreach ($this->vetor as $chave => $valor) {
            if($chave == $indice)
                return true;
        }
        return false;
    }
    
    public function contemElemento($elemento){
        foreach ($this->vetor as $chave => $valor) {
            if($valor == $elemento)
                return true;
        }
        return false;
    }
    
    private function validarIndice($indice){
        if( ($indice == 0) && ($this->estaVazio()) )
            return true;
        
        if(!$this->contemIndice($indice)){
            $str = sprintf("Indice %d Invalido: O vetor nao possui esse Indice", $indice);
            throw new Exception($str);
        }
    }
    
    private function trocarElementoDoFinalAteOIndice($indice){
        $contador = $this->tamanho() - 1;
        while($contador > $indice){
            $this->trocarElementos($contador, $contador - 1);
            $contador--;
        }
    }
    
    private function trocarElementoDoIndiceAteOFinal($indice){
        while($indice < ($this->tamanho() - 1)){
            $this->trocarElementos($indice, $indice + 1);
            $indice++;
        }
    }
}

?>
