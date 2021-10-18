<?php
 
     namespace App\Models;
     
     use Illuminate\Database\Eloquent\Factories\HasFactory;
     use Illuminate\Database\Eloquent\Model;
     
     class Stoklar extends Model
     {
         use HasFactory;
         protected $table=stoklar;
         protected $fillable=["id","baslik","seflink","barkod","stokadi","musteriAdi","adres","kategoriler","alinanSiparis","verilenSiparis","description","durum","sirano","created_at","updated_at"];
     }