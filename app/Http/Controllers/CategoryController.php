<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Category;
class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $category = new Category;
            $category->name = $data['category_name'];
            $category->slug = str_slug($request->category_name); 
            $category->parent_id = $data['parent_id'];
            $category->url = $data['category_url'];
            $category->description = $data['category_description'];
            $category->save();
            return redirect('/admin/view-categories/')->with('flash_message_success','Category has been uploaded successfully!!');
        }
        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.category.add_Category')->with(compact('levels'));
    }

    public function viewCategories()
    {
        $categories = Category::get();
        return view('admin.category.view_category')->with(compact('categories'));
        
    }
//edit category
    public function editCategory(Request $request, $id=null)
    {
        if($request->isMethod('post')){
            $data = $request->all();

            Category::where(['id'=>$id])->update([ 'name'=>$data['category_name'],
            'parent_id'=>$data['parent_id'],'description'=>$data['category_description'],'url'=>$data['category_url']]);

            return redirect('/admin/view-categories')->with('flash_message_success','Category has been updated successfully!!');
          }
          $levels = Category::where(['parent_id'=>0])->get();
          $categoryDetails = Category::where(['id'=>$id])->first();
        return view('admin.category.edit_category')->with(compact('levels','categoryDetails'));
    }


    // Delete product
    public function deleteCategory($id=null)
    {
        Category::where(['id'=>$id])->delete();
        Alert::success('Deleted Successfully', 'Success Message');
        return redirect()->back();
    }
    
    public function updateStatus(Request $request, $id=null)
    {
        $data = $request->all();
        Category::where('id',$data['id'])->update(['status'=>$data['status']]);
    }

    public function latestCategory(Request $request, $id=null)
    {
        $data = $request->all();
        Category::where('id',$data['id'])->update(['latest_category'=>$data['latest_category']]);
    }

}
