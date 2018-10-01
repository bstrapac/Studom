<?php
class Configuration 
{
	public $host = '127.0.0.1';
	public $dbName = 'studom';
	public $username = 'root';
	public $password = '';
};
class Voditelj
{
	public $id = '';
	public $ime = '';
	public $prezime ='';
	public $korisnicko_ime = '';	
	public $lozinka='';
	public function __construct($nID, $sIme, $sPrezime, $sKorisnicko_ime, $sLozinka)
	{
		$this->id = $nID;
		$this->ime = $sIme;
		$this->prezime =$sPrezime;
		$this->korisnicko_ime = $sKorisnicko_ime;
	    $this->lozinka= $sLozinka;
	}	
}
class Student 
{
	public $jmbag = '';
	public $ime = '';
	public $prezime ='';
	public $gender ='';
	public $email='';
	public $contact='';
	public $college ='';	
	public function __construct( $nJmbag, $sIme, $sPrezime, $sGender, $sEmail, $nContact, $sCollege)
	{
		$this->jmbag= $nJmbag;
		$this->ime = $sIme;
		$this->prezime =$sPrezime;
		$this->gender=$sGender;
		$this->email=$sEmail;
		$this->contact=$nContact;
		$this->college=$sCollege;
	}
}
class Soba
{
	public $broj = '';
	public $kat ='';
	public $kategorija ='';
	public $slobodna_mjesta = '';
	public function __construct($nBroj, $nKat,$sKategorija, $nSlobodnaMjesta)
	{
		$this->broj = $nBroj;
		$this->kat = $nKat;
		$this->kategorija =$sKategorija;
		$this->slobodna_mjesta = $nSlobodnaMjesta;
	}	
}
class Dom
{
	public $id = '';
	public $jmbag_studenta ='';
	public $ime = '';
	public $prezime ='';
	public $soba_broj ='';
	public $kat ='';
	public $kategorija ='';
	public function __construct($nID, $nJmbagStudenta, $sIme, $sPrezime, $nSobaBroj, $nKat, $sKategorija)
	{
		$this->id = $nID;
		$this->jmbag_studenta = $nJmbagStudenta;
		$this->ime = $sIme;
		$this->prezime =$sPrezime;
		$this->soba_broj =$nSobaBroj;
		$this->kat = $nKat;
		$this->kategorija =$sKategorija;
	}
}
class Zahtjev
{
	public $id_zahtjev = '';
	public $jmbag_studenta ='';
	public $prezime ='';
	public $status ='';
	public function __construct($nID, $nJmbagStudenta, $sPrezime, $nStatus)
	{
		$this->id_zahtjev = $nID;
		$this->jmbag_studenta = $nJmbagStudenta;
		$this->prezime =$sPrezime;
		$this->status =$nStatus;
	}
}
class Uplata
{
	public $broj_uplate = '';
	public $jmbag_studenta ='';
	public $status ='';
	public $datum = '';
	public $iznos='';
	public function __construct($nBrojUplate, $nJmbagStudenta,$nStatus, $sDatum, $nIznos)
	{
		$this->broj_uplate = $nBrojUplate;
		$this->jmbag_studenta = $nJmbagStudenta;
		$this->status =$nStatus;
		$this->datum = $sDatum;
		$this->iznos = $nIznos;
	}
}
class Poruka
{
	public $id = '';
	public $primatelj ='';
	public $posiljatelj ='';
	public $status ='';
	public $datum = '';
	public $naslov='';
	public $poruka='';
	public function __construct($nID, $nPrimatelj, $nPosiljatelj,$nStatus, $sDatum, $sNaslov, $sPoruka)
	{
		$this->id = $nID;
		$this->primatelj = $nPrimatelj;
		$this->posiljatelj = $nPosiljatelj;
		$this->status =$nStatus;
		$this->datum = $sDatum;
		$this->naslov = $sNaslov;
		$this->poruka = $sPoruka;
	}
}
?>