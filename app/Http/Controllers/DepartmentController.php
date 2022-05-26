<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Auth;
use App\User;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        $doctors = User::where('role', 'doctor')->get(['id','name']);
        // $doctors = User::table('users')->where('role', 'doctor')->all();
        // dd($doctors);
        $data = [];
        $data['doctors'] = $doctors;
        $data['departArr'] = $departments;
        
        return view('departments', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $this->cleanData($data);
            $obj = new Department;
            $data['created_by'] = Auth::user()->id;
            $obj->insert($data);
        }
            return redirect('admin/departments');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $this->cleanData($data);
            $Obj = Department::find($request->id);
            $Obj->update($data); 
        }
        return redirect('admin/departments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department, $id)
    {
        Department::destroy($id);
        return redirect('admin/departments');
    }
    public function add_Doctor(Request $request){
        if ($request->isMethod('post')) {

            $data = $request->all();
            dd($data);
            $this->cleanData($data);
            $obj = new Product;
            $data['user_id'] = Auth::user()->id;

            // $createdProduct = $obj->create($data);
            $catId = $request->categories;
            foreach ($catId as $id) {
                $createdProduct->categories()->attach($id);
            }
            
        }
            return redirect('admin/departments');
    }
    public function cleanData(&$data) {
        $unset = ['ConfirmPassword','q','_token'];
        foreach ($unset as $value) {
            if(array_key_exists ($value,$data))  {
                unset($data[$value]);
            }
        }

    }
}
