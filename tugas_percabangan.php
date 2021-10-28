<?php

// fungsi diskon barang 3 sebesar 20%
function diskon_barang_3($barang3){
    // pengembalian harga setelah didiskon
    return ($barang3 * 0.2);
}

// fungsi diskon total bayar > 75.0000 sebesar 15%
function diskon_barang_total($harga){
    // pengembalian harga setelah didiskon
    return ($harga*0.15);
}

// fungsi cek diskon
function pilih_diskon($harga, $cekbarang3, $pilih_diskon){
    if($harga>75000){ // Jika total belanja di atas 75.0000
        if($cekbarang3>0){ // Jika ada barang 3 yang dipilih
            if(!$pilih_diskon){ // Jika memilih diskon barang 3
                return ($harga - (diskon_barang_3(50000) * $cekbarang3));    
            }else{ // Jika memilih diskon keseluruhan
                return ($harga - (diskon_barang_total($harga)));
            }
        }else{ // Jika tidak ada barang 3 yang dipilih
            return ($harga - (diskon_barang_total($harga)));
        }
    }else{ // Jika total belanja di bawah atau sama dengan 75000
        if($cekbarang3 > 0){ //Jika ada barang 3 yang terpilih
            return ($harga - (diskon_barang_3(50000) * $cekbarang3));
        }else{ // jika tidak ada barang 3 yang terpilih
            return $harga;
        }
    }
}

// Inisialisasi harga barang disimpan ke dalam variabel
$biskuit = 20000; $coklat = 30000; $biskuit_coklat = 50000;

// Inisialisasi jumlah barang yang dibeli
$jumlah_barang = 3;

// mengecek jika barang 3 terbeli ditandai dengan nilai true
$cek_barang_3 = 0;

// jumlah bayar
$jumlah_bayar = 0;

// harga barang yang dibeli
$harga_barang = [$biskuit, $coklat, $biskuit_coklat];

//Perulangan untuk menghitung jumlah bayaran
for($i=0; $i<$jumlah_barang; $i++){
    if($harga_barang[$i] == $biskuit_coklat){
        $cek_barang_3++;
    }
    $jumlah_bayar = $jumlah_bayar + $harga_barang[$i];
}

echo "Jumlah barang yang dibeli : " . $jumlah_barang;
echo "<br>Memilih diskon seluruh barang";
// memanggil fungsi pilih_diskon dengan memilih opsi diskon total harga seluruh barang yang ditandai dengan nilai true
echo "<br>Total bayar : Rp. " . pilih_diskon($jumlah_bayar, $cek_barang_3, true);
?>