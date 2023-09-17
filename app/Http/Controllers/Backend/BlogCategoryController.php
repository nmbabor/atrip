<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $allData = BlogCategory::get();
        return view('backend.blog.category', compact('allData'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        try{
            $input = [
                'name' => $request->name, 
                'url' => $request->url,
                'serial_num' => $request->serial_num,
            ];
            if($request->type==1){
                if($request->name == ''){
                    return redirect()->back()->with('error','Name can not be null.');
                }
                if($request->url == ''){
                    return redirect()->back()->with('error','Menu URL can not be null.');
                }
            }elseif($request->type==2){
                $page = Page::findOrFail($request->page_id);
                $input = [
                    'name' => $page->title, 
                    'url' =>'pages/'.$page->slug, 
                    'serial_num' => $request->serial_num,
                ];
            }else if($request->type==3){
                $category = BlogCategory::findOrFail($request->category_id);
                $input = [
                    'name' => $category->title, 
                    'url' =>'blogs/'.$category->slug, 
                    'serial_num' => $request->serial_num,
                ];
            }
            Menu::create($input);
            return back()->with('success', 'Menu created successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function serialUpdate(Request $request)
    {
        
        try {
            foreach($request->position as $i => $id){
                Menu::where('id',$id)->update(['serial_num'=>$i]);
            }
            return response()->json('Menu updated successfully',200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(),403);
        }
    }
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
