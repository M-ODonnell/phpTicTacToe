<?php
class board {
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
            echo "Player ".$player." has won!<br/><br/>";
            echo "<a href='ticTacToe.php'>Start a New Game</a>";
            exit;
        }
    }
}
