<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Sub_categories;
use App\AdminModel\Categories;
use KSLAlert;
use View;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['sub_categories'] = Sub_categories::where('id', 0)->paginate(4);
        return view('admin.sub_categories')->with('data', $data);
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
        $sub_category = new Sub_categories;
        try{
            $sub_category->name = $jsData->name;
            $sub_category->desc = $jsData->desc;
            $sub_category->name_en = $jsData->name_en;
            $sub_category->desc_en = $jsData->desc_en;
            $sub_category->id_categories = $jsData->id_categories;
            $sub_category->save();

            $text = ucfirst('Sub Category '.$jsData->name_en.' has been added');
            $type = 'success';
            $strongText = 'Successfully !';
            return KSLAlert::makesAlert($text, $type, $strongText);
         }
         catch(\Exception $e){
            // do task when error
            $text = 'Failed to add sub category ';
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
        // This show method is only for Join With Table Master, Not Select Where ID
        $data['sub_categories'] = Sub_categories::join('categories', 'categories.id', '=', 'sub_categories.id_categories')
                                ->where('categories.id', $id)
                                ->select('sub_categories.*', 'categories.id as cat_id')
                                ->orderBy('sub_categories.id', 'DESC')->paginate(3);
        $data['cat_name'] = Categories::find($id);
        return view('admin.sub_categories')->with('data', $data);
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
        $sub_category = Sub_categories::find($id);
        try{
            $sub_category->name = $jsData->name;
            $sub_category->desc = $jsData->desc;
            $sub_category->name_en = $jsData->name_en;
            $sub_category->desc_en = $jsData->desc_en;
            $sub_category->save();

            $text = 'Sub Category '.$sub_category->name.' has been updated';
            $type = 'success';
            $strongText = 'Successfully !';
            return KSLAlert::makesAlert($text, $type, $strongText);
         }
         catch(\Exception $e){
            // do task when error
            $text = 'Failed to update Sub Category';
            $type = 'danger';
            $strongText = 'Error !';
            if (preg_match('/^.+\[(23000)\]/', $e->getMessage(), $match)) {
              $text = 'Sub Category already exists !';
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
        $sub_category = Sub_categories::find($id);
        $name = $sub_category->name;
        $sub_category->delete();

        $text = 'Sub Category '.$name.' has been deleted';
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
        $id = $request->input('idval');
        $data['sub_categories'] = Sub_categories::join('categories', 'categories.id', '=', 'sub_categories.id_categories')
                              ->where('categories.id', $id)
                              ->where(function($where) use ($val) {
                                $where->where('sub_categories.id','LIKE','%'.$val.'%')
                                ->orWhere('sub_categories.name','LIKE','%'.$val.'%')
                                ->orWhere('sub_categories.desc','LIKE','%'.$val.'%')
                                ->orWhere('sub_categories.name_en','LIKE','%'.$val.'%')
                                ->orWhere('sub_categories.desc_en','LIKE','%'.$val.'%')
                                ->orWhere('sub_categories.created_at','LIKE','%'.$val.'%')
                                ->orWhere('sub_categories.updated_at','LIKE','%'.$val.'%');
                              })
                              ->select('sub_categories.*', 'categories.id as cat_id')
                              ->orderBy('id', 'DESC')
                              ->paginate(3);

        $html = View('admin.sub_categories')->with('data', $data)->render();
        die($html);

    }
}
