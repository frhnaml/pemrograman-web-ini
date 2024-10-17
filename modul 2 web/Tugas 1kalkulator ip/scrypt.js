//fungsi untuk memasukan angka input
function appendValue(value){
    document.getElementById("display").value += value;
}

//fungsi buat clear display
function clearDisplay(){
    document.getElementById("display").value = "";
}

//fungsi buat modulus
function modulus() {
    document.getElementById("display").value += "MOD";
}

//fungsi buat hitung hasil ekspresi matematika
function calculate(){
    const display = document.getElementById("display");
    try {
        let expression = display.value.replaceAll(",", ".");
        
        // Cek apakah ada operator modulus
        if (expression.includes("MOD")) {
            let numbers = expression.split('MOD');
            if (numbers.length === 2) {
                let num1 = parseFloat(numbers[0]);
                let num2 = parseFloat(numbers[1]);
                if (!isNaN(num1) && !isNaN(num2)) {
                    let result = num1 % num2;
                    display.value = result.toString().replace(".", ",");
                } else {
                    display.value = "Error";
                }
            } else {
                display.value = "Error";
            }
        } else {
            display.value = eval(expression).toString().replace(".", ",");
        }
    } catch {
        display.value = "Error";
    }
}


function square() {
    const display = document.getElementById("display");
    try {
        let currentValue = parseFloat(display.value.replace(",", "."));
        display.value = (currentValue ** 2).toFixed(2).replace(".", ",");
    } catch {
        display.value = "Error";
    }
}

// Menghitung persentase dari nilai yang ada di display
// function percent() {
//     const display = document.getElementById("display");
//     try {
//         // Ganti koma dengan titik
//         let currentValue = parseFloat(display.value.replace(",", "."));
//         // Hitung persentase
//         display.value = (currentValue * 0.01).toFixed(2).replace(".", ",");
//     } catch {
//         display.value = "Error";
//     }
// }



// Mengubah bilangan positif menjadi negatif, dan sebaliknya
// function toggleSign() {
//     const display = document.getElementById("display");
//     try {
//         // Ganti koma dengan titik
//         let currentValue = parseFloat(display.value.replace(",", "."));
//         if (!isNaN(currentValue)) { // Pastikan nilai adalah angka
//             currentValue = currentValue * -1; // Membalik tanda (+/-)
//             // Ganti titik kembali dengan koma
//             display.value = currentValue.toString().replace(".", ",");
//         }
//     } catch {
//         display.value = "Error";
//     }
// }

// Fungsi Modulus


// function modulus() {
//     const display = document.getElementById("display");
//     try {
//         let expression = display.value.replace(",", ".");
//         let numbers = expression.split('%'); // Memisahkan dua angka berdasarkan operator modulus
//         if (numbers.length === 2) {
//             let num1 = parseFloat(numbers[0]);
//             let num2 = parseFloat(numbers[1]);
//             if (!isNaN(num1) && !isNaN(num2)) {
//                 let result = num1 % num2;
//                 display.value = result.toString().replace(".", ",");
//             } else {
//                 display.value = "Error";
//             }
//         } else {
//             display.value = "Error";
//         }
//     } catch {
//         display.value = "Error";
//     }
// }