<?php

    class Queen
    {
        private $x;
        private $y;
        private $symbol;
        private $alive;

        function __construct($x, $y)
        {
            $this->x = $x;
            $this->y = $y;
            $this->symbol = "<img src='https://upload.wikimedia.org/wikipedia/commons/1/15/Chess_qlt45.svg' alt='queen'>";
            $this->alive = true;
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
            $diff = $this->x - $x;

            if($_SESSION['chess'][0]->chessboard[$x][$y] != ""){ //check if the attack position is not empty
                //TRUE: there is piece
                $not_this_x_position = ($this->x != $x);
                $not_this_y_position = ($this->y != $y);
                $not_this_position = ($not_this_x_position && $not_this_y_position); //avoid selecting current place

                if($this->x == $x && $not_this_y_position){
                    return true;
                }elseif($this->y == $y && $not_this_x_position){
                    return true;
                }elseif(($this->x + $diff == $x|| $this->x - $diff == $x) && ($this->y + $diff == $y || $this->y - $diff == $y) && $not_this_position){
                    return true;
                }else {
                    return false;
                }

            }else { //FALSE: attack place is empty
                return false;
            }
        }


    }
