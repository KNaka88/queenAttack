<?php

    class Knight
    {
        private $x;
        private $y;
        private $symbol;

        function __construct($x, $y)
        {
            $this->x = $x;
            $this->y = $y;
            $this->symbol = "Kn";
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

        function getIsMoved(){
          return $this->is_moved;
        }

        function setX($new_x){
            $this->x = $new_x;
        }

        function setY($new_y){
            $this->y = $new_y;
        }

        function canAttack($x, $y)
        {
            $check_up = ($this->x + 1 == $x || $this->x - 1 == $x) && ($this->y + 2 == $y);
            $check_bottom = ($this->x + 1 == $x || $this->x -1 == $x) && ($this->y - 2 == $y);
            $check_right =($this->x + 2 == $x) && ($this->y + 1 == $y || $this->y - 1 == $y);
            $check_left = ($this->x - 2 == $x) && ($this->y + 1 == $y || $this->y - 1 == $y);

            if($check_up || $check_bottom || $check_right || $check_left){
                return true;
            } else {
                return false;
            }
        }
    }