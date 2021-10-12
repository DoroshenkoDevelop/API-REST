@extends('layouts.layout')
@section('title','Редактировать отдел')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать отдел</h1>
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
                        <form action="{{ route('departments.update', $department['id'] )}}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Имя</label>
                                    <input type="text" name="title" value="{{$department['title']}}" class="form-control" id="exampleInputName"
                                           placeholder="Имя" required>

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Обновить</button>
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
