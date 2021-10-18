<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriler extends Model
{
    use HasFactory;
    protected $table="kategoriler";
    protected $fillable=["id","baslik","seflink","tablo","anahtar","barkod","stokadi","musteriAdi","adres","alinanSiparis","verilenSiparis","description","durum","sirano","created_at","updated_at"];
}
