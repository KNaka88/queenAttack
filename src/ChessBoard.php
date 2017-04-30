<?php
    require_once "Rook.php";
    require_once "Bishop.php";
    require_once "King.php";
    require_once "Pawn.php";
    require_once "Knight.php";
    require_once "Queen.php";

    class ChessBoard
    {
        public $chessboard;
        public $playerturn;
        public $switch_player;

        function __construct()
        {
            $this->chessboard = array();
            for($row=0; $row<8; $row++){

                array_push($this->chessboard, array());
                for($col=0; $col<8; $col++){
                    $this->chessboard[$row][$col] = "";
                }
            }
            $this->playerturn = "Player1";
            $this->switch_player = true;
        }

        function setPiece($r, $c, $piece){
            $this->chessboard[$r][$c] = $piece;
        }

        function setPlayerTurn($new_playerturn){
            $this->playerturn = $new_playerturn;
        }

        function getPlayerturn(){
            return $this->playerturn;
        }

        function getSwitchplayer (){
          return $this->switch_player;
        }

        function switchPlayer(){
          //Player1: true
          //Player2: false
          $this->switch_player = !($this->switch_player);
          return $this->switch_player;
        }

        function initializeBoard(){


            //Piece IMAGE
            $white_king = "<img class='player1'  src='img/white-king.svg' alt='white-king'>";
            $white_queen =  "<img class='player1' src='img/white-queen.svg' alt='white-queen'>";
            $white_knight = "<img class='player1' src='img/white-knight.svg' alt='white-knight'>";
            $white_pawn = "<img class='player1' src='img/white-pawn.svg' alt='white-pawn'>";
            $white_rook = "<img class='player1' src='img/white-rook.svg' alt='white-rook'>";
            $white_bishop = "<img class='player1' src='img/white-bishop.svg' alt='white-bishop'>";

            $black_king = "<img class='player2' src='img/black-king.svg' alt='black-king'>";
            $black_queen = "<img class='player2' src='img/black-queen.svg' alt='white-queen'>";
            $black_knight = "<img class='player2' src='img/black-knight.svg' alt='black-knight'>";
            $black_pawn = "<img class='player2' src='img/black-pawn.svg' alt='black-pawn'>";
            $black_rook = "<img class='player2' src='img/black-rook.svg' alt='black-rook'>";
            $black_bishop = "<img class='player2' src='img/black-bishop.svg' alt='black-bishop'>";


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
                        echo "<td class='piece' id='row-$row-col-$col'>" . $this->chessboard[$row][$col]->getSymbol() . "</td>";
                    } else {
                        echo "<td class='piece' id='id=row-$row-col-$col'>" . $this->chessboard[$row][$col] . "</td>";
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
