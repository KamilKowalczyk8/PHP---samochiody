<?php

class pracownik {
    public $imie, $nazwisko, $rok, $wyksz, $kasa;



    public function __construct($imie, $nazwisko, $rok, $wyksz,$kasa) {
        $this->imie = $imie;
        $this->nazwisko = $nazwisko;
        $this->rok = $rok;
        $this->wyksz = $wyksz='podstawowe';
        $this->kasa = $kasa=3000;
    }
    public function getPraco1() {
        $data = array(
            'imie'          => $this->imie,
            'nazwisko'      => $this->nazwisko,
            'rok'           => $this->rok,
            'wyksztalcenie' => $this->wyksz,
            'kasa'          =>$this->kasa
        );
        $dane ='';
        foreach($data as $k => $v)
        {
            $dane.=$k.": ".$v.'<br />';
        }
        return $dane;
    }

    public function getPraco2($imie,$nazwisko,$rok) {
        $data = array(
            'imie'          => $this->imie,
            'nazwisko'      => $this->nazwisko,
            'rok_urodzenia' => $this->rok,
        );
        $dane ='';
        foreach($data as $k => $v)
        {
            $dane.=$k.": ".$v.'<br />';
        }
        return $dane;
    }
    public function money($dod) {

        $this->kasa +=$dod;


    }
}
$prac= new pracownik("Jan","Nowak",1999,"wyksz","kasa");
echo $prac->money(141);
echo $prac->getPraco1();
echo '   <br>   ';
echo '   <br>   ';
echo '   <br>   ';
echo $prac->getPraco2("Jan","Nowak",1999);

?>
