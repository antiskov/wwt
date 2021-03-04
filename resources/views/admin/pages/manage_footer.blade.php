@extends('admin.layout.starter')
@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Футтер</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Футтер</li>
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
                        <table id="users_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Название</th>
                                <th>Логотип</th>
                                <th>Статус</th>
                                <th>Ссылка</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mediaLinks as $mediaLink)
                                <tr>
                                    <td>{{$mediaLink->id}}</td>
                                    <td>{{$mediaLink->name}}</td>
                                    @if($mediaLink->type == 'icon')
                                        <td><img src="/images/icons/{{$mediaLink->path}}" alt="img"></td>
                                    @else
                                        <td><img src="/images/content/{{$mediaLink->path}}" alt="img"></td>
                                    @endif
                                    @if($mediaLink->is_active === 1)
                                    <td>Включен</td>
                                    @else
                                    <td>Выключен</td>
                                    @endif
                                    <td><a href="http://{{$mediaLink->link_address}}" target="_blank">{{$mediaLink->link_address}}</a></td>
                                    <td>
                                        @if($mediaLink->is_active == 1)
                                            <a href="{{route('admin.change_status_link', [$mediaLink->id, 0])}}">Снять</a>
                                            <br>
                                        @else
                                            <a href="{{route('admin.change_status_link', [$mediaLink->id, 1])}}">Выложить</a>
                                            <br>
                                        @endif
                                        <a href="{{route('admin.update_links_index', $mediaLink->id)}}">Изменить</a>
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
                                <th>Ссылка</th>
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
