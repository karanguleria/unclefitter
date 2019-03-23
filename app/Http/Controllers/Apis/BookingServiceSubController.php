<?php

namespace App\Http\Controllers\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\BookingServiceSubService as BookingServiceSubService;

class BookingServiceSubController extends Controller {

    protected $bookingServiceSub;

    public function __construct(BookingServiceSubService $bookingServiceSub) {
        $this->bookingServiceSub = $bookingServiceSub;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $result = $this->bookingServiceSub->findAll();

        if (count($result) > 0 && $result != []) {
            return response()->json(['status' => 'success', 'result' => $result], 200);
        } else {
            return response()->json(['status' => 'failed'], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $result = $this->bookingServiceSub->create($request->all());

        if ($result === true) {
            return response()->json(['status' => 'success', 'message' => 'Zipcode is added Successfully'], 200);
        } else {
            return response()->json(['status' => 'failed', 'message' => 'Zipcode is not added', 'error' => $result], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $result = $this->bookingServiceSub->find($id);

        if (count($result) > 0 && $result != []) {
            return response()->json(['status' => 'success', 'result' => $result], 200);
        } else {
            return response()->json(['status' => 'failed', 'result' => $result], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $result = $this->bookingServiceSub->update($request->all(), $id);

        if ($result === true) {
            return response()->json(['status' => 'success', 'message' => 'Zipcode is updated Successfully'], 200);
        } else {
            return response()->json(['status' => 'failed', 'message' => 'Zipcode is not updated', 'error' => $result], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $result = $this->bookingServiceSub->destroy($id);

        if ($result === true) {
            return response()->json(['status' => 'success', 'message' => 'Zipcode is deleted Successfully'], 200);
        } else {
            return response()->json(['status' => 'failed', 'message' => 'Zipcode is not deleted', 'error' => $result], 404);
        }
    }

}
