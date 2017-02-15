<?php
    require_once "Queen.php";
    require_once "Rook.php";
    require_once "Bishop.php";
    require_once "King.php";
    require_once "Pawn.php";
    require_once "Knight.php";

    class ChessBoard
    {
        public $chessboard;

        function __construct()
        {
            $this->chessboard = array();
            for($row=0; $row<8; $row++){

                array_push($this->chessboard, array());
                for($col=0; $col<8; $col++){
                    $this->chessboard[$row][$col] = "";
                }
            }
        }

        function setPiece($x, $y, $piece){
            $this->chessboard[$x][$y] = $piece;
        }

        function initializeBoard(){
            for ($i=0; $i<8; $i++){
            $this->chessboard[1][$i] = new Pawn(1,$i);
            $this->chessboard[6][$i] = new Pawn(6,$i);
            }
            $this->chessboard[0][0] = new Rook(0,0);
            $this->chessboard[0][7] = new Rook(0,7);
            $this->chessboard[7][0] = new Rook(7,0);
            $this->chessboard[7][7] = new Rook(7,7);
            $this->chessboard[0][1] = new Knight(0, 1);
            $this->chessboard[0][6] = new Knight(0,6);
            $this->chessboard[7][1] = new Knight(7,1);
            $this->chessboard[7][6] = new Knight(7,6);
            $this->chessboard[0][2] = new Bishop(0,2);
            $this->chessboard[0][5] = new Bishop(0,5);
            $this->chessboard[7][2] = new Bishop(7,2);
            $this->chessboard[7][5] = new Bishop(7,5);
            $this->chessboard[0][4] = new King(0,4);
            $this->chessboard[7][4] = new King(7,4);
            $this->chessboard[0][3] = new Queen(0,3);
            $this->chessboard[7][3] = new Queen(7,3);
        }

        function drawBoard (){
            echo "<table>";
            for($row=0; $row<8; $row++){
                echo "<tr class='piece' id='row$row'>";
                for($col=0; $col<8; $col++){
                    if(!empty($this->chessboard[$row][$col])){
                        echo "<td class='piece' id='col-$col-row-$row'>" . $this->chessboard[$row][$col]->getSymbol() . "</td>";
                    } else {
                        echo "<td class='piece' id='id=col-$col-row-$row'>" . $this->chessboard[$row][$col] . "</td>";
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
        }

    }
