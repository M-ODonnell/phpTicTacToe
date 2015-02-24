<?php require("board.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Tic Tac Toe</title>
    </head>
    <body>
        <h1>Tic Tac Toe</h1>
        <?php
            $board = new board();
            $board->initialize();
            //$board->displayBoard();
        ?>
    </body>
</html>