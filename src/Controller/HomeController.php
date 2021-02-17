<?php


namespace Hillel\Controller;
use Hillel\Model\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

//use Illuminate\Http\Response;

class HomeController
{
    public function home()
    {  $categories = \Hillel\Model\Category::all();
        $tags = \Hillel\Model\Tag::all();
        /** @var $blade */

        return view('pages/index', ['categories' => $categories], ['tags' => $tags] );
    }
    public function listC(){
        $categories = \Hillel\Model\Category::all();
        return view('pages/list-categories', ['categories' => $categories]);
    }
    public function createC()
    {

            $category = new \Hillel\Model\Category();

     //  $category = \Hillel\Model\Category::all();


        return view('pages/create-category',compact('category'));


    }
    public function updateC($id)
    {
        //$data = request()->all();
        $category= \Hillel\Model\Category::find($id);


        return view('pages/update-category',['category'=>$category]);

    }
    public function editC($id)
    {
        $data = request()->all();
        $category =  Category::find($id);
        $category->title=$data['title'];
        $category->slug=$data['slug'];
        $category->save();
        return new RedirectResponse('/category/list');

    }
    public function destroyC($id)
    {
        $data = request()->all();
        $category =  Category::find($id);
        $category->delete();
        return new RedirectResponse('/category/list');
    }
    public function storeC()
    {
        $bi = new \Hillel\Model\Category();
        $data = request()->all();
        $bi->title = $data['title'];
        $bi->slug = $data['slug'];
        $bi->save();

        return new RedirectResponse('/category/list');
    }
    public function listT(){
    $tags = \Hillel\Model\Tag::all();
    return view('pages/list-tags', ['tags' => $tags]);
}
public function createT()
{

    $tag = new \Hillel\Model\Tag();




    return view('pages/create-tag',compact('tag'));


}
    public function updateT($id)
    {
        //$data = request()->all();
        $tag= \Hillel\Model\Tag::find($id);


        return view('pages/update-tag',['tag'=>$tag]);

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
        $bi = new \Hillel\Model\Tag();
        $data = request()->all();
        $bi->title = $data['title'];
        $bi->slug = $data['slug'];
        $bi->save();

        return new RedirectResponse('/tag/list');
    }


}