<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class recipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allRecipes = Recipe::all();

        return [
            'status' => 200,
            'data' => $allRecipes
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $recipe = $request->validate([
            'title' => 'required',
            'readyInMinutes' => 'required',
            'summary' => 'required',
            'vegetarian' => 'required',
            'instructions' => 'required',
            'sourceUrl' => 'required',
            'image' => 'required'
        ]);
        
        $newRecipe = Recipe::create($recipe);
        
        
        
        // $newRecipe = new Recipe;
        // $newRecipe->title = $request->title;
        // $newRecipe->readyInMinutes = $request->readyInMinutes;
        // $newRecipe->summary = $request->summary;
        // $newRecipe->vegetarian = $request->vegetarian;
        // $newRecipe->instructions = $request->instructions;
        // $newRecipe->sourceUrl = $request->sourceUrl;
        // $newRecipe->image = $request->image;
        
        // $newRecipe->save();
        
        error_log($newRecipe);


        return [
            'status' => 200,
            'title' => $newRecipe
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oneRecipe = Recipe::where('id', $id)->get();

        return [
            'status' => 'here is what your want',
            'data' => $oneRecipe
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // $recipe = $request->validate([
        //     'title' => 'required',
        //     'readyInMinutes' => 'required',
        //     'summary' => 'required',
        //     'vegetarian' => 'required',
        //     'instructions' => 'required',
        //     'sourceUrl' => 'required',
        //     'image' => 'required',
        // ]);
        
        $newRecipe = Recipe::where('id', $id)->update($request->all());
        
        // error_log($updatedRecipe);


        return [
            'status' => 200,
            'title' => $newRecipe
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::where('id' ,$id);

        $deletedRecipe = $recipe->delete();

        return [
            "status" => '200',
            'done' => 'deleted done'
        ];
    }

    public function addToFavorite($id){

        

        $newRecipe = Recipe::where('id', $id)->update([
            'fav' => 1
        ]);

        return [
            'status' => 200,
            'data' => $newRecipe
        ];
    }

    public function removeFav($id) {

        $deletedFav = Recipe::where('id', $id)->update([
            'fav' => 0
        ]);

        return [
            'status' => 'removed ',
            'fav removed Item' => $deletedFav
        ];
    }

    public function getAllFav(){

        $allFave = Recipe::where('fav', 1)->get();

        return [
            "status" => 'good',
            'data' => $allFave
        ];

    }
}
