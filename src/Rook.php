<?php
class Rook
{
    private $x;
    private $y;
    private $symbol;

    function __construct($x, $y, $symbol, $player)
    {
        $this->x = $x;
        $this->y = $y;
        $this->symbol = $symbol;
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

    function setR($new_x){
        $this->x = $new_x;
    }

    function setC($new_y){
        $this->y = $new_y;
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

            if($ifDiffXIsPositive){
              for($i=1; $i< abs($diffX); $i++){
                if($_SESSION['chess'][0]->chessboard[$this->x - $i][$y] != ""){
                  // $check_if_no_piece_r = false;
                  // break;
                  return false;
                }
              }
            }else{
              for($i=1; $i<abs($diffX); $i++){
                if($_SESSION['chess'][0]->chessboard[$this->x + $i][$y] != ""){
                  return false;
                }
              }
            };

            //CHECK C AXIS
            if($ifDiffYIsPositive){
              for($i=1; $i<abs($diffY); $i++){
                if($_SESSION['chess'][0]->chessboard[$x][$this->y - $i] != ""){
                  return false;
                }
              }
            }else{
              var_dump(abs($diffY));
              for($i=1; $i<abs($diffY); $i++){
                if($_SESSION['chess'][0]->chessboard[$x][$this->y + $i] != ""){
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
