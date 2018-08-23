<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Pages;
use App\AdminModel\Website_text;
use KSLAlert;
use View;

class ProfileInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['pages'] = Pages::getAllPages();
        $data['prefix'] = Website_text::where('id_pages', 5)->distinct('prefix')->select('prefix')->get();
        $data['contact'] = Website_text::where('id_pages', 5)->where('prefix', 'contact')->get();
        $data['address'] = Website_text::where('id_pages', 5)->where('prefix', 'address')->get();
        $data['sosmed'] = Website_text::where('id_pages', 5)->where('prefix', 'sosmed')->get();
        return view('admin.profile_information')->with('data', $data);
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
        $text = 'Profile Information for ';
        $length = count((array)$jsData);
        $i = 0;
        foreach ($jsData as $idnya => $value) {
          $website_text = Website_text::find($idnya);
          $website_text->content = $value;
          $website_text->content_en = $value;
          if ($length === 1) {
            $text .= ucwords($website_text->label_en);
          } else {
          ($i === ($length-1)) ? $text = substr($text, 0, -2). ' & '.ucwords($website_text->label_en) : $text .= ucwords($website_text->label_en). ', ';
          }
          $website_text->save();
          $i++;
        }
        $text = $text.' has been updated';
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
