<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use App\AboutUs;
use Image;

class AboutUsController extends Controller
{
    public function aboutus_Banner()
    {
        return view('admin.aboutus.aboutus_banner.add_aboutus_banner');
    }


    public function add_aboutus_Banner(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            $aboutus_banner = new AboutUs;
            $aboutus_banner->banner_name = $data['banner_name'];

    // Upload Image
            if($request->hasFile('banner_image')){
                $image_tmp = $request->file('banner_image');
                if($image_tmp->isValid()){
    // image path code
                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $aboutus_banner_path = 'uploads/aboutus_banners/'.$fileName;
    //image resize
                Image::make($image_tmp)->save($aboutus_banner_path);
                $aboutus_banner->banner_image = $fileName;
                }
            }
            $aboutus_banner->save();
            return redirect('/admin/aboutus_banner/')->with('flash_message_success','aboutus_Banners has been uploaded successfully!!');
        }
        return view('admin.aboutus.aboutus_banner.add_aboutus_banner');
    }

    //view banners
    public function view_aboutus_Banner()
    {
        $aboutus_banner  = AboutUs::get();
        return view('admin.aboutus.aboutus_banner.view_aboutus_banner')->with(compact('aboutus_banner'));
        
    }

    //edit banners
    public function edit_aboutus_Banner(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            // Upload Image


            if($request->hasFile('banner_image')){
                $image_tmp = $request->file('banner_image');
                if ($image_tmp->isValid()){
                // Upload Images after Resize
                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $aboutus_banner_path = 'uploads/aboutus_banners/'.$fileName;
                Image::make($image_tmp)->save($aboutus_banner_path); 
            }
            }else if(!empty($data['current_banner_image'])){
                $fileName = $data['current_banner_image'];
            }else{
                $fileName = '';
            }
            AboutUs::where('id',$id)->update(['banner_name'=>$data['banner_name'],'banner_image'=>$fileName]);
            return redirect('/admin/aboutus_banner')->with('flash_message_success','Banner has been edited Successfully');
        }
            $aboutusbannerDetails = AboutUs::where(['id'=>$id])->first();
            return view('admin.aboutus.aboutus_banner.edit_aboutus_banner')->with(compact('aboutusbannerDetails'));
    }

//Delete banners
public function delete_aboutus_Banner($id=null)
{
    AboutUs::where(['id'=>$id])->delete();
    Alert::success('Deleted Successfully', 'Success Message');
    return redirect()->back()->with('flash_message_error','Banners Delete Successfully');
}



