<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function q2(){
        $posts = DB::table('posts')
        ->select('excerpt', 'description')
        ->get();
        return Response()->json([
            'success'=>true,
            'data'=>$posts
        ], 201);
    }

   
    public function q3(){
        $uniqueTitle = DB::table('posts')
                ->select('title')
                ->distinct()
                ->get();
                
            return response()->json([
                    'success'=>true,
                    'message'=>$uniqueTitle
                ], 201);
    }
    public function q4($id){
        
            $posts = DB::table('posts')
            ->where('id', $id)
            ->first();

            return response()->json([
                    'success'=>true,
                    'message'=>$posts->description??'No Post Found.'
                ], 201);
    }

    public function q5($id){

            $posts = DB::table('posts')
            ->where('id', $id)
            ->pluck('description');

            return response()->json([
                    'success'=>true,
                    'message'=>$posts
                ], 201);
    }

    public function q6First(){

        $firstPost = DB::table('posts')
        ->where('is_published', 1)
        ->orderBy('created_at')
        ->first();



            return response()->json([
                    'success'=>true,
                    'message'=>$firstPost
                ], 201);
    }

    public function q6Find($id){

        $post = DB::table('posts')->find($id);
            return response()->json([
                    'success'=>true,
                    'message'=>$post
                ], 201);
    }
    public function q7(){

        $posts = DB::table('posts')
        ->pluck('title');


        return response()->json([
                'success'=>true,
                'message'=>$posts
            ], 201);
    }

    public function q8(Request $request){

        $post = DB::table('posts')
                    ->insert([
                        'user_id'=>$request->input('user_id'),
                        'title'=>$request->input('title'),
                        'slug'=>$request->input('slug'),
                        'excerpt'=>$request->input('excerpt'),
                        'description'=>$request->input('description'),
                        'is_published'=>$request->input('is_published'),
                        'min_to_read'=>$request->input('min_to_read'),
                    ]);
    
                if(!$post) {
                    return Response()->json([
                        'success'=>false,
                        'message'=>'Something Error. Try again'
                    ]);
                } else {
                    return response()->json([
                        'success'=>true,
                        'message'=>$post
                    ], 201);
                }

             
    }
    public function q9($id) {
        $affectedRows = DB::table('posts')
                ->where('id', $id)
                ->update([
                    'excerpt' => 'Laravel 10',
                    'description' => 'Laravel 10'
                ]);

            return response()->json([
                'success'=>true,
                'message'=>'number of affected rows '.$affectedRows
            ], 201);

    }
    public function q10($id) {
        $affectedRows = DB::table('posts')
                ->where('id', $id)
                ->delete();


            return response()->json([
                'success'=>true,
                'message'=>'number of affected rows '.$affectedRows
            ], 201);

    }

    public function q11() {
        $posts['count'] = DB::table('posts')->count();
        $posts ['sum']= DB::table('posts')->sum('min_to_read');
        $posts ['avg'] = DB::table('posts')->avg('min_to_read');
        $posts ['max']= DB::table('posts')->max('min_to_read');
        $posts ['min']= DB::table('posts')->min('min_to_read');


            return response()->json([
                'success'=>true,
                'data'=>$posts
            ], 201);

    }
    public function q12() {

        $posts = DB::table('posts')
        ->whereNot('is_published', 0)
        ->get();

    return response()->json([
                'success'=>true,
                'data'=>$posts
            ], 201);

    }
    public function q13Exists() {

        $posts = DB::table('posts')
        ->where('is_published', 0)
        ->exists();

    return response()->json([
                'success'=>true,
                'message'=>$posts
            ], 201);

    }

    public function q13DoesntExist() {

        $posts = DB::table('posts')
        ->where('is_published', 0)
        ->doesntExist();

    return response()->json([
                'success'=>true,
                'message'=>$posts
            ], 201);

    }

    public function q14() {

        $posts = DB::table('posts')
        ->whereBetween('min_to_read', [1, 5])
        ->get();


    return response()->json([
                'success'=>true,
                'data'=>$posts
            ], 201);

    }
    public function q15($id) {

        $affectedRows = DB::table('posts')
                ->where('id', $id)
                ->increment('min_to_read', 1);

    return response()->json([
                'success'=>true,
                'message'=>'number of affected rows '.$affectedRows
            ], 201);

    }
}
