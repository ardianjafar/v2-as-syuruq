<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request);
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

            return redirect()->back();
        } catch (\Throwable $th) {
            return "Gagal" . $th->getMessage();
        }
    }

//    public function store(Request $request){
//        $this->validate($request, [
//            "name"          => ['required'],
//            "email"         => ['required'],
//            "phone"         => ['required'],
//            "message"       => ['required'],
//        ]);
//
//        $ctForm = ContactForm::create([
//            'name'          => $request->name,
//            'email'         => $request->email,
//            'phone'         => $request->phone,
//            'message'       => $request->message,
//        ]);
//
//        if($ctForm){
//            return redirect()->back()->with('success', 'Sukses Terkirim!');;
//        }else {
//            return redirect()->back()->with('error', 'Gagal Terkirim!');;
//        }
//    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
