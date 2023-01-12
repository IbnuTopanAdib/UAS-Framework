<?php

namespace App\Http\Controllers;

use App\Models\Magang;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreMagangRequest;
use App\Http\Requests\UpdateMagangRequest;

class MagangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magangs = Magang::latest()->get();

        return view('magang.index', compact('magangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('magang.create');
    }

   
    
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'judul_magang' =>'required',
                'slug' =>'required|unique:magangs',
                'kota' =>'required',
                'nama_pt' =>'required',
                'pekerjaan' =>'required',
                'tanggal_mulai' =>'required',
                'tanggal_selesai' =>'required',
                'rincian' =>'required',
                'syarat' =>'required',
                'poster' => 'required|file|image|max:2000',
            ]
            );
            if($request->hasFile('poster')){
                $validate['poster'] = $request->file('poster');
                $ext = $validate['poster']->getClientOriginalExtension();
                $filename= "poster-" . time() . "." .$ext;
                request()->poster->move(public_path('storage/'), $filename);
                $validate['poster'] = $filename;
    
            }

            

            Magang::create($validate);
            return redirect('magang/')->with('success','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Magang  $magang
     * @return \Illuminate\Http\Response
     */
    public function show(Magang $magang)
    {
        return view('magang.show',[
            'magang' => $magang
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Magang  $magang
     * @return \Illuminate\Http\Response
     */
    public function edit(Magang $magang)
    {
        return view('magang.edit', compact('magang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMagangRequest  $request
     * @param  \App\Models\Magang  $magang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMagangRequest $request, Magang $magang)
    {
        $validate = $request->validate(
            [
                'judul_magang' =>'required',
                'kota' =>'required',
                'nama_pt' =>'required',
                'pekerjaan' =>'required',
                'tanggal_mulai' =>'required',
                'tanggal_selesai' =>'required',
                'rincian' =>'required',
                'syarat' =>'required',
            ]
            );

            if($request->slug != $magang->slug){
                $validate['slug'] ='required|unique:magangs';
            }
            if($request->hasFile('poster')){
                if ($request->oldPoster){
                    unlink($request->oldPoster);
                }
                $validate['poster'] = $request->file('poster');
                $ext = $validate['poster']->getClientOriginalExtension();
                $filename= "poster-" . time() . "." .$ext;
                request()->poster->move(public_path('storage/'), $filename);
                $validate['poster'] = $filename;
    
            }
            Magang::where('id', $magang->id)->update($validate);
            return redirect('magang/')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Magang  $magang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Magang $magang)
    {
        $image_path ='storage/'. $magang->poster;
        if (File::exists(public_path( $image_path ))){
            unlink($image_path);
         }
        Magang::destroy($magang->id);
        return redirect('magang/')->with('success','Data berhasil dihapus');
    }
}
