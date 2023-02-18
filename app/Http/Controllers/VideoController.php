<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $data = Video::all();
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
            'adminId' => ['required'],
            'categoryId' => ['required'],
            'title' => ['required'],
            'video' => ['required'],
            'description' => ['required']
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $data = Video::create($request->all());
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
        $data = Video::findOrFail($id);
        
        return ApiFormatter::createApi(200, 'Success', 1, $data);
    }

    
    public function update(Request $request, $id)
    {
        $data = Video::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'video' => ['required'],
            'category' => ['required'],
            'description' => ['required'],
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $data = update($request->all());
            $response = [
                'message' => 'Data updated',
                'data' => $data
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e){
            return response()->json([
                'message' => 'Failed'. $e->errorInfo
            ]);
        }
    }

    public function destroy($id)
    {
        $data = Video::findOrFail($id);

        try {
            $data->delete();
            $response = [
                'message' => 'Data deleted',
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e){
            return response()->json([
                'message' => 'Failed'. $e->errorInfo
            ]);
        }
    }

    public function search ($title)
    {
        $data = Video::where('title','LIKE','%'.$title.'%')->get();
        $founded = count($data);
        return ApiFormatter::createApi(200, 'Success', $founded , $data);
    }
}
