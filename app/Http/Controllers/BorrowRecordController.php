<?php

namespace App\Http\Controllers;

use App\Models\BorrowRecord;
use Illuminate\Http\Request;
use App\Http\Requests\BorrowRecordControllerRequest;
use App\Http\Resources\BorrowRecordControllerReource;


class BorrowRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $borrowRecords = BorrowRecord::all();
        $borrowRecords = BorrowRecordControllerReource::collection($borrowRecords);
        return response()->json(['data' => $borrowRecords, 'message' => 'Request is successfully']);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BorrowRecordControllerRequest $request)
    {
        //
        $borrowRecord = BorrowRecord::create($request->all());
        return response()->json(['data' => $borrowRecord,'message' => 'Create is successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(BorrowRecord $borrowRecord)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BorrowRecord $borrowRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BorrowRecord $borrowRecord)
    {
        //
    }
}
