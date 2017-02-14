<?php
class Rook
{
    private $x;
    private $y;
    private $symbol;

    function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
        $this->symbol = "R";
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

    function setX($new_x){
        $this->x = $new_x;
    }

    function setY($new_y){
        $this->y = $new_y;
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
