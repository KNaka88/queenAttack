<?php
class Bishop
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
        if(($this->x + $diff == $x|| $this->x - $diff == $x) && ($this->y + $diff == $y || $this->y - $diff == $y)){
            return true;
        }else {
            return false;
        }
    }
}
