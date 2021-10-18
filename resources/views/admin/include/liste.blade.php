@extends('admin.tema')
@section('admintitle') Micro Panel  @endsection
@section('css')
<link href="{{asset('admin')}}/plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">

@endsection
@section('home')

 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Table</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>baslik</th>
                                                <th>seflink</th>
                                                <th>barkod</th>
                                                <th>Stokadi</th>
                                                <th>musteriAdi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>id</th>
                                                <th>baslik</th>
                                                <th>seflink</th>
                                                <th>barkod</th>
                                                <th>Stokadi</th>
                                                <th>musteriAdi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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
<script src="{{asset('admin')}}/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('admin')}}/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('admin')}}/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

 @endsection