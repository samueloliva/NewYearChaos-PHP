'''PHP
<?php

// Complete the minimumBribes function below.
function minimumBribes($q) {
    $n = sizeof($q);
    $briber = array_fill(1,$n,0);
    $ctr = 0;

    $swapped = true;
    while ( $swapped ) {
        $swapped = false; 
        for ($i=0; $i<$n-1; $i++) {
            if ( $q[$i] > $q[$i+1] ) {
                // swap positions between direct elements
                $temp = $q[$i];
                $q[$i] = $q[$i+1];
                $q[$i+1] = $temp;
                
                $swapped = true;

                $curr_val = $briber[$q[$i+1]];
                $briber[$q[$i+1]] = $curr_val + 1;
                
                $ctr += 1;
                continue;
            }
        }
    }

    if (max($briber) > 2) {
        print("Too chaotic");
        print("\n");
    }
    else {
        print($ctr);
        print("\n");
    }    

}

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $t);

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    fscanf($stdin, "%d\n", $n);

    fscanf($stdin, "%[^\n]", $q_temp);

    $q = array_map('intval', preg_split('/ /', $q_temp, -1, PREG_SPLIT_NO_EMPTY));

    minimumBribes($q);
}

fclose($stdin);


'''
