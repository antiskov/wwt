@extends('admin.layout.starter')
@section('content-header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Управление слайдером</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Управление слайдером</li>
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
                        <form action="{{route('admin.upload_slider')}}" method="post" enctype='multipart/form-data'>
                            @csrf
                            <label for="">Изображение для фона</label>
                            <input type="file" required name="image" accept="image/x-png,image/gif,image/jpeg">
                            <br>
                            <label for="">Верхний текст</label>
                            <textarea name="upper_text" id="" cols="60" rows="1"></textarea>
                            <br>
                            <label for="">Основной текст</label>
                            <textarea name="middle_text" id="" cols="60" rows="1"></textarea>
                            <br>
                            <label for="">Ссылка</label>
                            <input type="text" required name="link" accept="image/x-png,image/gif,image/jpeg">
                            <input type="submit" value="Загрузить">
                        </form>
                    </div>
                </div>
                @if(isset($sliders))
                    @foreach($sliders as $slider)
                        <div class="card">
                            <div class="card-body">
                                <section class="main-slider swiper-container">
                                    <div class="swiper-wrapper">
                                        @if($slider->is_active)
                                            <button>
                                                <a href="{{route('admin.deactivation_slider', [$slider->id])}}">Деактивировать</a>
                                            </button>
                                        @else
                                            <button>
                                                <a href="{{route('admin.activation_slider', [$slider->id])}}">Активировать</a>
                                            </button>
                                        @endif
                                        <button>
                                            <a href="{{route('admin.delete_slider', [$slider->id])}}">Удалить</a>
                                        </button>
                                        <div class="main-slider-item swiper-slide">
                                            <label for="">Изображение для фона</label>
                                            <br>
                                            <img src="{{asset('/storage/admin/sliders/'.$slider->image)}}"
                                                 alt="фото слайдера 1" width="40%">
                                            <div class="main-slider-item__content">
                                                <div class="container">
                                                    <label for="">Верхний текст</label>
                                                    <p>{{$slider->upper_text}}</p>
                                                    <label for="">Основной текст</label>
                                                    <h3>{{$slider->middle_text}}</h3>
                                                    <label for="">Ссылка</label>
                                                    <a href="{{$slider->link}}">Перейти</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="swiper-pagination"></div>

                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </section>
                            </div>
                        </div>
                    @endforeach
                @endif
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
