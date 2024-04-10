<?php

use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\TaskStatusController;
use App\Models\Api\Priority;
use App\Models\Api\Task;
use App\Models\Api\TaskStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/statuses', [TaskController::class, 'index']);
Route::post('/changeTaskStatus', [TaskController::class, 'changeTaskStatus']);
Route::post('/status/store', [TaskStatusController::class, 'store']);
Route::post('/status/update/{id}', [TaskStatusController::class, 'update']);
Route::post('/task', [TaskController::class, 'store']);
Route::get('/task/{id}', [TaskController::class, 'show']);
Route::post('/task/update/{id}', [TaskController::class, 'update']);
Route::delete('/task/{id}', [TaskController::class, 'destroy']);
Route::delete('/status/{id}', [TaskStatusController::class, 'destroy']);

Route::get('/status', function(){
    $status = new TaskStatus;
    $status->title = 'A fazer';
    $status->save();


    $status = new TaskStatus;
    $status->title = 'Em andamento';
    $status->save();


    $status = new TaskStatus;
    $status->title = 'Finalizado';
    $status->save();
});

Route::get('/task', function(){
    $task = new Task();
    $task->title = 'Trocar cor da navbar';
    $task->description = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores molestias, at debitis quisquam est dolorum nesciunt iure quaerat possimus corrupti temporibus iusto praesentium harum suscipit ad nobis tenetur rem cumque?';
    $task->background_color = '#3F51B5';
    $task->order = 0;
    $task->task_status_id = 1;
    $task->save();


    $task = new Task;
    $task->title = 'Habilitar upload de arquivos';
    $task->description = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores molestias, at debitis quisquam est dolorum nesciunt iure quaerat possimus corrupti temporibus iusto praesentium harum suscipit ad nobis tenetur rem cumque?';
    $task->background_color = '#FF9800';
    $task->order = 1;
    $task->task_status_id = 1;
    $task->save();


    $task = new Task;
    $task->title = 'Inserir coluna nova em Professores';
    $task->description = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores molestias, at debitis quisquam est dolorum nesciunt iure quaerat possimus corrupti temporibus iusto praesentium harum suscipit ad nobis tenetur rem cumque?';
    $task->background_color = '#4CAF50';
    $task->order = 2;
    $task->task_status_id = 1;
    $task->save();


    $task = new Task();
    $task->title = 'Trocar cor do botão';
    $task->description = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores molestias, at debitis quisquam est dolorum nesciunt iure quaerat possimus corrupti temporibus iusto praesentium harum suscipit ad nobis tenetur rem cumque?';
    $task->background_color = '#FF5722';
    $task->order = 0;
    $task->task_status_id = 2;
    $task->save();


    $task = new Task;
    $task->title = 'Criar tela de cadastro';
    $task->description = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores molestias, at debitis quisquam est dolorum nesciunt iure quaerat possimus corrupti temporibus iusto praesentium harum suscipit ad nobis tenetur rem cumque?';
    $task->background_color = '#2196F3';
    $task->order = 1;
    $task->task_status_id = 2;
    $task->save();


    $task = new Task;
    $task->title = 'Criar perfil de acesso';
    $task->description = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores molestias, at debitis quisquam est dolorum nesciunt iure quaerat possimus corrupti temporibus iusto praesentium harum suscipit ad nobis tenetur rem cumque?';
    $task->background_color = '#9C27B0';
    $task->order = 2;
    $task->task_status_id = 2;
    $task->save();


    $task = new Task;
    $task->title = 'Aumentar fonte';
    $task->description = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores molestias, at debitis quisquam est dolorum nesciunt iure quaerat possimus corrupti temporibus iusto praesentium harum suscipit ad nobis tenetur rem cumque?';
    $task->background_color = '#FFC107';
    $task->order = 0;
    $task->task_status_id = 3;
    $task->save();


    $task = new Task;
    $task->title = 'Inserir tema escuro';
    $task->description = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores molestias, at debitis quisquam est dolorum nesciunt iure quaerat possimus corrupti temporibus iusto praesentium harum suscipit ad nobis tenetur rem cumque?';
    $task->background_color = '#795548';
    $task->order = 1;
    $task->task_status_id = 3;
    $task->save();
});

Route::get('/newpriorities', function(){
    $priority = new Priority();
    $priority->name = 'Baixa';
    $priority->save();


    $priority = new Priority;
    $priority->name = 'Média';
    $priority->save();


    $priority = new Priority;
    $priority->name = 'Alta';
    $priority->save();
});
