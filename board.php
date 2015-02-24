<?php
class board {
    public $elements = array();
    function initialize() {
        for ($i = 0; $i < 9; $i++) {
            $elements[$i] = $i;
            echo "<p>$elements[$i]</p>";
        }
    }
    function displayBoard() {
        echo "<table>".
                 "<tr>".
                    "<td>$elements[0]</td>".
                    "<td>$elements[1]</td>".
                    "<td>$elements[2]</td>".
                "</tr>".
                "<tr>".
                    "<td>".$elements[3]."</td>".
                    "<td>".$elements[4]."</td>".
                    "<td>".$elements[5]."</td>".
                "</tr>".
                "<tr>".
                    "<td>".$elements[6]."</td>".
                    "<td>".$elements[7]."</td>".
                    "<td>".$elements[8]."</td>".
                "</tr>".
            "</table>";
    }
}