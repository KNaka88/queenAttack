<?php
    class ChessBoard
    {
        public $chessboard;

        function __construct()
        {
            $this->chessboard = array();
            for($row=0; $row<8; $row++){
                array_push($this->chessboard, array());
                for($col=0; $col<8; $col++){
                    $this->chessboard[$row][$col] = "[ ]";
                }
            }
        }

        function setPiece($x, $y, $piece){
            $this->chessboard[$x][$y] = $piece;
        }

        function drawBoard (){
            echo "<table>";
            for($row=0; $row<8; $row++){
                echo "<tr>";
                for($col=0; $col<8; $col++){
                    echo "<td>" . $this->chessboard[$row][$col] . "</td>";
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
