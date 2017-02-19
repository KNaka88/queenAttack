<?php

    class Pawn
    {
        private $x;
        private $y;
        private $symbol;
        private $is_moved;
        private $alive;

        function __construct($x, $y, $symbol, $player)
        {
            $this->x = $x;
            $this->y = $y;
            $this->symbol = $symbol;
            $this->alive = true;
            $this->is_moved = false;
            $this->player = $player;
        }


        function getR(){
            return $this->x;
        }

        function getC(){
            return $this->y;
        }

        function getSymbol(){
            return $this->symbol;
        }

        function getIsMoved(){
          return $this->is_moved;
        }

        function getAlive(){
            return $this->alive;
        }

        function setR($new_x){
            $this->x = $new_x;
        }

        function setC($new_y){
            $this->y = $new_y;
        }

        function setIsMoved($new_is_moved){ //pass either true or false
          $this->is_moved = $new_is_moved;
        }

        function setAlive($alive){ //if this piece died, change to false;
            $this->alive = $alive;
        }


        function canAttack($x, $y)
        {
            $check_diagonally_forward = ($this->x + 1 == $x && $this->y + 1 == $y) || ($this->x - 1 == $x && $this->y + 1 == $y);
            $check_vertically_forward = ($this->y + 1 == $y || $this->y + 2 == $y) && ($this->x == $x);

            if($this->is_moved){ //if true: Pawn can attack diagonally forward
                if($check_diagonally_forward){
                    return true;
                }else{
                    return false;
                }
            } else { //if false: Pawn can attack vertically forward
                if($check_vertically_forward){
                    return true;
                }else{
                    return false;
                }
            }
        }



    }
