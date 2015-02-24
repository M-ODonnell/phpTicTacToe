<?php
class board {
    public $elements = [];
    function __construct() {
        for ($i = 0; $i < 9; $i++) {
            $elements[$i] = $i;
        }
    }
    function displayBoard() {
        echo "<table>".
                "<tr>".
                    "<td>".$elements[1]."</td>".
                    "<td>".$elements[2]."</td>".
                    "<td>".$elements[3]."</td>".
                "</tr>".
                "<tr>".
                    "<td>".$elements[4]."</td>".
                    "<td>".$elements[5]."</td>".
                    "<td>".$elements[6]."</td>".
                "</tr>".
                "<tr>".
                    "<td>".$elements[7]."</td>".
                    "<td>".$elements[8]."</td>".
                    "<td>".$elements[9]."</td>".
                "</tr>".
            "</table>";
    }
}