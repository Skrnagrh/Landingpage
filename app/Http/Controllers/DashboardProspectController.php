<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prospect;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class DashboardProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.prospect.index', [
            'prospect' => Prospect::where('user_id', auth()->user()->id)->get(),
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
        return view('dashboard.prospect.create', [
            'categories' => Category::all(),
            'prospect' => Prospect::all(),
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
            'slug' => 'required|unique:prospects',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);
        // buat menyimpan file gambar
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('prospect-images');
        }
        // buat autentikasi user_id sama buat excerpt (tulisan setengah)
        $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        // buat menyimpan postingan
        Prospect::create($validatedData);
        // untuk menampilkan alert atau kata sukses 
        return redirect('/dashboard/prospect')->with('success', 'New prospect has been added!');
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
    public function edit(Prospect $prospect)
    {
        // untuk edit data 
        return view('dashboard.prospect.edit', [
            'prospect' => $prospect,
            'categories' => Category::all(),
            'user' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prospect $prospect)
    {
       // buat menyimpan update data
       $rules = [
        'title' => 'required|max:255',
        'category_id' => 'required',
        'image' => 'image|file|max:1024',
        'body' => 'required'
    ];
   
    // ini buat update slug
    if($request->slug != $prospect->slug){
        $rules['slug'] = 'required|unique:prospects';
    }

    // ini buat validasi update title, category_id, body
    $validatedData = $request->validate($rules);

     // ini buat update gambar
     if($request->file('image')){
        if($request->oldImage){
            Storage::delete($request->oldImage);
        }
        $validatedData['image'] = $request->file('image')->store('prospect-images');
    }
    // ini buat authentikasi user_id sama buat excerpt(tulisan setengah)
    $validatedData['user_id'] = auth()->user()->id;
    // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
    // ini buat simpan data update
    Prospect::where('id', $prospect->id)
        ->update($validatedData);
    // ini buat menampilkan alert sukses update data
    return redirect('/dashboard/prospect')->with('success', 'Prospect has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prospect $prospect)
    {
        if($prospect->image){
            // Storage::delete($prospect->image);
        }
        // buat deleted data 
        Prospect::destroy($prospect->id);
        // alert sukses delete
        return redirect('/dashboard/prospect')->with('success', 'New post has been deleted!');
    }
}
