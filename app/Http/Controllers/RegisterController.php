<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\StudentDetails;
use App\Menu;
use App\HomeNotification;
use App\DesktopMenuSection;
use App\FastForwardCourse;
use DB;
use File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy('sort_by', "asc")->get();
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', "asc")->get();
        $courseOptions = $this->getCourseOptions();
        $batchOptions = $this->getBatchOptions();

        return view('frontend.register', compact('menus', 'desktopMenu', 'courseOptions', 'batchOptions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->storeValidationRules());
        $uploadedFiles = [];

        try {
            $uploadedFiles['image'] = $this->uploadStudentAsset($request->file('profile_image'));
            $uploadedFiles['parent_sign'] = $this->uploadStudentAsset($request->file('signature1'));
            $uploadedFiles['student_sign'] = $this->uploadStudentAsset($request->file('signature2'));
            $uploadedFiles['signature3'] = $this->uploadStudentAsset($request->file('signature3'));

            DB::transaction(function () use ($validated, $uploadedFiles) {
                $user = User::create([
                    'role_id' => 4,
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'phone' => $validated['phone'],
                    'password' => bcrypt('test1234'),
                    'created_at' => Carbon::now(),
                ]);

                StudentDetails::create([
                    'student_id' => $user->id,
                    'course' => $validated['course'],
                    'batch' => $validated['batch'],
                    'image' => $uploadedFiles['image'],
                    'address' => $validated['address'],
                    'nationality' => $validated['nationality'],
                    'pincode' => $validated['pincode'],
                    'fathers_name' => $validated['fathers_name'],
                    'fathers_phone' => $validated['fathers_phone'],
                    'guardian_name' => $validated['guardian_name'] ?? null,
                    'guardian_phone' => $validated['guardian_phone'] ?? null,
                    'guardian_occupation' => $validated['guardian_occupation'] ?? null,
                    'gst' => $validated['gst'],
                    'trade_title' => $validated['trade_title'] ?? null,
                    'trade_address' => $validated['trade_address'] ?? null,
                    'gst_number' => $validated['gst_number'] ?? null,
                    '10_school' => $validated['10_school'] ?? null,
                    '10_year' => $validated['10_year'] ?? null,
                    '10_board' => $validated['10_board'] ?? null,
                    '12_school' => $validated['12_school'] ?? null,
                    '12_year' => $validated['12_year'] ?? null,
                    '12_board' => $validated['12_board'] ?? null,
                    'ug_school' => $validated['ug_school'] ?? null,
                    'ug_year' => $validated['ug_year'] ?? null,
                    'ug_board' => $validated['ug_board'] ?? null,
                    'g_school' => $validated['g_school'] ?? null,
                    'g_year' => $validated['g_year'] ?? null,
                    'g_board' => $validated['g_board'] ?? null,
                    'pg_school' => $validated['pg_school'] ?? null,
                    'pg_year' => $validated['pg_year'] ?? null,
                    'pg_board' => $validated['pg_board'] ?? null,
                    'stream' => $validated['stream'],
                    'music_bg_info' => $validated['music_bg_info'] ?? null,
                    'plans' => $validated['plans'] ?? null,
                    'health_problem' => $validated['health_problem'] ?? null,
                    'parent_sign' => $uploadedFiles['parent_sign'],
                    'student_sign' => $uploadedFiles['student_sign'],
                    'status' => 0,
                    'fees_status' => 0,
                    'fees_mode_of_payment' => 0,
                    'id_type' => $validated['id_type'],
                    'id_no' => $validated['id_no'],
                    'signature3' => $uploadedFiles['signature3'],
                ]);
            });
        } catch (\Throwable $exception) {
            $this->deleteUploadedFiles($uploadedFiles);

            return back()
                ->withInput()
                ->with('error', 'Something went wrong while submitting the form. Please try again.');
        }

        return redirect('/register')->with('success', 'Registration Successful');
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
      $request->validate($this->updateValidationRules($request->user_id));

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

    private function storeValidationRules(): array
    {
        $courseValues = $this->getCourseValues();
        $batchValues = $this->getBatchOptions();

        return [
            'name' => 'required|string|min:3|max:255',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'phone' => 'required|string|min:7|max:20',
            'course' => !empty($courseValues)
                ? ['required', 'string', Rule::in($courseValues)]
                : ['required', 'string', 'max:255'],
            'batch' => !empty($batchValues)
                ? ['required', 'string', Rule::in($batchValues)]
                : ['required', 'string', 'max:255'],
            'address' => 'required|string|min:3|max:255',
            'nationality' => 'required|string|min:3|max:255',
            'pincode' => 'required|string|min:3|max:20',
            'fathers_name' => 'required|string|min:3|max:255',
            'fathers_phone' => 'required|string|min:7|max:20',
            'guardian_name' => 'nullable|string|max:255',
            'guardian_phone' => 'nullable|string|max:20',
            'guardian_occupation' => 'nullable|string|max:255',
            'gst' => 'required|in:0,1',
            'trade_title' => 'nullable|string|max:255',
            'trade_address' => 'nullable|string|max:255',
            'gst_number' => 'nullable|string|max:50',
            '10_school' => 'nullable|string|max:255',
            '10_year' => 'nullable|string|max:50',
            '10_board' => 'nullable|string|max:255',
            '12_school' => 'nullable|string|max:255',
            '12_year' => 'nullable|string|max:50',
            '12_board' => 'nullable|string|max:255',
            'ug_school' => 'nullable|string|max:255',
            'ug_year' => 'nullable|string|max:50',
            'ug_board' => 'nullable|string|max:255',
            'g_school' => 'nullable|string|max:255',
            'g_year' => 'nullable|string|max:50',
            'g_board' => 'nullable|string|max:255',
            'pg_school' => 'nullable|string|max:255',
            'pg_year' => 'nullable|string|max:50',
            'pg_board' => 'nullable|string|max:255',
            'stream' => ['required', 'string', Rule::in(['Science', 'Arts', 'Commerce', 'Other'])],
            'music_bg_info' => 'nullable|string',
            'health_problem' => 'nullable|string|max:255',
            'plans' => 'nullable|string|max:255',
            'profile_image' => 'required|image|max:4096',
            'signature1' => 'required|image|max:4096',
            'signature2' => 'required|image|max:4096',
            'id_type' => ['required', 'string', Rule::in(['Passport', 'Pan Card', 'Aadhar Card'])],
            'id_no' => 'required|string|max:100',
            'signature3' => 'required|image|max:4096',
            'terms_accepted' => 'accepted',
        ];
    }

    private function updateValidationRules(?int $userId): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($userId)],
            'phone' => 'required|string|min:7|max:20',
            'course' => 'required|string|max:255',
            'batch' => 'required|string|max:255',
            'address' => 'required|string|min:3|max:255',
            'nationality' => 'required|string|min:3|max:255',
            'pincode' => 'required|string|min:3|max:20',
            'fathers_name' => 'required|string|min:3|max:255',
            'fathers_phone' => 'required|string|min:7|max:20',
            'guardian_name' => 'nullable|string|max:255',
            'guardian_phone' => 'nullable|string|max:20',
            'guardian_occupation' => 'nullable|string|max:255',
            'gst' => 'required|in:0,1',
            'trade_title' => 'nullable|string|max:255',
            'trade_address' => 'nullable|string|max:255',
            'gst_number' => 'nullable|string|max:50',
            '10_school' => 'nullable|string|max:255',
            '10_year' => 'nullable|string|max:50',
            '10_board' => 'nullable|string|max:255',
            '12_school' => 'nullable|string|max:255',
            '12_year' => 'nullable|string|max:50',
            '12_board' => 'nullable|string|max:255',
            'ug_school' => 'nullable|string|max:255',
            'ug_year' => 'nullable|string|max:50',
            'ug_board' => 'nullable|string|max:255',
            'g_school' => 'nullable|string|max:255',
            'g_year' => 'nullable|string|max:50',
            'g_board' => 'nullable|string|max:255',
            'pg_school' => 'nullable|string|max:255',
            'pg_year' => 'nullable|string|max:50',
            'pg_board' => 'nullable|string|max:255',
            'stream' => ['required', 'string', Rule::in(['Science', 'Arts', 'Commerce', 'Other'])],
            'music_bg_info' => 'nullable|string',
            'health_problem' => 'nullable|string|max:255',
            'plans' => 'nullable|string|max:255',
            'id_type' => ['required', 'string', Rule::in(['Passport', 'Pan Card', 'Aadhar Card'])],
            'id_no' => 'required|string|max:100',
            'fees_status' => 'nullable',
            'fees_mode_of_payment' => 'nullable',
        ];
    }

    private function getCourseOptions(): array
    {
        $courseOptions = [
            [
                'id' => 'course_music_production',
                'value' => 'Music Production Course',
                'label' => 'Music Production Course',
            ],
            [
                'id' => 'course_music_diploma',
                'value' => 'Music Production Diploma',
                'label' => 'Music Production Diploma',
            ],
            [
                'id' => 'course_sound_diploma',
                'value' => 'Sound Engineering Diploma',
                'label' => 'Sound Engineering Diploma',
            ],
            [
                'id' => 'course_live_sound',
                'value' => 'Live Sound Engineering',
                'label' => 'Live Sound Engineering',
            ],
        ];

        $fastForwardOptions = FastForwardCourse::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->map(function ($course) {
                $courseTitle = trim('Fast Forward ' . $course->heading . ' ' . $course->subheading);
                $courseLabel = $course->event_badge_text
                    ? $courseTitle . ' (' . $course->event_badge_text . ')'
                    : $courseTitle;

                return [
                    'id' => 'course_fast_forward_' . $course->id,
                    'value' => $courseLabel,
                    'label' => $courseLabel,
                ];
            })
            ->unique('value')
            ->values()
            ->all();

        return array_merge($courseOptions, $fastForwardOptions);
    }

    private function getCourseValues(): array
    {
        return collect($this->getCourseOptions())
            ->pluck('value')
            ->filter()
            ->values()
            ->all();
    }

    private function getBatchOptions(): array
    {
        $homeNotification = HomeNotification::select('register_date1', 'register_date2', 'register_date3')->first();

        return collect([
            optional($homeNotification)->register_date1,
            optional($homeNotification)->register_date2,
            optional($homeNotification)->register_date3,
        ])->filter(function ($batch) {
            return filled($batch);
        })->values()->all();
    }

    private function uploadStudentAsset($file): string
    {
        $directory = public_path('images/students');

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $fileName = Str::random(20) . '_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move($directory, $fileName);

        return $fileName;
    }

    private function deleteUploadedFiles(array $uploadedFiles): void
    {
        foreach ($uploadedFiles as $fileName) {
            if (!$fileName) {
                continue;
            }

            $filePath = public_path('images/students/' . $fileName);

            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }
    }
}
