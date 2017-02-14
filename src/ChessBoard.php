<?php
    require_once "Queen.php";
    require_once "Rook.php";
    require_once "Bishop.php";

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
                // $this->chessboard[1][$i] = "P";
                // $this->chessboard[6][$i] = "P";
            }
            $this->chessboard[0][0] = new Rook(0,0);
            $this->chessboard[0][7] = new Rook(0,7);
            $this->chessboard[7][0] = new Rook(7,0);
            $this->chessboard[7][7] = new Rook(7,7);
            // $this->chessboard[0][1] = "Kn";
            // $this->chessboard[0][6] = "Kn";
            // $this->chessboard[7][1] = "Kn";
            // $this->chessboard[7][6] = "Kn";
            $this->chessboard[0][2] = new Bishop(0,2);
            $this->chessboard[0][5] = new Bishop(0,5);
            $this->chessboard[7][2] = new Bishop(7,2);
            $this->chessboard[7][5] = new Bishop(7,5);
            // $this->chessboard[0][4] = "K";
            // $this->chessboard[7][4] = "K";
            $this->chessboard[0][3] = new Queen(0,3);
            $this->chessboard[7][3] = new Queen(7,3);



        }

        function drawBoard (){
            echo "<table>";
            for($row=0; $row<8; $row++){
                echo "<tr class='piece'>";
                for($col=0; $col<8; $col++){
                    if(!empty($this->chessboard[$row][$col])){
                        echo "<td class='piece'>" . $this->chessboard[$row][$col]->getSymbol() . "</td>";
                    } else {
                        echo "<td class='piece'>" . $this->chessboard[$row][$col] . "</td>";
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
        }


        // function setChessBoard (){
        //     for($i=0; $i<8; $i++){
        //         echo "<tr>";
        //         for($j=0; $j<8; $j++){
        //             array_push($chessboard[$i][$j], '[ ]');
        //             echo $chessboard[$i][$j];
        //         }
        //         echo "</tr>";
        //     }
        // }

    }
