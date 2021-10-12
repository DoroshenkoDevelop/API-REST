<?php

namespace App\Http\Controllers;

use App\Models\Employee;

use Illuminate\Http\Request;

class ApiEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $employees = Employee::orderBy('created_at','DESC')->paginate(10);
        return response()->json(['employees'=>$employees],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'name'=>'required|max:191',
            'lastName'=>'required|max:191',
            'patronymic'=>'required|max:191',
            'sex'=>'required|max:191',
            'salary'=>'required|max:191',
            'department'=>'required|max:191',
        ]);


        Employee::create($request->only([
            'name',
            'lastName',
            'patronymic',
            'sex',
            'salary',
            'department']));
        return response()->json(['message'=>'Сотрудник успешно добавлен'], 200);

    }


    public function show($id)
    {
        $employees = Employee::find($id);
        if($employees)
        {
            return response()->json(['employees'=>$employees],200);
        }
        else
            {
                return response()->json(['message'=>'Нет сотрудника'],404);
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('users.edit',compact('employee'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:191',
            'lastName'=>'required|max:191',
            'patronymic'=>'required|max:191',
            'sex'=>'required|max:191',
            'salary'=>'required|max:191',
            'department'=>'required|max:191',
        ]);
        $employee = Employee::find($id);
        if($employee)
        {
            $employee -> name = $request -> name;
            $employee -> lastName = $request -> lastName;
            $employee -> patronymic = $request -> patronymic;
            $employee -> sex = $request -> sex;
            $employee -> department = $request -> department;
            $employee -> update();
            return response()->json(['message'=>'Сотрудник успешно обновлен', 200]);
        }
        else
            {
            return response()->json(['message'=>'Сотрудник не найден', 404]);
        }



    }


    public function destroy($id)
    {
        $employee = Employee::find($id);
        if($employee)
        {
            $employee->delete();
        return response()->json(['message'=>'Сотрудник был успешно удален!', 200]);
        } else
            {
                return response()->json(['message'=>'Сотрудник не найден!', 404]);
            }

        }
}
