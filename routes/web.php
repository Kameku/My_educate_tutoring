<?php

use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AppraisalController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\EnrolmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PreEnrollmentController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ConceptController;
use App\Http\Controllers\ConceptDetailController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\AssignTutorController;
use App\Http\Controllers\AttenController;
use App\Http\Controllers\LearningPlanController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\scheduleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();
//Dashboard 
Route::get('/dashboard', [HomeController::class, 'index'])->middleware('can:dashboard.index')->name('dashboard.index');


//Users and Roles
Route::resource('/administrator/users', AdminUserController::class)->only(['index', 'edit','update'])->names('administrator.users');
Route::resource('/administrator/roles', AdminRoleController::class)->except('show')->names('administrator.roles');

//Employees list
Route::get('/employees', [EmployeesController::class, 'index'])->name('employees.index');
Route::post('/employees', [EmployeesController::class, 'store'])->name('employees.store');
Route::get('/employees/{user}', [EmployeesController::class, 'show'])->name('employees.show');
Route::get('/employees/deactivate/{user}', [EmployeesController::class, 'deactivate'])->name('employees.deactivate');
Route::get('/employees/activate/{user}', [EmployeesController::class, 'activate'])->name('employees.activate');
Route::delete('/employees/delete/{user}', [EmployeesController::class, 'destroy'])->name('employees.delete');
Route::get('/employees/{user}/edit', [EmployeesController::class, 'edit'])->name('employees.edit');
Route::put('/employees/user/{user}', [EmployeesController::class, 'update'])->name('employees.update');

//Noticeboard
Route::resource('/notice', NoticeController::class)->only(['index', 'store','destroy'])->names('notice');

//Appraisals
Route::get('/appraisals/employees', [AppraisalController::class, 'index'])->name('appraisal.index');
Route::get('/appraisals/employee/{user}', [AppraisalController::class, 'show'])->name('appraisal.show');
Route::post('/appraisals', [AppraisalController::class, 'store'])->name('appraisal.store');
Route::delete('/appraisals/{appraisal}', [AppraisalController::class, 'destroy'])->name('appraisal.delete');
Route::get('/appraisals/{user}/myappraisal', [AppraisalController::class, 'myappraisal'])->name('appraisal.myappraisal');
Route::put('/appraisal/{appraisal}', [AppraisalController::class, 'update'])->name('appraisal.update');

Route::get('/appraisals/download/{appraisal}', [AppraisalController::class, 'download'])->name('appraisal.download');

//Tasks
Route::get('/tasks', [TasksController::class, 'index'])->name('tasks.index');
Route::post('/tasks', [TasksController::class, 'store'])->name('tasks.store');
Route::put('/tasks/{task}', [TasksController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TasksController::class, 'destroy'])->name('tasks.delete');

//Enquiry
Route::get('/pre-enrollment', [PreEnrollmentController::class, 'index'])->name('preenrollment.index');
Route::post('/pre-enrollment', [PreEnrollmentController::class, 'store'])->name('preenrollment.store');
Route::get('/pre-enrollment/list', [PreEnrollmentController::class, 'list'])->name('preenrollment.list');
Route::get('/pre-enrollment/show/{preenrolment}', [PreEnrollmentController::class, 'show'])->name('preenrollment.show');
Route::put('/pre-enrollment/{preenrolment}', [PreEnrollmentController::class, 'update'])->name('preenrollment.edit');
Route::delete('/pre-enrollment/{preenrolment}', [PreEnrollmentController::class, 'destroy'])->name('preenrollment.delete');
Route::post('/pre-enrollment/all-delete', [PreEnrollmentController::class, 'alldestroy'])->name('preenrollment.all-delete');
Route::post('/pre-enrollment/comments', [PreEnrollmentController::class, 'commentsStore'])->name('preenrollment.commentsStore');
Route::get('/pre-enrollment/check{preenrolment}', [PreEnrollmentController::class, 'check'])->name('preenrollment.check');

//Enquiry Website
Route::get('/enquiry.page', [EnquiryController::class, 'page'])->name('enquiry.page');
Route::delete('enquiry.pageDelete/{enquiry}',[EnquiryController::class, 'pageDelete'])->name('enquiry.pageDelete');
Route::get('enquiry.pageStatus/{enquiry}',[EnquiryController::class, 'pageStatus'])->name('enquiry.pageStatus');

Route::delete('enquiry.deleteCheck',[EnquiryController::class, 'deleteCheckedEnquiryPage'])->name('enquiry.pageCheckDeleted');

//Pre-enrolment
Route::resource('/enquiry', EnquiryController::class)->names('enquiry');
Route::post('/enquiry.comment/{enquiry}',[EnquiryController::class, 'commentStore'])->name('enquiry.commentStore');

