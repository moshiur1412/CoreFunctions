<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileUpload;


class FileUploadController extends Controller
{
    public function fileCreate(){

    	return view('file_uploads.index');
    }

    public function fileStore(Request $request){

    	$image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);
         
        $fileUpload = new FileUpload();
        $fileUpload->filename = $imageName;
        $fileUpload->save();
        return response()->json(['success'=>$imageName]);

    }


    public function fileDestroy(Request $request){
    	$filename =  $request->get('filename');
       FileUpload::where('filename',$filename)->delete();
       $path=public_path().'/images/'.$filename;
       
       if (file_exists($path)) {
           unlink($path);
       }
       return $filename; 
   }


}
