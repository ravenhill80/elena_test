<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Services\GenreService;

class GenresController extends Controller {

    protected $genreService;

    public function __construct(GenreService $genreService) {
        $this->genreService = $genreService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return $this->genreService->listGenres();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreRequest $request) {
        return $this->genreService->storeGenre($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return $this->genreService->showGenre($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GenreRequest $request, $id) {
        return $this->genreService->updateGenre($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        return $this->genreService->destroyGenre($id);
    }

}
