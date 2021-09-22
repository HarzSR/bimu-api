<?php

namespace App\Http\Controllers;

use App\Http\Resources\InputResource;
use App\Models\Device;
use App\Models\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;

class InputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return response('Invalid Request', 403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return response('Invalid Request', 403);
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

        // return response('Invalid Request', 403);

        $data = $request->all();

        Storage::disk('local')->put('example.txt', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Input  $input
     * @return \Illuminate\Http\Response
     */
    public function show($mac)
    {
        //

        $checkDevice = Device::where(['mac_address' => $mac, 'user_id' => auth('api')->user()->id])->count();

        if($checkDevice == 1)
        {
            $input = Input::latest()->where(['device_mac' => $mac])->first();

            return (new InputResource($input))->response()->setStatusCode(200);
        }
        else
        {

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Input  $input
     * @return \Illuminate\Http\Response
     */
    public function edit(Input $input)
    {
        //

        return response('Invalid Request', 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Input  $input
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Input $input)
    {
        //

        return response('Invalid Request', 403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Input  $input
     * @return \Illuminate\Http\Response
     */
    public function destroy(Input $input)
    {
        //

        return response('Invalid Request', 403);
    }

    public function viewInputs()
    {
        Session::put('page', 'view-inputs');

        $inputs = Input::with('device')->latest()->take(10)->get();

        return view('admin.inputs.view_inputs')->with(compact('inputs'));
    }
}
