<?php

    class King
    {
        private $x;
        private $y;
        private $symbol;
        private $alive;

        function __construct($x, $y, $symbol, $player)
        {
            $this->x = $x;
            $this->y = $y;
            $this->symbol = $symbol;
            $this->alive = true;
            $this->player = $player;
        }

        function getX(){
            return $this->x;
        }

        function getY(){
            return $this->y;
        }

        function getSymbol(){
            return $this->symbol;
        }

        function getAlive(){
            return $this->alive;
        }

        function setX($new_x){
            $this->x = $new_x;
        }

        function setY($new_y){
            $this->y = $new_y;
        }

        function setAlive($alive){ //if this piece died, change to false;
            $this->alive = $alive;
        }



        function canAttack($x, $y)
        {
          //check true or false
          $check_horizontal = (($this->x + 1 == $x || $this->x - 1 == $x) && $this->y == $y);
          $check_vertical = (($this->y + 1 == $y || $this->y - 1 == $y) && $this->x == $x);
          $check_diagonal = ($this->x + 1 == $x || $this->x - 1 == $x || $this->x) && ($this->y + 1 == $y || $this->y - 1 == $y);

            if($check_horizontal || $check_vertical || $check_diagonal){
                return true;
            }else {
                return false;
            }
        }
    }
