<?php

namespace App\Http\Controllers;
use App\User;
use App\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//use PhpParser\Comment;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
//        $user_id = Auth::user()->id;
//        $user_id = auth()->user()->id;
        $this->middleware('checkCreator:1');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new Contact;
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->nickname = $request->input('nickname');
        $contact->phone_1 = $request->input('phone_1');
        $contact->phone_2 = $request->input('phone_2');
        $contact->address = $request->input('address');
        $contact->user_id = auth()->user()->id;

//
        $contact->save();
        return redirect('dashboard')->with('status', 'A new Contact has been created! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        dd($contact);

//        return view('dashboard',['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $contact = Contact::find($id);
        return view('edit', compact('user_id','user','contact'));

//        $user_id = auth()->user()->id;
//        $user = User::find($user_id);
//        $contacts = $user->contacts;
//        return view('dashboard',compact('user','contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $contact = Contact::findOrFail($request->contact_id);

        $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->nickname = $request->get('nickname');
        $contact->phone_1 = $request->get('phone_1');
        $contact->phone_2 = $request->get('phone_2');
        $contact->address = $request->get('address');

        $contact->update();

//        return view('dashboard',['contact' => $contact]);
        return back()->with('status', 'A new Contact has been updated! ');

//        return redirect(action('dashboard', $contact->id),compact('contact'))->with('status', 'The contact '.$contact->name.' has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $contact = Contact::findOrFail($request->contact_id);
        $contact->delete();
        return back()->with('status', 'A Contact has been deleted! ');
//        dd($request->contact_id);
    }
}
