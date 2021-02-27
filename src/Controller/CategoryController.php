<?php


namespace Hillel\Controller;
use Hillel\Model\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

//use Illuminate\Http\Response;

class CategoryController
{
    public function home()
    {  $pages = \Hillel\Model\Category::paginate(3);
        $link_main="";
        /** @var $blade */

        return view('homepage/index', compact('pages','link_main') );
    }
    public function listC(){
        $pages = \Hillel\Model\Category::paginate(3);
        $link_main="/category/list";
        return view('category/table', compact('pages','link_main'));
    }
    public function createC()
    {

            $category = new \Hillel\Model\Category();

     //  $category = \Hillel\Model\Category::all();


        return view('category/form',compact('category'));


    }
    public function updateC($id)
    {
        //$data = request()->all();
        $category= \Hillel\Model\Category::find($id);


        return view('category/form',['category'=>$category]);

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
    {   $data = request()->all();
         $validator = validator()->make($data,[
             'title' => ['required', 'min:5'],
             'slug' => ['required', 'min:5'],
         ]);
        $eror = $validator->errors();
         if(count($eror)>0){
             $_SESSION['data'] = $data;
             $_SESSION['errors'] = $eror->toArray();

             return new RedirectResponse($_SERVER['HTTP_REFERER']);
         }


        $category = new \Hillel\Model\Category();
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->save();

        $_SESSION['message'] = [
            'status' => 'success',
            'text' => "Category \" {$data['title']} \" saved"
        ];

        return new RedirectResponse('/category/list');
    }



}