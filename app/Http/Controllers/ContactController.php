<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function contact()
    {
        $contacts = Contact::orderBy('created_at', 'ASC')->get();
        return view('admin.contact.view_contact')->with(compact('contacts'));
    }

    public function delete_contact($id)
    {
        $contact = Contact::find($id);
        if (file_exists('uploads/contact/'.$contact->image))
        {
            unlink('uploads/contact/'.$contact->image);
        }
        $contact->delete();
        Alert::success('Deleted Successfully', 'Success Message');
        return redirect()->back()->with('flash_message_error','Contact Delete Successfully');
    }
}
