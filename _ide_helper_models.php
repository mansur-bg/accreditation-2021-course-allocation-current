<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\AcademicSession
 *
 * @property int $id
 * @property string $academic_session
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicSession newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicSession newQuery()
 * @method static \Illuminate\Database\Query\Builder|AcademicSession onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicSession query()
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicSession whereAcademicSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicSession whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicSession whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicSession whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AcademicSession whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|AcademicSession withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AcademicSession withoutTrashed()
 */
	class AcademicSession extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Course
 *
 * @property int $id
 * @property string $code
 * @property string $title
 * @property int $credit
 * @property int $level
 * @property int $semester
 * @property string|null $status
 * @property string|null $prerequisite
 * @property string|null $corequisite
 * @property string|null $remark
 * @property string|null $faculty_id
 * @property string|null $faculty
 * @property string|null $department_id
 * @property string|null $department
 * @property string|null $programme_id
 * @property string|null $programme
 * @property int|null $iscentralised
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course newQuery()
 * @method static \Illuminate\Database\Query\Builder|Course onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCorequisite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereFaculty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereFacultyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereIscentralised($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course wherePrerequisite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereProgramme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereProgrammeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereSemester($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Course withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Course withoutTrashed()
 */
	class Course extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LectureTimeSlot
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LectureTimeSlot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LectureTimeSlot newQuery()
 * @method static \Illuminate\Database\Query\Builder|LectureTimeSlot onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|LectureTimeSlot query()
 * @method static \Illuminate\Database\Eloquent\Builder|LectureTimeSlot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LectureTimeSlot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LectureTimeSlot whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|LectureTimeSlot withTrashed()
 * @method static \Illuminate\Database\Query\Builder|LectureTimeSlot withoutTrashed()
 */
	class LectureTimeSlot extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LectureVenue
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LectureVenue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LectureVenue newQuery()
 * @method static \Illuminate\Database\Query\Builder|LectureVenue onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|LectureVenue query()
 * @method static \Illuminate\Database\Eloquent\Builder|LectureVenue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LectureVenue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LectureVenue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|LectureVenue withTrashed()
 * @method static \Illuminate\Database\Query\Builder|LectureVenue withoutTrashed()
 */
	class LectureVenue extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Staff
 *
 * @property int $id
 * @property string|null $staff_number
 * @property string|null $title
 * @property string|null $name
 * @property string|null $phone_number
 * @property string|null $email
 * @property string $username
 * @property string|null $password
 * @property int $is_default_password
 * @property string|null $photo
 * @property string|null $status
 * @property string|null $rank
 * @property string|null $qualifications
 * @property string|null $specialisation
 * @property string|null $cadre
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|Staff newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Staff newQuery()
 * @method static \Illuminate\Database\Query\Builder|Staff onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Staff query()
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereCadre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereIsDefaultPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereQualifications($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereSpecialisation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereStaffNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|Staff withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Staff withoutTrashed()
 */
	class Staff extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\StaffCourseAllocation
 *
 * @property int $id
 * @property int $staff_id
 * @property string $course_code
 * @property string $academic_session
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|StaffCourseAllocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StaffCourseAllocation newQuery()
 * @method static \Illuminate\Database\Query\Builder|StaffCourseAllocation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|StaffCourseAllocation query()
 * @method static \Illuminate\Database\Eloquent\Builder|StaffCourseAllocation whereAcademicSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffCourseAllocation whereCourseCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffCourseAllocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffCourseAllocation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffCourseAllocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffCourseAllocation whereStaffId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffCourseAllocation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|StaffCourseAllocation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|StaffCourseAllocation withoutTrashed()
 */
	class StaffCourseAllocation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\StaffProfile
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|StaffProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StaffProfile newQuery()
 * @method static \Illuminate\Database\Query\Builder|StaffProfile onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|StaffProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|StaffProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StaffProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|StaffProfile withTrashed()
 * @method static \Illuminate\Database\Query\Builder|StaffProfile withoutTrashed()
 */
	class StaffProfile extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Student
 *
 * @property int $id
 * @property string|null $regno
 * @property string|null $matriculation_no
 * @property string|null $admissionletter_sn
 * @property string|null $fullname
 * @property string|null $first_name
 * @property string|null $middle_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $emailactivated
 * @property int|null $programme_id
 * @property string|null $admissionset
 * @property string|null $result_admissionset
 * @property string|null $accountactive
 * @property int|null $std_status
 * @property string|null $modeofentry
 * @property int|null $level
 * @property string|null $category
 * @property string|null $entrystatus
 * @property string|null $modeofstudy
 * @property string|null $academic_session
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student newQuery()
 * @method static \Illuminate\Database\Query\Builder|Student onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Student query()
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereAcademicSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereAccountactive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereAdmissionletterSn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereAdmissionset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereEmailactivated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereEntrystatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereMatriculationNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereModeofentry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereModeofstudy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereProgrammeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereRegno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereResultAdmissionset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereStdStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Student withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Student withoutTrashed()
 */
	class Student extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\StudentProfile
 *
 * @property int $id
 * @property int|null $student_id
 * @property string|null $regno
 * @property string|null $dob
 * @property string|null $address
 * @property string|null $state
 * @property string|null $lga
 * @property string|null $phone
 * @property string|null $otheremail
 * @property string|null $nok
 * @property string|null $nokphone
 * @property string|null $nokrelationship
 * @property string|null $nokaddress
 * @property string|null $nokemail
 * @property string|null $nationality
 * @property string|null $marital
 * @property string|null $gender
 * @property string|null $photo_old
 * @property string|null $photo_exists
 * @property string|null $photo
 * @property string|null $photo_rename_moved_success
 * @property string|null $healthstatus
 * @property string|null $disability
 * @property string|null $bloodgroup
 * @property string|null $medication
 * @property string|null $matriculation_no
 * @property string|null $putme_de_invoice_no
 * @property string|null $academic_session
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile newQuery()
 * @method static \Illuminate\Database\Query\Builder|StudentProfile onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereAcademicSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereBloodgroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereDisability($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereHealthstatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereLga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereMarital($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereMatriculationNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereMedication($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereNok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereNokaddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereNokemail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereNokphone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereNokrelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereOtheremail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile wherePhotoExists($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile wherePhotoOld($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile wherePhotoRenameMovedSuccess($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile wherePutmeDeInvoiceNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereRegno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|StudentProfile withTrashed()
 * @method static \Illuminate\Database\Query\Builder|StudentProfile withoutTrashed()
 */
	class StudentProfile extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\StudentRegisteredCourse
 *
 * @property int $id
 * @property string|null $year
 * @property int|null $student_id
 * @property string|null $regno
 * @property string $ccode
 * @property string|null $semester
 * @property string|null $isdeletable
 * @property string|null $time_stamp
 * @property string|null $academic_session
 * @property string|null $grade
 * @property string|null $isco
 * @property string|null $ca
 * @property string|null $exam
 * @property string|null $isapproved
 * @property string|null $approvedby
 * @property string|null $remark
 * @property string|null $uploader
 * @property string|null $upload_status
 * @property string|null $uploaded_on
 * @property string|null $modified_on
 * @property string|null $approved_on
 * @property string|null $disapproved_on
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse newQuery()
 * @method static \Illuminate\Database\Query\Builder|StudentRegisteredCourse onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse query()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereAcademicSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereApprovedOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereApprovedby($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereCa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereCcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereDisapprovedOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereExam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereIsapproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereIsco($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereIsdeletable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereModifiedOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereRegno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereSemester($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereTimeStamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereUploadStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereUploadedOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereUploader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentRegisteredCourse whereYear($value)
 * @method static \Illuminate\Database\Query\Builder|StudentRegisteredCourse withTrashed()
 * @method static \Illuminate\Database\Query\Builder|StudentRegisteredCourse withoutTrashed()
 */
	class StudentRegisteredCourse extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

