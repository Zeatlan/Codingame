<?php
fscanf(STDIN, "%d", $L);
fscanf(STDIN, "%d", $H);
$T = stream_get_line(STDIN, 256 + 1, "\n");
$string = "ABCDEFGHIJKLMNOPQRSTUVWXYZ?";
$ROW = [];

for ($i = 0; $i < $H; $i++)
{
    $ROW[] = stream_get_line(STDIN, 1024 + 1, "\n");
}

for($i = 0; $i < $H; $i++){
    $word = "";

    foreach(str_split($T) as $letter){
        $index = strpos($string, strtoupper($letter));
        if($index === false) $index = strpos($string, "?");
        $word .= substr($ROW[$i], $index * $L, $L);
    }

    echo($word ."\n");
}
?>