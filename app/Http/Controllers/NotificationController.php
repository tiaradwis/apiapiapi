<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $data = Notification::all();
        $founded = count($data);
        if($data){
            return ApiFormatter::createApi(200, 'Success', $founded, $data);
        }else {
            return ApiFormatter::createApi(400, 'Failed', $founded);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'image' => ['required'],
            'description' => ['required'],
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $data = Notification::create($request->all());
            $response = [
                'message' => 'Data created',
                'data' => $data
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e){
            return response()->json([
                'message' => 'Failed'. $e->errorInfo
            ]);
        }
    }

    
    public function show($id)
    {
        $data = Notification::findOrFail($id);
        
        return ApiFormatter::createApi(200, 'Success', 1, $data);
    }
}
