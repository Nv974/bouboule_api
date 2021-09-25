<?php

namespace App\Http\Controllers;


use App\Models\Instruction;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $destination = 'public/images';
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            
            $request->file('image')->storeAs($destination, $filename, 'public');
            return response()->json(["message" => "image uploadée"]);
        } else {
            return response()->json(["message" => "selectionnez une image"]);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $recipes = Recipe::all();
        return $recipes;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe = new Recipe;
        $recipe->img = $request->img;
        $recipe->title = $request->title;
        $recipe->description = $request->description;
        $recipe->difficulty = $request->difficulty;
        $recipe->cooking_time = $request->cooking_time;
        $recipe->preparation_time = $request->preparation_time;
        $recipe->video_url = $request->video_url;
        $recipe->user_id = $request->user_id;
        $recipe->category_id = $request->category_id;
        $recipe->save();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::find($id)->load('instructions', 'ingredients');
        return $recipe;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $recipe = Recipe::find($request->id);
        $recipe->title = $request->title;
        $recipe->description = $request->description;
        $recipe->difficulty = $request->difficulty;
        $recipe->img = $request->img;
        $recipe->cooking_time = $request->cooking_time;
        $recipe->preparation_time = $request->preparation_time;
        $recipe->video_url = $request->video_url;
        $recipe->user_id = $request->user_id;
        $recipe->category_id = $request->category_id;
        $recipe->update();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
    } 

    private function validator() {
        return request()->validate(
            [
                'title' => 'required|min:3',
                'description' => 'required|min:3',
                'difficulty' => 'required|min:3',
                'cooking_time' => 'required|integer',
                'preparation_time' => 'required|integer',
                'video_url' => 'sometimes|min:3',
                'category_id' => 'required|integer',
                'user_id' => 'required|integer',
                'img' => 'required|image|max:5000'
            ]
            );
    }

    private function storeImage(Recipe $recipe) {
        if(request('image')) {
            $recipe->update([
                'img' => request('img')->store('recipes', 'public')
            ]);
        }
    }
}
