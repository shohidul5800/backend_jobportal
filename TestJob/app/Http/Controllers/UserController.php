<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.profile');
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
        $this->validate($request, [
            'avatar' => 'required|max:2048|mimes:jpg,png',
            'cover_letter' => 'required|max:5120|mimes:doc,DOC,PDF,pdf,docx',
            'resume' => 'required|max:5120|mimes:doc,DOC,PDF,pdf,docx',
            'address' => 'required',
            'bio' => 'required|max:2000',
            'experience' => 'required',
        ]);

        $user_id = auth()->user()->id;
        $cover_letter = $request->file('cover_letter')->store('public/files');
        $resume = $request->file('resume')->store('public/files');
        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file->move('images/avatar', $fileName);
        }
        Profile::where('user_id', $user_id)->update([
            'resume'=> $resume,
            'cover_letter' => $cover_letter,
            'avatar' => $fileName,
            'address' => request('address'),
            'bio' => request('bio'),
            'experience' => request('experience'),
        ]);

        return redirect()->back()->with('message', 'User Data Update Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
