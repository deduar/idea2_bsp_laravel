<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TDC;
use App\Http\Resources\TDCResource;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;

class TDCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tdcs = TDC::all();
        return response()->json(TDCResource::collection($tdcs));
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
     * @param  \App\Http\Requests\StoreTDCRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'number' => 'required|integer|unique:tdcs|digits:16',
            'pin' => 'required|string|max:4|min:4|regex:/^[0-9]+$/',
            'valid_date' => 'required|string|max:4|min:4|regex:/^[0-9]+$/'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        (str_split($request->valid_date,2)[1] >= date("y"))?$status=true:$status=false;
        ($status && str_split($request->valid_date,2)[0] >= date("m"))?$status=true:$status=false;

        $tdc = TDC::create([
            'number' => $request->number,
            'pin' => $request->pin,
            'valid_date' => $request->valid_date,
            'balance' => 0,
            'status' => $status,
            'client_id' => $request->client_id
        ]);
        
        return response()->json(new TDCResource($tdc));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TDC  $tDC
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tdc = TDC::where('id',$id)->get();
        $client = Client::where('id',$tdc[0]->client_id)->get();
        return response()->json(['tdc' => $tdc,'client' => $client[0]->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TDC  $tDC
     * @return \Illuminate\Http\Response
     */
    public function edit(TDC $tDC)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTDCRequest  $request
     * @param  \App\Models\TDC  $tDC
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TDC $tDC)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TDC  $tDC
     * @return \Illuminate\Http\Response
     */
    public function destroy(TDC $tDC)
    {
        //
    }
}
