<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRegisterCourseRequest;
use App\Models\Course;
use App\Models\RegisterCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::all();
        // dd($data[0]->users->first()->name);
        $data = DB::table('register_courses')
            ->join('users', 'register_courses.user_id', '=', 'users.id')
            ->join('courses', 'register_courses.course_id', '=', 'courses.id')
            ->select('register_courses.*', 'users.name as username', 'courses.name as course_name')
            ->orderByRaw('course_name asc')
            ->get();
        // dd($data);
        return view('student.home', compact(['data', 'courses']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRegisterCourseRequest $request)
    {
        //
        $data['user_id'] = Auth::user()->id;
        $request = $request->all();
        $courseId = $request['course'];
        $course = Course::findOrFail($courseId);

        $count_student_max = $course->count_student_max;
        $count_student = DB::table('register_courses')->select('user_id', 'count_student')->where('course_id', '=', $courseId)->get()->all();
        if(isset($count_student[0]->count_student)){
            foreach ($count_student as $key => $value){ 
                if($value->user_id == $data['user_id']) return back()->with('exist_user','Bạn đã đăng kí môn học không thể đăng kí lại');
                $count_student = $key + 2;
            }
            if($count_student > $count_student_max) return back()->with('count', 'Số lượng sinh viên đăng kí đã đủ, bạn không thể đăng kí thêm vào lớp này');
        }else{
            $count_student = 1;
        }

        $data['course_id'] =  $courseId;
        $data['count_student'] = $count_student;

        DB::table('register_courses')->where('course_id', '=', $courseId)->update(['count_student' => $count_student]);
        DB::table('register_courses')->insert($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