//Enrollment
Route::get('/enrolment.index', [EnrolmentController::class, 'index'])->name('enrolment.index');
Route::get('/enrolment/{enrolment}', [EnrolmentController::class, 'show'])->name('enrolment.show');
Route::get('/enrolment.create/{enquiry}',[EnrolmentController::class, 'create'])->name('enrolment.create');
Route::post('/enrolment.store',[EnrolmentController::class, 'store'])->name('enrolment.store');
Route::put('/enrolment.update/{enrolment}',[EnrolmentController::class, 'update'])->name('enrolment.update');
Route::delete('/enrolment.delete/{enrolment}',[EnrolmentController::class, 'destroy'])->name('enrolment.delete');
Route::post('/enrolment.comment/{enrolment}', [EnrolmentController::class, 'commentStore'])->name('enrolment.commentStore');

//Students

Route::post('/student.store', [StudentController::class , 'store'])->name('student.store');
Route::get('/student.index', [StudentController::class , 'index'])->name('student.index');
Route::get('/student.list', [StudentController::class , 'list'])->name('student.list');
Route::get('/student.disable/{enrolment}', [StudentController::class , 'disable'])->name('student.disable');
Route::get('/student.former', [StudentController::class , 'former'])->name('student.former');
Route::get('/student.reactivate/{enrolment}', [StudentController::class , 'reactivate'])->name('student.reactivate');

//Term Dates
Route::get('/term.index',[TermController::class ,'index'])->name('term.index');
Route::post('/term.store',[TermController::class ,'store'])->name('term.store');

//Library
Route::get('/library.create',[LibraryController::class ,'index'])->name('library.index');
Route::post('/library.store',[LibraryController::class ,'store'])->name('library.store');
Route::get('/library/{library}',[LibraryController::class ,'show'])->name('library.show');
Route::put('/library.update/{library}',[LibraryController::class ,'update'])->name('library.update');
Route::delete('/library.delete/{library}',[LibraryController::class ,'destroy'])->name('library.destroy');
    
Route::post('/concept.store',[ConceptController::class ,'store'])->name('concept.store');
Route::get('/concept/{concept}',[ConceptController::class ,'show'])->name('concept.show');
Route::put('/concept.update/{concept}',[ConceptController::class ,'update'])->name('concept.update');
Route::delete('/concept.delete/{concept}',[ConceptController::class ,'destroy'])->name('concept.destroy');
    
Route::post('detail.store',[ConceptDetailController::class ,'store'])->name('detail.store');
Route::get('detail/{detail}',[ConceptDetailController::class ,'show'])->name('detail.show');
Route::put('detail.update/{detail}',[ConceptDetailController::class ,'update'])->name('detail.update');
Route::delete('detail.delete/{detail}',[ConceptDetailController::class ,'destroy'])->name('detail.destroy');
    
Route::post('learning.store',[LearningController::class ,'store'])->name('learning.store');
Route::put('learning.update/{learning}',[LearningController::class ,'update'])->name('learning.update');
Route::delete('learning.delete/{learning}',[LearningController::class ,'destroy'])->name('learning.destroy');

//Assign Tutors
Route::get('assign.index',[AssignTutorController::class ,'index'])->name('assign.index');
Route::post('assign.store',[AssignTutorController::class ,'store'])->name('assign.store');
Route::post('assign.edit',[AssignTutorController::class ,'edit'])->name('assign.edit');
Route::delete('assign.Delete/{assign}',[AssignTutorController::class ,'destroy'])->name('assign.Delete');

//Attendance
Route::get('atten.index',[AttenController::class ,'index'])->name('atten.index');
Route::post('atten.store',[AttenController::class ,'store'])->name('atten.store');
Route::get('atten/{atten}',[AttenController::class ,'show'])->name('atten.show');
Route::put('atten.update/{atten}',[AttenController::class ,'update'])->name('atten.update');
Route::delete('atten.delete/{atten}',[AttenController::class ,'destroy'])->name('atten.destroy');

//Attendance adicional por modulos
Route::post('atten.addLearning',[LearningPlanController::class ,'store'])->name('atten.addLearning');
Route::delete('atten.addLearning.delete/{atten}',[LearningPlanController::class ,'destroy'])->name('atten.addLearning.destroy');
//Generar el historial de los attendance
Route::get('atten.history/{atten}',[AttenController::class ,'history'])->name('atten.history');
Route::get('atten.pdf/{atten}',[AttenController::class ,'pdf'])->name('atten.pdf');

//Homework
Route::get('homework.index',[HomeworkController::class ,'index'])->name('homework.index');
Route::post('homework.store',[HomeworkController::class ,'store'])->name('homework.store');
Route::put('homework.update/{homework}',[HomeworkController::class ,'update'])->name('homework.update');
Route::delete('homework.delete/{homework}',[HomeworkController::class ,'destroy'])->name('homework.destroy');


//Schedule
Route::get('schedule.index', [scheduleController::class , 'index'])->name('schedule.index');
Route::post('schedule.store', [scheduleController::class , 'store'])->name('schedule.store');
Route::delete('schedule/{schedule}', [scheduleController::class , 'destroy'])->name('schedule.destroy');
Route::delete('schedule/time/{time}', [scheduleController::class , 'destroyTime'])->name('time.destroy');
Route::get('schedule/classSummary', [scheduleController::class , 'classSummary'])->name('schedule.classSummary');





