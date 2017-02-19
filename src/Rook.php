<?php
class Rook
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
            if($ifDiffXIsPositive){
              for($i=1; $i< abs($diffX); $i++){
                if($_SESSION['chess'][0]->chessboard[$this->x - $i][$y] != ""){
                  echo $x+$i;
                  echo "case1";
                  // $check_if_no_piece_r = false;
                  // break;
                  return false;
                }
              }
            }else{
              for($i=1; $i<abs($diffX); $i++){
                if($_SESSION['chess'][0]->chessboard[$this->x + $i][$y] != ""){
                  echo "case2";
                  return false;
                }
              }
            };

        // $check_if_no_piece_c =
            //CHECK C AXIS
            if($ifDiffYIsPositive){
              for($i=1; $i<abs($diffY); $i++){
                if($_SESSION['chess'][0]->chessboard[$x][$this->y - $i] != ""){
                  echo "case3";
                  return false;
                }
              }
            }else{
              var_dump(abs($diffY));
              for($i=1; $i<abs($diffY); $i++){
                if($_SESSION['chess'][0]->chessboard[$x][$this->y + $i] != ""){
                  echo "case4";
                  return false;
                }
              }
            };



        if($this->x == $x){
            return true;
        }elseif($this->y == $y){
            return true;
        }else{
            return false;
        }
    }


}
