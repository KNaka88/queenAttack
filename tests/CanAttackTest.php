<?php

    require_once "src/Queen.php";

    class CanAttack_test extends PHPUnit_Framework_TestCase
    {

        //test1 : vertical (x, y)

            // If a queen piece and an opposing piece are in the same x coordinates, the queen is able to attack.
            // input->queen(1,4), piece(1,8) output->"true"



        function test_vertical()
        {
            //Arrange
            $queen_x = 1;
            $queen_y = 4;
            $piece_x = 1;
            $piece_y = 8;
            $test_canAttack = new Queen($queen_x, $queen_y);


            //Act
            $result = $test_canAttack->canAttack($piece_x, $piece_y);

            //Assert
            $this->assertEquals(true, $result);

        }

        // test2: horizontal
        // If a queen piece and an opposing piece are in the same y coordinates, the queen is able to attack.
        // input->queen(1,4), piece(2,4) output->"attack successful"
        function test_horizontal()
        {
            //Arrange
            $queen_x = 1;
            $queen_y = 4;
            $piece_x = 2;
            $piece_y = 4;
            $test_canAttack = new Queen($queen_x, $queen_y);


            //Act
            $result = $test_canAttack->canAttack($piece_x, $piece_y);

            //Assert
            $this->assertEquals(true, $result);


        }


        // 
        // //test3: diagonal
        // function test_diagonal()
        // {
        //
        //
        // }


    }
