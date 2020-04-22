<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('name', 'asc')->paginate(10);
        return view('department.index', compact('departments'));
    }

    public function create()
    {
        return view('department.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|min:3|unique:departments',
                'description' =>'sometimes'
            ],
            [
                'name.required' => 'Please enter a department name.',
                'name.unique' => 'This department already exists.'
            ]
        );

        Department::create($data);

        return redirect()->route('department.index')->with('success', 'Department added.');

    }


    public function show(Department $department)
    {
        return view('department.show', compact('department'));
    }


    public function edit(Department $department)
    {
        return view('department.edit', compact('department'));
    }


    public function update(Department $department, Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|min:3|unique:departments,name,' . $department->id,
                'description' =>'sometimes'
            ],
            [
                'name.required' => 'Please enter a department name',
                'name.unique' => 'This department already exists.'
            ]
        );

        $department->name = $data['name'];
        $department->description = $data['description'];
        $department->save();

        return redirect()->back()->with('success', 'Department updated.');
    }


    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('department.index')->with('success', 'Department deleted.');
    }

}
