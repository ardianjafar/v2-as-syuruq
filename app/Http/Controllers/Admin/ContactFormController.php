<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ContactFormController extends Controller
{
    public function index()
    {
        $contactForm = ContactForm::get()->all();
        return view('administrator.contactform.index',[
            'contactForm' => $contactForm,
        ]);
    }
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'name'  => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required'
        ]);

        try {
            ContactForm::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'message'   => $request->message
            ]);

            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Throwable $th) {
            return "Gagal" . $th->getMessage();
        }
    }

    public function destroy(ContactForm  $id)
    {
        try {
            $id->delete();
            Alert::success(
                "Berhasil",
                "Contact sudah berhasil di hapus"
            );
        } catch (\Throwable $th) {65
            Alert::error(
                "Gagal",
                "Contact sudah berhasil di hapus", ['error' => $th->getMessage()]
            );
        }
        return redirect()->back();
    }


}
