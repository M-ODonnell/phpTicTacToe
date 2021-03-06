<?php
session_start();
require("board.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Tic Tac Toe</title>
        <link href="ttcStyles.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <div id="main">
        <h1>Tic Tac Toe</h1>
        <?php

        // if player1 has selected piece, assign players,
        // else show form to pick X or O
        if (isset($_GET['submit1'])) {
            if (isset($_GET['piece'])) {
                $board = new board();
                $board->player1 = $_GET['piece'];
                $_SESSION['turn'] = 0;
                if ($board->player1 == 'X') {
                    $board->player2 = 'O';
                } else {
                    $board->player2 = 'X';
                }
                $_SESSION['board'] = serialize($board);
            } else {
                echo "Player 1, please select a piece.";
                echo "<form action='ticTacToe.php'>";
                echo "<input type='submit' value='Go back!' />";
                echo "</form>";
            }
        }
        elseif (!isset($_GET['submit2'])) {
            // need to begin game, prompt player to pick piece
            // and initialize turn, to differentiate
            // between new game and game in progress
            $_SESSION['turn'] = '';
            ?>
            <form method="get" action="ticTacToe.php">
                <input type="radio" name="piece" value="X"/> X <br/>
                <input type="radio" name="piece" value="O"/> O <br/>
                <input type="submit" name="submit1" value="Player 1, pick your piece!"/>
            </form>
        <?php
        }

        // players have been assigned, play game
        if (is_numeric($_SESSION['turn'])) {
            // unserialize the board so we can use it
            $board = unserialize($_SESSION['board']);

            if (isset($_GET['submit2'])) {
                if (isset($_GET['choice'])) {
                    // apply the turn that has been taken
                    $board->assignTakenTurn($_SESSION['turn'], $_GET['choice']);

                    $_SESSION['turn']++;
                    $board->getCurrentPlayer($_SESSION['turn']);

                    echo "<br/>Turn: " . $_SESSION['turn'];
                    // a show updated board, with space taken
                    $board->displayBoard();

                    // serialize the board here, so it persists as a session var
                    $_SESSION['board'] = serialize($board);
                } else {
                    // choice hasn't been made prompt to take turn
                    echo "Please select a position for your piece.<br/>Turn: " . $_SESSION['turn'] . "<br/>";
                    $board->getCurrentPlayer($_SESSION['turn']);
                    $board->displayBoard();
                }
            }
            else {
                // a turn hasn't been taken yet, show the board now
                if ($_SESSION['turn'] == 0) {
                    // player 1 active by default
                    $_SESSION['turn']++;
                    echo "Active player: ".$board->player1;
                    echo "<br/>Turn: " . $_SESSION['turn'];
                    $board->displayBoard();
                }
            }

            echo "<form method='get' action='ticTacToe.php'>";
            foreach ($board->elements as $space) {
                // output radio buttons for remaining available choices
                if (is_numeric($space)) {
                    echo "<input type='radio' name='choice' value='$space'/> $space <br/>";
                }
            }
            echo "<input type='submit' name='submit2' value='Place your piece!'/>";
            echo "</form>";
        }
        ?>
        </div>
    </body>
</html>
