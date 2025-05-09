<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostinganUser;
use Illuminate\Http\Request;

class PostinganController extends Controller
{
    // Menampilkan daftar postingan
    public function index()
    {
        $postingans = PostinganUser::with('user')->latest()->get();  // Mengambil postingan dengan relasi pengguna
        return view('admin.postingan.index', compact('postingans'));
    }

    // Membuat postingan baru
    public function create()
    {
        // Ambil semua pengguna untuk dipilih dalam form
        return view('admin.postingan.create');
    }

    // Menyimpan postingan baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        PostinganUser::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('admin.postingan.index')->with('success', 'Postingan berhasil ditambahkan.');
    }

    // Menghapus postingan
    public function destroy(PostinganUser $postingan)
    {
        $postingan->delete();
        return redirect()->route('admin.postingan.index')->with('success', 'Postingan berhasil dihapus');
    }
}
