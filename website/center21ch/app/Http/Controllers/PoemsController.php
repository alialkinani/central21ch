<?php

namespace App\Http\Controllers;

use App\Poem;
use App\Filters\PoemsFilters;
use App\Channel;
use Illuminate\Http\Request;

class PoemsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Channel $channel
     * @param PoemsFilters $filters
     * @return \Illuminate\Http\Response
     */
    public function index(Channel $channel, PoemsFilters $filters)
    {
        
        if ($channel->exists) {

            $poems = $channel->poems()->latest();

        } else {
            /** @var TYPE_NAME $poems */
            $poems = Poem::latest();
        }


        $poems = $poems->filter($filters)->get();

        if(request()->wantsJson()){
            return $poems;
        }


       // $poems = $this->getPoems($channel);

          // fatch all the poems from the database and show it in the poems page

          return view('poems.index', compact('poems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poems.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            //make the sure the the channal id is not null and exists and the database;
            'channel_id' =>'required|exists:channels,id'
        ]);
      $poem = Poem::create([
            'user_id' => auth()->id(),
            'channel_id'=>request('channel_id'),
            'body'  =>request('body'),
            'title' =>request('title')


        ]);

        return redirect($poem->path());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poems  $poems ,channelId
     * @return \Illuminate\Http\Response
     */
    public function show($channelId, Poem $poem)
    {
      return view('poems.show',[

        'poem' =>$poem,
        'replies'=>$poem->replies()->paginate(1)
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poem  $Poem
     * @return \Illuminate\Http\Response
     */
    public function edit(Poem $poem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poems  $poems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poem $poem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poems  $poems
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poem $poem)
    {
        //
    }

}
