<?php

namespace App\Http\Controllers;

use App\Video;
use DataTables;
use Illuminate\Http\Request;
use Image;

class VideoController extends Controller
{
     /*
    |--------------------------------------------------------------------------
    | VideoControllers
    |--------------------------------------------------------------------------
    |
    | This controller is used to perform crud operations Video.
    |
    */

     /**
     * This function is used to showing content from Videocontroller.
     */
    public function index(request $request)
    {
        $video = Video::select('*');
        if ($request->ajax()) {
            return DataTables::of($video)
                ->addIndexColumn()
                ->editColumn('thumbnail', function ($row) {
                    $image = '';
                    if ($row->thumbnail) {
                        $image .= " <img title='" . str_replace('"', '', $row->name) . " ' class='pro-img' src='" . url('image/video/' . $row->thumbnail) . "' alt='" . $row->thumbnail . "' width='200px' height='100px'>  ";
                    } else {
                        $image = '<img title="Make a variant first !"  class="img-thumbnail" src="' . Avatar::create(str_replace('"', '', $row->name))->toBase64() . ' " />';
                    }
                    return $image;
                })
                 ->editColumn('title', function ($row) {
                    $title = '';
                    $title .= '<p class="text-dark">' . $row->title . '</p>';
                    $title .= '<p>' . $row->detail . '</p>';
                    return $title;
                })
                ->editColumn('status', function ($row) {
                    $html = '';
                    if ($row->status == 1) {
                        $html .= '<span class="badge badge-success">Active</span>';
                    } elseif ($row->status == 0) {
                        $html .= '<span class="badge badge-danger">Deactive</span>';
                    }
                    return $html;
                })

                ->addColumn('action', 'admin.videos.action')
                ->rawColumns(['thumbnail', 'status', 'action', 'title'])
                ->make(true);
        }
        return view('admin.videos.index');
    }

    /**
     * Show the form for creating a new video.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $video = Video::all();
        return view('admin.videos.create', compact('video'));
    }

    /**
     * Store a newly created resource in video.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required', 'string', 'max:80',
            'title' => 'required',
        ]);
        $input = array_filter($request->all());
        if (!isset($input['status'])) {
            $input['status'] = 0;
        }
        if (!isset($input['subtitle'])) {
            $input['subtitle'] = 0;
        }

        if (!is_dir(public_path() . '/image/video')) {
            mkdir(public_path() . '/image/video');
        }

        if ($file = $request->file('thumbnail')) {
            $optimizeImage = Image::make(strip_tags($file));
            $optimizePath = public_path() . '/image/video/';
            $name = time() . (strip_tags($file))->getClientOriginalName();
            $optimizeImage->save($optimizePath . $name, 72);
            $input['thumbnail'] = $name;
        }

        if (!is_dir(public_path() . '/image/videos')) {
            mkdir(public_path() . '/image/videos');
        }

        $video = array_filter($request->video);
        $name = time() . '.' . $video->getClientOriginalExtension();
        $destinationPath = public_path() . '/image/videos/';
        $video->move($destinationPath, $name);
        $input['video'] = $name;

        if (!is_dir(public_path() . '/image/subtitle')) {
            mkdir(public_path() . '/image/subtitle');
        }
        if ($file = $request->file('sub_t')) {
            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/image/subtitle/';
            $name = time() . $file->getClientOriginalName();
            $optimizeImage->save($optimizePath . $name, 72);
            $input['sub_t'] = $name;
        }
        $input['sub_lang'] = (strip_tags( $request->sub_lang));
        Video::create($input);
        return redirect(route('video.index'));

    }
    /**
     * Show the form for editing the specified video.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $video = Video::find(strip_tags($id));
        if ($request->ajax()) {
            return DataTables::of($comment)
                ->addIndexColumn()
                ->editColumn('comment', function ($row) {
                    return $row->comment;
                })
                ->editColumn('user_id', function ($row) {
                    return $row->username;
                })
                ->addColumn('createdat', function ($row) {
                    $datetime = Carbon::parse($row->created_at)->format("d-m-y  H:i A");
                    return "<p>$datetime</p>";
                })
                ->addColumn('action', 'admin.video.comment')
                ->rawColumns(['action', 'comment', 'user_id', 'createdat'])
                ->make(true);
                }
                return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified video in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video = Video::find($id);
        $input = array_filter($request->all());
        if (!isset($input['status'])) {
            $input['status'] = 0;
        }
        if (!isset($input['subtitle'])) {
            $input['subtitle'] = 0;
        }
        if ($file = $request->file('thumbnail')) {
            $optimizeImage = Image::make($file);
            $optimizePath = public_path() . '/image/video/';
            $name = time() . $file->getClientOriginalName();
            if ($video->thumbnail != '') {
                $image_file = @file_get_contents(public_path() . '/image/video/' . $video->thumbnails);
                if ($image_file) {
                    unlink(public_path() . '/image/video/' . $video->video);
                }
            }
            $optimizeImage->save($optimizePath . $name, 70);
            $input['thumbnails'] = $name;
        }
        $sub_t = $request->sub_t;
        if ($request->hasFile('sub_t')) {
            $name = $sub_t->getClientOriginalName();
            $sub_t->move(public_path() . '/image/subtitle/', $name);
            if ($video->sub_t != '') {
                $image_file = @file_get_contents(public_path() . '/image/subtitle/' . $video->sub_t);
                if ($image_file) {
                    unlink(public_path() . '/image/subtitle/' . $video->sub_t);
                    $input['sub_t'] = $name;
                }
            }
        }
        $input['sub_lang'] = $request->sub_lang;
        $video->update($input);
        toastr()->info(__('Video has been updated'));
        return redirect(route('video.index'));
    }

    /**
     * Remove the specified video from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();
        return redirect()->route('video.index')
            ->with('success', (__('video deleted successfully')));
    }
}
