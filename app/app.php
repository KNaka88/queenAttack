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
        $r_pos = $_POST['this_r'];
        $c_pos = $_POST['this_c'];
        $atck_r = $_POST['move_atck_r'];
        $atck_c = $_POST['move_atck_c'];

        if(!(empty($r_pos) && empty($c_pos) && empty($atck_r) && empty($atck_c))){

          echo $r_pos;
          echo $c_pos;
          echo $atck_r;
          echo $atck_c;

            $check = $load[0]->chessboard[$r_pos][$c_pos]->canAttack($atck_r, $atck_c);
            if($check){
              $load[0]->chessboard[$atck_r][$atck_c] = $load[0]->chessboard[$r_pos][$c_pos];
              var_dump($load[0]->chessboard[$atck_r][$atck_c]);
              $load[0]->chessboard[$atck_r][$atck_c]->setR($atck_r);
              $load[0]->chessboard[$atck_r][$atck_c]->setC($atck_c);
              $load[0]->chessboard[$r_pos][$c_pos] = "";
            }
            //false is occurred because chessboard[$atck_r][$atck_c]'s  $this->x and $this->y is not updated.
            //you need to set x and y again!!!
        }

        return $app['twig']->render('chessboard.html.twig', array('board'=>$_SESSION['chess']));
    });

    return $app;
