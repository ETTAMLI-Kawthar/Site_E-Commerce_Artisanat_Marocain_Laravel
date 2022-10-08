<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function users(){
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function viewusers($id){
        $users = User::find($id);
        return view('admin.users.view',compact('users'));
    }

    public function profile(){
        $user = User::where('id',Auth::id())->first();
        return view('admin.users.profile',compact('user'));
    }

    public function updateprofile(Request $request){
        $user = User::where('id',Auth::id())->first();
        $user->name = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->tele = $request->tele;
        $user->adresse = $request->adresse;
        $user->codePostale = $request->codePostale;
        $user->update();
        return redirect('/profile')->with('status','Profile a été modifier avec succès');
    }

    public function message(Request $req){
        $contact = new Contact();
        $contact->nom = $req->name;
        $contact->email = $req->email;
        $contact->tele = $req->tele;
        $contact->message = $req->message;

        $contact->save();

        return redirect('/Contact')->with('status','Message a été envoyé');
    }

    public function messageUser(){
        $contact = Contact::all();
        return view('admin.users.message',compact('contact'));
    }
}