//About Us Section

    public function aboutus_service()
    {
        return view('admin.aboutus.aboutus_service.add_aboutus_service');
    }


    public function add_aboutus_service(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            $aboutus_service = new AboutUs;
            $aboutus_service->service_title = $data['service_title'];
            $aboutus_service->service_intro = $data['service_intro'];
            $aboutus_service->service_description = $data['service_description'];

    // Upload Image
            if($request->hasFile('service_image')){
                $image_tmp = $request->file('service_image');
                if($image_tmp->isValid()){
    // image path code
                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $aboutus_service_path = 'uploads/aboutus_services/'.$fileName;
    //image resize
                Image::make($image_tmp)->save($aboutus_service_path);
                $aboutus_service->service_image = $fileName;
                }
            }
            $aboutus_service->save();
            return redirect('/admin/aboutus_service/')->with('flash_message_success','aboutus_services has been uploaded successfully!!');
        }
        return view('admin.aboutus.aboutus_service.add_aboutus_service');
    }

    //view services
    public function view_aboutus_service()
    {
        $aboutus_service  = AboutUs::get();
        return view('admin.aboutus.aboutus_service.view_aboutus_service')->with(compact('aboutus_service'));
        
    }

    //edit services
    public function edit_aboutus_service(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            // Upload Image


            if($request->hasFile('service_image')){
                $image_tmp = $request->file('service_image');
                if ($image_tmp->isValid()){
                // Upload Images after Resize
                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $aboutus_service_path = 'uploads/aboutus_services/'.$fileName;
                Image::make($image_tmp)->save($aboutus_service_path); 
            }
            }else if(!empty($data['current_service_image'])){
                $fileName = $data['current_service_image'];
            }else{
                $fileName = '';
            }
            AboutUs::where('id',$id)->update(['service_title'=>$data['service_title'],
            'service_intro'=>$data['service_intro'],
            'service_description'=>$data['service_description'],
            'service_image'=>$fileName]);
            return redirect('/admin/aboutus_service')->with('flash_message_success','service has been edited Successfully');
        }
            $aboutusserviceDetails = AboutUs::where(['id'=>$id])->first();
            return view('admin.aboutus.aboutus_service.edit_aboutus_service')->with(compact('aboutusserviceDetails'));
    }

    //Delete services
    public function delete_aboutus_service($id=null)
    {
    AboutUs::where(['id'=>$id])->delete();
    Alert::success('Deleted Successfully', 'Success Message');
    return redirect()->back()->with('flash_message_error','services Delete Successfully');
    }


    //Testominial

    public function aboutus_testimonial()
    {
        return view('admin.aboutus.aboutus_testimonial.add_aboutus_testimonial');
    }


    public function add_aboutus_testimonial(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            $aboutus_testimonial = new AboutUs;
            $aboutus_testimonial->testimonial_title = $data['testimonial_title'];
            $aboutus_testimonial->testimonial_feedback = $data['testimonial_feedback'];
            $aboutus_testimonial->testimonial_name = $data['testimonial_name'];
            $aboutus_testimonial->testimonial_post = $data['testimonial_post'];

    // Upload Image
            if($request->hasFile('testimonial_image')){
                $image_tmp = $request->file('testimonial_image');
                if($image_tmp->isValid()){
    // image path code
                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $aboutus_testimonial_path = 'uploads/aboutus_testimonials/'.$fileName;
    //image resize
                Image::make($image_tmp)->save($aboutus_testimonial_path);
                $aboutus_testimonial->testimonial_image = $fileName;
                }
            }
            $aboutus_testimonial->save();
            return redirect('/admin/aboutus_testimonial/')->with('flash_message_success','aboutus_testimonials has been uploaded successfully!!');
        }
        return view('admin.aboutus.aboutus_testimonial.add_aboutus_testimonial');
    }

    //view testimonials
    public function view_aboutus_testimonial()
    {
        $aboutus_testimonial  = AboutUs::get();
        return view('admin.aboutus.aboutus_testimonial.view_aboutus_testimonial')->with(compact('aboutus_testimonial'));
        
    }

    //edit testimonials
    public function edit_aboutus_testimonial(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            // Upload Image


            if($request->hasFile('testimonial_image')){
                $image_tmp = $request->file('testimonial_image');
                if ($image_tmp->isValid()){
                // Upload Images after Resize
                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $aboutus_testimonial_path = 'uploads/aboutus_testimonials/'.$fileName;
                Image::make($image_tmp)->save($aboutus_testimonial_path); 
            }
            }else if(!empty($data['current_testimonial_image'])){
                $fileName = $data['current_testimonial_image'];
            }else{
                $fileName = '';
            }
            AboutUs::where('id',$id)->update(['testimonial_title'=>$data['testimonial_title'],
            'testimonial_feedback'=>$data['testimonial_feedback'],
            'testimonial_name'=>$data['testimonial_name'],
            'testimonial_post'=>$data['testimonial_post'],
            'testimonial_image'=>$fileName]);
            return redirect('/admin/aboutus_testimonial')->with('flash_message_success','testimonial has been edited Successfully');
        }
            $aboutustestimonialDetails = AboutUs::where(['id'=>$id])->first();
            return view('admin.aboutus.aboutus_testimonial.edit_aboutus_testimonial')->with(compact('aboutustestimonialDetails'));
    }

    //Delete testimonials
    public function delete_aboutus_testimonial($id=null)
    {
    AboutUs::where(['id'=>$id])->delete();
    Alert::success('Deleted Successfully', 'Success Message');
    return redirect()->back()->with('flash_message_error','testimonials Delete Successfully');
    }


    
    //Staff

    public function aboutus_staff()
    {
        return view('admin.aboutus.aboutus_staff.add_aboutus_staff');
    }


    public function add_aboutus_staff(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            $aboutus_staff = new AboutUs;
            $aboutus_staff->staff_name = $data['staff_name'];
            $aboutus_staff->staff_post = $data['staff_post'];

    // Upload Image
            if($request->hasFile('staff_image')){
                $image_tmp = $request->file('staff_image');
                if($image_tmp->isValid()){
    // image path code
                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $aboutus_staff_path = 'uploads/aboutus_staffs/'.$fileName;
    //image resize
                Image::make($image_tmp)->save($aboutus_staff_path);
                $aboutus_staff->staff_image = $fileName;
                }
            }
            $aboutus_staff->save();
            return redirect('/admin/aboutus_staff/')->with('flash_message_success','aboutus_staffs has been uploaded successfully!!');
        }
        return view('admin.aboutus.aboutus_staff.add_aboutus_staff');
    }

    //view staffs
    public function view_aboutus_staff()
    {
        $aboutus_staff  = AboutUs::get();
        return view('admin.aboutus.aboutus_staff.view_aboutus_staff')->with(compact('aboutus_staff'));
        
    }

    //edit staffs
    public function edit_aboutus_staff(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            // Upload Image


            if($request->hasFile('staff_image')){
                $image_tmp = $request->file('staff_image');
                if ($image_tmp->isValid()){
                // Upload Images after Resize
                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $aboutus_staff_path = 'uploads/aboutus_staffs/'.$fileName;
                Image::make($image_tmp)->save($aboutus_staff_path); 
            }
            }else if(!empty($data['current_staff_image'])){
                $fileName = $data['current_staff_image'];
            }else{
                $fileName = '';
            }
            AboutUs::where('id',$id)->update([
            'staff_name'=>$data['staff_name'],
            'staff_post'=>$data['staff_post'],
            'staff_image'=>$fileName]);
            return redirect('/admin/aboutus_staff')->with('flash_message_success','staff has been edited Successfully');
        }
            $aboutusstaffDetails = AboutUs::where(['id'=>$id])->first();
            return view('admin.aboutus.aboutus_staff.edit_aboutus_staff')->with(compact('aboutusstaffDetails'));
    }

    //Delete staffs
    public function delete_aboutus_staff($id=null)
    {
    AboutUs::where(['id'=>$id])->delete();
    Alert::success('Deleted Successfully', 'Success Message');
    return redirect()->back()->with('flash_message_error','staffs Delete Successfully');
    }

}
