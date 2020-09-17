<?php
class buku{
    public $judulBuku, $tebalHalaman;
    protected $diskon;
    private $harga;

    public function getCetak(){
        return "$this->judulBuku (Rp $this->harga)";
    }
    public function __construct($judulBuku="Judul Buku", $harga=0, $tebalHalaman="Tebal Halaman"){
        $this->judulBuku = $judulBuku;
        $this->harga = $harga;
        $this->tebalHalaman = $tebalHalaman;
    }

    public function cetakInfo(){
        $str="{$this->judulBuku}, {$this->getCetak()}";
        return $str;
    }

    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100);
    }
}

class novel extends buku{
    public $tebalHalaman;
    public function __construct($judulBuku, $harga, $tebalHalaman){
        parent::__construct($judulBuku, $harga);
        $this->tebalHalaman=$tebalHalaman;
    }
    public function cetakInfo(){
        $str="Novel: ".parent::getCetak()." | Tebal Halaman: {$this->tebalHalaman}";
        return $str;
    }
    public function setDiskon($diskon){
        $this->diskon=$diskon;
    }
}

$buku1 = new novel("Nebula",100000,"200 Halaman");

echo $buku1->cetakInfo();
echo "<br>";
echo "<hr>";
$buku1->setDiskon(10);
echo "Selamat Anda Mendapat Diskon 10% ";
echo "<br>";
echo "Total Harga Yang Harus Anda Bayar RP.";
echo $buku1->getHarga();