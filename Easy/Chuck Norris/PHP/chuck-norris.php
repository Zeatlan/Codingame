<?php
    $MESSAGE = stream_get_line(STDIN, 100 + 1, "\n");

    $bin = '';
    foreach (str_split($MESSAGE) as $character) {
        $bin .= sprintf('%07b', ord($character));
    }
    
    $previous = "";
    $chuck = "";
    foreach(str_split($bin) as $b) {
        if($previous != $b) $chuck .= ($previous = $b) ? ' 0 ' : ' 00 ';
        $chuck .= '0';
    }

    echo ltrim($chuck) . PHP_EOL;
