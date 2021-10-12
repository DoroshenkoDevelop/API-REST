<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('created_at','DESC')->get();

        return view('users.index',compact('employees'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Department::orderBy('created_at','DESC')->get();
        return view('users.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        Employee::create($request->only([
            'name',
            'lastName',
            'patronymic',
            'sex',
            'salary',
            'department',
            'cat_id']));
        return redirect()->back()->withSuccess('Сотрудник успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {   $categories = Department::orderBy('created_at','DESC')->get();
        return view('users.edit',compact('employee','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {

        $employee->update($request->only([
            'name',
            'lastName',
            'patronymic',
            'sex',
            'salary',
            'department',
            'cat_id']));
    return redirect()->back()->withSuccess('Сотрудник успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->back()->withSuccess('Сотрудник был успешно удален!');
    }
}
