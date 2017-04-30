<?php
    require_once __DIR__."/Piece.php";

    class Bishop extends Piece
    {
        function canAttack($r, $c)
        {
          $diffR = $this->r - $r;
          $diffC = $this->c - $c;
          $ifDiffRIsPositive = ($diffR > 0); //if diff is positive val: true, negative: false
          $ifDiffCIsPositive = ($diffC > 0); //if diff is positive val: true, negative: false

          //CASE: $RPos && C positive
          if($ifDiffRIsPositive && $ifDiffCIsPositive){
            for($i=1; $i< abs($diffR); $i++){
              if($_SESSION['chess'][0]->chessboard[$this->r - $i][$this->c - $i] != ""){
                return false;
              }
            }
          }elseif($ifDiffRIsPositive && !$ifDiffCIsPositive){
            //CASE; $RPOS && C negative
            for($i=1; $i<abs($diffR); $i++){
              if($_SESSION['chess'][0]->chessboard[$this->r - $i][$this->c + $i] != ""){
                return false;
              }
            }
          }elseif(!$ifDiffRIsPositive && $ifDiffCIsPositive){
              //CASE: $Rnegative && CPositive
              for($i=1; $i<abs($diffR); $i++){
                if($_SESSION['chess'][0]->chessboard[$this->r + $i][$this->c - $i] != ""){
                  return false;
                }
              }
          }elseif(!$ifDiffRIsPositive && !$ifDiffCIsPositive){
            for($i=1; $i<abs($diffR); $i++){
              if($_SESSION['chess'][0]->chessboard[$this->r + $i][$this->c + $i] != ""){
                return false;
              }
            }
          }

          //Case: $Rnegative && CNegative
            $diff = $this->r - $r;
            if(($this->r + $diff == $r|| $this->r - $diff == $r) && ($this->c + $diff == $c || $this->c - $diff == $c)){
                return true;
            }else {
                return false;
            }
        }
    }
