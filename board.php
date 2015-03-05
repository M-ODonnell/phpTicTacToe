<?php
class board {
    public $player1;
    public $player2;
    public $elements = array();
    function __construct() {
        for ($i = 0; $i < 9; $i++) {
            $this->elements[$i] = $i+1;
        }
    }

    function displayBoard() {
        echo "<div id='ttcBoard'><table>".
            "<tr>".
            "<td>".$this->elements[0]."</td>".
            "<td>".$this->elements[1]."</td>".
            "<td>".$this->elements[2]."</td>".
            "</tr>".
            "<tr>".
            "<td>".$this->elements[3]."</td>".
            "<td>".$this->elements[4]."</td>".
            "<td>".$this->elements[5]."</td>".
            "</tr>".
            "<tr>".
            "<td>".$this->elements[6]."</td>".
            "<td>".$this->elements[7]."</td>".
            "<td>".$this->elements[8]."</td>".
            "</tr>".
            "</table></div>";
    }

    function checkForWin($player) {
        if (($this->elements[0] == $player && $this->elements[1] == $player && $this->elements[2] == $player) ||
            ($this->elements[3] == $player && $this->elements[4] == $player && $this->elements[5] == $player) ||
            ($this->elements[6] == $player && $this->elements[7] == $player && $this->elements[8] == $player) ||
            ($this->elements[0] == $player && $this->elements[3] == $player && $this->elements[6] == $player) ||
            ($this->elements[1] == $player && $this->elements[4] == $player && $this->elements[7] == $player) ||
            ($this->elements[2] == $player && $this->elements[5] == $player && $this->elements[8] == $player) ||
            ($this->elements[0] == $player && $this->elements[4] == $player && $this->elements[8] == $player) ||
            ($this->elements[6] == $player && $this->elements[4] == $player && $this->elements[2] == $player)
        ) {
            echo "<br/>Player ".$player." has won!<br/><br/>";
            echo "<a href='ticTacToe.php'>Start a New Game</a>";
            exit;
        }
    }

    function getCurrentPlayer($turn) {
        if ($turn % 2 == 0) {
            // player two just went, so player one is active
            echo "Active player: " . $this->player2;
        } else {
            // player one just went, so player two is active
            echo "Active player: " . $this->player1;
        }
    }

    function assignTakenTurn($turn, $choice) {
        if ($turn % 2 == 0) {
            $this->elements[$choice - 1] = $this->player2;
            // check to see if the game has been won
            $this->checkForWin($this->player2);
        } else {
            $this->elements[$choice - 1] = $this->player1;
            // check to see if the game has been won
            $this->checkForWin($this->player1);
        }
    }
}
