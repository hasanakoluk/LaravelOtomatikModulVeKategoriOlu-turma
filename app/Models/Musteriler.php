<?php
 
     namespace App\Models;
     
     use Illuminate\Database\Eloquent\Factories\HasFactory;
     use Illuminate\Database\Eloquent\Model;
     
     class Musteriler extends Model
     {
         use HasFactory;
         protected $table=musteriler;
         protected $fillable=["id","baslik","seflink","barkod","stokadi","musteriAdi","adres","kategoriler","alinanSiparis","verilenSiparis","description","durum","sirano","created_at","updated_at"];
     }