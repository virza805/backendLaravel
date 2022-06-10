<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessContactMail;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactFrom(Request $request)
    {
    $request->validate([
        'name' => 'required|max:255',
        'phone' => 'required|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|max:255',
    ]);

    $contact = new Contact();
    $contact->name = $request->name;
    $contact->phone = $request->phone;
    $contact->email = $request->email;
    $contact->message = $request->message .PHP_EOL. ' \n This message has been sent via ';
    $contact->save();

    // send user & admin message via queue
    //  ProcessContactMail::dispatch($contact);
    Mail::send(new ContactMail($contact));


    // return redirect(route('single-property', $property_id))->with(['message' => 'Your message has been sent.']);
    return response()->json([
        'err_message' => 'Your message has been sent.',
        'data' => $contact,
    ], 200);

    }
}
