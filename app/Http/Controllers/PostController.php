<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function indexFunction()
    {
        return "Here is indexFunction from PostController";
       // dd("Here is PostController");
    }
    public function create()
    {
        $postsArr = [
            [
                'title' => 'title is here',
                'content' => 'content there',
                'image' => 'is.jpg',
                'likes' => '100',
                'is_published' => 1,
            ],
            [
                'title' => 'Another title is here',
                'content' => 'Another content there',
                'image' => 'Another is.jpg',
                'likes' => '150',
                'is_published' => 1,
            ],
        ];
        foreach($postsArr as $item){
           // dd($item);
            Post::create($item);
        }

        dd('successfully added to db');
    }

     public function update (){
        $post = Post::find(1, ['content']);

        $post -> update ([
                'title' => 'Updated title',
                'content' => 'Updated content',
                'image' => 'updated_is.jpg',
                'likes' => 1000,
                'is_published' => 0,
        ]);
        dd("updated!");
        }

        public function delete () {
            $post = Post::withTrashed()->find(2, ['id']);
            $post->restore();
          //  $post->delete();
        dd ('deleted');
        }

        public function firstOrCreate() {
            $post = Post::find (1, ['id']);

            $anotherPost = [
                'title' => 'Some Post',
                'content' => 'Some Content',
                'image' => 'some image.jpg',
                'likes' => '100',
                'is_published' => 1,
            ];
           $myPost = Post::firstOrCreate([
                 'title' => 'Some Post'
            ],[
                'title' => 'Some Post',
                'content' => 'Some Content',
                'image' => 'some image.jpg',
                'likes' => '100',
                'is_published' => 1,
            ]);
            dd('finished');
        }
}
