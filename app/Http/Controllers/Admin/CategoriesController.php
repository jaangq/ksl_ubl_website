<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Categories;
use App\AdminModel\Pages;
use KSLAlert;
use View;

class CategoriesController extends Controller
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
        $data['categories'] = Categories::orderBy('id', 'DESC')->paginate(4);
        return view('admin.categories')->with('data', $data);
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
        $category = new Categories;
        try{
            $category->name = $jsData->name;
            $category->desc = $jsData->desc;
            $category->name_en = $jsData->name_en;
            $category->desc_en = $jsData->desc_en;
            $category->save();

            $text = ucfirst('Category '.$jsData->name_en.' has been added');
            $type = 'success';
            $strongText = 'Successfully !';
            return KSLAlert::makesAlert($text, $type, $strongText);
         }
         catch(\Exception $e){
            // do task when error
            $text = 'Failed to add category';
            $type = 'danger';
            $strongText = 'Error !';
            if (preg_match('/^.+\[(23000)\]/', $e->getMessage(), $match)) {
              $text = 'Category already exists !';
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
        $category = Categories::find($id);
        try{
            $category->name = $jsData->name;
            $category->desc = $jsData->desc;
            $category->name_en = $jsData->name_en;
            $category->desc_en = $jsData->desc_en;
            $category->save();

            $text = 'Category '.$category->name.' has been updated';
            $type = 'success';
            $strongText = 'Successfully !';
            return KSLAlert::makesAlert($text, $type, $strongText);
         }
         catch(\Exception $e){
            // do task when error
            $text = 'Failed to update category';
            $type = 'danger';
            $strongText = 'Error !';
            if (preg_match('/^.+\[(23000)\]/', $e->getMessage(), $match)) {
              $text = 'Category already exists !';
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
        $category = Categories::find($id);
        $name = $category->name;
        $category->delete();

        $text = 'Category '.$name.' has been deleted';
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

        $data['pages'] = Pages::getAllPages();
        $data['categories'] = Categories::where('id','LIKE','%'.$val.'%')
                          ->orWhere('name','LIKE','%'.$val.'%')
                          ->orWhere('desc','LIKE','%'.$val.'%')
                          ->orWhere('name_en','LIKE','%'.$val.'%')
                          ->orWhere('desc_en','LIKE','%'.$val.'%')
                          ->orWhere('created_at','LIKE','%'.$val.'%')
                          ->orWhere('updated_at','LIKE','%'.$val.'%')
                          ->orderBy('id', 'DESC')
                          ->paginate(4);
        $html = View('admin.categories')->with('data', $data)->render();
        die($html);

    }
}
