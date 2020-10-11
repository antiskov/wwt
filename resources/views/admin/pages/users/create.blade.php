@extends('admin.layout.starter')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Созлание пользователя</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input type="text" class="form-control" id="name" placeholder="Имя">
                            </div>
                            <div class="form-group">
                                <label for="surname">Фамилия</label>
                                <input type="text" class="form-control" id="surname" placeholder="Фамильия">
                            </div>
                            <div class="form-group">
                                <label>Роль</label>
                                <select class="form-control" name="role">
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>


            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">

            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
