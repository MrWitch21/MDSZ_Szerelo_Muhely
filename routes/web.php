<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WorkProcessController;
use App\Http\Controllers\WorksheetController;
use App\Models\WorkProcess;

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

Route::group(['middleware' => ['auth', 'receptionist']], function () {
    Route::get('/worksheet/closed', [WorksheetController::class, 'closed'])->name('worksheet.closed');
    Route::get('/worksheet/closed/{worksheet:hash_name}', [WorksheetController::class, 'closedShow'])->name('worksheet.closed.show');
    Route::get('/worksheet/create', [WorksheetController::class, 'create'])->name('worksheet.create');
    Route::post('/worksheet', [WorksheetController::class, 'store']);
    Route::put('/worksheet/{worksheetid}', [WorksheetController::class, 'update']);

    Route::get('/worksheet/{worksheet:hash_name}/edit/closing', [WorksheetController::class, 'closing'])->name('worksheet.closing');
    Route::put('/worksheet/{worksheetid}/edit/close', [WorksheetController::class, 'close']);
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/',[HomeController::class, 'index'])->name('/');

    Route::resource('component', ComponentController::class)
        ->only('index', 'create', 'store');

    Route::resource('material', MaterialController::class)
        ->only('index', 'create', 'store');

    Route::resource('work_process', WorkProcessController::class)
        ->only('index', 'create', 'store');


    //Base operations
    Route::get('/worksheet', [WorksheetController::class, 'index'])->name('worksheet');
    Route::get('/worksheets/{worksheet:hash_name}', [WorksheetController::class, 'show'])->name('worksheet.show');
    Route::get('/worksheet/{worksheet:hash_name}/edit', [WorksheetController::class, 'edit'])->name('worksheet.edit');


    //CRUD components to the worksheet
    Route::get('/worksheet/{worksheet:hash_name}/component/add', [WorksheetController::class, 'componentCreate'])->name('worksheet.components_add');
    Route::post('/worksheet/{worksheetid}/component/store', [WorksheetController::class, 'componentStore']);
    Route::get('/worksheet/{worksheet:hash_name}/edit/{component_worksheetid}/component', [WorksheetController::class, 'componentsEdit'])->name('worksheet.components_edit');
    Route::put('/worksheet/{worksheetid}/{component_worksheetid}/component/update', [WorksheetController::class, 'componentsUpdate']);
    Route::delete('/worksheet/{worksheetid}/{component_worksheetid}/component/destroy', [WorksheetController::class, 'componentDestroy']);

    //CRUD materials to the worksheet
    Route::get('/worksheet/{worksheet:hash_name}/material/add', [WorksheetController::class, 'materialCreate'])->name('worksheet.materials_add');
    Route::post('/worksheet/{worksheetid}/material/store', [WorksheetController::class, 'materialStore']);
    Route::get('/worksheet/{worksheet:hash_name}/edit/{material_worksheetid}/material', [WorksheetController::class, 'materialsEdit'])->name('worksheet.materials_edit');
    Route::put('/worksheet/{worksheetid}/{material_worksheetid}/material/update', [WorksheetController::class, 'materialsUpdate']);
    Route::delete('/worksheet/{worksheetid}/{material_worksheetid}/material/destroy', [WorksheetController::class, 'materialDestroy']);

    //CRUD work_processes to the worksheet
    Route::get('/worksheet/{worksheet:hash_name}/work_process/add', [WorksheetController::class, 'work_processCreate'])->name('worksheet.work_processes_add');
    Route::post('/worksheet/{worksheetid}/work_process/store', [WorksheetController::class, 'work_processStore']);
    Route::get('/worksheet/{worksheet:hash_name}/edit/{work_process_worksheetid}/work_process', [WorksheetController::class, 'work_processesEdit'])->name('worksheet.work_processes_edit');
    Route::put('/worksheet/{worksheetid}/{work_process_worksheetid}/work_process/update', [WorksheetController::class, 'work_processesUpdate']);
    Route::delete('/worksheet/{worksheetid}/{work_process_worksheetid}/work_process/destroy', [WorksheetController::class, 'work_processDestroy']);
});


require __DIR__ . '/auth.php';
