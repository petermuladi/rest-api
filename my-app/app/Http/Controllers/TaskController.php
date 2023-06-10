<?php
namespace App\Http\Controllers;

use App\Models\Task;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use App\Http\Resources\TaskResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTaskRequest;

class TaskController extends Controller
{

    use HttpResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return TaskResource::collection(

            Task::where('user_id', Auth::user()->id)->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $request->validated();

        $task = Task::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority,

        ]);

        return new TaskResource($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $singleTask = Task::find($id);

        if ($singleTask == null) {

            return $this->response('no data with id:' . $id, 'Task not Found', 404);
        }
        return new TaskResource($singleTask);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $task = Task::find($id);

        if($task == null)
        {
          return  $this->response('','Task not found by id:'.$id,404);
        }

        $task->update($request->all());

        return new TaskResource($task);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);

        if($task == null)
        {
          return  $this->response('','Task not found by id:'.$id,404);
        }

        $task->delete();

        return $this->response([
            'deleted-task'=>$task,
        ],'Task was deleted');
    }
}