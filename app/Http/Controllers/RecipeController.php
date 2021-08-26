<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecipeResource;
use App\Models\DefaultRecipe;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return RecipeResource::collection(DefaultRecipe::all());

        // return response('Invalid Request', 403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $data = $request->all();

        $recipe = Recipe::create([
            'device_mac' => $data['device_mac'],
            'user_id' => $data['user_id'],
            'recipe_name' => $data['recipe_name'],
            'fog1_duration' => $data['fog1_duration'],
            'fog1_on_minutes' => $data['fog1_on_minutes'],
            'fog1_off_minutes' => $data['fog1_off_minutes'],
            'fog1_start_time' => $data['fog1_start_time'],
            'for1_end_time' => $data['for1_end_time'],
            'fog2_duration' => $data['fog2_duration'],
            'fog2_on_minutes' => $data['fog2_on_minutes'],
            'fog2_off_minutes' => $data['fog2_off_minutes'],
            'fog2_start_time' => $data['fog2_start_time'],
            'fog2_end_time' => $data['fog2_end_time'],
            'light1_red' => $data['light1_red'],
            'light1_blue' => $data['light1_blue'],
            'light1_green' => $data['light1_green'],
            'light1_white' => $data['light1_white'],
            'light1_bright' => $data['light1_bright'],
            'light1_start_time' => $data['light1_start_time'],
            'light1_end_time' => $data['light1_end_time'],
            'light2_red' => $data['light2_red'],
            'light2_blue' => $data['light2_blue'],
            'light2_green' => $data['light2_green'],
            'light2_white' => $data['light2_white'],
            'light2_bright' => $data['light2_bright'],
            'light2_start_time' => $data['light2_start_time'],
            'light2_end_time' => $data['light2_end_time'],
            'humidity' => $data['humidity'],
            'device_rtc' => $data['device_rtc'],
            'default' => $data['default'],
        ]);

        return new RecipeResource($recipe);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        //

        $recipe = Recipe::latest()->where(['device_mac' => $id, 'user_id' => auth('api')->user()->id])->first();

        if(empty($recipe))
        {
            return response()->json([
                'data' => [
                    'id' => null,
                    'type' => 'Recipe',
                    'attributes' => [
                        'device_mac' => null,
                        'user_id' => null,
                        'recipe_name' => null,
                        'fog1_duration' => null,
                        'fog1_on_minutes' => null,
                        'fog1_off_minutes' => null,
                        'fog1_start_time' => null,
                        'for1_end_time' => null,
                        'fog2_duration' => null,
                        'fog2_on_minutes' => null,
                        'fog2_off_minutes' => null,
                        'fog2_start_time' => null,
                        'fog2_end_time' => null,
                        'light1_red' => null,
                        'light1_blue' => null,
                        'light1_green' => null,
                        'light1_white' => null,
                        'light1_bright' => null,
                        'light1_start_time' => null,
                        'light1_end_time' => null,
                        'light2_red' => null,
                        'light2_blue' => null,
                        'light2_green' => null,
                        'light2_white' => null,
                        'light2_bright' => null,
                        'light2_start_time' => null,
                        'light2_end_time' => null,
                        'humidity' => null,
                        'device_rtc' => null,
                        'default' => null,
                    ]
                ]
            ]);
        }
        else
        {
            return new RecipeResource(($recipe));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        //

        // $data = $request->all();

        // dd($id, $data);

        return response('Invalid Request', 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //

        return response('Invalid Request', 403);
    }
}
