<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = json_decode(file_get_contents(storage_path() . "/students.json",true));			
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            ]);
		$data = file_get_contents(storage_path() . "/students.json");
		$data = json_decode($data, true);
		$add_arr = array(
			'name' => $request->name,
			'address' => $request->address,
			'email' => $request->email,
			'phone' => $request->phone
		);
		$data[] = $add_arr;
		$data = json_encode($data, JSON_PRETTY_PRINT);
		file_put_contents(storage_path() . "/students.json", $data);
 
		return redirect()->route('students.index')->with('success','Student Has Been added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
	    $data = file_get_contents(storage_path() . "/students.json");
	    $data_array = json_decode($data, true);
	    $student = $data_array[$id];	
        return view('students.edit',compact('student','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            ]);
	    $update_arr = array(
			'name' => $request->name,
			'address' => $request->address,
			'email' => $request->email,
			'phone' => $request->phone
		);
        $data_array = json_decode(file_get_contents(storage_path() . "/students.json"), true);
		$data_array[$id] = $update_arr;
 
		$data = json_encode($data_array, JSON_PRETTY_PRINT);
		file_put_contents(storage_path() . "/students.json", $data);
 
		return redirect()->route('students.index')->with('success','Student Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $resuest,$id)
    {
        $data = file_get_contents(storage_path() . "/students.json");
        $data = json_decode($data, true); 
        unset($data[$id]);
        $data = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents(storage_path() . "/students.json", $data);
        return redirect()->route('students.index')->with('success','Student has been deleted successfully');
    }
}
