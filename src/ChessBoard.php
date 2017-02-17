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


            //Piece IMAGE
            $white_king = "<img id='player1'  src='https://upload.wikimedia.org/wikipedia/commons/4/42/Chess_klt45.svg' alt='white-king'>";
            $white_queen =  "<img id='player1' src='https://upload.wikimedia.org/wikipedia/commons/1/15/Chess_qlt45.svg' alt='white-queen'>";
            $white_knight = "<img id='player1' src='https://upload.wikimedia.org/wikipedia/commons/7/70/Chess_nlt45.svg' alt='white-knight'>";
            $white_pawn = "<img id='player1' src='https://upload.wikimedia.org/wikipedia/commons/4/45/Chess_plt45.svg' alt='white-pawn'>";
            $white_rook = "<img id='player1' src='https://upload.wikimedia.org/wikipedia/commons/7/72/Chess_rlt45.svg' alt='white-rook'>";
            $white_bishop = "<img id='player1' src='https://upload.wikimedia.org/wikipedia/commons/b/b1/Chess_blt45.svg' alt='white-bishop'>";

            $black_king = "<img id='player2' src='https://upload.wikimedia.org/wikipedia/commons/f/f0/Chess_kdt45.svg' alt='black-king'>";
            $black_queen = "<img id='player2' src='https://upload.wikimedia.org/wikipedia/commons/4/47/Chess_qdt45.svg' alt='white-queen'>";
            $black_knight = "<img id='player2' src='https://upload.wikimedia.org/wikipedia/commons/e/ef/Chess_ndt45.svg' alt='black-knight'>";
            $black_pawn = "<img id='player2' src='https://upload.wikimedia.org/wikipedia/commons/c/c7/Chess_pdt45.svg' alt='black-pawn'>";
            $black_rook = "<img id='player2' src='https://upload.wikimedia.org/wikipedia/commons/f/ff/Chess_rdt45.svg' alt='black-rook'>";
            $black_bishop = "<img id='player2' src='https://upload.wikimedia.org/wikipedia/commons/9/98/Chess_bdt45.svg' alt='black-bishop'>";



            //Initialize Player1 Chess Piece
            for ($i=0; $i<8; $i++){
              $this->chessboard[6][$i] = new Pawn(6,$i, $white_pawn,"player1");
            }
            $this->chessboard[7][0] = new Rook(7,0, $white_rook,"player1");
            $this->chessboard[7][7] = new Rook(7,7, $white_rook,"player1");
            $this->chessboard[7][1] = new Knight(7,1, $white_knight,"player1");
            $this->chessboard[7][6] = new Knight(7,6, $white_knight,"player1");
            $this->chessboard[7][2] = new Bishop(7,2, $white_bishop,"player1");
            $this->chessboard[7][5] = new Bishop(7,5, $white_bishop,"player1");
            $this->chessboard[7][4] = new King(7,4, $white_king,"player1");
            $this->chessboard[7][3] = new Queen(7,3, $white_queen,"player1");

            //Initialize Player2 Chess Piece
            for ($i=0; $i<8; $i++){
                $this->chessboard[1][$i] = new Pawn(1,$i, $black_pawn, "player2");
            }
            $this->chessboard[0][0] = new Rook(0,0, $black_rook, "player2");
            $this->chessboard[0][7] = new Rook(0,7, $black_rook, "player2");
            $this->chessboard[0][1] = new Knight(0,1, $black_knight, "player2");
            $this->chessboard[0][6] = new Knight(0,6, $black_knight, "player2");
            $this->chessboard[0][2] = new Bishop(0,2, $black_bishop, "player2");
            $this->chessboard[0][5] = new Bishop(0,5, $black_bishop, "player2");
            $this->chessboard[0][4] = new King(0,4, $black_king, "player2");
            $this->chessboard[0][3] = new Queen(0,3, $black_queen, "player2");
        }

        function drawBoard (){
            echo "<table>";
            for($row=0; $row<8; $row++){
                echo "<tr id='row$row'>";
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





        static function save($chessboard){
          $_SESSION["chess"] = [];
          array_push($_SESSION["chess"], $chessboard);
        }


    }
