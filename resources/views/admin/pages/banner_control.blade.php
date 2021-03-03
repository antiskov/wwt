@extends('admin.layout.starter')
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Управление баннером</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Управление баннерамим</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.create_banner')}}" method="post" enctype='multipart/form-data'>
                            @csrf
                            <label for="">Изображение баннера</label>
                            <input type="file" required name="banner_image" accept="image/x-png,image/gif,image/jpeg">
                            <br>
                            <label for="">Информация о заказчике</label>
                            <textarea name="description" id="" cols="60" rows="1"></textarea>
                            <br>
                            C:
                            <input name="date_start" type="date" id="calendar">
                            По:
                            <input name="date_finish" type="date" id="calendar">
                            <br>
                            <label for="">Ссылка</label>
                            <input type="text" required name="link" accept="image/x-png,image/gif,image/jpeg">
                            <br>
                            <input type="submit" value="Создать баннер">
                        </form>
                    </div>
                </div>
                @foreach($banners as $banner)
                    <div class="card">
                        <div class="card-body">
                            @if($banner->is_active and (date('Y-m-d') < $banner->date_finish))
                                <button>
                                    <a href="{{route('admin.close_banner', [$banner->id])}}">Деактивировать</a>
                                </button>
                            @endif
                            <button>
                                <a href="{{route('admin.delete_banner', [$banner->id])}}">Удалить</a>
                            </button>
                            <br>
                            <span>#{{$banner->id}}</span>
                            <p>{{$banner->description}}</p>
                            <img src="{{asset('/storage/banners/'.$banner->banner_image)}}" alt="">
                            <br>
                            <small>с {{$banner->date_start}} по {{$banner->date_finish}}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

