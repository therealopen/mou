<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\MouController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ContractReportController;
use App\Http\Controllers\MouReportController;
use App\Http\Controllers\ApproveController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ContractDeliveryController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    //  'verified',
])->group(function () {

    // Route::middleware('permission:Admin access')->group(function () {
        // Routes that require 'Admin/managerial access' permission
        Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');
       
      


        // Route::middleware('permission:User management')->group(function () {
            // Routes that require 'User management' permission
            Route::middleware(['auth', 'role:admin'])->group(function () {
                // Routes accessible only to admins
            
            Route::post('/admin/add-user', [AdminController::class, 'addUser'])->name('admin.add_user');
            Route::post('/admin/update_user_roles', [AdminController::class, 'changeUserRole'])->name('admin.update_user_roles');
            Route::get('/view_users', [ViewController::class, 'ViewUsers'])->name('view_users');
            Route::get('/view_roles', [ViewController::class, 'ViewRoles'])->name('view_roles');
            Route::get('/manage/users', [ViewController::class, 'showAddUserPage'])->name('admin.add_user_page');
            Route::get('/roles/view', [RoleController::class, 'index'])->name('admin.roles.index');
            Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
            Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
            Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
            Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
          
         
        });
        // });

        // Route::middleware('permission:adding contract')->group(function () {
            Route::middleware(['auth', 'role:stc,pmu'])->group(function () {
                // Routes accessible only to admins
                // Route::get('/view_contract', [ContractController::class, 'viewContract'])->name('viewcontracts');
            });

            Route::middleware(['auth', 'role:stc,vc,dpi,pmu'])->group(function () {
                // Routes accessible only to admins
                Route::get('/contract_aproved', [ContractController::class, 'viewaprovedContract'])->name('displayaprovedcontracts');
            });
            
            //adding contract
            Route::get('/pages/contract/manage/contract', [ContractController::class, 'index'])->name('manage_contracts');
            Route::post('/save_contract', [ContractController::class, 'saveContract'])->name('savecontracts');
          
            Route::get('/add_consultant', [ConsultantController::class, 'index'])->name('add_consultants');
            Route::post('/save_consultant', [ConsultantController::class, 'saveConsultant'])->name('saveconsultants');
            Route::get('/view_consultant', [ConsultantController::class, 'viewConsultant'])->name('viewconsultants');
            Route::resource('consultants', ConsultantController::class);

            Route::get('/approve_contractss', [ContractController::class, 'approveContract'])->name('approvecontracts');
           Route::get('/contracts/{contract}/edit', [ContractController::class, 'edit'])->name('contracts.edit');
            Route::delete('/contracts/{contract}', [ContractController::class, 'destroy'])->name('contracts.destroy');

            Route::get('/contract_progress', [ContractController::class, 'progressContract'])->name('progresscontracts');
            Route::post('/process_progress', [ContractController::class, 'processProgresscontracts'])->name('processProgresscontracts');
           
            // Route::get('/add_mou', [MouController::class, 'addMou'])->name('addmous');
            Route::post('/save_mou', [MouController::class, 'initializeMou'])->name('mous.save');
            Route::delete('/delete-mou/{id}', [MouController::class, 'deleteMou'])->name('mou.delete');
            
            Route::get('/manage_mous', [MouController::class, 'manageMou'])->name('manage.mous');
            // Route::get('/view_preview_moupdf', [MouController::class, 'generatemoupreviewPDF'])->name('mous.preview');
            Route::get('/view_preview_moupdf/{id}', [MouController::class, 'generatemoupreviewPDF'])->name('mous.preview');
         
          

            // Route::get('/add-partner', [PartnerController::class, 'addParners'])->name('add.partners');
            Route::post('/process-partner', [PartnerController::class, 'processParners'])->name('save.partners');
           
            Route::get('/manage-partner', [PartnerController::class, 'manageParners'])->name('manage.partners');
            Route::delete('/delete-partners/{id}', [PartnerController::class, 'deletePartner'])->name('partners.delete');
            Route::get('/partners/{id}/edit', [PartnerController::class, 'edit'])->name('partner.edit');
            Route::put('/partners/{id}', [PartnerController::class, 'update'])->name('partners.update');


            // Route::get('/add-task', [TaskController::class, 'addTask'])->name('add.task');
            Route::post('/save-task', [TaskController::class, 'processTask'])->name('save.task');
            Route::get('/manage-task', [TaskController::class, 'manageTask'])->name('manage.task');
            Route::get('/staff-task', [TaskController::class, 'staffTask'])->name('staff.task');
            Route::delete('/tasks/{id}', [TaskController::class, 'deleteTask'])->name('tasks.delete');
            Route::post('/delivery/tasks', [TaskController::class, 'savedeliveryTasks'])->name('savedelivery.tasks');
            Route::post('/delivery/tasks/report', [TaskController::class, 'savetaskDeliveryReport'])->name('savetaskDelivery.report');

            Route::post('/update/task/status', [TaskController::class, 'updateTaskStatus'])->name('update.task.status');
            Route::post('/extend/task/duration', [TaskController::class, 'extendTaskDuration'])->name('extend.tasks.duration');



    
           Route::post('/tasks/assign', [TaskController::class, 'assign'])->name('tasks.assign');
          Route::post('/tasks/extend', [TaskController::class, 'extend'])->name('tasks.extend');
           Route::get('/tasks/edit/{id}', [TaskController::class, 'editTask'])->name('tasks.edit');
          Route::post('/tasks/update/{id}', [TaskController::class, 'updateTask'])->name('tasks.update');
          Route::get('/tasks/staffss/onprogress', [TaskController::class, 'staffOnprogressTask'])->name('tasks.staff.onprogress');
          Route::get('/tasks/staffss/complete', [TaskController::class, 'staffCompleteTask'])->name('tasks.staff.complete');
          

         
          

        
            Route::get('/view_preview_taskpdf/{id}', [TaskController::class, 'generatetaskpreviewPDF'])->name('mous.preview');

            Route::get('/contract_report', [ContractReportController::class, 'contractReport'])->name('contract.report');
            Route::get('/mou_report', [MouReportController::class, 'mouReport'])->name('mou.report');
            Route::get('/change_password', [AdminController::class, 'changePassword'])->name('password.change');
            Route::get('/audit_trailler', [AdminController::class, 'auditTrailler'])->name('audit.trailler');

            Route::put('/admin/users/{id}', [AdminController::class, 'update'])->name('admin.users.update');

            Route::put('/admin/users/change-status', [UserController::class, 'changeStatus'])->name('change.status');

            
            Route::post('/view_contract_reportpdf', [ContractReportController::class, 'generatecontractPDF'])->name('contractreport.report');
          
            Route::post('/processresendcontracts', [ContractController::class, 'processResendContracts'])->name('processresendcontracts');
            Route::get('/contracts/document', [ContractController::class, 'getcontractDocument'])->name('contract.documents');
            Route::get('/contracts/document/{id}', [ContractController::class, 'viewDocument'])->name('contracts.document');


            Route::post('/mou_reportpdf', [MouReportController::class, 'mouReportpdf'])->name('mou.reportpdf');

            Route::post('/processapprove', [ApproveController::class, 'processapprovecontracts'])->name('approvecontracts_test');

            Route::get('/approve_contract', [ContractController::class, 'approveContracts'])->name('approvecontractss');
           
        Route::get('/dashboard/data', [DashboardController::class, 'chartData'])->name('chats');
           
            // vc comment contract
        Route::post('/processvc/comment', [ContractController::class, 'processvcComment'])->name('vc.comement.contract');

         //mou controllers
         Route::get('/page/mou_progress', [MouProgressController::class, 'getMouprogressPage'])->name('mou.progress');
         Route::get('/page/task_progress', [TaskController::class, 'getTaskprogressPage'])->name('task.progress');
         Route::get('/page/mou/document', [MouController::class, 'getmouDocument'])->name('mou.document');
         Route::get('/mou/document/{id}', [MouController::class, 'viewDocument'])->name('mou.view.document');
         
         //Delivery Route
       

         Route::post('/savecontracts/delivery', [ContractDeliveryController::class, 'store'])->name('savedeliverycontracts');
       //extende contract
       Route::post('/contract/extend', [ContractController::class, 'extendContract'])->name('avecontractextended');
       //contract delivery progress
       Route::post('/contracts/delivery/report', [ContractDeliveryController::class, 'saveDeliveryReport'])->name('saveProgressDeliveryreport');




        Route::middleware('permission:User management')->group(function () {

            // weka routes hapa modify permission name according to your requirement
            
        }); 

        Route::middleware('permission:User management')->group(function () {
            
            // same as above
        }); 

        // unaweza uka copy middleware grou ukaweka na route kulingana na requirement zako

//     });

 });


