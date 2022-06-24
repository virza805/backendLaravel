<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessContactMail;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactFrom(Request $request)
    {
    // $request->validate([
    //     'name' => 'required',
    //     'phone' => 'required',
    //     'email' => 'required|email',
    //     'message' => 'required|max:255',
    // ]);

    $validator = Validator::make($request->all(), [
        'name' => ['required'],
        'phone' => ['required'],
        'email' => ['required', 'email'],
        'message' => ['required'],
    ]);

    if ($validator->fails()) {
        return response()->json([
            'err_message' => 'validation error',
            'data' => $validator->errors(),
        ], 422);
    }



    $contact = new Contact();
    $contact->name = $request->name;
    $contact->phone = $request->phone;
    $contact->email = $request->email;
    $contact->message = $request->message;
    $contact->save();

    // send user & admin message via queue
     ProcessContactMail::dispatch($contact);
    // Mail::send(new ContactMail($contact));


    // return redirect(route('single-property', $property_id))->with(['message' => 'Your message has been sent.']);
    return response()->json([
        'err_message' => 'Your message has been sent.',
        'data' => $contact,
    ], 200);

    }



    // // Show all user in Admin panel
    public function allMessage(Request $request)
    {
        $user_list = Contact::latest()->orderBy('id', 'DESC')->paginate(10);
        return response()->json($user_list, 200);
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param  \App\Models\Contact  $Contact
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $book = Contact::find($request->id);

        // if(file_exists(public_path($book->image))) {
        //     unlink(public_path($book->image));
        // }
        $book->delete();
        return response()->json('Deleted Done', 200);
    }

    /**
     * DeleteMultiple Action the specified resource from storage.
     *
     * @param  \App\Models\Contact  $Contact
     * @return \Illuminate\Http\Response
     */
    public function delete_multi(Request $request)
    {
        foreach ($request->ids as $id) {
            $book = Contact::find($id);
            // if(file_exists(public_path($book->image))) {
            //     unlink(public_path($book->image));
            // }
            $book->delete();
        }
        // Contact::whereIn('id', $request->ids)->delete();
        return response()->json('Deleted Done', 200);
    }


}
