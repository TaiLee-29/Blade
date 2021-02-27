<?php


namespace Hillel\Controller;
use Hillel\Model\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;




class TagController
{
    public function listT(){
        $pages = \Hillel\Model\Tag::paginate(3);
        $link_main="/tag/list";
        return view('tag/table', compact('pages','link_main'));
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

        $error = $validator->errors();
        if(count($error)>0){
            $_SESSION['data'] = $data;
            $_SESSION['errors'] = $error->toArray();

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