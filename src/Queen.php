<?php
    require_once __DIR__."/Piece.php";

    class Queen extends Piece
    {

      function canAttack($r, $c)
      {
          $diffR = $this->r - $r;
          $diffC = $this->c - $c;
          $ifDiffRIsPositive = ($diffR > 0); //if diff is positive val: true, negative: false
          $ifDiffCIsPositive = ($diffC > 0); //if diff is positive val: true, negative: false

              if($ifDiffRIsPositive && $diffC == 0){
                for($i=1; $i< abs($diffR); $i++){
                  if($_SESSION['chess'][0]->chessboard[$this->r - $i][$c] != ""){
                    // echo "Upper";
                    return false;
                  }
                }
              }elseif(!$ifDiffRIsPositive && $diffC == 0){
                for($i=1; $i<abs($diffR); $i++){
                  if($_SESSION['chess'][0]->chessboard[$this->r + $i][$c] != ""){
                    // echo "Down";
                    return false;
                  }
                }
              }elseif($ifDiffCIsPositive && $diffR == 0 ){
                for($i=1; $i<abs($diffC); $i++){
                  if($_SESSION['chess'][0]->chessboard[$r][$this->c - $i] != ""){
                    // echo "Left";
                    return false;
                  }
                }
              }elseif(!$ifDiffCIsPositive && $diffR == 0){
                for($i=1; $i<abs($diffC); $i++){
                  if($_SESSION['chess'][0]->chessboard[$r][$this->c + $i] != ""){
                    // echo "Right";
                    return false;
                  }
                }
              };


          //check if no piece diagnotical  upperleft and down right
          if($ifDiffCIsPositive && $ifDiffRIsPositive && $diffR != 0 && $diffC != 0){
            for($i=1; $i<abs($diffC); $i++){
              if($_SESSION['chess'][0]->chessboard[$this->r - $i][$this->c - $i] != ""){
                // echo "UpperLeft";
                return false;
              }
            }
          }elseif($ifDiffCIsPositive && !$ifDiffRIsPositive && $diffR != 0 && $diffC != 0){
            for($i=1; $i<abs($diffR); $i++){
              if($_SESSION['chess'][0]->chessboard[$this->r + $i][$this->c - $i] != ""){
                // echo "DownLeft";
                return false;
              }
            }
          }elseif(!$ifDiffCIsPositive && $ifDiffRIsPositive && $diffR != 0 && $diffC != 0){
            for($i=1; $i<abs($diffC); $i++){
              if($_SESSION['chess'][0]->chessboard[$this->r - $i][$this->c + $i] != ""){
                // echo "UpperRight";
                return false;
              }
            }
          }elseif(!$ifDiffCIsPositive && !$ifDiffRIsPositive && $diffR != 0 && $diffC != 0){
            for($i=1; $i<abs($diffC); $i++){
              if($_SESSION['chess'][0]->chessboard[$this->r + $i][$this->c + $i] != ""){
                // echo "DownRight";
                return false;
              }
            }
          };

              //TRUE: there is piece
              $not_this_r_position = ($this->r != $r);
              $not_this_c_position = ($this->c != $c);
              $not_this_position = ($not_this_r_position && $not_this_c_position); //avoid selecting current place


              if($this->r == $r && $not_this_c_position){
                  return true;
              }elseif($this->c == $c && $not_this_r_position){
                  return true;
              }elseif(($this->r + $diffR == $r|| $this->r - $diffR == $r) && ($this->c + $diffR == $c || $this->c - $diffR == $c) && $not_this_position){
                  return true;
              }else {
                  return false;
              }

      }
    }
