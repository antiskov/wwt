@extends('admin.layout.starter')
@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Управление контентом</h1>
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
                <h3>Типы часов</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.create_watch_type')}}" method="post" enctype='multipart/form-data'>
                            @csrf
                            <label for="">Название типа часов</label>
                            <input type="text" required name="name">
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
                                <th>Статус</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($watchTypes as $watchType)
                                <tr>
                                    <td>{{$watchType->id}}</td>
                                    <td>{{$watchType->title}}</td>
                                    <td>{{$watchType->is_active}}</td>
                                    <td>
                                        @if($watchType->is_active == 1)
                                            <a href="{{ route('admin.change_status_watch_type', [$watchType->id, 0]) }}">Снять</a>
                                            <br>
                                        @else
                                            <a href="{{ route('admin.change_status_watch_type', [$watchType->id, 1]) }}">Выложить</a>
                                            <br>
                                        @endif
                                        <a href="{{route('admin.update_watch_type_index', [$watchType->id])}}">Изменить</a>
                                            <br>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Название</th>
                                <th>Статус</th>
                                <th>Действие</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3>Типы механизмов</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.create_mechanism_type')}}" method="post" enctype='multipart/form-data'>
                            @csrf
                            <label for="">Название механизма</label>
                            <input type="text" required name="name">
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
                                <th>Статус</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mechanismTypes as $mechanismType)
                                <tr>
                                    <td>{{$mechanismType->id}}</td>
                                    <td>{{$mechanismType->title}}</td>
                                    <td>{{$mechanismType->is_active}}</td>
                                    <td>
                                        @if($mechanismType->is_active == 1)
                                            <a href="{{ route('admin.change_status_mechanism_type', [$mechanismType->id, 0]) }}">Снять</a>
                                            <br>
                                        @else
                                            <a href="{{ route('admin.change_status_mechanism_type', [$mechanismType->id, 1]) }}">Выложить</a>
                                            <br>
                                        @endif
                                        <a href="{{route('admin.update_mechanism_type_index', [$mechanismType->id])}}">Изменить</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Название</th>
                                <th>Статус</th>
                                <th>Действие</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3>Дополнение к часам</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.create_delivery_volume')}}" method="post" enctype='multipart/form-data'>
                            @csrf
                            <label for="">Название</label>
                            <input type="text" required name="name">
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
                                <th>Статус</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deliveryVolumes as $deliveryVolume)
                                <tr>
                                    <td>{{$deliveryVolume->id}}</td>
                                    <td>{{$deliveryVolume->title}}</td>
                                    <td>{{$deliveryVolume->is_active}}</td>
                                    <td>
                                        @if($deliveryVolume->is_active == 1)
                                            <a href="{{ route('admin.change_status_delivery_volume', [$deliveryVolume->id, 0]) }}">Снять</a>
                                            <br>
                                        @else
                                            <a href="{{ route('admin.change_status_delivery_volume', [$deliveryVolume->id, 1]) }}">Выложить</a>
                                            <br>
                                        @endif
                                        <a href="{{route('admin.update_delivery_volume_index', [$deliveryVolume->id])}}">Изменить</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Название</th>
                                <th>Статус</th>
                                <th>Действие</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.set_count_free_adverts')}}" method="post" enctype='multipart/form-data'>
                            @csrf
                            <label for="">Количество бесплатных обьявлений</label>
                            @if(isset($limitFreeAdverts))
                                <input type="text" name="count_free_adverts" value="{{$limitFreeAdverts->value}}">
                            @else
                                <input type="text" name="count_free_adverts">
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

