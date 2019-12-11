<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Music\SongRepository;
use Illuminate\Http\Request;

class SongController extends Controller
{
    //
    public function index()
    {

    }

    public function show($id)
    {
        return resolve(SongRepository::class)->getSong($id);
    }
}

