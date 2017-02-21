<?php
class Bishop
{
    private $x;
    private $y;
    private $symbol;
    private $player;

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

      //CASE: $XPos && Y positive
      if($ifDiffXIsPositive && $ifDiffYIsPositive){
        for($i=1; $i< abs($diffX); $i++){
          if($_SESSION['chess'][0]->chessboard[$this->x - $i][$this->y - $i] != ""){
            echo "case1";
            return false;
          }
        }
      }elseif($ifDiffXIsPositive && !$ifDiffYIsPositive){
        //CASE; $XPOS && Y negative
        for($i=1; $i<abs($diffX); $i++){
          if($_SESSION['chess'][0]->chessboard[$this->x - $i][$this->y + $i] != ""){
            echo "case2";
            return false;
          }
        }
      }elseif(!$ifDiffXIsPositive && $ifDiffYIsPositive){
          //CASE: $Xnegative && YPositive
          for($i=1; $i<abs($diffX); $i++){
            if($_SESSION['chess'][0]->chessboard[$this->x + $i][$this->y - $i] != ""){
              echo "case2";
              return false;
            }
          }
      }elseif(!$ifDiffXIsPositive && !$ifDiffYIsPositive){
        for($i=1; $i<abs($diffX); $i++){
          if($_SESSION['chess'][0]->chessboard[$this->x + $i][$this->y + $i] != ""){
            echo "case2";
            return false;
          }
        }
      }







      //Case: $Xnegative && YNegative

        $diff = $this->x - $x;
        if(($this->x + $diff == $x|| $this->x - $diff == $x) && ($this->y + $diff == $y || $this->y - $diff == $y)){
            return true;
        }else {
            return false;
        }
    }
}
