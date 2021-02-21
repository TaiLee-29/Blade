<?php


namespace Hillel\Controller;
use Hillel\Model\Category;
use Hillel\Model\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;




class PostController

{
    public function listP(){
        $posts = \Hillel\Model\Post::all();
        return view('post/table', ['posts' => $posts]);
    }
    public function createP()
    {
        $posts = \Hillel\Model\Post::all();
        $post = new \Hillel\Model\Post();
        $tags = \Hillel\Model\Tag::all();
        $categories = \Hillel\Model\Category::all();


        return view('post/form',compact('posts','post','tags','categories'));


    }
    public function updateP($id)
    {
        //$data = request()->all();
        $post= \Hillel\Model\Post::find($id);
        $tags = \Hillel\Model\Tag::all();
        $categories = \Hillel\Model\Category::all();
        return view('post/form',compact('post','tags','categories'));

    }
    public function editP($id)
    {
        $data = request()->all();
        $validator = validator()->make($data,[
            'title' => ['required', 'min:5'],
            'slug' => ['required', 'min:5'],
            'body' => ['required', 'min:10'],
            'category_id' => ['required' ],
            'tags' => ['required' ],
        ]);

        $error = $validator->errors();
        if(count($error)>0){
            $_SESSION['data'] = $data;
            $_SESSION['errors'] = $error->toArray();

            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $post = \Hillel\Model\Post::find($id);
        $post->title=$data['title'];
        $post->slug=$data['slug'];
        $post->body = $data['body'];
        $post->category_id = $data['category_id'];
        $post->save();
        $post->tags()->sync( $data['tags']);

        return new RedirectResponse('/post/list');

    }
    public function destroyP($id)
    {
        $data = request()->all();
        $post =  \Hillel\Model\Post::find($id);
        $post->delete();
        return new RedirectResponse('/post/list');
    }
    public function storeP()
    {
        $data = request()->all();
        $validator = validator()->make($data,[
            'title' => ['required', 'min:5'],
            'slug' => ['required', 'min:5'],
            'body' => ['required', 'min:10'],
            'category_id' => ['required' ],
            'tags' => ['required' ],
        ]);

        $error = $validator->errors();
        if(count($error)>0){
            $_SESSION['data'] = $data;
            $_SESSION['errors'] = $error->toArray();

            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $post = new \Hillel\Model\Post();

        $post->title = $data['title'];
        $post->slug = $data['slug'];
        $post->body = $data['body'];
        $post->category_id = $data['category_id'];

        $post->save();
        $post->tags()->attach( $data['tags']);

        $_SESSION['message'] = [
            'status' => 'success',
            'text' => "Post \" {$data['title']} \" saved"
        ];

        return new RedirectResponse('/post/list');
    }


}