<?php

namespace App\Http\Controllers;



use Validator;
use Illuminate\Http\Request;

use App\Quotes;


class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quotes::all();
        return view('quotes.index', compact('quotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quotes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'Season'=>['required'],
            'Episode'=>['requried'],
            'Quote'=>['required']
        ]);
        
        $quote = new Quotes([
            'Season'=>$request->get('Season'),
            'Episode'=>$request->get('Episode'),
            'Quote'=>$request->get('Quote')
        ]);
        $quote->save();

      


        return redirect('/quotes')->with('success', 'Quote added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quote = Quotes::find($id);

        return view('quotes.edit', compact('quote'));
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
        $validator = Validator::make($request->all(),[
            'Season'=>['required'],
            'Episode'=>['requried'],
            'Quote'=>['required']
        ]);
        $quote = Quotes::find($id);
        $quote->Season= $request->get('Season');
        $quote->Episode= $request->get('Episode');
        $quote->Quote= $request->get('Quote');
        $quote->save();
        return redirect('/quotes')->with('success', 'Quote updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quote = Quotes::find($id);
        $quote->delete();

        return redirect('/quotes')->with('success','Quote has been deleted');
    }
}
