<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AdminUserController extends Controller
{

    /**
     * Display the specified resource.
     *User $User
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function all_user()
    {

        if (request()->has('key') && strlen(request()->has('key')) > 0) {
            $key = request()->key;

            if (User::where('id', $key)->exists()) {
                $User_data = User::latest()
                    ->orderBy('id', 'DESC')
                    ->where('id', $key)->paginate(4);
            } else if (User::where('name', $key)->exists()) {
                $User_data = User::latest()
                    ->orderBy('id', 'DESC')
                    ->where('name', $key)->paginate(4);
            } else if (User::where('email', $key)->exists()) {
                $User_data = User::latest()
                    ->orderBy('id', 'DESC')
                    ->where('email', $key)->paginate(4);
            } else if (User::where('name', 'LIKE', '%' . $key . '%')->exists()) {
                $User_data = User::latest()
                    ->where('name', 'LIKE', '%' . $key . '%')
                    ->orderBy('id', 'DESC')
                    ->paginate(4);
            } else if (User::where('email', 'LIKE', '%' . $key . '%')->exists()) {
                $User_data = User::latest()
                    ->where('email', 'LIKE', '%' . $key . '%')
                    ->orderBy('id', 'DESC')
                    ->paginate(4);
            }
            else {
                $User_data = User::latest()
                    ->where('role', 'LIKE', '%' . $key . '%')
                    ->orderBy('id', 'DESC')
                    ->paginate(4);
            }
        }else{
            $User_data = User::latest()->orderBy('id', 'DESC')->paginate(5);
        }

        // $stock = 1;
        // $User_data = User::where('status', $stock)->orderBy('id', 'DESC')->paginate(4); // Show only last data
        return response()->json([
            'err_message' => 'Show User data',
            'data' => $User_data,
        ], 200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookListRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required'],

        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        $book = User::create($request->except('image'));
        $book->role = $request->role;
        $book['password'] = bcrypt($request->password);

        $book->save();

        return response()->json([
            'err_message' => 'Successfully insert User',
            'data' => $book,
        ], 200);
    }

    /**
     * Display a Task data in field listing as paginate from the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        $book = User::find($id);

        return response()->json($book, 200);
    }

    /**
     * User Update Profile
     * @param Request $request
     * @return array
    */


    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            // 'name' => ['required'],
            'email' => ['required','email'],
            // 'password' => ['min:4', 'sometimes', 'nullable'],
            // 'role' => ['sometimes', 'required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'data' => $validator->errors(),
            ], 422);
        }

        $updateUser = User::find($id);

        $updateUser->name = $request->name;;
        $updateUser->email = $request->email;
        $updateUser->role = $request->role;
        $updateUser->password = bcrypt($request->password);

        $updateUser->update();

        return response()->json($updateUser, 200);
    }


     /**
     * Delete the specified resource from storage.
     *
     * @param  \App\Models\Footer  $Footer
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $book = User::find($request->id);

            // if(file_exists(public_path($book->image))) {
            //     unlink(public_path($book->image));
            // }

        $book->delete();
        return response()->json('Deleted Done', 200);
    }


    /**
     * DeleteMulti Action the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function delete_multi(Request $request)
    {
        foreach ($request->ids as $id) {
            $book = User::find($id);
            // if(file_exists(public_path($book->image))) {
            //     unlink(public_path($book->image));
            // }
            $book->delete();
        }

        // User::whereIn('id', $request->ids)->delete();
        return response()->json('Selected all data delete Done', 200);
    }


}
