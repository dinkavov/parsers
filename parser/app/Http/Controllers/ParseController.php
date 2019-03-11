<?php

namespace App\Http\Controllers;

use App\Parse;
use Illuminate\Http\Request;
use phpquery;

class ParseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



	$str = '<a id="elem" href="http://google.com">Ссылка</a>';
	$html = phpQuery::newDocument($str);
	$pq = pq($html);

	$elem = $pq->find('#elem');
	$href = $elem->attr('href');
	var_dump($href);

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parse  $parse
     * @return \Illuminate\Http\Response
     */
    public function show(Parse $parse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parse  $parse
     * @return \Illuminate\Http\Response
     */
    public function edit(Parse $parse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parse  $parse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parse $parse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parse  $parse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parse $parse)
    {
        //
    }
}
