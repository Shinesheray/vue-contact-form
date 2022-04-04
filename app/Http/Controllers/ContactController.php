<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Contact::orderBy('gender', 'DESC')->get();
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newContact = new Contact;
        $newContact->name = $request->form["name"];
        $newContact->email = $request->form["email"];
        $newContact->gender = $request->form["gender"];
        $newContact->content = $request->form["content"];
        $newContact->save();

        return $newContact;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingContact = Contact::find($id);
        
        if($existingContact){
            $existingContact->delete();
            return "Contact successfully deleted!";
        }
        return "Contact not found or does not exist"; 
    }

    // this function is to send a mail to the mailtrap email created - (see README file)
    public function send(Request $request){

        $details = [
            'name'=> $request->name,
            'email'=> $request->email,
            'gender'=> $request->gender,
            'subject'=> $request->subject,
            'content'=> $request->content
        ];
        Mail::to(users: 'admin@email.com')->send(new ContactMail($details));
    }
}
