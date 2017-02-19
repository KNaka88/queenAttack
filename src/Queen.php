<?php

    class Queen
    {
        private $x;
        private $y;
        private $symbol;
        private $alive;
        private $player;

        function __construct($x, $y, $symbol, $player)
        {
            $this->x = $x;
            $this->y = $y;
            $this->symbol = $symbol;
            $this->alive = true;
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

        function getAlive(){
            return $this->alive;
        }

        function getThisPiece(){
            return $this;
        }

        function setR($new_x){
            $this->x = $new_x;
        }

        function setC($new_y){
            $this->y = $new_y;
        }

        function setAlive($alive){ //if this piece died, change to false;
            $this->alive = $alive;
        }


        function canAttack($x, $y)
        {

            $diffX = $this->x - $x;
            $diffY = $this->y - $y;
            $ifDiffXIsPositive = ($diffX > 0); //if diff is positive val: true, negative: false
            $ifDiffYIsPositive = ($diffY > 0); //if diff is positive val: true, negative: false





                //CHECK X AXIS
                if($ifDiffXIsPositive){
                  for($i=abs($diffX); $i>0; $i--){
                    if($_SESSION['chess'][0]->chessboard[$x+$i][$y] != ""){
                      echo "you cannot attack!!(X Position)<br>";
                      break;
                    }
                  }
                }else{
                  for($i=0; $i<abs($diffX); $i++){
                    if($_SESSION['chess'][0]->chessboard[$x-$i][$y] != ""){
                      echo "You cannot attack(X Position)<br>!!!";
                      break;
                    }
                  }
                }

                //CHECK Y AXIS
                if($ifDiffYIsPositive){
                  for($i=0; $i<abs($diffY); $i++){
                    if($_SESSION['chess'][0]->chessboard[$x][$y-$i] != ""){
                      echo "you cannot attack!!(Y Position)<br>";
                      break;
                    }
                  }
                }else{
                  var_dump(abs($diffY));
                  for($i=abs($diffY); $i>0; $i--){
                    if($_SESSION['chess'][0]->chessboard[$x][$y-$i] != ""){
                      echo "You cannot attack!!!(Y Position)<br>";
                    }
                  }
                }


              //if another piece is near you and prevent you from attack opponents, return false




                //TRUE: there is piece
                $not_this_x_position = ($this->x != $x);
                $not_this_y_position = ($this->y != $y);
                $not_this_position = ($not_this_x_position && $not_this_y_position); //avoid selecting current place


                if($this->x == $x && $not_this_y_position){
                    return true;
                }elseif($this->y == $y && $not_this_x_position){
                    return true;
                }elseif(($this->x + $diffX == $x|| $this->x - $diffX == $x) && ($this->y + $diffX == $y || $this->y - $diffX == $y) && $not_this_position){
                    return true;
                }else {
                    return false;
                }

        }


    }
