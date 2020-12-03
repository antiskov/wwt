@extends('admin.layout.starter')
@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Марки производителей</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Марки производителей</li>
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
                        <form action="{{route('admin.upload_makers_picture')}}" method="post" enctype='multipart/form-data'>
                            @csrf
                            <label for="">Логотип производителя</label>
                            <input type="file" required name="logo" accept="image/x-png,image/gif,image/jpeg">
                            <label for="">Название</label>
                            <input type="text" required name="title" >
                            <input type="submit" value="Добавить">
                        </form>
                    </div>
                </div>
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="users_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Название</th>
                                <th>Логотип</th>
                                <th>Статус</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($makers as $maker)
                                <tr>
                                    <td>{{$maker->id}}</td>
                                    <td>{{$maker->title}}</td>
                                    <td>{{$maker->logo}}</td>
                                    <td>{{$maker->status}}</td>
                                    <td>
                                        @if($maker->status == 1)
                                            <a href="{{ route('admin.change_status_maker', [0, $maker->id]) }}">Снять</a>
                                            <br>
                                        @else
                                            <a href="{{ route('admin.change_status_maker', [1, $maker->id]) }}">Выложить</a>
                                            <br>
                                        @endif
{{--                                        <a href='{{ route('admin.delete_advert', [$maker->id]) }}'>Удалить</a>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Название</th>
                                <th>Логотип</th>
                                <th>Статус</th>
                                <th>Действие</th>
                            </tr>
                            </tfoot>
                        </table>
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
