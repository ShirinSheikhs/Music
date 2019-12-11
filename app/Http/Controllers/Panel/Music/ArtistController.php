<?php

namespace App\Http\Controllers\Panel\Music;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Music\Artist\StoreArtistRequest;
use App\Http\Requests\Panel\Music\Artist\UpdateArtistRequest;
use App\Http\Resources\Panel\Music\Artist\ArtistIndexResource;
use App\Http\Resources\Panel\Music\Artist\ArtistShowResource;
use App\Models\Music\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|object
     */
    public function index()
    {
        //

//       cache()->remember('artists', now()->addSeconds(4), function (){
//           $artists=Artist::with('songs')->paginate();
//           return ArtistIndexResource::collection($artists);
//       });
//        if ($response=cache()->pull('artists')){

    //        return $response;}
        $artists=Artist::with('songs')->paginate();
        $response= ArtistIndexResource::collection($artists);
      cache()->put('artists',$response,now()->addSeconds(10));
      return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreArtistRequest $request
     *
     * @return array
     */
    public function store(StoreArtistRequest $request)
    {
//        $local=$request->headers->get('accept-language');
//      app()->setLocale($local);
        $artist=new Artist();
        $artist->setTranslations('name',$request->name);
        $artist->fill($request->all());
        $artist->save();

        return
            [ 'success'=>true ,
                'message'=>trans('responses.panel.music.artist.store')
              ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Music\Artist  $artist
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        //
        return new ArtistShowResource($artist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateArtistRequest      $request
     * @param \App\Models\Music\Artist $artist
     *
     * @return array
     */
    public function update(UpdateArtistRequest $request, Artist $artist)
    {
        //
        $artist->fill($request->all());
        $artist->setTranslations('name',$request->name);
        $artist->save();
         return['success'=>true ,
                'message'=>trans('response.panel.music.artist.update')];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Music\Artist $artist
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Artist $artist)
    {
        //
        $artist->delete();
        return['success'=>true,'message'=>trans('response.panel.music.artist.delete')];

    }
    public function restore($id)
    {
        //
        $artist=Artist::onlyTrashed()->findOrFail($id);
        $artist->restore();
        return['success'=>true,'message'=>trans('response.panel.music.artist.restore'),['name'=>$artist->id]];
    }
    public function list(Request $request)
    {
       $artists= Artist::select('id','name');
       if ($request->q){
           $artists->where('name->en','like','%'.$request->q.'%');
       }
       $artists=$artists->get();
       return $artists;
    }
}
