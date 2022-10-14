<?php

namespace Tabler\App\Http\Controllers\Admin;

use Tabler\App\DataTables\PersonalAccessTokensDataTable;
use Tabler\App\Models\PersonalAccessToken;
use Tabler\App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalAccessTokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PersonalAccessTokensDataTable $dataTable)
    {
        return $dataTable->render('tabler::admin.personal-access-token.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tabler::admin.personal-access-token.modify', [
            'personal_access_token' => new PersonalAccessToken,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $r
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $r->validate([
            'name' => 'required',
            'expires_at' => 'required',
        ]);

        $user = User::findOrFail($r->user_id);

        $user->createToken($r->name, ['*'], now()->add($r->expires_at));

        return redirect()->route('tabler.admin.personal-access-token.index')->with('success', 'Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PersonalAccessToken  $personalAccessToken
     * @return \Illuminate\Http\Response
     */
    public function show(PersonalAccessToken $personalAccessToken)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PersonalAccessToken  $personalAccessToken
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonalAccessToken $personalAccessToken)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $r
     * @param  \App\Models\PersonalAccessToken  $personalAccessToken
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, PersonalAccessToken $personalAccessToken)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PersonalAccessToken  $personalAccessToken
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonalAccessToken $personalAccessToken)
    {
        //
    }
}
