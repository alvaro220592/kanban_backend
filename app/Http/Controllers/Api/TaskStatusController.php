<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\TaskStatus;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $status = new TaskStatus;
            $status->title = $request->title;
            $status->save();

            return response()->json([
                'status' => 'ok',
                'message' => 'Salvo com sucesso'
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'erro',
                'message' => 'Erro ao cadastrar: ' . $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $status = TaskStatus::find($id);
            $status->title = $request->title;
            $status->update();

            return response()->json([
                'status' => 'ok',
                'message' => 'Salvo com sucesso'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'erro',
                'message' => 'Erro ao cadastrar: ' . $th->getMessage()
            ], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $status = TaskStatus::find($id);
            $status->delete();

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
