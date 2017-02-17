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



    session_start();
    if (empty($_SESSION['chess'])) {
      $_SESSION['chess'] = array();
    }

    
    $app->get("/", function() use ($app) {
        $newchessboard = new ChessBoard();
        $newchessboard->initializeBoard();
        ChessBoard::save($newchessboard);
        return $app['twig']->render('chessboard.html.twig', array('board'=>$_SESSION['chess']));
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
