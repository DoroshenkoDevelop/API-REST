<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class ApiDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees_count = Employee::all()->count();
        $departments = Department::orderBy('created_at','DESC')->paginate(10);
        return response()->json(['employees_count'=>$employees_count,'departments'=>$departments], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
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
            'title'=>'required|max:191',
        ]);
        Department::create($request->only([
            'title',
        ]));
        return response()->json(['message'=>'Отдел успешно добавлен'], 200);
    }


    public function show($id)
    {
        $department = Department::find($id);
        if($department)
        {
            return response()->json(['department'=>$department],200);
        }
        else
        {
            return response()->json(['message'=>'Отдел не неайден'],404);
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('department.edit',compact('department'));
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            'title'=>'required|max:191',
        ]);

        $department = Department::find($id);
        if($department)
        {
            $department -> title = $request -> title;
            return response()->json(['message'=>'Отдел обновлен'],200);
        }
        else{
            return response()->json(['message'=>'Отдел не найден'],404);
        }
    }


    public function destroy($id)
    {
        $department = Employee::find($id);
        if($department)
        {
            $department->delete();
            return response()->json(['message'=>'Отдел был успешно удален!', 200]);
        } else
        {
            return response()->json(['message'=>'Отдел не найден!', 404]);
        }

    }
}
