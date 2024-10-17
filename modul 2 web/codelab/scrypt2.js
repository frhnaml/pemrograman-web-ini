function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var address = document.getElementById("address").value;

    if (name === "" || email === "" || address === "") {
        alert("Data anda kosong!");
    } else {
        alert("Pendaftaran berhasil!");
        document.getElementById("name").value = '';
        document.getElementById("email").value = '';
        document.getElementById("address").value = '';
    }
}