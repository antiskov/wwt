@extends('admin.layout.starter')
@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Платежи</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Платежи</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.set_price')}}" method="post" enctype='multipart/form-data'>
                            @csrf
                            <label for="">Цена ВИП обьялвения в гривнах</label>
                            @if(isset($price))
                                <input type="text" name="price_vip" value="{{$price->value}}">
                            @else
                                <input type="text" name="price_vip">
                            @endif
                            <br>
                            <input type="submit" value="Зафиксировать">
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.set_nop_vip_price')}}" method="post" enctype='multipart/form-data'>
                            @csrf
                            <label for="">Цена обычных обьялвения в гривнах</label>
                            @if(isset($priceNotVip))
                                <input type="text" name="price_not_vip" value="{{$priceNotVip->value}}">
                            @else
                                <input type="text" name="price_not_vip">
                            @endif
                            <br>
                            <input type="submit" value="Зафиксировать">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="/admin_package/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin_package/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/admin_package/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/admin_package/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function () {
            $("#users_table").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>

@endsection
