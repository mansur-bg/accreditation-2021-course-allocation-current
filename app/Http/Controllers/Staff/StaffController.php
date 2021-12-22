<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoRequest;
use App\Http\Requests\StaffRequest;
use App\Models\Staff;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use PHPUnit\Exception;
use Yajra\DataTables\DataTables;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class StaffController extends Controller
{
    public function initials(string $name): ?string
    {
        $words = explode(" ", $name);
        $initials = null;
        foreach ($words as $w) {
            $initials .= $w[0];
        }
        return $initials; //JB
    }

    public function index(){

        $staff = DB::select("select staff_number, trim(concat(title,' ', name)) as staff_name, initials, phone_number, email, photo, status, `rank`, qualifications, specialisation, created_at, updated_at, deleted_at from staff order by id");


        if (request()->ajax()) {

            $data = DB::select("select id, staff_number, trim(concat(if(title is null,'', title),' ', name)) as staff_name, email, photo, `rank`, phone_number,qualifications, specialisation from staff order by id");

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
//                    $btn = '<a href="'.URL::signedRoute('staff.staff.show', ['staff'=>$row->id]).'" class="edit btn btn-outline-primary "><i class="fa fa-eye"></i></a>';
//                    $btn .= '<a href="'.URL::signedRoute('staff.staff.show', ['staff'=>$row->id]).'" class="edit btn btn-outline-success btn-sm"><i class="fa fa-edit"></i></a>';
//                    $btn .= '<a href="'.URL::signedRoute('staff.staff.show', ['staff'=>$row->id]).'" class="edit btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    $btn = "<div class='button-list'>
	<a  href='".URL::signedRoute('staff.staff.show', ['staff'=>$row->id])."' class='d-inline justify-content-center align-items-center btn btn-round btn-outline-primary'><i class='far fa-eye' role='button'></i></a>
	<a  href='".URL::signedRoute('staff.staff.edit', ['staff'=>$row->id])."' class='d-inline justify-content-center align-items-center btn btn-round btn-outline-success'><i class='far fa-edit' role='button'></i></a>
	<a  href='".URL::signedRoute('staff.staff.show', ['staff'=>$row->id])."' class='d-inline justify-content-center align-items-center btn btn-round btn-outline-danger'><i class='far fa-trash' role='button'></i></a>
</div>";
                    return $btn;
                })
                ->addColumn('thumbnail', function ($row) {
//                    $url = University::find($row->id)->getMedia('logos');
//                    dd($url);
                    if(is_null($row->photo)) {
                        return "<img src='".asset('assets/photos/staff/no-image.jpg')."' style='height: 40px; width: auto' alt='photo' />";
                    }else
                        return "<img src='".asset("assets/photos/staff/".$row->photo)."' style='height: auto; width: 60px' alt='photo' class='img img-thumbnail  rounded-circle' />";
                })
                ->rawColumns(['action', 'thumbnail'])
                ->make(true);

        }

        $controls=[
            0 => [
                'label'=>'Staff Number',
                'name'=>'staff_number',
                'value'=>'',
                'control' => 'text',
            ],
            1 => [
                'label'=>'Title',
                'name'=>'title',
                'value'=>'',
                'control' => 'select',
                'options' => [
                    'Professor',
                    'Dr.',
                ]
            ],
            2 => [
                'label'=>'Name',
                'name'=>'name',
                'value'=>'',
                'control' => 'text',
            ],
            3 => [
                'label'=>'Rank',
                'name'=>'rank',
                'value'=>'',
                'control' => 'select',
                'options' => [
                    'Professor',
                    'Associate Professor',
                    'Senior Lecturer',
                    'Lecturer I',
                    'Lecturer II',
                    'Assistant Lecturer',
                    'Graduate Assistant',
                ]
            ],
            4 => [
                'label'=>'Phone Number',
                'name'=>'phone_number',
                'value'=>'',
                'control' => 'text',
            ],
            5 => [
                'label'=>'Email',
                'name'=>'email',
                'value'=>'',
                'control' => 'text',
            ],
            6 => [
                'label'=>'Status',
                'name'=>'status',
                'value'=>'',
                'control' => 'select',
                'options' => [
                    'Full Time',
                    'Associate Lecturer'
                ]
            ],
            7 => [
                'label'=>'Qualifications',
                'name'=>'qualifications',
                'value'=>'',
                'control' => 'text',
            ],
            8 => [
                'label'=>'Specialisation',
                'name'=>'specialisation',
                'value'=>'',
                'control' => 'text',
            ],
        ];

        return view('accreditation.staff.staff.index', compact('staff', 'controls'));
    }

    public function store(StaffRequest $request){
        $validator = $request->validator;
//        dd($validator);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->getMessageBag()->toArray(),]);
        }

        $data = $request->all();
        $data['staff_number'] = 'P100/'.str_replace('P100/','', str_pad($data['staff_number'],4,'0',STR_PAD_LEFT));
        $data['password'] = $data['staff_number'];
        $data['cadre'] = 'Academic';
        $data['username']=$data['email'];
        $data['photo']='no-image.jpg';
        $data['initials'] = $this->initials($data['name']);
        DB::beginTransaction();
        try {
            $staff = \App\Models\Staff::create($data);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
//            throw $e;
            dd($e);
        }

        return response()->json(['success' => 'New Staff record successfully added']);
    }

    public function photo(PhotoRequest $request, Staff $staff)
    {

        try {
//        dd($request);
//            $staff_id = $request->staff_id;
            $file_name = str_replace('P100/', '', $staff->staff_number) . "-" . $staff->initials;
//        dd($file_name);
            $data = $request->validated();
//        $applicant = auth()->user();
//            $allowed = ['jpg', 'jpeg', 'png'];
            $file = $request->file('photo');
            if(is_null($file))
                return back();
//            $extension = $file->extension();
//        $file_name = $file->getFilename();
//        dd($file);

            if (isset($data['photo'])) {
                $file = $data['photo'];
                $fileName = $file_name . '.png';
                Image::load($file)
                    ->format(Manipulations::FORMAT_PNG)
                    ->optimize()
                    ->save(public_path('assets/photos/staff/' . $fileName));

                $staff->update(['photo' => $fileName]);
                session()->put('staff_photo', $fileName);

                $mbbits_message =
                    [
                        [
                            'key' => 'Update Successful',
                            'value' => "Photo updated successfully",
                            'type' => 'success',
                            'fa-icon' => 'far fa-check'
                        ],
                    ];
                session()->flash('mbbits_message', $mbbits_message);
//            return redirect()->action([\App\Http\Controllers\Staff\StaffController::class, 'photo', ['staff'=>$staff]]);
                return redirect()->signedRoute('staff.staff.edit', ['staff' => $staff]);
            }else{
                $mbbits_message =
                    [
                        [
                            'key' => 'Update Error',
                            'value' => "Photo not updated",
                            'type' => 'danger',
                            'fa-icon' => 'far fa-times'
                        ],
                    ];
                session()->flash('mbbits_message', $mbbits_message);
                return redirect()->signedRoute('staff.staff.edit', ['staff' => $staff]);
            }
        }catch (\Exception $e){
            $mbbits_message =
                [
                    [
                        'key' => 'Update Error',
                        'value' => "Photo not updated",
                        'type' => 'danger',
                        'fa-icon' => 'far fa-times'
                    ],
                ];
            session()->flash('mbbits_message', $mbbits_message);
            return redirect()->signedRoute('staff.staff.edit', ['staff' => $staff]);
        }
    }

    public function show(\App\Models\Staff $staff){
//        dd($staff->staff_name);
        $controls=[
            'Staff Number' => $staff->staff_number,
            'Title' => $staff->title,
            'Name' => $staff->name,
            'Rank' => $staff->rank,
            'Phone Number' => $staff->phone_number,
            'Email' => $staff->email,
            'Status' => $staff->status,
            'Qualifications' => $staff->qualifications,
            'Specialisation' => $staff->specialisation,
        ];
        return view('accreditation.staff.staff.show', compact('staff','controls'));
    }

    public function edit(\App\Models\Staff $staff){
//        dd($staff->staff_name);

        $controls=[
            0 => [
                'label'=>'Staff Number',
                'name'=>'staff_number',
                'value'=>$staff->staff_number,
                'control' => 'text',
            ],
            1 => [
                'label'=>'Title',
                'name'=>'title',
                'value'=>$staff->title,
                'control' => 'select',
                'options' => [
                    'Professor',
                    'Dr.',
                ]
            ],
            2 => [
                'label'=>'Name',
                'name'=>'name',
                'value'=>$staff->name,
                'control' => 'text',
            ],
            3 => [
                'label'=>'Rank',
                'name'=>'rank',
                'value'=>$staff->rank,
                'control' => 'select',
                'options' => [
                    'Professor',
                    'Associate Professor',
                    'Senior Lecturer',
                    'Lecturer I',
                    'Lecturer II',
                    'Assistant Lecturer',
                    'Graduate Assistant',
                ]
            ],
            4 => [
                'label'=>'Phone Number',
                'name'=>'phone_number',
                'value'=>$staff->phone_number,
                'control' => 'text',
            ],
            5 => [
                'label'=>'Email',
                'name'=>'email',
                'value'=>$staff->email,
                'control' => 'text',
            ],
            6 => [
                'label'=>'Status',
                'name'=>'status',
                'value'=>$staff->status,
                'control' => 'select',
                'options' => [
                    'Full Time',
                    'Associate Lecturer'
                ]
            ],
            7 => [
                'label'=>'Qualifications',
                'name'=>'qualifications',
                'value'=>$staff->qualifications,
                'control' => 'text',
            ],
            8 => [
                'label'=>'Specialisation',
                'name'=>'specialisation',
                'value'=>$staff->specialisation,
                'control' => 'text',
            ],
        ];

        return view('accreditation.staff.staff.edit', compact('staff', 'controls'));
    }

    public function update(StaffRequest $request, \App\Models\Staff $staff){
//        dd($staff->staff_name);
        if($staff->update($request->validated())){
            $mbbits_message =
                [
                    [
                        'key' => 'Update',
                        'value' => 'Staff Data updated successfully.',
                        'type' => 'success',
                        'fa-icon' => 'fa fa-check'
                    ],
                ];
        }else{
            $mbbits_message =
                [
                    [
                        'key' => 'Update',
                        'value' => 'Error in updating Staff Data.',
                        'type' => 'danger',
                        'fa-icon' => 'fa fa-times'
                    ],
                ];
        }
        session()->flash('mbbits_message', $mbbits_message);
        return back();
    }



}
