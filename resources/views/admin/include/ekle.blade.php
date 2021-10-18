@extends('admin.tema')
@section('admintitle') Micro Panel  @endsection
@section('css')
<link href="{{asset('admin')}}/plugins/summernote/dist/summernote.css" rel="stylesheet">
@endsection
@section('home')

 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                 <div class="row" >
                 <div class="col-lg-12">
                 @if(session('basarili'))
                <div class="alert alert-success">{{session('basarili')}}</div>
                   @endif
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{$modulBilgisi->baslik}}</h4>
                                <div class="basic-form">
                                    <form action="{{route('eklepost',$modulBilgisi->seflink)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                           <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control input-default" name="kategori">
                                             @if($kategoriBilgisi)
                                             @foreach($kategoriBilgisi as $kategori)
                                             <option value="{{$kategori->id}}">{{$kategori->baslik}}</option>
                                             @endforeach
                                             @endif
                                            </select>
                                            </div>

                                        <div class="form-group">
                                            <label>Başlık</label>
                                            <input type="text" class="form-control input-default" placeholder="Başlık" name="baslik" required>
                                        </div>
                                        
                                       
                                
                                        <div class="form-group">
                                            <label>Barkod</label>
                                            <input type="file" class="form-control input-default" placeholder="Barkod Seçiniz" name="barkod">
                                        </div>
                                        <div class="form-group">
                                            <label>Stok Adı</label>
                                            <input type="text" class="form-control input-default" placeholder="stok adı" name="stokadi">
                                        </div>
                                        <div class="form-group">
                                            <label>Müşteri Adı</label>
                                            <input type="text" class="form-control input-default" placeholder="müşteri adı" name="musteriadi">
                                        </div>
                                        <div class="form-group">
                                            <label>Adres</label>
                                            <textarea name="adres" placeholder="Adres giriniz"></textarea>                                       
                                       </div>
                                       <div class="form-group">
                                            <label>Kategoriler</label>
                                            <input type="text" class="form-control input-default" placeholder="Kategoriler" name="kategoriler">
                                        </div>
                                       <div class="form-group">
                                            <label>Alınan Sipariş</label>
                                            <input type="text" class="form-control input-default" placeholder="alınan sipariş" name="alinanSiparis">
                                        </div>
                                        <div class="form-group">
                                            <label>Verilen Sipariş</label>
                                            <input type="text" class="form-control input-default" placeholder="verilen siperiş" name="verilenSiparis" >
                                        </div>
                                        <div class="form-group">
                                            <label>Anahtar</label>
                                            <input type="text" class="form-control input-default" placeholder="anahtar" name="anahtar">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" class="form-control input-default" placeholder="desciription" name="description">
                                        </div>
                                        <div class="form-group">
                                            <label>Durum</label>
                                            <input type="text" class="form-control input-default" placeholder="durum" name="durum">
                                        </div>
                                        <div class="form-group">
                                            <label>Sıra No</label>
                                            <input type="number" class="form-control input-default" placeholder="Sıra No" name="sirano" required>
                                        </div>
                                        <input type="submit" class="btn btn-primary" name="gonder" value="KAYDET" > </input>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>   
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

@endsection

@section('js')
<script src="{{asset('admin')}}/plugins/summernote/dist/summernote.min.js"></script>
    <script src="{{asset('admin')}}/plugins/summernote/dist/summernote-init.js"></script>
 @endsection