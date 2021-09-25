<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use App\Models\Recipe;
use Illuminate\Foundation\Inspiring;
use Illuminate\Http\Request;

class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $recipe = Recipe::find($id)->load('instructions');
        return $recipe->instructions;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $recipe_id)
    {
        $instruction = new Instruction;
        $instruction->recipe_id = $recipe_id;
        $instruction->description = $request->description;
        $instruction->save();

        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instruction  $instruction
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instruction  $instruction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instruction $instruction, $recipe_id, $id)
    {
        $instruction = Instruction::find($id);
        $instruction->description = $request->description;
        $instruction->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instruction  $instruction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instruction $instruction, $id)
    {
        $instruction = Instruction::find($id);
        $instruction->delete();
    }
}
