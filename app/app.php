<?php

    date_default_timezone_set("America/Los_Angeles");
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Queen.php";
    require_once __DIR__."/../src/Rook.php";
    require_once __DIR__."/../src/Bishop.php";
    require_once __DIR__."/../src/ChessBoard.php";

    $app = new Silex\Application();


    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        "twig.path" => __DIR__.'/../views'
    ));
    $app['debug'] = true;

    $app->get("/", function() use ($app) {
        $newchessboard = new ChessBoard();

        return $app['twig']->render('chessboard.html.twig', array('board'=>$newchessboard));
        // return $app['twig']->render('form.html.twig');
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



    return $app;
