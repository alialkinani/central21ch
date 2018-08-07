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

        $poems = $this->getPoems($channel, $filters);

        if (request()->wantsJson()) {
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

        return redirect($poem->path())->with('flash','Your poem has been published')
    ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poems  $poems ,channelId
     * @return \Illuminate\Http\Response
     */
    public function show($channelId, Poem $poem)
    {
      return view('poems.show', compact('poem'));
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
    public function destroy($channel, Poem $poem)
    {
        if($poem->user_id != auth()->id()){
            abort('403','you donot have the premission to do this')   ;         
        }

        $poem->delete();
        
        return redirect('/poems');
        
    }
    public function getPoems(Channel $channel, PoemsFilters $filters)
    {
        $poems = Poem::latest()->filter($filters);
       

        if ($channel->exists) {
            $poems->where('channel_id', $channel->id);
        }

        return $poems->get();

        
    }

}
