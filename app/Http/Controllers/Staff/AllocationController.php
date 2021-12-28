<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\AcademicSession;
use App\Models\ComputerScienceCourse;
use App\Models\Staff;
use App\Models\StaffCourseAllocation;
use Arr;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Yajra\DataTables\DataTables;

class AllocationController extends Controller
{
    public function index(){
        return view('accreditation.staff.courses.allocate-courses');
    }

    public function store(Request $request){
        ini_set('memory_limit', "4000000000000000000000");
        ini_set('max_execution_time', 10000000);

//        a	b	c	d	e	f	g	h	i	j	k	l	m	n
//S/N	SSN	Code	Title	Level	Semester	Registered Students	Number of Lecturers	Academic Session	Lecturer 1	Lecturer 2	Lecturer 3	Lecturer 4	Same As
        $query = DB::select("select id, staff_number, initials from staff");
        $staff=[];
        foreach ($query as $q){
            $staff[$q->initials]=[
                'id' => $q->id,
                'staff_number' => $q->staff_number,
                'initials' => $q->initials,
            ];
        }

        if ($request->file('file')->isValid()) {
            $header = [
                0 => "S/N",
    1 => "SSN",
    2 => "Code",
    3 => "Title",
    4 => "Level",
    5 => "Semester",
    6 => "Registered Students",
    7 => "Number of Lecturers",
    8 => "Academic Session",
    9 => "Lecturer 1",
    10 => "Lecturer 2",
    11 => "Lecturer 3",
    12 => "Lecturer 4",
    13 => "Same As",
  ];

            // Upload path
            $destinationPath = public_path().'/uploadedFiles/';

            // Create directory if not exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0774, true);
            }

            // Get file extension
            $extension = $request->file('file')->getClientOriginalExtension();

            // Valid extensions
            $validextensions = array("xlsx","xls");

            // Check extension
            if(in_array(strtolower($extension), $validextensions)){
                $pathinfo = pathinfo($request->file('file')->getClientOriginalName());

                $fileName = Auth::user()->id.'_'.$pathinfo['filename'].'_'.date('Ymd_His').'.'.$extension;

                $request->file('file')->move($destinationPath, $fileName);

                $spreadsheet = IOFactory::load($destinationPath.$fileName);
                $worksheet = $spreadsheet->getActiveSheet();

                $rows = $worksheet->toArray();

//                dd($rows);

                $insertMessages=[];

                if($rows[0] === $header) {
//                    dd( "Correct");
                    $n = count($rows);
                    $insert = [];
                    for($i = 1; $i < $n; $i++){
                        $row = $rows[$i];
                        $code = $row[2];
                        $academic_session = $row[8];
                        for($j = 9; $j <= 12; $j++){
                            if(!in_array($row[$j],[null, "NO", "YES",""])){
                                $insert[]=[
                                    'staff_id'=>$staff[$row[$j]]['id'],
                                    'course_code'=>$code,
                                    'academic_session'=>$academic_session,
                                ];
                            }
                        }
                    }

                    foreach ($insert as $ins){
                        \App\Models\StaffCourseAllocation::updateOrCreate(
                            [
                                'staff_id'=>$ins['staff_id'],
                                'course_code'=>$ins['course_code'],
                                'academic_session'=>$ins['academic_session']
                            ],
                            $ins
                        );
//                            ['staff_id'=>$ins['staff_id'], 'course_code'=>$ins['course_code'], 'academic_session'=>$ins['academic_session']], $ins);
                    }



//                    \App\Models\Staff::insert($insert);

                    $mbbits_message =
                        [
                            [
                                'key' => 'Status',
                                'value' => "Correct Template",
                                'type' => 'success',
                                'fa-icon' => 'far fa-check'
                            ],
                        ];
                    session()->flash('mbbits_message', $mbbits_message);
                    return redirect()->back();
                }
            }
        }

    }

    public function getAllocationTemplate(){
        return response()->download(public_path('downloads/CourseAllocationTemplate.xlsx'));
    }

    public function showStaffAllocation(ComputerScienceCourse $course, Staff $staff, AcademicSession $academic_session){
//        dd($course->code."; ".$staff->name."; ".$academic_session->academic_session);
        $students = DB::select("select students.regno, students.matriculation_no as jambno, trim(concat_ws(' ',students.first_name, students.middle_name, students.last_name)) as name, students.admissionset, students.modeofentry  from students inner join (student_registered_courses) on (students.regno=student_registered_courses.regno and student_registered_courses.academic_session=? and student_registered_courses.ccode=?)", [$academic_session->academic_session, $course->code]);
        $lecturers = DB::select("select trim(concat(staff.title, ' ', staff.name)) as staff from staff_course_allocations inner join staff on (staff.id=staff_course_allocations.staff_id) where staff_course_allocations.course_code=? and staff_course_allocations.academic_session=? and staff_course_allocations.staff_id<>? order by staff_id",[$course->code, $academic_session->academic_session, $staff->id]);
        $co_lecturers = null;
        if(count($lecturers)>0){
//            $co_lecturers = [];
            foreach ($lecturers as $l){
                $co_lecturers[] = $l->staff;
            }

            $str = array_pop($co_lecturers);
            if ($co_lecturers)
                $str = implode(', ', $co_lecturers)." & ".$str;

            $co_lecturers = $str;
        }

//        dd($co_lecturers);
        return view('accreditation.staff.allocated_courses',compact('students','co_lecturers','course','academic_session', 'staff'));
//        dd($co_lecturer);
    }
}
