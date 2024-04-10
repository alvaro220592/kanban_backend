<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\Priority;
use App\Models\Api\Task;
use App\Models\Api\TaskStatus;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = TaskStatus::with(['tasks.priority' => function ($query) {
            $query->orderBy('order');
        }])->get();

        $priorities = Priority::all();

        return [
            'statuses' => $statuses,
            'priorities' => $priorities
        ];
    }


    public function changeTaskStatus(Request $request){
        $status_to = TaskStatus::find($request->status_to_id);
        $tasks_status_to = $request->tasks_status_to;

        foreach ($tasks_status_to as $task_status_to) {
            $task = Task::find($task_status_to['id']);
            $task->order = $task_status_to['order'];
            $task->task_status_id = $status_to->id;
            $task->update();
        }


        $status_from = TaskStatus::find($request->status_from_id);
        $tasks_status_from = $request->tasks_status_from;

        foreach ($tasks_status_from as $task_status_from) {
            $task = Task::find($task_status_from['id']);
            $task->order = $task_status_from['order'];
            $task->task_status_id = $status_from->id;
            $task->update();
        }
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $ultimaTask = Task::where('task_status_id', $request->task_status_id)->orderBy('order', 'desc')->first();
            $ordemNovaTask = $ultimaTask ? $ultimaTask->order + 1 : 1;

            $task = new Task;
            $task->fill($request->all());
            $task->order = $ordemNovaTask;
            $task->save();

            return response()->json([
                'status' => 'ok',
                'message' => 'Salvo com sucesso'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'erro',
                'message' => 'Erro ao cadastrar: ' . $e->getMessage()
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $task = Task::find($id);
            $task->title = $request->title;
            $task->description = $request->description;
            $task->priority_id = $request->priority_id;
            $task->background_color = $request->background_color;
            $task->update();


            return response()->json([
                'status' => 'ok',
                'message' => 'Salvo com sucesso'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'erro',
                'message' => 'Erro ao cadastrar: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $task = Task::find($id);
            $task->delete();

            return response()->json([
                'status' => 'ok',
                'message' => 'Excluído com sucesso'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'erro',
                'message' => 'Erro ao cadastrar: ' . $e->getMessage()
            ], 500);
        }
    }
}
