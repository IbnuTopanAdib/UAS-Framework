<?php

namespace App\Http\Controllers;

use App\Models\Pembimbing;
use App\Http\Requests\StorePembimbingRequest;
use App\Http\Requests\UpdatePembimbingRequest;

class PembimbingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembimbings = Pembimbing::latest()->get();

        return view('pembimbing.index', compact('pembimbings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembimbing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePembimbingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePembimbingRequest $request)
    {
        $validate = $request->validate(
            [
                'nama' =>'required|max:255',
                'nidn' =>'unique:pembimbings',
                'jenis_kelamin' =>'required',
                'no_hp' =>'required|max:255',
                'bimbingan' =>'required|max:255',
            ]
        );

        Pembimbing::create($validate);
        return redirect('pembimbing/')->with('success','Data Pembimbing berhasil ditambah');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembimbing  $pembimbing
     * @return \Illuminate\Http\Response
     */
    public function show(Pembimbing $pembimbing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembimbing  $pembimbing
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembimbing $pembimbing)
    {
       return view('pembimbing.edit', compact('pembimbing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePembimbingRequest  $request
     * @param  \App\Models\Pembimbing  $pembimbing
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePembimbingRequest $request, Pembimbing $pembimbing)
    {
        $rules =  [
            'nama' =>'required|max:255',
            'jenis_kelamin' =>'required',
            'no_hp' =>'required|max:255',
            'bimbingan' =>'required|max:255',
        ];
        if($request->nidn != $pembimbing->nidn){
            $rules['nidn'] ='required|unique:pembimbings';
        }

        $validate = $request->validate($rules);
        Pembimbing::where('id', $pembimbing->id)->update($validate);
        return redirect('pembimbing/')->with('success','Data berhasil diupdate');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembimbing  $pembimbing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembimbing $pembimbing)
    {
        Pembimbing::destroy($pembimbing->id);
        return redirect('pembimbing/')->with('success','Data berhasil dihapus');

    }
}
