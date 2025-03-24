let wl = 'Selamat Datang di Web Pengecek Nilai';

console.log(wl); 
alert(wl); 

document.addEventListener("DOMContentLoaded", function() {
    // Ambil data terakhir dari localStorage
    if (localStorage.getItem("nim")) {
        document.getElementById("nim").value = localStorage.getItem("nim");
    }
    if (localStorage.getItem("nilai")) {
        document.getElementById("nilai").value = localStorage.getItem("nilai");
    }
});

function cekNilai() {
    let nim = document.getElementById("nim").value.trim();
    let nilaiInput = document.getElementById("nilai").value;
    let output = document.getElementById("output");

    // Konversi nilai ke angka
    let nilai = parseInt(nilaiInput);

    // Validasi input
    if (nim === "" || nilaiInput === "") {
        output.innerHTML = "Harap masukkan NIM dan nilai!";
        output.style.color = "red";
        output.style.opacity = "1";
        return;
    }

    if (isNaN(nilai) || nilai < 0 || nilai > 100) {
        output.innerHTML = "Nilai tidak valid!";
        output.style.color = "red";
        output.style.opacity = "1";
        return;
    }

    let hurufMutu;
    let warna;

    if (nilai >= 80) {
        hurufMutu = "A";
        warna = "green";
    } else if (nilai >= 70) {
        hurufMutu = "B";
        warna = "blue";
    } else if (nilai >= 60) {
        hurufMutu = "C";
        warna = "orange";
    } else if (nilai >= 50) {
        hurufMutu = "D";
        warna = "purple";
    } else {
        hurufMutu = "E";
        warna = "red";
    }

    // Simpan data ke localStorage
    localStorage.setItem("nim", nim);
    localStorage.setItem("nilai", nilai);

    // Tampilkan hasil dengan efek animasi
    output.innerHTML = `NIM: <b>${nim}</b> <br> Huruf Mutu: <span style="color:${warna}; font-size: 22px;"><b>${hurufMutu}</b></span>`;
    output.style.color = "black";
    output.style.opacity = "1";
}
