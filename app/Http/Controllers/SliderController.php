<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class SliderController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookListRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'des' => ['required'],
            'title' => ['required'],
            // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        $book = Slider::create($request->except('image'));
        $book['user_id'] = Auth::user()->id;

        if(!empty($request->image)) {
            $file = $request->file('image');
            // $image_name =  uniqid() . $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
            $image_name = time() . '-' . $file->getClientOriginalName();
            // store the file
            $request->image->storeAs('public/uploads', $image_name);

            $book->image = $image_name;
        }

        $book->save();

        return response()->json([
            'err_message' => 'Successfully insert footer Top data',
            'data' => $book,
        ], 200);
    }

    /**
     * Display the specified resource.
     *Footer $Footer
     * @param  \App\Models\Footer  $Footer
     * @return \Illuminate\Http\Response
     */
    public function backendShowList()
    {
        $user_id = Auth::user()->id;

        $task_list = Slider::where('user_id', $user_id)->orderBy('id', 'DESC')->paginate(5);

        return response()->json($task_list, 200);
    }

    /**
     * Display the specified resource.
     *Footer $Footer
     * @param  \App\Models\Footer  $Footer
     * @return \Illuminate\Http\Response
     */
    public function frontendShow()
    {
        $status = 0;
        // $footer_data = Footer::where('status', $status)->orderBy('id', 'DESC')->get(); // Show all data in database
        $footer_data = Slider::where('use', $status)->orderBy('id', 'DESC')->get(); // Show only last data

        return response()->json([
            'err_message' => 'Show footer data',
            'data' => $footer_data,
        ], 200);
    }
    /**
     * Display the specified resource.
     *Opening Hours
     * @param  \App\Models\Footer  $Footer
     * @return \Illuminate\Http\Response
     */
    public function buyOneGetOne()
    {
        $use = 1;
        $footer_data = Slider::where('use', $use)->orderBy('id', 'ASC')->get(); // Show only last data
        // $footer_data = Slider::where('use', $use)->orderBy('id', 'ASC')->paginate(4); // Show only last data

        return response()->json([
            'err_message' => 'Show footer data',
            'data' => $footer_data,
        ], 200);
    }


    /**
     * Display a Task data in field listing as paginate from the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        $book = Slider::find($id);

        return response()->json($book, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFooterRequest  $request
     * @param  \App\Models\Footer  $Footer
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdateFooterRequest $request, Footer $Footer)

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            // 'des' => ['required'],
            'title' => ['required'],
            'sub' => ['required'],
            // 'use' => ['required'],
            // 'des' => ['required'],
            // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'data' => $validator->errors(),
            ], 422);
        }
        $updateTask = Slider::find($id);

        $updateTask->title = $request->title;
        $updateTask->sub = $request->sub;
        $updateTask->des = $request->des;
        $updateTask->btn = $request->btn;
        $updateTask->btn_link = $request->btn_link;
        $updateTask->image = $request->image;
        $updateTask->use = $request->use;


        // $book = Footer::create($request->except('image'));

        $updateTask['user_id'] = Auth::user()->id;
        // if ($request->hasFile('image')) {
        //     $book->image = Storage::put('upload/books', $request->file('image'));
        //     $book->save();
        // }

        $updateTask->update();

        return response()->json($updateTask, 200);
    }

    public function use(Request $request)
    {
        Slider::where('id',$request->id)->update([
            'use' => 1,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        return response()->json('Success', 200);
    }

    public function un_use(Request $request)
    {
        Slider::where('id',$request->id)->update([
            'use' => 0,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
        return response()->json('Set slider again Success', 200);
    }



     /**
     * Delete the specified resource from storage.
     *
     * @param  \App\Models\Footer  $Footer
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $book = Slider::find($request->id);

            // if(file_exists(public_path($book->image))) {
            //     unlink(public_path($book->image));
            // }

        $book->delete();
        return response()->json('Deleted Done', 200);
    }

    /**
     * DeleteMulti Action the specified resource from storage.
     *
     * @param  \App\Models\Slider  $Slider
     * @return \Illuminate\Http\Response
     */
    public function delete_multi(Request $request)
    {
        foreach ($request->ids as $id) {
            $book = Slider::find($id);
            // if(file_exists(public_path($book->image))) {
            //     unlink(public_path($book->image));
            // }
            $book->delete();
        }

        // Slider::whereIn('id', $request->ids)->delete();
        return response()->json('Selected all data delete Done', 200);
    }


}
