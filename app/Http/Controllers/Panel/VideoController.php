<?php

namespace App\Http\Controllers\Panel;

use Goutte;
use App\Post;
use App\Actor;
use App\Image;
use App\File as Fil;
use App\Writer;
use App\Episode;
use App\Quality;
use App\Category;
use App\Director;
use App\Language;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class VideoController extends Controller
{

    function VideoList(Request $request)
    {

        $music = Post::where('type', 'video')->latest()->get();

        return view('Panel.Video.list', compact(['music']));
    }



    public function Add()
    {


        return view('Panel.Video.add');
    }



    public function Save(Request $request)
    {

        //dd($request->all());
        $slug = Str::slug($request->title);
        $destinationPath = "videos/$slug";
        if (!File::exists($destinationPath)) {

            File::makeDirectory($destinationPath, 0777, true);
        }

        $post = new Post;
        $post->post_author = Auth::guard('admin')->user()->id;
        $post->name = $request->title;
        $post->type = 'video';


        $post->description = $request->desc;


        if ($request->hasFile('poster')) {
            $picextension = $request->file('poster')->getClientOriginalExtension();
            $fileName = 'poster_' . date("Y-m-d") . '_' . time() . '.' . $picextension;
            $request->file('poster')->move(public_path($destinationPath), $fileName);
            $Poster = "$destinationPath/$fileName";
        } else {
            $Poster = '';
        }
        $post->released = Carbon::parse($request->released)->toDateTimeString();
        $post->poster = $Poster;


        if ($post->save()) {
            foreach ($request->categories as $key => $category) {
                if ($id = Category::check($category)) {
                    $post->categories()->attach($id);
                }
            }

            foreach ($request->tags as $key => $tag) {
                if ($id = Tag::check($tag)) {
                    $post->tags()->attach($id);
                }
            }

            foreach ($request->directors as $key => $director) {
                if ($id = Director::check($director)) {
                    $post->directors()->attach($id);
                }
            }

            if ($request->file360p) {
                $filePath = "video";
                if (!File::exists($filePath)) {

                    File::makeDirectory($filePath, 0777, true);
                }
                $extension = $request->file('file360p')->getClientOriginalExtension();
                $fileName = $slug . '_' . date("Y-m-d") . '_' . time() . '_360p.' . $extension;
                $request->file('file360p')->move($filePath, $fileName);
                $filePathToSave = $filePath . "/" . $fileName;


                $post->files()->create(['url' => $filePathToSave, 'type' => 'video', 'quality' => '360p']);

                // $fileNamevideo = $slug . '_' . date("Y-m-d") . '_' . time() . '.' . $extension;
                // //$request->file('file')->move($filePath, $fileNamevideo);
                // $filePath22 = "music/$fileNamevideo";

                // // Storage::disk('ftp')->put($filePath22, fopen($request->file('file'), 'r+'));
                // $conn = ftp_connect(env('FTP_HOST'));
                // $login = ftp_login($conn, env('FTP_USERNAME'), env('FTP_PASSWORD'));
                // ftp_set_option($conn, FTP_USEPASVADDRESS, false);
                // ftp_pasv($conn, true);
                // ftp_put($conn, $filePath22, $_FILES['file']['tmp_name'], FTP_BINARY);
                // ftp_close($conn);
                // $filePath = "files/posts/$request->title/$fileNamevideo";
            }
            if ($request->file720p) {
                $filePath = "video";
                if (!File::exists($filePath)) {

                    File::makeDirectory($filePath, 0777, true);
                }
                $extension = $request->file('file720p')->getClientOriginalExtension();
                $fileName = $slug . '_' . date("Y-m-d") . '_' . time() . '_720p.' . $extension;
                $request->file('file720p')->move($filePath, $fileName);
                $filePathToSave = $filePath . "/" . $fileName;


                $post->files()->create(['url' => $filePathToSave, 'type' => 'video', 'quality' => '720p']);

                // $fileNamevideo = $slug . '_' . date("Y-m-d") . '_' . time() . '.' . $extension;
                // //$request->file('file')->move($filePath, $fileNamevideo);
                // $filePath22 = "music/$fileNamevideo";

                // // Storage::disk('ftp')->put($filePath22, fopen($request->file('file'), 'r+'));
                // $conn = ftp_connect(env('FTP_HOST'));
                // $login = ftp_login($conn, env('FTP_USERNAME'), env('FTP_PASSWORD'));
                // ftp_set_option($conn, FTP_USEPASVADDRESS, false);
                // ftp_pasv($conn, true);
                // ftp_put($conn, $filePath22, $_FILES['file']['tmp_name'], FTP_BINARY);
                // ftp_close($conn);
                // $filePath = "files/posts/$request->title/$fileNamevideo";
            }
            if ($request->file1080p) {
                $filePath = "video";
                if (!File::exists($filePath)) {

                    File::makeDirectory($filePath, 0777, true);
                }
                $extension = $request->file('file1080p')->getClientOriginalExtension();
                $fileName = $slug . '_' . date("Y-m-d") . '_' . time() . '_1080p.' . $extension;
                $request->file('file1080p')->move($filePath, $fileName);
                $filePathToSave = $filePath . "/" . $fileName;


                $post->files()->create(['url' => $filePathToSave, 'type' => 'video', 'quality' => '1080p']);

                // $fileNamevideo = $slug . '_' . date("Y-m-d") . '_' . time() . '.' . $extension;
                // //$request->file('file')->move($filePath, $fileNamevideo);
                // $filePath22 = "music/$fileNamevideo";

                // // Storage::disk('ftp')->put($filePath22, fopen($request->file('file'), 'r+'));
                // $conn = ftp_connect(env('FTP_HOST'));
                // $login = ftp_login($conn, env('FTP_USERNAME'), env('FTP_PASSWORD'));
                // ftp_set_option($conn, FTP_USEPASVADDRESS, false);
                // ftp_pasv($conn, true);
                // ftp_put($conn, $filePath22, $_FILES['file']['tmp_name'], FTP_BINARY);
                // ftp_close($conn);
                // $filePath = "files/posts/$request->title/$fileNamevideo";
            }

            toastr()->success('ویدیو با موفقیت اضافه شد');
            return Redirect::route('Panel.MusicList', ['id' => $post->id]);
        } else {
            return back();
        }
    }

    public function Edit(Post $post)
    {


        return view('Panel.Movies.add', compact(['post']));
    }
}
