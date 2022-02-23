<?php

namespace App\Http\Controllers\Staff;

use App\Classes\MBBitsFPDF;
use App\Http\Controllers\Controller;
use Cache;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ZipArchive;

class CourseAllocationLetterController extends Controller
{
    public function index(){
        return view('accreditation.staff.allocation-letter.index');
    }

    public function generateAllocationLetters(){
        ini_set('max_execution_time', 60*10);

//        $data = DB::select("select staff.staff_number, trim(concat(staff.title, ' ', staff.name)) as lecturer, group_concat(distinct trim(concat(staff2.title, ' ', staff2.name)) separator ', ') as co_lecturers, courses.code, courses.title, courses.credit, staff_course_allocations.academic_session  from staff_course_allocations inner join (staff, courses, student_registered_courses) on (staff.id=staff_course_allocations.staff_id and courses.code=staff_course_allocations.course_code and student_registered_courses.ccode=staff_course_allocations.course_code) left join ( staff_course_allocations as allo2, staff as staff2) on (allo2.staff_id=staff2.id and staff_course_allocations.staff_id<>allo2.staff_id and staff_course_allocations.academic_session=allo2.academic_session and staff_course_allocations.course_code=allo2.course_code) group by staff_course_allocations.staff_id,staff_course_allocations.course_code, staff_course_allocations.academic_session order by staff_course_allocations.academic_session, staff_course_allocations.staff_id");
        if (Cache::has('generate_allocation_letters_data')) {
            $allocations = Cache::get('generate_allocation_letters_data');
        } else {
            $data = DB::select("select staff.staff_number, trim(concat(staff.title, ' ', staff.name)) as lecturer, group_concat(distinct trim(concat(staff2.title, ' ', staff2.name)) separator ', ') as co_lecturers, courses.code, courses.title, courses.credit, student_registered_courses.semester, staff_course_allocations.academic_session  from staff_course_allocations inner join (staff, courses, student_registered_courses) on (staff.id=staff_course_allocations.staff_id and courses.code=staff_course_allocations.course_code and student_registered_courses.ccode=staff_course_allocations.course_code) left join (staff_course_allocations as allo2, staff as staff2) on (allo2.staff_id=staff2.id and staff_course_allocations.staff_id<>allo2.staff_id and staff_course_allocations.academic_session=allo2.academic_session and staff_course_allocations.course_code=allo2.course_code) group by staff_course_allocations.staff_id,staff_course_allocations.course_code, staff_course_allocations.academic_session, student_registered_courses.semester order by staff_course_allocations.academic_session, student_registered_courses.semester, staff_course_allocations.staff_id");
            $allocations=[];
            foreach ($data as $datum){
                $allocations[$datum->academic_session][$datum->staff_number]['allocations'][$datum->semester][]=[
                    'code'=>$datum->code,
                    'title'=>$datum->title,
                    'credit'=>$datum->credit,
                    'semester'=>$datum->semester,
                    'co_lecturers'=>$datum->co_lecturers,
                ];

                $allocations[$datum->academic_session][$datum->staff_number]['staff']=[
                    'number'=>$datum->staff_number,
                    'name'=>$datum->lecturer,
                ];
            }
            Cache::forever('generate_allocation_letters_data', $allocations, now()->addMinutes(10));
        }

        include_once(app_path() . '/Classes/MBBitsPhpQrCode.php');

        $directory = "Allocation-Letters/PerSession/";
//        $background_mb = public_path('assets/images/accreditation_letters/background_mb.png');
        $background_iy = public_path('assets/images/accreditation_letters/background_iy.png');
        $background_hak = public_path('assets/images/accreditation_letters/background_hak.png');
        $semester_text = [
            0=>'',
            1=>'First',
            2=>'Second',
        ];

        $academic_session_variables = [
            '2018/2019' => [
              'background' => $background_iy,
              'date' => (new Carbon('2019-03-11'))->format('l, jS \\of F, Y'),
              'hod' => 'Dr. Ibrahim Yusuf'
            ],
            '2019/2020' => [
                'background' => $background_iy,
                'date' => (new Carbon('2020-01-12'))->format('l, jS \\of F, Y'),
                'hod' => 'Dr. Ibrahim Yusuf'
            ],
            '2020/2021' => [
                'background' => $background_hak,
                'date' => (new Carbon('2021-11-01'))->format('l, jS \\of F, Y'),
                'hod' => 'Dr. Habeebah Adamu Kakudi'
            ],
        ];

        foreach ($allocations as $academic_session => $allocation) {
            $pdf = new class extends MBBitsFPDF {
                function Footer(){

                }

                function Header(){
//                $this->SetFont('Arial', 'B', 65);
//                $this->SetTextColor(216, 216, 216);
//                $this->RotatedText(60, 230, '', 45);

                    //Put the watermark
//                $this->SetFont('Arial', 'B', 65);
//                $this->SetTextColor(0, 0, 0);
//                $this->RotatedText(35, 260, 'WELCOME TO BUK', 90);
                }
            };

            $pdf->SetAutoPageBreak(true, 1);
            $pdf->SetRightMargin(15);
            $pdf->SetLeftMargin(35);
            $pdf->SetTopMargin(60);
            $pdf->SetAuthor("Mansur Babagana");
            $pdf->SetCreator("Mansur Babagana");

            $fontsize = 12;
            $vsize = 7;
            $fontsize1 = $fontsize;
            $pdf->SetStyle("b", "times", "B", $fontsize1, "0,0,0");
            $pdf->SetStyle("pre", "courier", "", $fontsize1, "0,0,0");
            $pdf->SetStyle("u", "times", "U", $fontsize1, "0,0,0");
            $pdf->SetStyle("i", "times", "I", $fontsize1, "0,0,0");
            $pdf->SetStyle("vb", "times", "B", $fontsize1, "102,153,153");
            $pdf->SetStyle("p", "times", "", $fontsize1, "0,0,0", 0);
            $pdf->SetStyle("pc", "times", "", $fontsize1, "255,0,0", 0);

//            $date = (new Carbon('2021-10-01'))->format('l, jS \\of F, Y');
            $date = $academic_session_variables[$academic_session]['date'];
//            $background = $background_hak;
            $background = $academic_session_variables[$academic_session]['background'];
//            $hod = "Dr. Habeebah Adamu Kakudi";
            $hod = $academic_session_variables[$academic_session]['hod'];
            $border = 0;
            $limit = 0;
            $end = 3;
//            dd($allocation);


            foreach ($allocation as $staff) {
                $pdf->AddPage('P', 'A4');
                $pdf->Image($background, 0, 0, 210, 297);
                $pdf->SetFont("times", "", $fontsize);
                $pdf->CellFitScale(0, $vsize, $date, $border, 1, 'R',false);
                $pdf->Ln(1);
                $pdf->CellFitScale(0, $vsize, "[".$staff['staff']['number']."] ".$staff['staff']['name'], $border, 1, 'L',false);
                $pdf->CellFitScale(0, $vsize, "Dear Sir,", $border, 1, 'L',false);
//                $pdf->Ln();
                $pdf->SetFont("times", "B", $fontsize+2);
                $pdf->CellFitScale(0, $vsize, strtoupper($academic_session. " Course Allocation"), $border, 1, 'C',false);
                $pdf->SetFont("times", "", $fontsize);
                $txt = "I write to inform you that the following course(s) have been allocated to you for the ".$academic_session." academic session:";
                $pdf->MultiCell(0, $vsize, $txt, $border, 'J', false);

                //Test 3
                $sn=0;

                $test3 = array();
                $test3['bullet'] = 1;
                $test3['margin'] = ')';
                $test3['indent'] = 10;
                $test3['spacer'] = 0;
                foreach ($staff['allocations'] as $key1 => $semesters){

//                    dd($semesters);
                    $pdf->SetFont("times", "B", $fontsize);
                    $pdf->CellFitScale(0, $vsize, strtoupper($semester_text[$key1]. " Semester"), $border, 1, 'C',false);
                    $pdf->SetFont("times", "", $fontsize);

                    $test3['text'] = array();

                    foreach ($semesters as $key => $course) {
//                        dd($course);
//                        $test3['text'][] = $semesters['code'] . ": " . $semesters['title'] . ' [' . $semesters['credit'] . ' Credits]';
                        if (is_null($course['co_lecturers'])){
                            $test3['text'][] = $course['code'] . ": " . $course['title'] . ' [' . $course['credit'] . ' Credits]';
                        }else{
                            $test3['text'][] = $course['code'] . ": " . $course['title'] . ' [' . $course['credit'] . ' Credits]'."\n(with " . $course['co_lecturers'] . ")";
                        }
//                            $test3['text'][$sn] .= "\n(with " . $semesters['co_lecturers'] . ")";
                        $sn++;
                    }
                    $pdf->MultiCellBltArray(155,$vsize,$test3);
                    $pdf->Ln(1);
                }
//                for ($i=0; $i<5; $i++)
//                {
//
//                }
//                $pdf->SetX(30);
//                $pdf->MultiCellBltArray(155,$vsize,$test3);
//                $pdf->Ln(1);
                $txt = "Lecture schedules will be communicated to you when they became available. Thank you.";
                $pdf->MultiCell(0, $vsize, $txt, $border, 'J', false);
                $pdf->Ln();

//                $txt = "Sincerely yours\n\n(signed)\n".$hod."\nHead of Department";
//                $pdf->MultiCell(0, $vsize, $txt, $border, 'J', false);

                $txt = "<p>Sincerely yours</p></p><i>(signed)</i></p><p>".$hod."</p><p>Head of Department</p>";

                $pdf->WriteTag(0, 5, $txt, $border, "C", 0, 0);

            $pdf->SetFont('helvetica', 'B', 60);
            $pdf->SetTextColor(173, 216, 230);
            $pdf->RotatedText(35, 240, $academic_session.' Session', 90);
            $pdf->SetTextColor(0, 0, 0);
//            $file=str_replace('/','_',$academic_session."-".$staff['staff']['number'])."-Allocation-Letters.pdf";
//                ob_get_clean();
//            $pdf2 = $pdf;
//            $pdf2->Output('F', $directory."/".$file);
            }// staff
            $file=str_replace('/','_',$academic_session)."-Allocation-Letters.pdf";
            ob_get_clean();
            $pdf->Output('F', $directory.$file);
    }//academic_session

        $zip_file = 'Allocation_Letters_Per_Session.zip';
        $zip = new ZipArchive();
        $root_path = realpath($directory);
        $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root_path));

        foreach ($files as $name => $file){
            if (!$file->isDir()) {
                $filePath     = $file->getRealPath();
                $relativePath = substr($filePath, strlen($root_path) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();

        return response()->download($zip_file);

    }


    public function generateIndividualAllocationLetters(){

//        $data = DB::select("select staff.staff_number, trim(concat(staff.title, ' ', staff.name)) as lecturer, group_concat(distinct trim(concat(staff2.title, ' ', staff2.name)) separator ', ') as co_lecturers, courses.code, courses.title, courses.credit, staff_course_allocations.academic_session  from staff_course_allocations inner join (staff, courses, student_registered_courses) on (staff.id=staff_course_allocations.staff_id and courses.code=staff_course_allocations.course_code and student_registered_courses.ccode=staff_course_allocations.course_code) left join ( staff_course_allocations as allo2, staff as staff2) on (allo2.staff_id=staff2.id and staff_course_allocations.staff_id<>allo2.staff_id and staff_course_allocations.academic_session=allo2.academic_session and staff_course_allocations.course_code=allo2.course_code) group by staff_course_allocations.staff_id,staff_course_allocations.course_code, staff_course_allocations.academic_session order by staff_course_allocations.academic_session, staff_course_allocations.staff_id");
        if (Cache::has('generate_allocation_letters_data')) {
            $allocations = Cache::get('generate_allocation_letters_data');
        } else {
            $data = DB::select("select staff.staff_number, trim(concat(staff.title, ' ', staff.name)) as lecturer, group_concat(distinct trim(concat(staff2.title, ' ', staff2.name)) separator ', ') as co_lecturers, courses.code, courses.title, courses.credit, student_registered_courses.semester, staff_course_allocations.academic_session  from staff_course_allocations inner join (staff, courses, student_registered_courses) on (staff.id=staff_course_allocations.staff_id and courses.code=staff_course_allocations.course_code and student_registered_courses.ccode=staff_course_allocations.course_code) left join (staff_course_allocations as allo2, staff as staff2) on (allo2.staff_id=staff2.id and staff_course_allocations.staff_id<>allo2.staff_id and staff_course_allocations.academic_session=allo2.academic_session and staff_course_allocations.course_code=allo2.course_code) group by staff_course_allocations.staff_id,staff_course_allocations.course_code, staff_course_allocations.academic_session, student_registered_courses.semester order by staff_course_allocations.academic_session, student_registered_courses.semester, staff_course_allocations.staff_id");
            $allocations=[];
            foreach ($data as $datum){
                $allocations[$datum->academic_session][$datum->staff_number]['allocations'][$datum->semester][]=[
                    'code'=>$datum->code,
                    'title'=>$datum->title,
                    'credit'=>$datum->credit,
                    'semester'=>$datum->semester,
                    'co_lecturers'=>$datum->co_lecturers,
                ];

                $allocations[$datum->academic_session][$datum->staff_number]['staff']=[
                    'number'=>$datum->staff_number,
                    'name'=>$datum->lecturer,
                ];
            }
            Cache::forever('generate_allocation_letters_data', $allocations, now()->addMinutes(10));
        }

        include_once(app_path() . '/Classes/MBBitsPhpQrCode.php');

        $directory = "Allocation-Letters/PerStaff/";
//        $background_mb = public_path('assets/images/accreditation_letters/background_mb.png');
        $background_iy = public_path('assets/images/accreditation_letters/background_iy.png');
        $background_hak = public_path('assets/images/accreditation_letters/background_hak.png');
        $semester_text = [
            0=>'',
            1=>'First',
            2=>'Second',
        ];

        $academic_session_variables = [
            '2018/2019' => [
                'background' => $background_iy,
                'date' => (new Carbon('2019-03-11'))->format('l, jS \\of F, Y'),
                'hod' => 'Dr. Ibrahim Yusuf'
            ],
            '2019/2020' => [
                'background' => $background_iy,
                'date' => (new Carbon('2020-01-12'))->format('l, jS \\of F, Y'),
                'hod' => 'Dr. Ibrahim Yusuf'
            ],
            '2020/2021' => [
                'background' => $background_hak,
                'date' => (new Carbon('2021-11-01'))->format('l, jS \\of F, Y'),
                'hod' => 'Dr. Habeebah Adamu Kakudi'
            ],
        ];

        foreach ($allocations as $academic_session => $allocation) {
            //            $date = (new Carbon('2021-10-01'))->format('l, jS \\of F, Y');
            $date = $academic_session_variables[$academic_session]['date'];
//            $background = $background_hak;
            $background = $academic_session_variables[$academic_session]['background'];
//            $hod = "Dr. Habeebah Adamu Kakudi";
            $hod = $academic_session_variables[$academic_session]['hod'];

            $border = 0;
            $limit = 0;
            $end = 3;
//            dd($allocation);


            foreach ($allocation as $staff) {
                $pdf = new class extends MBBitsFPDF {
                    function Footer(){

                    }

                    function Header(){
//                $this->SetFont('Arial', 'B', 65);
//                $this->SetTextColor(216, 216, 216);
//                $this->RotatedText(60, 230, '', 45);

                        //Put the watermark
//                $this->SetFont('Arial', 'B', 65);
//                $this->SetTextColor(0, 0, 0);
//                $this->RotatedText(35, 260, 'WELCOME TO BUK', 90);
                    }
                };

                $pdf->SetAutoPageBreak(true, 1);
                $pdf->SetRightMargin(15);
                $pdf->SetLeftMargin(35);
                $pdf->SetTopMargin(60);
                $pdf->SetAuthor("Mansur Babagana");
                $pdf->SetCreator("Mansur Babagana");



                $fontsize = 12;
                $vsize = 7;
                $fontsize1 = $fontsize;
                $pdf->SetStyle("b", "times", "B", $fontsize1, "0,0,0");
                $pdf->SetStyle("pre", "courier", "", $fontsize1, "0,0,0");
                $pdf->SetStyle("u", "times", "U", $fontsize1, "0,0,0");
                $pdf->SetStyle("i", "times", "I", $fontsize1, "0,0,0");
                $pdf->SetStyle("vb", "times", "B", $fontsize1, "102,153,153");
                $pdf->SetStyle("p", "times", "", $fontsize1, "0,0,0", 0);
                $pdf->SetStyle("pc", "times", "", $fontsize1, "255,0,0", 0);

                $pdf->AddPage('P', 'A4');
                $pdf->Image($background, 0, 0, 210, 297);


                $pdf->SetFont("times", "", $fontsize);
                $pdf->CellFitScale(0, $vsize, $date, $border, 1, 'R',false);
                $pdf->Ln(1);
                $pdf->CellFitScale(0, $vsize, "[".$staff['staff']['number']."] ".$staff['staff']['name'], $border, 1, 'L',false);
                $pdf->CellFitScale(0, $vsize, "Dear Sir,", $border, 1, 'L',false);
//                $pdf->Ln();
                $pdf->SetFont("times", "B", $fontsize+2);
                $pdf->CellFitScale(0, $vsize, strtoupper($academic_session. " Course Allocation"), $border, 1, 'C',false);
                $pdf->SetFont("times", "", $fontsize);
                $txt = "I write to inform you that the following course(s) have been allocated to you for the ".$academic_session." academic session:";
                $pdf->MultiCell(0, $vsize, $txt, $border, 'J', false);

                //Test 3
                $sn=0;

                $test3 = array();
                $test3['bullet'] = 1;
                $test3['margin'] = ')';
                $test3['indent'] = 10;
                $test3['spacer'] = 0;
                foreach ($staff['allocations'] as $key1 => $semesters){

//                    dd($semesters);
                    $pdf->SetFont("times", "B", $fontsize);
                    $pdf->CellFitScale(0, $vsize, strtoupper($semester_text[$key1]. " Semester"), $border, 1, 'C',false);
                    $pdf->SetFont("times", "", $fontsize);

                    $test3['text'] = array();

                    foreach ($semesters as $key => $course) {
//                        dd($course);
//                        $test3['text'][] = $semesters['code'] . ": " . $semesters['title'] . ' [' . $semesters['credit'] . ' Credits]';
                        if (is_null($course['co_lecturers'])){
                            $test3['text'][] = $course['code'] . ": " . $course['title'] . ' [' . $course['credit'] . ' Credits]';
                        }else{
                            $test3['text'][] = $course['code'] . ": " . $course['title'] . ' [' . $course['credit'] . ' Credits]'."\n(with " . $course['co_lecturers'] . ")";
                        }
//                            $test3['text'][$sn] .= "\n(with " . $semesters['co_lecturers'] . ")";
                        $sn++;
                    }
                    $pdf->MultiCellBltArray(155,$vsize,$test3);
                    $pdf->Ln(1);
                }
//                for ($i=0; $i<5; $i++)
//                {
//
//                }
//                $pdf->SetX(30);
//                $pdf->MultiCellBltArray(155,$vsize,$test3);
//                $pdf->Ln(1);
                $txt = "Lecture schedules will be communicated to you when they became available. Thank you.";
                $pdf->MultiCell(0, $vsize, $txt, $border, 'J', false);
                $pdf->Ln();

//                $txt = "Sincerely yours\n\n(signed)\n".$hod."\nHead of Department";
//                $pdf->MultiCell(0, $vsize, $txt, $border, 'J', false);

                $txt = "<p>Sincerely yours</p></p><i>(signed)</i></p><p>".$hod."</p><p>Head of Department</p>";

                $pdf->WriteTag(0, 5, $txt, $border, "C", 0, 0);

                $pdf->SetFont('helvetica', 'B', 60);
                $pdf->SetTextColor(173, 216, 230);
                $pdf->RotatedText(35, 240, $academic_session.' Session', 90);
                $pdf->SetTextColor(0, 0, 0);
            $file=str_replace('/','_',$academic_session)."-".str_replace('100/','',$staff['staff']['number'])."-Allocation-Letters.pdf";
                ob_get_clean();
//            $pdf2 = $pdf;
            $pdf->Output($directory.$file, 'F');
            unset($pdf);
            }
        }//academic_session
        $zip_file = 'Allocation_Letters_Per_Staff_Session.zip';
        $zip = new ZipArchive();
        $root_path = realpath($directory);
        $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root_path));

        foreach ($files as $name => $file){
            if (!$file->isDir()) {
                $filePath     = $file->getRealPath();
                $relativePath = substr($filePath, strlen($root_path) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();

        return response()->download($zip_file);
    }
}
