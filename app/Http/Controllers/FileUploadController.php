<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\FileAws;
use Carbon\Carbon;
 
class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //get data table file_aws
        $contents = FileAws::all();
        return view('index', compact('contents'));
    }

    public function imageUpload()
    {
        return view('welcome');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //set nama image yg diupload
        $imageName = time() . $request->image->getClientOriginalName();  

        //push ke local storage
        $request->file('image')->storeAs('public', $imageName);

        //push ke bucket aws
        $filePath = 'images/' . $imageName;
        Storage::disk('s3')->put($filePath, file_get_contents($request->image));

        $link_storage = '../storage/'.$imageName;
        
  
        /* Store $imageName name in DATABASE from HERE */
        $log=FileAws::create([
            'foto'=>$imageName,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image', $link_storage); 
    }

    public function imageDelete($id)
    {
        //get data yg akan dihapus
        $data = FileAws::find($id);
        //delete di bucket aws
        $s3 = Storage::disk('s3');
        $s3->delete('images/'.$data->foto);
        //delete di storage local
        if(\File::exists('storage/'.$data->foto)){
            \File::delete('storage/'.$data->foto);
        }
        $data->delete();
        return back()
            ->with('success','You have successfully upload image.'); 
    }

    public function imageDownload($id)
    {
        try{
            $data = FileAws::find($id);
            return Storage::disk('s3')->download('images/'. $data->foto);
        }catch(\Exception $e){
            return $e->getMessage();
        }
        
        
    }
}
