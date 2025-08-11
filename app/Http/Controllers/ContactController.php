<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    /**
     * Untuk Menampilkan Halaman Kontak
     */
    public function show(){
        //contact adalah sebuah nama file pada view yg menampilkan halaman kontak
        return view('contact');
    }

    /**
     * Data Formulir Kontak Diproses dan Dikirim
     */
    public function submit(Request $request){
        // Validasi data yang diterima dari formulir kontak
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|phone|max:20',
            'message' => 'required|string',
        ]);

        // Kirim email atau simpan data ke database
        try{
            Mail::to('farhanbadru4@gmail.com')->send(new ContactFormMail($validatedData));
        }catch(\Exception $e){
            // Jika Terjadi kesalahan pengiriman email
            return redirect()->route('contact')->with('error', 'Gagal mengirim pesan.');
        }
        // Jika berhasil, redirect ke halaman kontak dengan pesan sukses
        return redirect()->route('contact')->with('success', 'Pesan Anda telah dikirim.');
    }
}
