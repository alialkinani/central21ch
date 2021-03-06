<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poet;

class PoetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
        public function index()
        {
            $poets =  Poet::latest()->paginate(6);
           
            return view('poets.index', compact('poets'));
        }
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'nationality' => 'required',
            'DOB' => 'required',
            
            'about'=>'required',
          
            'M_language' =>'required',
            

        ]);
        $poet = Poet::create([
            'first_name' =>request('first_name'),
            'last_name'=>request('last_name'),
            'nationality'  =>request('nationality'),
            'date_of_birth' =>request('date_of_birth'),
            'date_of_death' =>request('date_of_death'),
            'about' =>request('about'),
            'mother_language' => request('mother_language'),
           
            


        ]);
        if (request()->wantsJson()) {
            return response($poet, 201);
        }
       
        return redirect($poet->path())->with('flash','Your poet has been published');

   

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poets.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poets  $poems ,channelId
     * @return \Illuminate\Http\Response
     */
    public function show(Poet $poet)

    {
        return view('poets.show', compact('poet'));
    }
    /**
     * Update the given poem.
     *
 
     * @param poet $poet
     */
    public function update(Request $request, Poet $poet)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'nationality' => 'required',
            'DOB' => 'required',
            'about'=>'required',
          
            'M_language' =>'required',
            

        ]);
       
       
        $poet->update([
            'first_name' =>request('first_name'),
            'last_name'=>request('last_name'),
            'nationality'  =>request('nationality'),
            'date_of_birth' =>request('DOB'),
            'date_of_death' =>request('DOD'),
            'about' =>request('about'),
            'mother_language' => request('M_language'),
            
           
        ]);
        return $poet;
    }
    


}
