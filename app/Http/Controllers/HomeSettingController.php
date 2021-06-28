<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use App\HomeSetting;
use Image;

class HomeSettingController extends Controller
{
    public function homesettings()
    {
        return view('admin.homesetting.homesettings');
    }

    public function addhomesetting(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            $homesetting = new HomeSetting;
            $homesetting->address = $data['address'];
            $homesetting->phone_no = $data['phone_no'];
            $homesetting->gmail = $data['gmail'];
            $homesetting->facebook = $data['facebook'];
            $homesetting->twitter = $data['twitter'];
            $homesetting->instagram = $data['instagram'];
            $homesetting->youtube = $data['youtube'];
            $homesetting->tiktok = $data['tiktok'];

    // Upload Image
            if($request->hasFile('image')){
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
    // image path code
                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $homesetting_path = 'uploads/homesettings/'.$fileName; 
    //image resize
                Image::make($image_tmp)->save($homesetting_path);
                $homesetting->image = $fileName;
                }
            }
            $homesetting->save();
            return redirect('/admin/homesettings/')->with('flash_message_success','homesettings has been uploaded successfully!!');
        }
        return view('admin.homesetting.add_homesetting');
    }

//view homesettings
    public function viewhomesetting()
    {
        $homesettingDetails  = HomeSetting::get();
        return view('admin.homesetting.homesettings')->with(compact('homesettingDetails'));
        
    }

//edit homesettings
public function edithomesetting(Request $request, $id=null){
    if($request->isMethod('post')){
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;
        // Upload Image
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if ($image_tmp->isValid()){
            // Upload Images after Resize
            $extension = $image_tmp->getClientOriginalExtension();
            $fileName = rand(111,99999).'.'.$extension;
            $homesetting_path = 'uploads/homesettings/'.$fileName;
            Image::make($image_tmp)->save($homesetting_path); 
        }
        }else if(!empty($data['current_image'])){
            $fileName = $data['current_image'];
        }else{
            $fileName = '';
        }
        HomeSetting::where('id',$id)->update(['address'=>$data['address'],
        'phone_no'=>$data['phone_no'],'gmail'=>$data['gmail'],'facebook'=>$data['facebook'],'twitter'=>$data['twitter'],'instagram'=>$data['instagram'],'youtube'=>$data['youtube'],'tiktok'=>$data['tiktok'],'image'=>$fileName]);
        return redirect('/admin/homesettings')->with('flash_message_success','homesetting has been edited Successfully');
    }
        $homesettingDetails = HomeSetting::where(['id'=>$id])->first();
        return view('admin.homesetting.edit_homesetting')->with(compact('homesettingDetails'));
}

//Delete homesettings
public function deletehomesetting($id=null)
{
    HomeSetting::where(['id'=>$id])->delete();
    Alert::success('Deleted Successfully', 'Success Message');
    return redirect()->back()->with('flash_message_error','homesettings Delete Successfully');
}

// public function updateStatus(Request $request, $id=null)
//     {
//         $data = $request->all();
//         HomeSetting::where('id',$data['id'])->update(['status'=>$data['status']]);
//     }


}
