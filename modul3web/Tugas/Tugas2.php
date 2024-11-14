<?php

function cetakBilangan($n) {
    for ($i = 1; $i <= $n; $i++) {
        if ($i % 4 == 0 && $i % 6 == 0) {
            echo "PemrogramanWebsite 2024" . PHP_EOL;
        } elseif ($i % 4 == 0 && $i % 6 != 0) { 
            echo "Pemrograman" . PHP_EOL;
        } elseif ($i % 2 == 0) { 
            echo "pemrograman web" . PHP_EOL;
        } elseif ($i % 5 == 0) {
            echo "2024" . PHP_EOL;
        } else {
            echo $i . PHP_EOL;
        }
    }
}

// Meminta input dari pengguna
echo "Masukkan nilai n: ";
$n = (int)fgets(STDIN); 
// Memanggil fungsi dengan nilai n dari input
cetakBilangan($n);

?>
