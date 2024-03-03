<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('fixed.contact');
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'name'  =>  'required',
                'email' =>  'required|email',
                'coment'    =>  'required',
            ],
            [
                'name.required' =>  "El nombre es obligatorio",
                'email.required'    =>  "El correo es obligatorio",
                'email.email'       =>  "El correo no es correcto",
                'coment'            =>  "Es necesario que agregues un comentario",
            ]
        );

        contact::create([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'coment'    =>  $request->coment,
        ]);

        flasher('Su comentario se ha guardado con éxito');
        return back();
    }
}
