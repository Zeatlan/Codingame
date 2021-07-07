<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

// $N: the total number of nodes in the level, including the gateways
// $L: the number of links
// $E: the number of exit gateways
fscanf(STDIN, "%d %d %d", $N, $L, $E);
$routes = [];
for ($i = 0; $i < $L; $i++)
{
    // $N1: N1 and N2 defines a link between these nodes
    fscanf(STDIN, "%d %d", $N1, $N2);
    $routes = array_merge($routes, [$N1, $N2]);
}

$path = [];
$gateways = [];
for ($j = 0; $j < $E; $j++)
{
    // $EI: the index of a gateway node
    fscanf(STDIN, "%d", $EI);
    array_push($gateways, $EI);
    $temp = [];
    for($i = 0; $i < sizeOf($routes)-1; $i++){
        if($gateways[$j] === $routes[$i]){
            if($i%2 === 0)
                $temp = array_merge($temp, [$routes[$i], $routes[$i+1]]);
            else
                $temp = array_merge($temp, [$routes[$i-1], $routes[$i]]);
            $i++;
        }
    }
    $path[$j] = array_merge([], $temp);
}

$link = 0;

// game loop
while (TRUE)
{
    // $SI: The index of the node on which the Skynet agent is positioned this turn
    fscanf(STDIN, "%d", $SI);

    for($i = 0; $i < sizeOf($gateways); $i++){
        $keyRange = array_search($SI, $path[$i]);

        if($keyRange){
            echo($SI ." ". $gateways[$i] ."\n");
            break;
        }
    }
    
    if(!$keyRange) {
        $rand = array_rand($gateways);
        if($link === sizeOf($path[$rand])) $link = 0;
        echo($path[$rand][$link] . " " . $path[$rand][$link+1] ."\n");
        $link += 2;
    }
    
    // Write an action using echo(). DON'T FORGET THE TRAILING \n
    // To debug: error_log(var_export($var, true)); (equivalent to var_dump)


    // Example: 0 1 are the indices of the nodes you wish to sever the link between
}
?>