<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\carbon;
use App\User;
use App\StudentDetails;
use App\Menu;
use App\HomeNotification;
use App\DesktopMenuSection;
use Storage;
use DB;
use File;
use Redirect;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeNotification = HomeNotification::all();
        $menus = Menu::orderBy('sort_by', "asc")->get();
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', "asc")->get();
        return view('frontend.register', compact('homeNotification','menus','desktopMenu'));
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
            'name'=> 'required|min:3',
            'email'=> 'required|email|unique:users',
            'phone'=> 'required|min:7',
            'course' => 'required',
            'batch' => 'required',
            'address' => 'required|min:3',
            'nationality' => 'required|min:3',
            'pincode' => 'required|min:3',
            'fathers_name' => 'required||min:3',
            'fathers_phone' => 'required||min:7',
            'guardian_name' => 'nullable',
            'guardian_phone' => 'nullable',
            'guardian_occupation' => 'nullable|string',
            'gst' => 'required|integer',
            'trade_title' => 'nullable|string',
            'trade_address' => 'nullable|string',
            'gst_number' => 'nullable|integer',
            '10_school' => 'nullable|string',
            '10_year' => 'nullable|string',
            '10_board' => 'nullable|string',
            '12_school' => 'nullable|string',
            '12_year' => 'nullable|string',
            '12_board' => 'nullable|string',
            'ug_school' => 'nullable|string',
            'ug_year' => 'nullable|string',
            'ug_board' => 'nullable|string',
            'g_school' => 'nullable|string',
            'g_year' => 'nullable|string',
            'g_board' => 'nullable|string',
            'pg_school' => 'nullable|string',
            'pg_year' => 'nullable|string',
            'pg_board' => 'nullable|string',
            'stream' => 'required|string',
            'music_bg_info' => 'nullable|string',
            'health_problem' => 'nullable|string',
            'plans' => 'nullable|string',
            'profile_image' => 'required|image',
            'signature1' => 'required|image',
            'signature2' => 'required|image',
            'id_type' => 'required|string',
            'id_no' => 'required|string',
            'signature3' => 'nullable|image',
        ]);

        //Users Table
        $user = new User([
            'role_id' => 4,
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'password' => bcrypt('test1234'),
            'created_at' => carbon::now(),
        ]);
        $user->save();

        // Student image
        $image_name1 = $request->profile_image;
        $profile_image = $request->file('profile_image');
        if($profile_image != ''){
            $image_name1 = rand() . '.' . $profile_image->getClientOriginalExtension();
            $profile_image->move(public_path('images/students'), $image_name1);
        }
        // parent Details
        $sign_name1 = $request->signature1;
        $signature1 = $request->file('signature1');
        if($signature1 != ''){
            $sign_name1 = rand() . '.' . $signature1->getClientOriginalExtension();
            $signature1->move(public_path('images/students'), $sign_name1);
        }
        // gardient Details
        $sign_name2 = $request->signature2;
        $signature2 = $request->file('signature2');
        if($signature2 != ''){
            $sign_name2 = rand() . '.' . $signature2->getClientOriginalExtension();
            $signature2->move(public_path('images/students'), $sign_name2);
        }
        // id varify
        $sign_name3 = $request->signature3;
        $signature3 = $request->file('signature3');
        if($signature3 != ''){
            $sign_name3 = rand() . '.' . $signature3->getClientOriginalExtension();
            $signature3->move(public_path('images/students'), $sign_name3);
        }

        // Student Details
        $TempId = User::where('phone', $request->get('phone'))->first();
        $studentTempId = $TempId->id;
        $studentDetails = new StudentDetails([
            'student_id' => $studentTempId,
            'course' => $request->get('course'),
            'batch' => $request->get('batch'),
            'image' => $image_name1,
            'address' => $request->get('address'),
            'nationality' => $request->get('nationality'),
            'pincode' => $request->get('pincode'),
            'fathers_name' => $request->get('fathers_name'),
            'fathers_phone' => $request->get('fathers_phone'),
            'guardian_name' => $request->get('guardian_name'),
            'guardian_phone' => $request->get('guardian_phone'),
            'guardian_occupation' => $request->get('guardian_occupation'),
            'gst' => $request->get('gst'),
            'trade_title' => $request->get('trade_title'),
            'trade_address' => $request->get('trade_address'),
            'gst_number' => $request->get('gst_number'),
            '10_school' => $request->get('10_school'),
            '10_year' => $request->get('10_year'),
            '10_board' => $request->get('10_board'),
            '12_school' => $request->get('12_school'),
            '12_year' => $request->get('12_year'),
            '12_board' => $request->get('12_board'),
            'ug_school' => $request->get('ug_school'),
            'ug_year' => $request->get('ug_year'),
            'ug_board' => $request->get('ug_board'),
            'g_school' => $request->get('g_school'),
            'g_year' => $request->get('g_year'),
            'g_board' => $request->get('g_board'),
            'pg_school' => $request->get('pg_school'),
            'pg_year' => $request->get('pg_year'),
            'pg_board' => $request->get('pg_board'),
            'stream' => $request->get('stream'),
            'music_bg_info' => $request->get('music_bg_info'),
            'plans' => $request->get('plans'),
            'health_problem' => $request->get('health_problem'),
            'parent_sign' => $sign_name1,
            'student_sign' => $sign_name2,
            'status' => 0,
            'fees_status' => 0,
            'fees_mode_of_payment' => 0,
            'id_type' => $request->get('id_type'),
            'id_no' => $request->get('id_no'),
            'signature3' => $sign_name3,
        ]);
        $studentDetails->save();
        // return Redirect::to('/payment');
        return redirect('/register')->with('success', 'Registration Successfull');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
        'name'=> 'required|min:3',
        'email'=> 'required|email',
        'phone'=> 'required|min:7',
        'course' => 'required',
        'batch' => 'required',
        'address' => 'required|min:3',
        'nationality' => 'required|min:3',
        'pincode' => 'required|min:3',
        'fathers_name' => 'required||min:3',
        'fathers_phone' => 'required||min:7',
        'guardian_name' => 'nullable',
        'guardian_phone' => 'nullable',
        'guardian_occupation' => 'nullable|string',
        'gst' => 'required|integer',
        'trade_title' => 'nullable|string',
        'trade_address' => 'nullable|string',
        'gst_number' => 'nullable|integer',
        '10_school' => 'nullable|string',
        '10_year' => 'nullable|string',
        '10_board' => 'nullable|string',
        '12_school' => 'nullable|string',
        '12_year' => 'nullable|string',
        '12_board' => 'nullable|string',
        'ug_school' => 'nullable|string',
        'ug_year' => 'nullable|string',
        'ug_board' => 'nullable|string',
        'g_school' => 'nullable|string',
        'g_year' => 'nullable|string',
        'g_board' => 'nullable|string',
        'pg_school' => 'nullable|string',
        'pg_year' => 'nullable|string',
        'pg_board' => 'nullable|string',
        'stream' => 'required|string',
        'music_bg_info' => 'nullable|string',
        'health_problem' => 'nullable|string',
        'plans' => 'nullable|string',
        // 'profile_image' => 'required|image',
        // 'signature1' => 'required|image',
        // 'signature2' => 'required|image',
        'id_type' => 'required|string',
        'id_no' => 'required|string',
        // 'signature3' => 'nullable|image',

        // extra details
        'fees_status'=> 'nullable',
        'fees_mode_of_payment'=> 'nullable',
        // 'result'=> 'nullable',
        // 'result_review'=> 'nullable'
      ]);

      User::whereId($request->user_id)->update([
        'name'=>$request->get('name'),
        'email'=>$request->get('email'),
        'phone'=>$request->get('phone')
      ]);

      $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != ''){
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/students'), $image_name);
        }

      StudentDetails::whereStudentId($request->user_id)->update([
        'course' => $request->get('course'),
        'batch' => $request->get('batch'),
        'image' => $image_name,
        'address' => $request->get('address'),
        'nationality' => $request->get('nationality'),
        'pincode' => $request->get('pincode'),
        'fathers_name' => $request->get('fathers_name'),
        'fathers_phone' => $request->get('fathers_phone'),
        'guardian_name' => $request->get('guardian_name'),
        'guardian_phone' => $request->get('guardian_phone'),
        'guardian_occupation' => $request->get('guardian_occupation'),
        'gst' => $request->get('gst'),
        'trade_title' => $request->get('trade_title'),
        'trade_address' => $request->get('trade_address'),
        'gst_number' => $request->get('gst_number'),
        '10_school' => $request->get('10_school'),
        '10_year' => $request->get('10_year'),
        '10_board' => $request->get('10_board'),
        '12_school' => $request->get('12_school'),
        '12_year' => $request->get('12_year'),
        '12_board' => $request->get('12_board'),
        'ug_school' => $request->get('ug_school'),
        'ug_year' => $request->get('ug_year'),
        'ug_board' => $request->get('ug_board'),
        'g_school' => $request->get('g_school'),
        'g_year' => $request->get('g_year'),
        'g_board' => $request->get('g_board'),
        'pg_school' => $request->get('pg_school'),
        'pg_year' => $request->get('pg_year'),
        'pg_board' => $request->get('pg_board'),
        'stream' => $request->get('stream'),
        'music_bg_info' => $request->get('music_bg_info'),
        'plans' => $request->get('plans'),
        'health_problem' => $request->get('health_problem'),
        'status' => 0,
        'fees_status' => $request->get('fees_status'),
        'fees_mode_of_payment' => $request->get('fees_mode_of_payment'),
        'id_type' => $request->get('id_type'),
        'id_no' => $request->get('id_no')
      ]);

        // if($request->invoice) {
        //     $invoice_url = Storage::disk('public')->put('invoices', $request->invoice);
        // }

      // $studentDetails = StudentDetails::findOrFail($id);
      // $studentDetails->fees_status = $request->get('fees_status');
      // $studentDetails->fees_mode_of_payment = $request->get('fees_mode_of_payment');
      // $studentDetails->result = $request->get('result');
      // $studentDetails->result_review = $request->get('result_review');
      // if(isset($invoice_url)){
        // $studentDetails->invoice = $invoice_url;
      // }
      // $studentDetails->save();

      return redirect()->back()->with('success', 'Student Updated successfully');
    }
}
