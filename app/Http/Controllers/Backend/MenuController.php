<?php

namespace App\Http\Controllers\Backend;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Page;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allData = Menu::get();
        $blogCategory = BlogCategory::where('status',1)->pluck('title','id');
        $pages = Page::where('status',1)->pluck('title','id');
        return view('backend.settings.menu.index', compact('allData','blogCategory','pages'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        try{
            $url = $request->url;

            if($request->type==2){
                $page = Page::findOrFail($request->page_id);
                $url = 'pages/'.$page->slug;
            }else if($request->type==3){
                $category = BlogCategory::findOrFail($request->category_id);
                $url = 'blog/'.$category->slug;
            }
            Menu::create([
                'name'=>$request->name,
                'url' => $url,
            ]);
            return back()->with('success', 'Menu created successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'url'=>'required',
        ]);

        try {
            $data = Menu::findOrFail($id);
            $input = $request->except(['_token', '_method']);
            
            $data->update($input);
            return back()->with('success', 'Menu updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = Menu::findOrFail($id);
            $data->delete();
            return back()->with('success', 'Menu deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
