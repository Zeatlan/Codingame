<?php
fscanf(STDIN, "%d %d %d %d", $lx, $ly, $tx, $ty);
while (TRUE){
    fscanf(STDIN, "%d", $remainingTurns);
    if($ly>$ty){echo("S");$ty++;}
    if($ly<$ty){echo("N");$ty--;}
    if($lx>$tx){echo("E");$tx++;}
    if($lx<$tx){echo("W");$tyx--;}
    echo("\n");
}
?>