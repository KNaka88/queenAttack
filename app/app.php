<?php

    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Queen.php";
    require_once __DIR__."/../src/Rook.php";
    require_once __DIR__."/../src/Bishop.php";
    require_once __DIR__."/../src/ChessBoard.php";

    $app = new Silex\Application();

    session_start();
    if (empty($_SESSION['chess'])) {
      $_SESSION['chess'] = array();
    }


    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        "twig.path" => __DIR__.'/../views'
    ));
    $app['debug'] = true;

    $app->get("/", function() use ($app) {
        $newchessboard = new ChessBoard();
        $newchessboard->initializeBoard();
        ChessBoard::save($newchessboard);
        return $app['twig']->render('chessboard.html.twig', array('board'=>$_SESSION['chess']));
    });

    $app->get("/display_chess_piece", function() use ($app) {

        $chessType = $_GET['piece'];


        $op_piece_x = $_GET['op-piece-x'];
        $op_piece_y = $_GET['op-piece-y'];



        switch($chessType){
            case "rook":
                $new_piece = new Rook($_GET['piece-x'], $_GET['piece-y']);
                break;
            case "queen":
                $new_piece = new Queen($_GET['piece-x'], $_GET['piece-y']);
                break;
            case "bishop":
                $new_piece = new Bishop($_GET['piece-x'], $_GET['piece-y']);
                default:
                echo "Error";
        }

        return $app['twig']->render('display_chess_eval.html.twig', array("result" => $new_piece->canAttack($op_piece_x, $op_piece_y)));
    });

    $app->post("/attack", function() use ($app) {
        $load = $_SESSION['chess'];

        $x_pos = (string)$_POST['x-pos'];
        $y_pos = (string)$_POST['y-pos'];
        $check = $load[0]->chessboard[7][3]->canAttack($x_pos, $y_pos);
        var_dump($check);
        if($check){
          $load[0]->chessboard[$x_pos][$y_pos]->setAlive(false);
          $load[0]->chessboard[$x_pos][$y_pos] = "";
        }
        return $app['twig']->render('chessboard.html.twig', array('board'=>$_SESSION['chess']));
    });



    return $app;
