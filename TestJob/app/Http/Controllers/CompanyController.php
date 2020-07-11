<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $company = Company::find($id);
        return view('company.index', compact('company'));
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
            'logo' => 'required|mimes:jpg,png,gif|max:5120',
            'slug' => 'required|max:100|min:10',
            'slogan' => 'required|max:100|min:20',
            'address' => 'required',
            'website' => 'required',
            'description' => 'required|min:50',
        ]);

        $user_id = auth()->user()->id;
        if ($request->hasFile('logo')){
            $file = $request->file('logo');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file->move('images/logo', $fileName);
        }

        Company::where('user_id', $user_id)->update([
            'logo' => $fileName,
            'slug' => str_slug(request('slug')),
            'address' => request('address'),
            'slogan' => request('slogan'),
            'website' => request('website'),
            'description' => request('description'),
        ]);

        return redirect()->back()->with('message', 'Company Data Update Successfully');
    }

    public function banner(Request $request)
    {
        $this->validate($request, [
            'cover_photo' => 'required',
        ]);

        $user_id = auth()->user()->id;
        if ($request->hasFile('cover_photo')){
            $file = $request->file('cover_photo');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file->move('images/cover_photo', $fileName);
        }

        Company::where('user_id', $user_id)->update([
            'cover_photo' => $fileName,
        ]);

        return redirect()->back()->with('message', 'Cover Photo Update Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
