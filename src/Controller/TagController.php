<?php


namespace Hillel\Controller;
use Hillel\Model\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;




class TagController
{
    public function listT(){
        $tags = \Hillel\Model\Tag::all();
        return view('tag/table', ['tags' => $tags]);
    }
    public function createT()
    {

        $tag = new \Hillel\Model\Tag();




        return view('tag/form',compact('tag'));


    }
    public function updateT($id)
    {
        //$data = request()->all();
        $tag= \Hillel\Model\Tag::find($id);


        return view('tag/form',['tag'=>$tag]);

    }
    public function editT($id)
    {
        $data = request()->all();
        $tag = \Hillel\Model\Tag::find($id);
        $tag->title=$data['title'];
        $tag->slug=$data['slug'];
        $tag->save();
        return new RedirectResponse('/tag/list');

    }
    public function destroyT($id)
    {
        $data = request()->all();
        $tag =  \Hillel\Model\Tag::find($id);
        $tag->delete();
        return new RedirectResponse('/tag/list');
    }
    public function storeT()
    {
        $data = request()->all();
        $validator = validator()->make($data,[
            'title' => ['required', 'min:5'],
            'slug' => ['required', 'min:5'],
        ]);

        if($eror =$validator->errors()){

            $_SESSION['errors'] = $eror->toArray();

            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $tag = new \Hillel\Model\Tag();

        $tag->title = $data['title'];
        $tag->slug = $data['slug'];
        $tag->save();

        $_SESSION['message'] = [
            'status' => 'success',
            'text' => "Tag \" {$data['title']} \" saved"
        ];

        return new RedirectResponse('/tag/list');
    }
}