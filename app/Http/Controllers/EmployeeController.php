<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employee = Employee::query();
        if($request->query("division_id")){
            $query = $employee->where("division_id", $request->query("division_id"))->get();
            return EmployeeResource::collection($query);
        }
        if($request->query("status")){
            $query = $employee->where("status", $request->query("status"))->get();
            return EmployeeResource::collection($query);
        }

        return EmployeeResource::collection(Employee::get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
            "division_id" => ['required'],
            "job_id" => ['required'],
            "salary" => ['required'],
            'status' => ['required'],
        ]);

        return new EmployeeResource(Employee::create($data));
    }

    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
    }

    public function update(Request $request, Employee $employee)
    {

        $employee->update($request->all());

        return new EmployeeResource($employee);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json(['message' => 'Employee deleted']);
    }
}
