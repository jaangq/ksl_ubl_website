<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Tags;
use KSLAlert;
use View;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['tags'] = Tags::orderBy('id', 'DESC')->paginate(3);
        return view('admin.tags')->with('data', $data);
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
        $jsData = json_decode($request->input('jsData'));
        $tag = new Tags;
        try{
            $tag->name = $jsData->name;
            $tag->desc = $jsData->desc;
            $tag->name_en = $jsData->name_en;
            $tag->desc_en = $jsData->desc_en;
            $tag->save();

            $text = ucfirst('Tag '.$jsData->name_en.' has been added');
            $type = 'success';
            $strongText = 'Successfully !';
            return KSLAlert::makesAlert($text, $type, $strongText);
         }
         catch(\Exception $e){
            // do task when error
            $text = 'Failed to add tag';
            $type = 'danger';
            $strongText = 'Error !';
            if (preg_match('/^.+\[(23000)\]/', $e->getMessage(), $match)) {
              $text = 'Tags already exists !';
            }
            return KSLAlert::makesAlert($text, $type, $strongText);
         }
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
        $tag = Tags::find($id);
        try{
            $tag->name = $jsData->name;
            $tag->desc = $jsData->desc;
            $tag->name_en = $jsData->name_en;
            $tag->desc_en = $jsData->desc_en;
            $tag->save();

            $text = 'Tag '.$tag->name.' has been updated';
            $type = 'success';
            $strongText = 'Successfully !';
            return KSLAlert::makesAlert($text, $type, $strongText);
         }
         catch(\Exception $e){
            // do task when error
            $text = 'Failed to update user';
            $type = 'danger';
            $strongText = 'Error !';
            if (preg_match('/^.+\[(23000)\]/', $e->getMessage(), $match)) {
              $text = 'Tag already exists !';
            }
            return KSLAlert::makesAlert($text, $type, $strongText);
         }
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
        $tag = Tags::find($id);
        $name = $tag->name;
        $tag->delete();

        $text = 'Tag '.$name.' has been deleted';
        $type = 'success';
        $strongText = 'Successfully !';
        return KSLAlert::makesAlert($text, $type, $strongText);
    }

    /**
     * Display a listing of the resource by searched data.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //
        $val = $request->input('val');

        $data['tags'] = Tags::where('id','LIKE','%'.$val.'%')
                          ->orWhere('name','LIKE','%'.$val.'%')
                          ->orWhere('desc','LIKE','%'.$val.'%')
                          ->orWhere('name_en','LIKE','%'.$val.'%')
                          ->orWhere('desc_en','LIKE','%'.$val.'%')
                          ->orWhere('created_at','LIKE','%'.$val.'%')
                          ->orWhere('updated_at','LIKE','%'.$val.'%')
                          ->orderBy('id', 'DESC')
                          ->paginate(3);
        $html = View('admin.tags')->with('data', $data)->render();
        die($html);

    }
}
