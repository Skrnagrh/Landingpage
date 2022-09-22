<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Work;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.work.index', [
            'work' => Work::where('user_id', auth()->user()->id)->get(),
            'user' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.work.create', [
            'work' => Work::all(),  
            'user' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // buat ngeposting data 
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:works',
            'image' => 'image|file|max:1024',
            'jobbrief' => 'required',
            'requirements' => 'required',
            'placement' => 'required',
            'deadline' => 'required'
        ]);
        // buat menyimpan file gambar
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('work-images');
        }
        // buat autentikasi user_id sama buat excerpt (tulisan setengah)
        $validatedData['user_id'] = auth()->user()->id;
        // buat menyimpan postingan
        Work::create($validatedData);
        // untuk menampilkan alert atau kata sukses 
        return redirect('/dashboard/work')->with('success', 'New work has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        return view('dashboard.work.show', [
            'work' => $work,
            'user' => User::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        // untuk edit data 
        return view('dashboard.work.edit', [
            'work' => $work,
            'user' => User::all()
            // 'startup' => Startup::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        // buat menyimpan update data
       $rules = [
        'title' => 'required|max:255',
        'image' => 'image|file|max:1024',
        'jobbrief' => 'required',
        'requirements' => 'required',
        'placement' => 'required',
        'deadline' => 'required'
    ];
   
    // ini buat update slug
    if($request->slug != $work->slug){
        $rules['slug'] = 'required|unique:works';
    }

    // ini buat validasi update title, category_id, body
    $validatedData = $request->validate($rules);

     // ini buat update gambar
     if($request->file('image')){
        if($request->oldImage){
            Storage::delete($request->oldImage);
        }
        $validatedData['image'] = $request->file('image')->store('work-images');
    }
    // ini buat authentikasi user_id sama buat excerpt(tulisan setengah)
    $validatedData['user_id'] = auth()->user()->id;
    // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
    // ini buat simpan data update
    Work::where('id', $work->id)
        ->update($validatedData);
    // ini buat menampilkan alert sukses update data
    return redirect('/dashboard/work')->with('success', 'work has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        if($work->image){
            Storage::delete($work->image);
        }
        // buat deleted data 
        Work::destroy($work->id);
        // alert sukses delete
        return redirect('/dashboard/work')->with('success', 'New Work has been deleted!');
    }
}
