<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeviceResource;
use App\Models\Device;
use Illuminate\Http\Request;
use DB;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return DeviceResource::collection(Device::where(['user_id' => auth('api')->user()->id])->get());

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

        $device = Device::create([
            'name' => $data['name'],
            'mac_address' => $data['mac_address'],
            'user_id' => $data['user_id'],
            'status' => $data['status'],
        ]);

        return new DeviceResource($device);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show($mac)
    {
        //

        $device = Device::latest()->where(['mac_address' => $mac, 'user_id' => auth('api')->user()->id])->first();

        if(empty($device))
        {
            return response()->json([
                'data' => [
                    'id' => null,
                    'type' => 'Device',
                    'attributes' => [
                        'name' => null,
                        'device_mac' => null,
                        'user_id' => null,
                        'status' => null,
                    ]
                ]
            ]);
        }
        else
        {
            return new DeviceResource(($device));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $mac)
    {
        //

        $data = $request->all();

        dd($mac, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        //

        return response('Invalid Request', 403);
    }
}
