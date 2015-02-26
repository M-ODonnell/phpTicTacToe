<?php
require("board.php");
require("players.php");
?>
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
$board->displayBoard();
?>
<form method="get" action="ticTacToe.php">
    <input type="radio" name="piece" value="x" /> X <br/>
    <input type="radio" name="piece" value="o" /> O
    <input type="submit" name="submit" value="Pick your piece!" />
</form>
<?php
    if (isset($_GET['submit'])) {
        if (isset($_GET['piece'])) {
            $player1 = new player($_GET['piece']);
            //echo "Player 1 picked " . $player1->playerNum;
            if ($player1->playerNum == 'x') {
                $player2 = new player('o');
            } else {
                $player2 = new player('x');
            }
            //echo "Player 2 picked " . $player2->playerNum;
        } else {
            echo "Please select a piece.";
        }
    }
?>
</body>
</html>
