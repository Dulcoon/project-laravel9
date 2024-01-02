<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Mahasiswa; //add Maha Model - Data is coming from the database via Model.
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view ('mahasiswa.index')->with('mahasiswa', $mahasiswa);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif', 
        ]);
    
        $input = $request->all();
    

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
    

            $file->storeAs('public/foto', $fileName);
    
            $input['foto'] = $fileName;
        }
    
        Mahasiswa::create($input);
    
        return redirect('mahasiswa')->with('flash_message', 'Mahasiswa berhasil ditambahkan!!');
    }
    


    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.show')->with('mahasiswa', $mahasiswa);
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit')->with('mahasiswa', $mahasiswa);
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
    $mahasiswa = Mahasiswa::find($id);
    $input = $request->all();

    // Upload dan simpan foto baru
    if ($request->hasFile('foto')) {
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif', // Contoh: jenis file gambar
        ]);

        // Hapus foto lama jika ada
        if ($mahasiswa->foto) {
            Storage::delete('public/foto/' . $mahasiswa->foto);
        }

        $file = $request->file('foto');
        $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();

        // Ganti 'storeAs' menjadi 'storeAsPublic' untuk menyimpan ke direktori public
        $file->storeAs('public/foto', $fileName);

        $input['foto'] = $fileName;
    }

    $mahasiswa->update($input);

    return redirect('mahasiswa')->with('flash_message', 'Mahasiswa berhasil diupdate!');
    }

 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::destroy($id);
        return redirect('mahasiswa')->with('flash_message', 'mahasiswa berhasil dihapus!');  
    }
}