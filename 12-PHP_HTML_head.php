<?php

function headPHP($tit, $flag){
    $colore = ($flag) ? "red" : "blue";
    $html = "";
    $html .= "<head>";
    $html .= "<meta charset=\"UTF-8\">";
    $html .= "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
    $html .= "<title>$tit</title>";
    $html .= "<style>";
    $html .= " h2 {";
    $html .= " color: $colore;";
    $html .= "}";
    $html .= "footer {";
    $html .= " color: white;";
    $html .= " background-color: black;";
    $html .= "</style>";
    return $html;
}
?>