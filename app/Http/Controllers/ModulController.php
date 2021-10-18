<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use File;

use App\Models\Moduller;
use App\Models\Kategoriler;
class ModulController extends Controller
{
    function __construct(){
         view()->share('moduller',Moduller::whereDurum(1)->get());
    }
    public function index(){
        return view("admin.include.moduller");
    }

    public function modulekle(Request $request){
       $request->validate([
           "baslik"=>"required|string",
       ]);
       $baslik=$request->baslik;
       $seflink=Str::of($baslik)->slug('');
       $kontrol=Moduller::whereSeflink($seflink)->first();
       if($kontrol){

        return redirect()->route('moduller')->with("hata","Bu modül daha önce oluşturuldu");

       }else{

        Moduller::create([
            "baslik"=>$baslik,
            "seflink"=>$seflink         
        ]);
        /* 2.Adım kategori kayıt işlemi*/
        Kategoriler::create([
         "baslik"=>$baslik,
         "seflink"=>$seflink,
         "tablo"=>"modul",
         "sirano"=>1
        ]);
        /* 3.Adım dinamik tablo oluşturma. Burada yapılan tablo oluşturulan her modüle kayıt edilecek */
        Schema::create($seflink, function (Blueprint $table) {
         $table->id();
         $table->string("baslik",255);
         $table->string("seflink",255);
         $table->string("barkod",255)->nullable();
         $table->string("stokadi",255)->nullable();
         $table->string("musteriAdi",255)->nullable();
         $table->longText("adres")->nullable();
         $table->unsignedBigInteger("kategoriler")->nullable();
         $table->enum("alinanSiparis",["kapali-tamamlandi","acik-tamamlanmadi"])->default("kapali-tamamlandi")->nullable();
         $table->enum("verilenSiparis",["kapali-tamamlandi","acik-tamamlanmadi"])->default("kapali-tamamlandi")->nullable();
         $table->string("anahtar",255)->nullable();
         $table->string("description",255)->nullable();
         $table->enum("durum",["kapali-tamamlandi","acik-tamamlanmadi"])->default("kapali-tamamlandi");
         $table->integer("sirano")->nullable();
         $table->timestamps();
         $table->foreign("kategoriler")->references("id")->on("kategoriler")->onDelete("cascade");
     });
 
     /* 4.Adım Model oluşturma. Burada dinamik tabloyu models kısmına tanımlamak için ModulController içerisinde yazıyoruz  */
     $modelDosyasi='<?php
 
     namespace App\Models;
     
     use Illuminate\Database\Eloquent\Factories\HasFactory;
     use Illuminate\Database\Eloquent\Model;
     
     class '.ucfirst($seflink).' extends Model
     {
         use HasFactory;
         protected $table='.$seflink.';
         protected $fillable=["id","baslik","seflink","barkod","stokadi","musteriAdi","adres","kategoriler","alinanSiparis","verilenSiparis","description","durum","sirano","created_at","updated_at"];
     }';
     File::put(app_path('Models').'/'.ucfirst($seflink).'.php',$modelDosyasi);
     return redirect()->route('moduller')->with('basarili','İşleminiz başarı ile kayıt edildi');

       }
       
       
    }
   
}
