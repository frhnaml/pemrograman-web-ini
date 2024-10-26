<?php
$tinggi = 5;

for ($i = 1; $i <= $tinggi; $i++) {
    // Print spasi
    for ($j = $i; $j < $tinggi; $j++) {
        echo " ";
    }
    
    // Print bintang
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
    echo "\n";
}
?>
