<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\AcademicSession;
use App\Models\ComputerScienceCourse;
use App\Models\Staff;
use chillerlan\QRCode\QRCode;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\DataTables;

class CourseController extends Controller
{
    public function index(){
        if (request()->ajax()) {
//            $data = DB::select("select id, course_id, code, title, level, semester, registered_students, academic_session, '' lecturers, created_at, updated_at, deleted_at from computer_science_courses");
//            $data = DB::select("select computer_science_courses.id, computer_science_courses.course_id, computer_science_courses.code, computer_science_courses.title, computer_science_courses.level, computer_science_courses.semester, computer_science_courses.registered_students, computer_science_courses.academic_session, group_concat(trim(concat('<span class=\'badge badge-primary font-12\'>', staff.title,' ', staff.name,'</span>')) separator ', ') lecturers from computer_science_courses inner join (staff, staff_course_allocations) on (staff.id=staff_course_allocations.staff_id and staff_course_allocations.course_code=computer_science_courses.code and computer_science_courses.academic_session=staff_course_allocations.academic_session) group by staff_course_allocations.course_code, staff_course_allocations.academic_session");
            $data = DB::select("select academic_sessions.id as academic_session_id, computer_science_courses.id, computer_science_courses.course_id, computer_science_courses.code, computer_science_courses.title, computer_science_courses.level, computer_science_courses.semester, computer_science_courses.registered_students, computer_science_courses.academic_session, group_concat(trim(concat(staff.title,' ', staff.name,',',staff.id)) separator '; ') staff_names, group_concat(staff.id separator '; ') staff_ids from computer_science_courses inner join (staff, staff_course_allocations, academic_sessions) on (staff.id=staff_course_allocations.staff_id and staff_course_allocations.course_code=computer_science_courses.code and computer_science_courses.academic_session=staff_course_allocations.academic_session and academic_sessions.academic_session=staff_course_allocations.academic_session) group by staff_course_allocations.course_code, staff_course_allocations.academic_session order by staff_course_allocations.academic_session desc, computer_science_courses.level, computer_science_courses.semester, staff_course_allocations.course_code");
//            dd($data[12]->staff_ids);
//            dd(explode(';', $data[12]->staff_names));

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
//                    $btn = '<a href="'.URL::signedRoute('staff.staff.show', ['staff'=>$row->id]).'" class="edit btn btn-outline-primary "><i class="fa fa-eye"></i></a>';
//                    $btn .= '<a href="'.URL::signedRoute('staff.staff.show', ['staff'=>$row->id]).'" class="edit btn btn-outline-success btn-sm"><i class="fa fa-edit"></i></a>';
//                    $btn .= '<a href="'.URL::signedRoute('staff.staff.show', ['staff'=>$row->id]).'" class="edit btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    $btn='';
                    $btn = "<div class='button-list'>
	<a  href='".URL::signedRoute('staff.courses.show', ['course'=>$row->id])."' class='d-inline justify-content-center align-items-center btn btn-round btn-outline-primary'><i class='far fa-eye' role='button'></i></a>
</div>";
                    return $btn;
                })
                ->addColumn('lecturers', function ($row) {
//                    , group_concat(trim(concat('<span class=\'badge badge-primary font-12\'>', staff.title,' ', staff.name,'</span>')) separator ', ') lecturers
                    $lecturers = explode(';', $row->staff_names);
                    $output = "";
//                    $badge = [
//                        'primary',
//                        'success'
//                    ];
                    $b = 0;
                    foreach ($lecturers as $lecturer){
                        $lecturer_data = explode(',', $lecturer);
                        $lecturer_name = $lecturer_data[0];
                        $lecturer_id = $lecturer_data[1];
                        $b++;
                        if($b % 2 == 1)
                            $output .= "<a href='".URL::signedRoute('staff.allocate-courses.staff.show', ['staff'=>$lecturer_id, 'course'=>$row->code, 'academic_session'=>$row->academic_session_id])."' class='badge-pill badge badge-primary font-14'>".$lecturer_name."</a><br>";
                        else
                            $output .= "<a href='".URL::signedRoute('staff.allocate-courses.staff.show', ['staff'=>$lecturer_id, 'course'=>$row->code, 'academic_session'=>$row->academic_session_id])."' class='badge-pill badge badge-success font-14'>".$lecturer_name."</a><br>";
                    }
//                    $output = "<span class='badge badge-primary font-12'>";
//                    $output = "<span class='badge badge-primary font-12'>".trim($row->)."</span>";
                    return $output;
                })
//                ->addColumn('thumbnail', function ($row) {
////                    $url = University::find($row->id)->getMedia('logos');
////                    dd($url);
//                    if(is_null($row->photo)) {
//                        return "<img src='".asset('assets/photos/staff/no-image.jpg')."' style='height: 40px; width: auto' alt='photo' />";
//                    }else
//                        return "<img src='".asset("assets/photos/staff/".$row->photo)."' style='height: auto; width: 60px' alt='photo' class='img img-thumbnail  rounded-circle' />";
//                })
                ->rawColumns(['action','lecturers'])
                ->make(true);
        }

        return view('accreditation.staff.courses.index');
    }

    public function show(ComputerScienceCourse $course){
        $data = 'otpauth://totp/test?secret=B3JX4VCVJDVNXNZ5&issuer=chillerlan.net';

// quick and simple:
        echo '<img src="'.(new QRCode)->render($data).'" alt="QR Code" />';
        dd($course);
    }
}
