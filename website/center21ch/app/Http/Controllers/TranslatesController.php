<?php

namespace App\Http\Controllers;

use App\Translate;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Poem;

class TranslatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>'index']);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( $channelid, Poem $poem)
    {


             

      return $poem->addTranslate([
           'language' => request('language'),
            'body' => request('body'),
            'user_id'=> auth()->id()
        ])->load('owner');
       
        
       
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Translate  $translate
     * @return \Illuminate\Http\Response
     */
    public function show(Translate $translate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Translate  $translate
     * @return \Illuminate\Http\Response
     */
    public function edit(Translate $translate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Translate  $translate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Translate $translate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Translate  $translate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Translate $translate)
    {
        //
    }
}
