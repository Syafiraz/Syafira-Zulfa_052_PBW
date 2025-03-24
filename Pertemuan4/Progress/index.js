function ubahTeks() {
    document.getElementById("judul").innerHTML = "Teks telah berubah!";
}

function tampilkanAlert() {
    alert("Halo! Ini dari JavaScript");
}

function hitungJumlah() {
    let angka1 = document.getElementById("angka1").value;
    let angka2 = document.getElementById("angka2").value;
    
    if (angka1 === "" || angka2 === "") {
        alert("Harap masukkan kedua angka!");
        return;
    }

    let hasil = parseFloat(angka1) + parseFloat(angka2);
    document.getElementById("hasil").innerHTML = "Hasil Penjumlahan: " + hasil;
    console.log("Hasil Penjumlahan:", hasil);
    alert("Hasil: " + hasil);
}

let nilai1 = 20;
let nilai2 = 10;

nilai2 = 1;

const hasilPenjumlahan = nilai1 + nilai2;
console.log("Hasil Penjumlahan Awal:", hasilPenjumlahan);
alert("Hasil Penjumlahan Awal: " + hasilPenjumlahan);

let nama = "April & Tigfir Bestie";
console.log("Nama Bestie:", nama);
alert("Nama Bestie: " + nama);
