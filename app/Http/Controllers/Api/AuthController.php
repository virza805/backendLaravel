<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\ForgetPassword;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\New_;

class AuthController extends Controller
{
    public function register(RegisterRequest $request) {


        $data = $request->only(['name', 'email', 'password']);
        // $data['role_serial'] = 4;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        return [
            'message' => 'User registered successfully',
            'data' => $user
        ];

        // $validator = Validator::make($request->all(), [
        //     'name' => ['required', 'min:4'],
        //     // 'email' => ['required', 'email', 'exists:users'],
        //     'email' => ['required', 'email', 'unique:users'],
        //     'password' => ['required', 'min:8', 'confirmed'],
        // ]);

        // if($validator->fails()) {
        //     return response()->json([
        //         'err_message' => 'validation error',
        //         'data' => $validator->errors(),
        //     ], 422);
        // }else{
        //     $data = $request->only(['name', 'email', 'password']);
        //     $data['role_serial'] = 4;
        //     $data['password'] = Hash::make($request->password);
        //     $user = User::create($data);

        //     Auth::login($user);
        //     $user = User::where('id',Auth::user()->id)->with('user_role')->first();
        //     $data['access_token'] = $user->createToken('accessToken')->accessToken;
        //     $data['user'] = $user;
        //     return response()->json($data, 200,);

        // }
    }

    public function login(LoginRequest $request) {

        if (!auth()->attempt($request->only('email', 'password'))) {
            throw new AuthenticationException('Invalid credential');
        }

        return [
            'message' => 'Login successful',
            'token' => auth()->user()->createToken('access-token')->plainTextToken
        ];
        // $validator = Validator::make($request->all(), [
        //     'email' => ['required', 'email', 'exists:users'],
        //     'password' => ['required', 'min:8'],
        // ]);

        // if($validator->fails()) {
        //     return response()->json([
        //         'err_message' => 'validation error',
        //         'data' => $validator->errors(),
        //     ], 422);
        // } else {

        // $req_data = request()->only('email', 'password');
        //     if(Auth::attempt($req_data)) {
        //         $user = User::where('id',Auth::user()->id)->with('user_role')->first();
        //         $data['access_token'] = $user->createToken('accessToken')->accessToken;
        //         $data['user'] = $user;
        //         return response()->json($data, 200,);
        //     }else{
        //         $data['message'] = 'user not exists!!';
        //         $data['data']['email'] = ['email or password incorrect'];
        //         $data['data']['password'] = ['email or password incorrect'];

        //         return response()->json($data, 401);
        //     }
        // }
    }


    // public function logout() {
    //     // Auth::user()->token()->revoke();
    //     return response()->json([
    //         'message' => 'logout',
    //     ], 200);
    // }


    // public function update_profile(Request $request) {
    //     $validator = Validator::make($request->all(), [
    //         'name' => ['required', 'min:4'],
    //         'password' => ['required', 'min:8', 'confirmed'],
    //     ]);

    //     if($validator->fails()) {
    //         return response()->json([
    //             'err_message' => 'validation error',
    //             'data' => $validator->errors(),
    //         ], 422);
    //     }
    //     $data = $request->only(['name', 'password']);
    //     // $data['role_serial'] = 4;
    //     $data['password'] = Hash::make($request->password);
    //     $user = User::find(Auth::user()->id)->fill($data)->save();

    //     $data['user'] = User::where('id', Auth::user()->id)->with('user_role')->first();
    //     return response()->json($data, 200);

    // }

    // public function update_profile_pic(Request $request)
    // {
    //     if($request->hasFile('image')){
    //         $path = Storage::put('uploads', $request->file('image'));
    //         $user = User::find(Auth::user()->id);
    //         $user->image = $path;
    //         $user->save();
    //         $data['user'] = User::where('id', Auth::user()->id)->with('user_role')->first();
    //         return response()->json($data, 200);
    //     }
    // }


    // public function forget(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'email' => ['required','exists:users'],
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'err_message' => 'validation error',
    //             'data' => $validator->errors(),
    //         ], 422);
    //     }
    //     $user = User::where('email',$request->email)->first();
    //     $user->forget_token = Hash::make(uniqid(50));
    //     $user->save();

    //     // hello@example.com | b4b806696d02e8
    //     return Mail::to($user['email'])->send(new ForgetPassword($user->forget_token));
    // }

    // public function forget_token(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'forget_token' => ['required','exists:users'],
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'err_message' => 'validation error',
    //             'data' => $validator->errors(),
    //         ], 422);
    //     }

    //     $temp_pass = Hash::make(uniqid(10));
    //     $user = User::where('forget_token',$request->forget_token)->first();
    //     $user->forget_token = null;
    //     $user->password = Hash::make($temp_pass);
    //     $user->save();

    //     return Mail::to($user['email'])->send(new ForgetPassword(" your password is:  ".$temp_pass));
    // }

    // // for selector import
    // public function user_list_for_select2()
    // {
    //     $user = User::where('role_serial', 4)->select('id', 'name')->orderBy('name', 'ASC')->get();
    //     return response()->json($user, 200);
    // }




    // // Show all user in Admin panel
    // public function all_user(Request $request)
    // {
    //     $user_list = User::latest()->orderBy('id', 'DESC')->paginate(10);
    //     return response()->json($user_list, 200);
    // }

    // // Add New User in Admin panel
    // public function add_new_user(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => ['required', 'min:4'],
    //         // 'email' => ['required', 'email', 'exists:users'],
    //         'email' => ['required', 'email', 'unique:users'],
    //         'password' => ['required', 'min:8', 'confirmed'],
    //     ]);

    //     if($validator->fails()) {
    //         return response()->json([
    //             'err_message' => 'validation error',
    //             'data' => $validator->errors(),
    //         ], 422);
    //     }else{
    //         $data = $request->only(['name', 'email', 'password','role_serial']);
    //         // $data['role_serial'] = 4;
    //         $data['password'] = Hash::make($request->password);
    //         $user = User::create($data);

    //         // return response()->json($user, 200,);

    //     }

    //     // $book = User::create($request->except('image'));
    //     // if ($request->hasFile('image')) {
    //     //     $book->image = Storage::put('uploads', $request->file('image'));
    //     //     $book->save();
    //     // }

    //     return response()->json($user, 200);

    // }

    //   /**
    //  * Delete the specified resource from storage.
    //  *

    //  * @return \Illuminate\Http\Response
    //  */
    // public function delete(Request $request)
    // {
    //     $user = User::find($request->id);

    //     if(file_exists(public_path($user->image))) {
    //         unlink(public_path($user->image));
    //     }
    //     $user->delete();
    //     return response()->json('deleted Done', 200);
    // }
    // public function update_role(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => ['required', 'min:4'],
    //         'author' => ['required'],
    //         'section' => ['required'],
    //         // 'image' => ['required'],
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'err_message' => 'validation error',
    //             'data' => $validator->errors(),
    //         ], 422);
    //     }

    //     $book = User::find($request->id);
    //     // $book = BookList::create($request->except('image'));
    //     $book->fill($request->except('image'))->save();
    //     if ($request->hasFile('image')) {
    //         $book->image = Storage::put('upload/books', $request->file('image'));
    //         $book->save();
    //     }

    //     return response()->json($book, 200);
    // }

}
