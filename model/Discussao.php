<?php

/**
 * Created by PhpStorm.
 * User: marci
 * Date: 28/02/2017
 * Time: 13:08
 */
class Discussao
{
    private $pergunta;
    private $respostas;

    /**
     * Discussao constructor.
     * @param $pergunta
     * @param $respostas
     */
    public function __construct($pergunta, $respostas)
    {
        $this->pergunta = $pergunta;
        $this->respostas[] = $respostas;
    }


}