<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\TaskList;
use App\Http\Requests\StoreTaskListRequest;
use App\Http\Requests\UpdateTaskListRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class TaskListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskListRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreTaskListRequest $request)
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            // 'dec' => ['required'],
            // 'date' => ['required'],
            // 'c_date' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        // $task = TaskList::create($request);
        $task = TaskList::create($request->except('success_task'));

        $task['user_id'] = Auth::user()->id;
        // if ($request->hasFile('image')) {
        //     $task->image = Storage::put('uploads', $request->file('image'));
        //     $task->save();
        // }
        // $id = Auth::user()->id;
        $task->save();

        return response()->json($task, 200);
    }

    /**
     * Display the specified resource.
     *TaskList $taskList
     * @param  \App\Models\TaskList  $taskList
     * @return \Illuminate\Http\Response
     */
    public function task_list()
    {
        $user_id = Auth::user()->id;
        if (request()->has('key') && strlen(request()->has('key')) > 0) {
            $key = request()->key;

            if (TaskList::where('user_id', $user_id)->where('dec', $key)->exists()) {
                $task_list = TaskList::where('user_id', $user_id)
                    ->orderBy('id', 'DESC')
                    ->where('dec', $key)->paginate(5);
            } else if (TaskList::where('user_id', $user_id)->where('dec', $key)->exists()) {
                $task_list = TaskList::where('user_id', $user_id)
                    ->orderBy('id', 'DESC')
                    ->where('dec', $key)->paginate(5);
            } else if (TaskList::where('user_id', $user_id)->where('title', $key)->exists()) {
                $task_list = TaskList::where('user_id', $user_id)
                    ->orderBy('id', 'DESC')
                    ->where('title', $key)->paginate(5);
            } else if (TaskList::where('user_id', $user_id)->where('title', 'LIKE', '%' . $key . '%')->exists()) {
                $task_list = TaskList::where('user_id', $user_id)
                    ->where('title', 'LIKE', '%' . $key . '%')
                    ->orderBy('id', 'DESC')
                    ->paginate(5);
            } else if (TaskList::where('user_id', $user_id)->where('dec', 'LIKE', '%' . $key . '%')->exists()) {
                $task_list = TaskList::where('user_id', $user_id)
                    ->where('dec', 'LIKE', '%' . $key . '%')
                    ->orderBy('id', 'DESC')
                    ->paginate(5);
            }
            else {
                $task_list = TaskList::where('user_id', $user_id)
                    ->where('section', 'LIKE', '%' . $key . '%')
                    ->orderBy('id', 'DESC')
                    ->paginate(5);
            }
        }else{
            $task_list = TaskList::where('user_id', $user_id)->orderBy('id', 'DESC')->paginate(5);
        }

        return response()->json($task_list, 200);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskList  $taskList
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskList $taskList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskListRequest  $request
     * @param  \App\Models\TaskList  $taskList
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdateTaskListRequest $request, TaskList $taskList)

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'dec' => ['required'],
            'date' => ['required'],
            'c_date' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        $updateTask = TaskList::find($request->id);
        // $book = TaskList::create($request->except('image'));

        $updateTask->fill($request->except('success_task'));

        $updateTask['user_id'] = Auth::user()->id;
        // if ($request->hasFile('image')) {
        //     $book->image = Storage::put('upload/books', $request->file('image'));
        //     $book->save();
        // }

        $updateTask->save();

        // $task = TaskList::create($request->except('success_task'));

        // $task['user_id'] = Auth::user()->id;
        // $task->save();

        return response()->json($updateTask, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskList  $taskList
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskList $taskList)
    {
        //
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param  \App\Models\TaskList  $TaskList
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $book = TaskList::find($request->id);

        // if(file_exists(public_path($book->image))) {
        //     unlink(public_path($book->image));
        // }
        $book->delete();
        return response()->json('Deleted Done', 200);
    }

    /**
     * DeleteMulti Action the specified resource from storage.
     *
     * @param  \App\Models\TaskList  $TaskList
     * @return \Illuminate\Http\Response
     */
    public function delete_multi(Request $request)
    {
        foreach ($request->ids as $id) {
            $book = TaskList::find($id);
            // if(file_exists(public_path($book->image))) {
            //     unlink(public_path($book->image));
            // }
            $book->delete();
        }

        // TaskList::whereIn('id', $request->ids)->delete();
        return response()->json('deleted Done', 200);
    }

    /**
     * Display a Task data in field listing as paginate from the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        $book = TaskList::find($id);

        return response()->json($book, 200);
    }

    public function success_task(Request $request)
    {
        TaskList::where('id',$request->id)->update([
            'success_task' => 1,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        return response()->json('Success',200);
    }



}
