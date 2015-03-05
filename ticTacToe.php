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
                $_SESSION['player1'] = $_GET['piece'];
                $_SESSION['turn'] = 0;
                if ($_SESSION['player1'] == 'X') {
                    $_SESSION['player2'] = 'O';
                } else {
                    $_SESSION['player2'] = 'X';
                }
                $board = new board();
                $_SESSION['board'] = serialize($board);
            } else {
                echo "Player 1, please select a piece.";
            }
        }
        elseif (!isset($_GET['submit2'])) {
            // need to begin game, prompt player to pick piece
            // and initialize turn, to differentiate
            // between new game and game in progress
            $_SESSION['turn'] = '';
            $_SESSION['gameWon'] = false;
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
                // apply the turn that has been taken
                if ($_SESSION['turn'] % 2 == 0) {
                    $board->elements[$_GET[('choice')]-1] = $_SESSION['player2'];
                    // check to see if the game has been won
                    $board->checkForWin($_SESSION['player2']);
                    // player two just went, so player one is active
                    echo "Active player: ".$_SESSION['player1'];
                } else {
                    $board->elements[$_GET[('choice')]-1] = $_SESSION['player1'];
                    // check to see if the game has been won
                    $board->checkForWin($_SESSION['player1']);
                    // player one just went, so player two is active
                    echo "Active player: ".$_SESSION['player2'];
                }

                $_SESSION['turn']++;
                echo "<br/>turn: " . $_SESSION['turn'];
                // a show updated board, with space taken
                $board->displayBoard();

                // check for draw
                if ($_SESSION['turn'] == 9) {
                    echo "Game is a draw!<br/><br/>";
                    session_destroy();
                    echo "<a href='ticTacToe.php'>Start a New Game</a>";
                    exit;
                }

                // serialize the board here, so it persists as a session var
                $_SESSION['board'] = serialize($board);
            }
            else {
                // a turn hasn't been taken yet, show the board now
                if ($_SESSION['turn'] == 0) {
                    // player 1 active by default
                    $_SESSION['turn']++;
                    echo "Active player: ".$_SESSION['player1'];
                    echo "<br/>turn: " . $_SESSION['turn'];
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
