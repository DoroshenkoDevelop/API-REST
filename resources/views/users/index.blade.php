@extends('layouts.layout')

@section('title', 'Сотрудники')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Сотрудники</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th >
                                Имя
                            </th>
                            <th>
                                Фамилия
                            </th>
                            <th >
                                Очество
                            </th>
                            <th >
                                Пол
                            </th>
                            <th>
                                Зарплата
                            </th>

                            <th>
                                Отдел
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>
                                    {{ $employee['id'] }}
                                </td>
                                <td>
                                    {{ $employee['name'] }}
                                </td>
                                <td>
                                    {{ $employee['lastName'] }}
                                </td>
                                <td>
                                    {{ $employee['patronymic'] }}
                                </td>
                                <td>
                                    {{ $employee['sex'] }}
                                </td>
                                <td>
                                    {{ $employee['salary'] }}
                                </td>
                                <td>
                                    {{ $employee->category['title'] }}
                                </td>

                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('employees.edit',$employee['id'] ) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Редактировать
                                    </a>

                                    <form action="{{ route('employees.destroy',$employee ) }}" method="POST"
                                          style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                            <i class="fas fa-trash">
                                            </i>
                                            Удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
