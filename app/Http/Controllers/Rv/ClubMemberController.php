<?php

namespace App\Http\Controllers\Rv;

use App\Events\Rv\ClubMemberCreate;
use App\Http\Controllers\Controller;
use App\Models\Rv\ClubMember;
use App\Http\Requests\StoreClubMemberRequest;
use App\Http\Requests\UpdateClubMemberRequest;
use App\Models\Rv\CanteenTeam;

class ClubMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rv.clubmembers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rv.clubmembers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClubMemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClubMemberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rv\ClubMember  $clubMember
     * @return \Illuminate\Http\Response
     */
    public function show(ClubMember $clubMember)
    {
        event(new ClubMemberCreate(['name'=>'Luc', 'email'=> 'luc.vankeer@telenet.be']));
        // event(new ClubMemberCreate(new CanteenTeam(['payload'=>['name'=>'Luc', 'email'=> 'luc.vankeer@telenet.be']] )));
        // event(new ClubMemberCreate(CanteenTeam::factory()->make()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rv\ClubMember  $clubMember
     * @return \Illuminate\Http\Response
     */
    public function edit(ClubMember $clubMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClubMemberRequest  $request
     * @param  \App\Models\Rv\ClubMember  $clubMember
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClubMemberRequest $request, ClubMember $clubMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rv\ClubMember  $clubMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClubMember $clubMember)
    {
        //
    }
}
