<?php
require_once __DIR__."/Piece.php";

class Rook extends Piece
{
    function canAttack($r, $c)
    {

        $diffR = $this->r - $r;
        $diffC = $this->c - $c;
        $ifDiffRIsPositive = ($diffR > 0); //if diff is positive val: true, negative: false
        $ifDiffCIsPositive = ($diffC > 0); //if diff is positive val: true, negative: false

            if($ifDiffRIsPositive){
              for($i=1; $i< abs($diffR); $i++){
                if($_SESSION['chess'][0]->chessboard[$this->r - $i][$c] != ""){
                  // $check_if_no_piece_r = false;
                  // break;
                  return false;
                }
              }
            }else{
              for($i=1; $i<abs($diffR); $i++){
                if($_SESSION['chess'][0]->chessboard[$this->r + $i][$c] != ""){
                  return false;
                }
              }
            };

            //CHECK C AXIS
            if($ifDiffCIsPositive){
              for($i=1; $i<abs($diffC); $i++){
                if($_SESSION['chess'][0]->chessboard[$r][$this->c - $i] != ""){
                  return false;
                }
              }
            }else{
              for($i=1; $i<abs($diffC); $i++){
                if($_SESSION['chess'][0]->chessboard[$r][$this->c + $i] != ""){
                  return false;
                }
              }
            };



        if($this->r == $r){
            return true;
        }elseif($this->c == $c){
            return true;
        }else{
            return false;
        }
    }


}
