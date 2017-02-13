<?php

    require_once "src/Queen.php";
    require_once "src/Rook.php";
    require_once "src/Bishop.php";

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
        // If a queen piece and an opposing piece are diagonal of one space, the queen is able to attack.
        // input->queen(2,2), piece(3,3) output->"attack successful"
        function test_diagonal()
        {
            //Arrange
            $queen_x = 2;
            $queen_y = 2;
            $piece_x = 3;
            $piece_y = 3;
            $test_canAttack = new Queen($queen_x, $queen_y);


            //Act
            $result = $test_canAttack->canAttack($piece_x, $piece_y);

            //Assert
            $this->assertEquals(true, $result);

        }
        // //test4: diagonal more than 1
        // If a queen piece and an opposing piece are diagonal of more than one space, the queen is able to attack.
        // input->queen(2,2), piece(4,4) output->"attack successful"
        function test_diagonal_more()
        {
            //Arrange
            $queen_x = 2;
            $queen_y = 2;
            $piece_x = 4;
            $piece_y = 4;
            $test_canAttack = new Queen($queen_x, $queen_y);


            //Act
            $result = $test_canAttack->canAttack($piece_x, $piece_y);

            //Assert
            $this->assertEquals(true, $result);

        }

        // Rook tests
        function test_rook_horizontal()
        {
            //Arrange
            $rook_x = 1;
            $rook_y = 4;
            $piece_x = 3;
            $piece_y = 4;
            $test_canAttack = new Rook($rook_x, $rook_y);


            //Act
            $result = $test_canAttack->canAttack($piece_x, $piece_y);

            //Assert
            $this->assertEquals(true, $result);

        }
        function test_rook_vertical()
        {
            //Arrange
            $rook_x = 1;
            $rook_y = 4;
            $piece_x = 1;
            $piece_y = 8;
            $test_canAttack = new Rook($rook_x, $rook_y);


            //Act
            $result = $test_canAttack->canAttack($piece_x, $piece_y);

            //Assert
            $this->assertEquals(true, $result);

        }



        // Bishop tests
        function test_bishop_diagonal_more()
        {
            //Arrange
            $bishop_x = 2;
            $bishop_y = 2;
            $piece_x = 4;
            $piece_y = 4;
            $test_canAttack = new Bishop($bishop_x, $bishop_y);


            //Act
            $result = $test_canAttack->canAttack($piece_x, $piece_y);

            //Assert
            $this->assertEquals(true, $result);
        }

    }
