<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BidRequest;
use App\Models\Bid;
use App\Services\BidService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BidController extends Controller
{

    private $bidService;

    public function __construct(BidService $bidService)
    {
        $this->bidService = $bidService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Bid::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BidRequest $request)
    {
        $this->bidService->create($request->validated());

        return response()->json(['message' => 'success'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
