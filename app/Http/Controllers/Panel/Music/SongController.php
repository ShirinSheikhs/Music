<?php

namespace App\Http\Controllers\Panel\Music;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Music\Song\StoreSongRequest;
use App\Http\Resources\Panel\Music\Song\SongIndexResource;
use App\Http\Resources\Panel\Music\Song\SongShowResource;
use App\Models\Music\song;
use http\Exception;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $songs=\App\Models\Music\Song::paginate();

        $songs=\App\Models\Music\Song::all();
        $songs->load('artists');
        return SongIndexResource::collection($songs);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSongRequest $request
     *
     * @return array
     */
    public function store(StoreSongRequest $request)
    {
        //
        \DB::beginTransaction();
        try {
            $song=new \App\Models\Music\Song();


            $song->fill($request->all());
            $song->setTranslations('name',$request->name);
            $song->save();
            $song->artists()->attach($request->artist);
            \DB::commit();
        }catch (\Exception $exception){
            \DB::rollback();
        \Log::info($exception->getMessage());
        return[ 'success'=>false ,
                'message'=>'error',];}
        return[ 'success'=>true ,
                'message'=>trans('responses.panel.music.song.store'),];
      }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User\song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(song $song)
    {
        //
        return new SongShowResource($song);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User\song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, song $song)
    {
        //
        $song->fill($request->all());
        $song->setTranslations('name',$request->name);
        $song->save();
        return['success'=>true ,
               'message'=>trans('response.panel.music.song.update')];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User\song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        //
        $song->delete();
        return['success'=>true,'message'=>trans('response.panel.music.song.delete')];

    }

    public function restore($id){
      $song=Song::onlyTrashed()->findOrFail($id);
      $song->restore();
        return ['success'=>true ,'message'=>trans('response.panel.music.song.delete')];

    }
    public function list(Request $request){
        $songs= Song::select('id','name');
        if ($request->q){
            $songs->where('name->en','like','%'.$request->q.'%');
        }
        $songs=$songs->get();
        return $songs;

    }
}
