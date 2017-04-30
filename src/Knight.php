<?php
    require_once __DIR__."/Piece.php";

    class Knight extends Piece
    {

        function canAttack($r, $c)
        {
            $check_up = ($this->r + 1 == $r || $this->r - 1 == $r) && ($this->c + 2 == $c);
            $check_bottom = ($this->r + 1 == $r || $this->r -1 == $r) && ($this->c - 2 == $c);
            $check_right =($this->r + 2 == $r) && ($this->c + 1 == $c || $this->c - 1 == $c);
            $check_left = ($this->r - 2 == $r) && ($this->c + 1 == $c || $this->c - 1 == $c);

            if($check_up || $check_bottom || $check_right || $check_left){
                return true;
            } else {
                return false;
            }
        }
    }
