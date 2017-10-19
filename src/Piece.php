<?php

    class Piece
    {
        protected $r;
        protected $c;
        protected $symbol;
        protected $player;

        function __construct($r, $c, $symbol, $player)
        {
            $this->r = $r;
            $this->c = $c;
            $this->symbol = $symbol;
            $this->player = $player;
        }

        function getR(){
            return $this->r;
        }

        function getC(){
            return $this->c;
        }

        function getSymbol(){
            return $this->symbol;
        }

        function getThisPiece(){
            return $this;
        }

        function setR($new_r){
            $this->r = $new_r;
        }

        function setC($new_c){
            $this->c = $new_c;
        }

        function pawnCanMove($r, $c){
            return false;
        }


    }
