<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use DB;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $sliders = DB::table('sliders')->orderBy('slider_title', 'ASC')->get();
        return view("backend.slider.index", ['sliders' => $sliders]);
    }
    
    public function create(){
        return view("backend.slider.create");
    }    
    public function add(Request $request){
        $request->validate([
            'slider_title' => 'required',
            'btn_link' => 'required',
            'btn_title' => 'required',
        ]);

        $data = array();
        $data['slider_title'] = $request->slider_title;
        $data['slider_description'] = $request->slider_description;
        $data['btn_link'] = $request->btn_link;
        $data['btn_title'] = $request->btn_title;
        if($request->has('status') == 1){
            $data['status'] = true;
        }else{
            $data['status'] = false;
        }
        $image = $request->file('image');
        if ($image) {
            $image_name = Str::random(5);
            $sliderTitle = $request->slider_title;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $sliderTitle.'-'.$image_name.'.'.$ext;
            $upload_path = 'upload/sliders/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            if ($success) {
                $data['image'] = $image_url;
                $insert_product = DB::table("sliders")->insert($data);
                if ($insert_product) {
                    Toastr::success('Data Successfully Added', 'Success');
                    return redirect()->back();
                }
            }
        }
        $data['image'] = 'upload/sliders/default.png';
        $insert_slider = DB::table("sliders")->insert($data);
        if ($insert_slider) {
            Toastr::success('Data Successfully Added', 'Success');
            return redirect()->back();
        }else{
            Toastr::success('Data faild', 'Success');
            return redirect()->back();
        }
    }

    public function edit($id){
        $slider = DB::table('sliders')->where('id', $id)->first();
        return view("backend.slider.edit", ['slider' => $slider]);
    }

    public function update(Request $request, $id){
        $product = DB::table('sliders')->where('id', $id)->first();
        $request->validate([
            'slider_title' => 'required',
            'btn_link' => 'required',
            'btn_title' => 'required',
        ]);
        $data = array();
        $data['slider_title'] = $request->slider_title;
        $data['slider_description'] = $request->slider_description;
        $data['btn_link'] = $request->btn_link;
        $data['btn_title'] = $request->btn_title;
        if($request->has('status') == 1){
            $data['status'] = true;
        }else{
            $data['status'] = false;
        }
        $image = $request->file('image');

        if ($image) {
            $image_name = Str::random(5);
            $sliderTitle = $request->slider_title;
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $sliderTitle.'-'.$image_name.'.'.$ext;
            $upload_path = 'upload/sliders/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            if ($success) {
                $data['image'] = $image_url;
                $img = DB::table('sliders')->where('id', $id)->first();
                $img_path = $img->image;
                if($img_path){
                    $done = unlink($img_path);
                }
                $save = DB::table('sliders')->where('id', $id)->update($data);
                if ($save) {
                    Toastr::success('Data Successfully Updated', 'Success');
                    return redirect()->back();
                }
            }
        }else{
            $oldPhoto = $request->old_photo;
                if ($oldPhoto) {
                $data['image'] = $oldPhoto;
                $save = DB::table('sliders')->where('id', $id)->update($data);
                if ($save) {
                    Toastr::success('Data Successfully Updated', 'Success');
                    return redirect()->back();
                }
                return redirect()->back();
            }
        }
    }

    public function delete($id){
        $get_image = DB::table('sliders')->where('id', $id)->first();
        $delete_image = $get_image->image;
        if($delete_image){
            \unlink($delete_image);
        }
        $delete_slider = DB::table('sliders')->where('id', $id)->delete();
        if ($delete_slider) {
            Toastr::success('Data Successfully deleted', 'Success');
            return redirect()->back();
        }
    }

    public function sliderApproval($id){
        $cat_status = DB::table('sliders')->where('id', $id)->first();
        if($cat_status->status == true){
           $published = DB::table('sliders')
                        ->where('id', $id)
                        ->update(['status' => false]);
            if ($published) {
                Toastr::success('Data Successfully Updated', 'Success');
                return redirect()->back();
            }
        }else{
            $unpublished = DB::table('sliders')
                        ->where('id', $id)
                        ->update(['status' => true]);
            if ($unpublished) {
                Toastr::success('Data Successfully Updated', 'Success');
                return redirect()->back();
            }
        }
        
    }
}
