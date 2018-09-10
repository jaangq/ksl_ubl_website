<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Pages;
use App\AdminModel\Website_text;
use KSLAlert;
use View;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page)
    {
        //
        $data['pages'] = Pages::getAllPages();
        $data['page'] = $page;
        $data['home'] = Pages::where('pages.name_en', $page)->get()[0];
        if ($data['home']->website_text[0]) {
          return view('admin.pages')->with('data', $data);
        }
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
        //
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
        //
        $jsData = json_decode($request->input('jsData'));
        foreach ($jsData as $web_text) {
          $website_text = Website_text::find($web_text[0]);
          $website_text[$web_text[1]] = $web_text[3];
          $website_text->save();
        }
        $text = ucfirst('Text Website has been updated');
        $type = 'success';
        $strongText = 'Successfully !';
        return KSLAlert::makesAlert($text, $type, $strongText);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
