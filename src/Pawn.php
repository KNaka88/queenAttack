<?php

    class Pawn
    {
        private $r;
        private $c;
        private $symbol;
        private $is_moved;

        function __construct($r, $c, $symbol, $player)
        {
            $this->r = $r;
            $this->c = $c;
            $this->symbol = $symbol;
            $this->is_moved = false;
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

        function getIsMoved(){
          return $this->is_moved;
        }

        function setR($new_r){
            $this->r = $new_r;
        }

        function setC($new_c){
            $this->c = $new_c;
        }

        function setIsMoved($new_is_moved){ //pass either true or false
          $this->is_moved = $new_is_moved;
        }

        function pawnCanMove($r, $c)
        {
          $direction = 0;
          if($this->player == "player1"){
            $direction = -1; //player1
          }else{
            $direction = 1; //player2
          }

          //avoid checking out of bound row and col
          $not_outbound = ($this->r + $direction != -1) && ($this->r + $direction != 8);
          $no_one_forward = false;

          //if another piece is located at forward, return false;
          if($not_outbound){
            $no_one_forward = ($_SESSION['chess'][0]->chessboard[$this->r + $direction][$this->c] == '');
          }

          //if true: Pawn already moved
          if($this->is_moved && $no_one_forward){
            return ($this->r + $direction == $r) && ($this->c == $c);
          }elseif ($no_one_forward){
            $this->is_moved = true;
            return ($this->r + $direction == $r || $this->r + $direction*2  == $r) && ($this->c == $c);
          }
        }


        function canAttack($r, $c)
        {
            $check_diagonally_forward = ($this->r + 1 == $r && $this->c + 1 == $c) || ($this->r - 1 == $r && $this->c + 1 == $c) || ($this->r - 1 == $r && $this->c - 1 == $c) || ($this->r + 1 == $r && $this->c - 1 == $c);
            if($check_diagonally_forward && $_SESSION['chess'][0]->chessboard[$r][$c] != ''){
                return true;
            }else{
                return false;
            }
            return true;
        }
    }
