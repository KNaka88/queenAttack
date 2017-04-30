<?php
    require_once __DIR__."/Piece.php";

    class King extends Piece
    {

        //If King was killed Gameover
        function getAlive(){
            return $this->alive;
        }

        function setAlive($alive){ //if this piece died, change to false;
            $this->alive = $alive;
        }

        function canAttack($r, $c)
        {
          //check true or false
          $check_horizontal = (($this->r + 1 == $r || $this->r - 1 == $r) && $this->c == $c);
          $check_vertical = (($this->c + 1 == $c || $this->c - 1 == $c) && $this->r == $r);
          $check_diagonal = ($this->r + 1 == $r || $this->r - 1 == $r) && ($this->c + 1 == $c || $this->c - 1 == $c);

            if($check_horizontal || $check_vertical || $check_diagonal){
                return true;
            }else {
                return false;
            }
        }
    }
