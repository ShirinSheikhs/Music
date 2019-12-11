<?php

namespace App\Http\Controllers\Panel\Music;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Music\Album\StoreAlbumRequest;
use App\Http\Resources\Panel\Music\Album\AlbumIndexResource;
use App\Http\Resources\Panel\Music\Album\AlbumShowResource;
use App\Models\Music\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $albums = Album::paginate();
        return AlbumIndexResource::collection($albums);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response|array
     */
    public function store(StoreAlbumRequest $request)
    {
        //
        $album = new Album();
        $album->setTranslations('name', $request->name);
        $album->fill($request->all());
        $album->save();

        return
            [
                'success' => true,
                'message' => trans('responses.panel.music.album.store'),
            ];
    }

    /**
     * Display the specified resource.
     *
     * @param Album $album
     *
     * @return AlbumShowResource
     */
    public function show(Album $album)
    {
        //
        return new AlbumShowResource($album);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        //
        $album->fill($request->all());
        $album->setTranslations('name',$request->name);
        $album->save();
        return['success'=>true ,
               'message'=>trans('response.panel.music.album.update')];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Album $album
     *
     * @return array
     * @throws \Exception
     */
    public function destroy(Album $album)
    {
        //
        $album->delete();
        return ['success' => true, 'message' => trans('response.panel.music.album.delete')];

    }
    public function restore($id)
    {
        //
        $album=Album::onlyTrashed()->findOrFail($id);
        $album->restore();
        return['success'=>true,'message'=>trans('response.panel.music.album.restore'),['name'=>$album->id]];
    }
    public function list(Request $request)
    {
        $albums= Album::select('id','name');
        if ($request->q){
            $albums->where('name->en','like','%'.$request->q.'%');
        }
        $albums=$albums->get();
        return $albums;
    }
}
