<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Page;
use App\Models\SubMenu;
use Illuminate\Http\Request;

class SubMenuController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'menu_id'=>'required',
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
            SubMenu::create([
                'name'=>$request->name,
                'menu_id'=>$request->menu_id,
                'url' => $url,
            ]);
            return back()->with('success', 'Sub Menu created successfully');
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
            $data = SubMenu::findOrFail($id);
            $input = $request->except(['_token', '_method']);
            
            $data->update($input);
            return back()->with('success', 'Sub Menu updated successfully');
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
            $data = SubMenu::findOrFail($id);
            $data->delete();
            return back()->with('success', 'Sub Menu deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
