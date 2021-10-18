@extends('admin.tema')
@section('admintitle') Micro Panel  @endsection
@section('css')

@endsection
@section('home')

 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
            <div class="col-lg-12">
                @if(session('basarili'))
                <div class="alert alert-success">{{session('basarili')}}</div>
                @endif
                @if(session('hata'))
                <div class="alert alert-danger">{{session('hata')}}</div>
                @endif
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Modül Ekle</h4>
                                <p>Web siteniz için otomatik tablo ,model ve crud eklemenizi sağlar</p>
                                <div class="basic-form">
                                    <form action="{{route('modul-ekle')}}" class="form-inline" method="post">
                                        @csrf
                                        <div class="form-group mb-2">
                                            
                                        </div>
                                        <div class="form-group mx-sm-3 mb-2">
                                            
                                            <input type="text" class="form-control" placeholder="modül ismi" name="baslik">
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2">Modül Oluştur</button>
                                    </form>
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

 @endsection