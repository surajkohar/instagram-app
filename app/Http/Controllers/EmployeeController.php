<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Employee::all();

        return response()->json([
            'data'=>$data,
             'status'=>'success'
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $employee = new Employee();
    $employee->name = $request['name'];
    $employee->dob = $request['dob'];
    $employee->phone = $request['phone'];
    $employee->status = $request['status'];
    $employee->gender = $request['gender'];
    $employee->email = $request['email'];
    $employee->hobbies = implode(',', $request['hobbies']);
    $employee->save();

    return response()->json([
        'message'=>'Employee Created Successfully',
        'status'=>"success"
    ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($employeeId)
    {
        $employee = Employee::find($employeeId);

        if ($employee) {
            return response()->json([
                'data' => $employee,
                'status' => 'success'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Employee not found',
                'status' => 'error'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
       
        $employee->name = $request->input('name');
        $employee->dob = $request->input('dob');
        $employee->phone = $request->input('phone');
        $employee->gender = $request->input('gender');
        $employee->status = $request->input('status');
        $employee->email = $request->input('email');
        $employee->hobbies = implode(',', $request['hobbies']);
        $employee->save();
    
        // Return the updated employee as a JSON response
        return response()->json([
            'status' => 'success',
            'data' => $employee,
            'message' => 'Employee updated successfully',
        ],200);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employeeId)
    {
        $data=$employeeId->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Employee Deleted successfully',
        ],200);
    }
}
