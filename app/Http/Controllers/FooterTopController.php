<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FooterTop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FooterTopController extends Controller
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
            'dec' => ['required'],
            'title' => ['required'],
            // 'icon_img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        $book = FooterTop::create($request->except('icon_img'));
        $book['user_id'] = Auth::user()->id;

        if(!empty($request->icon_img)) {
            $file = $request->file('icon_img');
            // $icon_img_name =  uniqid() . $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
            $icon_img_name = time() . '-' . $file->getClientOriginalName();
            // store the file
            $request->icon_img->storeAs('public/uploads', $icon_img_name);

            $book->icon_img = $icon_img_name;
        }

        $book->save();

        return response()->json([
            'err_message' => 'Successfully insert footer data',
            'data' => $book,
        ], 200);
    }

    /**
     * Display the specified resource.
     *Footer $Footer
     * @param  \App\Models\Footer  $Footer
     * @return \Illuminate\Http\Response
     */
    public function backend_footer_list()
    {
        $user_id = Auth::user()->id;

        $task_list = FooterTop::where('user_id', $user_id)->orderBy('id', 'DESC')->paginate(5);

        return response()->json($task_list, 200);
    }

    /**
     * Display the specified resource.
     *Footer $Footer
     * @param  \App\Models\Footer  $Footer
     * @return \Illuminate\Http\Response
     */
    public function frontend_footer()
    {
        $status = 1;
        // $footer_data = Footer::where('status', $status)->orderBy('id', 'DESC')->get(); // Show all data in database
        $footer_data = FooterTop::where('status', $status)->orderBy('id', 'DESC')->paginate(4); // Show only last data

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
    public function frontend_footer_open_time()
    {
        $status = 1;
        $footer_data = FooterTop::where('status', $status)->orderBy('id', 'ASC')->paginate(4); // Show only last data

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
        $book = FooterTop::find($id);

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
            'dec' => ['required'],
            'title' => ['required'],
            // 'icon_img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'data' => $validator->errors(),
            ], 422);
        }
        $updateTask = FooterTop::find($id);

        $updateTask->title = $request->title;;
        $updateTask->dec = $request->dec;
        $updateTask->icon_img = $request->icon_img;


        // $book = Footer::create($request->except('icon_img'));

        $updateTask['user_id'] = Auth::user()->id;
        // if ($request->hasFile('icon_img')) {
        //     $book->icon_img = Storage::put('upload/books', $request->file('icon_img'));
        //     $book->save();
        // }

        $updateTask->update();

        return response()->json($updateTask, 200);
    }

     /**
     * Delete the specified resource from storage.
     *
     * @param  \App\Models\Footer  $Footer
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $book = FooterTop::find($request->id);

            // if(file_exists(public_path($book->icon_img))) {
            //     unlink(public_path($book->icon_img));
            // }

        $book->delete();
        return response()->json('Deleted Done', 200);
    }

}

