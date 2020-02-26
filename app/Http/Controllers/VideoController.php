<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Course;
use App\Video;

class VideoController extends Controller {

    public function Video() {
        $videoList= Video::with('course')->where('org_id',session::get('org_id'))->get();
        $courseList = Course::where('org_id', session::get('org_id'))->get();
        $returnData = array(
            'videoList' => $videoList,
            'courseList' => $courseList,
        );
        $data['content'] = 'instructor.learning-object.Manage_video';
        return view('layouts.content', compact('data'))->with($returnData);
    }

    public function Add(Request $req) {
        $req->validate([
            'course_id' => 'required',
            'fileType' => 'required',
            'file' => 'required',
            'title' => 'required',
            'description' => 'required',
            'playhaed' => 'required',
            'playback' => 'required',
            'status' => 'required',
        ]);
        $video = new Video;
        $file = '';
        if ($req->fileType == 1) {
            if ($req->file != '') {
                if ($files = $req->file('file')) {
                    $destinationPath = 'public/upload'; // upload path
                    $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                    $path = $files->move($destinationPath, $profileImage);
                    $file = $insert['file'] = "$profileImage";
                }
            }
        } else {
            $file = $req->file;
        }
        $video->org_id = session::get('org_id');
        $video->course_id = $req->course_id;
        $video->title = $req->title;
        $video->description = $req->description;
        $video->link_type = $req->fileType;
        $video->file = $file;
        $video->status = $req->status;
        $video->playhaed = $req->playhaed;
        $video->playback = $req->playback;
        $video->ip_address = $req->ip();
        $video->created_by = session::get('id');
        $data = $video->save();
        if ($data) {
            session()->flash('success','Video Upload Successfull...!');
        } else {
            session()->flash('error','Something Wrong...!');
        }
        return redirect()->back();
    }

}
