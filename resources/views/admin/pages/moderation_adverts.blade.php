@extends('admin.layout.starter')
@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Модерация обьявлений</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Модерация обьявлений</li>
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
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="pagination">
                            <div class="link-wrap">
                                {{$adverts->links('admin.layout.bootstrap-4')}}
                            </div>
                        </div>
                        <br>
                        <table id="users_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Автор</th>
                                <th>Название</th>
                                <th>Цена</th>
                                <th>Статус</th>
                                <th>Дата окончания</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($adverts as $advert)
                                <tr>
                                    <td>{{$advert->id}}</td>
                                    <td>{{$advert->name}} {{$advert->surname}}</td>
                                    <td><a href="{{route('admin.item-page', [$advert->id])}}">{{$advert->title}}</a></td>
                                    <td>{{$advert->getPrice()}}$</td>
                                    <td>{{$advert->status->title}}</td>
                                    <td>{{$advert->finish_date}}</td>
                                    <td>
                                        @if($advert->status->title == 'published')
                                            <a href="{{ route('admin.change_status', [$statuses->where('title', 'moderation')->first(), $advert->id]) }}">Отказать</a>
                                            <br>
                                        @else
                                            <a href="{{ route('admin.change_status', [$statuses->where('title', 'published')->first(), $advert->id]) }}">Опубликовать</a>
                                            <br>
                                        @endif
                                            <a href="{{ route('change_status', [$statuses->where('title', 'archive')->first(), $advert->id]) }}">Удалить</a>
                                            <br>
                                            <a href="{{route('submitting.get_draft', [$advert])}}">Редактировать</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Finish date</th>
                                <th>Operations</th>
                            </tr>
                            </tfoot>
                        </table>
                        <br>
                        <div class="pagination">
                            <div class="link-wrap">
                                {{$adverts->links('admin.layout.bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
{{--@section('scripts')--}}
{{--    <script src="/admin_package/plugins/datatables/jquery.dataTables.min.js"></script>--}}
{{--    <script src="/admin_package/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>--}}
{{--    <script src="/admin_package/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>--}}
{{--    <script src="/admin_package/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>--}}
{{--    <script>--}}
{{--        $(function () {--}}
{{--            $("#users_table").DataTable({--}}
{{--                "responsive": true,--}}
{{--                "autoWidth": false,--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

{{--@endsection--}}
