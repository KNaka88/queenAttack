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

        function pawnCanMove($r, $c){
            return false;
        }


        function canAttack($x, $y)
        {
            $diffX = $this->x - $x;
            $diffY = $this->y - $y;
            $ifDiffXIsPositive = ($diffX > 0); //if diff is positive val: true, negative: false
            $ifDiffYIsPositive = ($diffY > 0); //if diff is positive val: true, negative: false


            // $check_if_no_piece_r =

                if($ifDiffXIsPositive && $diffY == 0){
                  for($i=1; $i< abs($diffX); $i++){
                    if($_SESSION['chess'][0]->chessboard[$this->x - $i][$y] != ""){
                      echo "Upper";
                      return false;
                    }
                  }
                }elseif(!$ifDiffXIsPositive && $diffY == 0){
                  for($i=1; $i<abs($diffX); $i++){
                    if($_SESSION['chess'][0]->chessboard[$this->x + $i][$y] != ""){
                      echo "Down";
                      return false;
                    }
                  }
                }elseif($ifDiffYIsPositive && $diffX == 0 ){
                  for($i=1; $i<abs($diffY); $i++){
                    if($_SESSION['chess'][0]->chessboard[$x][$this->y - $i] != ""){
                      echo "Left";
                      return false;
                    }
                  }
                }elseif(!$ifDiffYIsPositive && $diffX == 0){
                  for($i=1; $i<abs($diffY); $i++){
                    if($_SESSION['chess'][0]->chessboard[$x][$this->y + $i] != ""){
                      echo "Right";
                      return false;
                    }
                  }
                };


            //check if no piece diagnotical  upperleft and down right
            if($ifDiffYIsPositive && $ifDiffXIsPositive && $diffX != 0 && $diffY != 0){
              for($i=1; $i<abs($diffY); $i++){
                if($_SESSION['chess'][0]->chessboard[$this->x - $i][$this->y - $i] != ""){
                  echo "UpperLeft";
                  return false;
                }
              }
            }elseif($ifDiffYIsPositive && !$ifDiffXIsPositive && $diffX != 0 && $diffY != 0){
              for($i=1; $i<abs($diffX); $i++){
                if($_SESSION['chess'][0]->chessboard[$this->x + $i][$this->y - $i] != ""){
                  echo "DownLeft";
                  return false;
                }
              }
            }elseif(!$ifDiffYIsPositive && $ifDiffXIsPositive && $diffX != 0 && $diffY != 0){
              for($i=1; $i<abs($diffY); $i++){
                if($_SESSION['chess'][0]->chessboard[$this->x - $i][$this->y + $i] != ""){
                  echo "UpperRight";
                  return false;
                }
              }
            }elseif(!$ifDiffYIsPositive && !$ifDiffXIsPositive && $diffX != 0 && $diffY != 0){
              for($i=1; $i<abs($diffY); $i++){
                if($_SESSION['chess'][0]->chessboard[$this->x + $i][$this->y + $i] != ""){
                  echo "DownRight";
                  return false;
                }
              }
            };





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
