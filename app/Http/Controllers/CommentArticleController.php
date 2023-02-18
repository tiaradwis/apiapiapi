<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

use App\Models\Comment_Article;
use Illuminate\Http\Request;

class CommentArticleController extends Controller
{
    public function index()
    {
        $data = Comment_Article::all();
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
            'uId' => ['required'],
            'articleId' => ['required'],
            'desc' => ['required'],
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {
            $data = Comment_Article::create($request->all());
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
        $data = Comment_Article::findOrFail($id);
        
        return ApiFormatter::createApi(200, 'Success', 1, $data);
    }

    public function destroy($id)
    {
        $data = Comment_Article::findOrFail($id);

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
}
