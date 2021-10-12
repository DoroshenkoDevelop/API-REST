@extends('layouts.layout')
@section('title','Добавить сотрудника')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить сотрудника</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    {{--   <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Dashboard v1</li>
                       </ol>--}}
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
            </div>
        @endif
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-lg-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('employees.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Выберите отдел</label>
                                    <select name="cat_id" class="form-control" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Имя</label>
                                    <input type="text" name="name"  class="form-control" id="exampleInputName"
                                           placeholder="Имя" required>

                                    <label for="exampleInputlastName">Фамилия</label>
                                    <input type="text" name="lastName" class="form-control" id="exampleInputlastName"
                                           placeholder="Фамилия" required>

                                    <label for="exampleInputPatronymic">Отчество</label>
                                    <input type="text" name="patronymic" class="form-control" id="exampleInputPatronymic"
                                           placeholder="Отчество" required>

                                    <label for="exampleInputSex">Пол</label>
                                    <input type="text" name="sex" class="form-control" id="exampleInputSex"
                                           placeholder="Пол" required>

                                    <label for="exampleInputSalary">Зарплата</label>
                                    <input type="text" name="salary" class="form-control" id="exampleInputSalary"
                                           placeholder="Зарплата" required>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
@endsection
