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
        if($this->x == $x){
            return true;
        }elseif($this->y == $y){
            return true;
        }else{
            return false;
        }
    }


}
