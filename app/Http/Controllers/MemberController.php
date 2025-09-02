<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        return view('anggota.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rulles = [
            'nomor_anggota' => ['required'],
            'nik'           => ['required'],
            'nama_anggota'  => ['required'],
            'no_hp'         => ['required', 'unique: members'],
            'email'         => ['required', 'unique: members'],
        ];
        $validators = Validator::make($request->all(), $rulles);
        if ($validators->fails()) {
            return back()->withErrors($validators)->withInput();
        }
        Member::create([
            'nomor_anggota' => $request->nomor_anggota,
            'nik' => $request->nik,
            'nama_anggota' => $request->nama_anggota,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);
        return redirect()->to('anggota/index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = Member::find($id);
        return view('member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
