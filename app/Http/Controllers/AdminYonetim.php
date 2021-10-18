<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Moduller;
use App\Models\Kategoriler;

class AdminYonetim extends Controller
{
    function __construct(){
        view()->share('moduller',Moduller::whereDurum(1)->get());
   }
   public function home(){
    return view("admin.include.home");
   }
   public function liste($modul){
       $kontrol=Moduller::whereDurum(1)->whereSeflink($modul)->first();
       if($kontrol){

        $dinamikModel="App\Models\\".ucfirst($kontrol->seflink);
        $veriler=$dinamikModel::get(); 
        
        return view("admin.include.liste",compact('veriler'));

         
       }else{
        
        return redirect()->route("home");

       }
       return view("admin.include.liste");
   }
   public function ekle($modul){
    $modulBilgisi=Moduller::whereDurum(1)->whereSeflink($modul)->first();
    $kategoriBilgisi=Kategoriler::whereTablo("modul")->whereSeflink($modul)->get();
    if($modulBilgisi && $kategoriBilgisi){
     
     return view("admin.include.ekle",compact(["modulBilgisi","kategoriBilgisi"]));  

      
    }else{
     
     return redirect()->route("home");

    }

}

public function eklePost($modul,Request $request){
    $modulBilgisi=Moduller::whereDurum(1)->whereSeflink($modul)->first();
    if($modulBilgisi){
      
        $modelDosyaAdi=ucfirst($modulBilgisi->seflink);

        $request->validate([
            "baslik"=>"required",
            "stokadi"=>"required",
            "musteriadi"=>"required",
            "adres"=>"required",
            "kategoriler"=>"required",
            "alinanSiparis"=>"required",
            "verilenSiparis"=>"required",
            "anahtar"=>"required",
            "description"=>"required",
            "durum"=>"required",
            "sirano"=>"required",
        ]);
        $baslik=$request->baslik;
        $seflink=Str::of($baslik)->slug('');
        $stokadi=$request->stokadi;
        $musteriadi=$request->musteriadi;
        $adres=$request->adres;
        $kategoriler=$request->kategoriler;
        $alinanSiparis=$request->alinanSiparis;
        $verilenSiparis=$request->verilenSiparis;
        $anahtar=$request->anahtar;
        $description=$request->description;
        $durum=$request->durum;
        $sirano=$request->sirano;
        $dinamikModel="App\Models\\".$modelDosyaAdi;

          $barkodDosyasi=$request->file("barkod");
          if(isset($barkodDosyasi)){
          
             $barkod=uniqid().".".$barkodDosyasi->getClientOriginalExtension();
             $barkodDosyasi->move(public_path("images/".$modulBilgisi->seflink).$barkod);
             $kaydet=$dinamikModel::create([
                "baslik"=>$baslik,
                "seflink"=>$seflink,
                "barkod"=>$barkod,
                "stokadi"=>$stokadi,
                "musteriadi"=>$musteriadi,
                "adres"=>$adres,
                "kategoriler"=>$kategoriler,
                "alinanSiparis"=>$alinanSiparis,
                "verilenSiparis"=>$verilenSiparis,
                "anahtar"=>$anahtar,
                "description"=>$description,
                "durum"=>$durum,
                "sirano"=>$sirano
          ]);

          }else{
            $kaydet=$dinamikModel::create([
                "baslik"=>$baslik,
                "seflink"=>$seflink,
                "stokadi"=>$stokadi,
                "musteriadi"=>$musteriadi,
                "adres"=>$adres,
                "kategoriler"=>$kategoriler,
                "alinanSiparis"=>$alinanSiparis,
                "verilenSiparis"=>$verilenSiparis,
                "anahtar"=>$anahtar,
                "description"=>$description,
                "durum"=>$durum,
                "sirano"=>$sirano
          ]);
          }

          return redirect()->route('ekle',$modulBilgisi->seflink)->with('basarili','İşleminiz başarı ile kayıt edildi');

         
    
    }else{
    
        return redirect()->route("home");
    
    }
}

}
