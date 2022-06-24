<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FooterController extends Controller
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
            'copy_right' => ['required'],
            // 'phone' => ['required'],
            // 'logo' => ['required'],
            // 'email' => ['required'],
            // 'address' => ['required'],

            // 'fb' => ['required'],
            // 'linkedin' => ['required'],
            // 'twitter' => ['required'],
            // 'instagram' => ['required'],
            // 'github' => ['required'],
            // 'web' => ['required'],
            // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        $book = Footer::create($request->except('logo'));
        $book['user_id'] = Auth::user()->id;

        // if ($request->hasFile('logo')) {
        //     $book->logo = Storage::put('upload/img', $request->file('logo'));
        //     $book->save();
        // }

        if(!empty($request->logo)) {
/* Try to function check
            $logo_name = $request->logo->getClientOriginalName();

            // foreach ($request->ids as $id) {
                $book = Footer::find($request->logo);
                if(file_exists(public_path('public/uploads', $logo_name))) {
                    $logo_names = time() . '-' . $request->logo->getClientOriginalName();
                } else{
                    $logo_names = $request->logo->getClientOriginalName();
                }
            // }
 */
/*
Try to Query check
            // $check_img = DB::table('users')->where('name', 'John')->first();

            // echo $check_img->logo;
            // $get_same_image_name = $check_img->logo;

            $check_img = Footer::where('logo', $logo_name)->get();
            if ($check_img->logo == $logo_name) {
                $logo_names = time() . '-' . $request->logo->getClientOriginalName();
            } else {
                $logo_names = $request->logo->getClientOriginalName(); $request->file('logo')
            }
*/
            $file = $request->file('logo');
            // $logo_name =  uniqid() . $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
            $logo_name = time() . '-' . $file->getClientOriginalName();
            // store the file
            $request->logo->storeAs('public/uploads', $logo_name);

            $book->logo = $logo_name;
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

        $task_list = Footer::where('user_id', $user_id)->orderBy('id', 'DESC')->paginate(5);

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
        $footer_data = Footer::where('status', $status)->orderBy('id', 'DESC')->get()->first(); // Show only last data 

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
        $book = Footer::find($id);

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
            // 'copy_right' => ['required'],
            // 'phone' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'data' => $validator->errors(),
            ], 422);
        }
        $updateTask = Footer::find($id);

        $updateTask->copy_right = $request->copy_right;;
        $updateTask->dec = $request->dec;
        $updateTask->phone = $request->phone;
        $updateTask->email = $request->email;
        $updateTask->address = $request->address;
        $updateTask->fb = $request->fb;
        $updateTask->instagram = $request->instagram;
        $updateTask->linkedin = $request->linkedin;
        $updateTask->twitter = $request->twitter;
        $updateTask->github = $request->github;
        $updateTask->web = $request->web;


        // $book = Footer::create($request->except('image'));

        $updateTask['user_id'] = Auth::user()->id;
        // if ($request->hasFile('image')) {
        //     $book->image = Storage::put('upload/books', $request->file('image'));
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
        $book = Footer::find($request->id);

            // if(file_exists(public_path($book->logo))) {
            //     unlink(public_path($book->logo));
            // }

        $book->delete();
        return response()->json('Deleted Done', 200);
    }

}
