<?php

namespace App\Http\Controllers\Administrativo;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $page = Page::where('view', 'articles.index')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;

        return view('administrativo.articulo.index', compact('contador'));
    }

    public function create()
    {
        $page = Page::where('view', 'articles.create')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;

        $categorias = Category::all();

        return view('administrativo.articulo.create', compact('contador', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
        ]);

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'categorie_id' => $request->category,
            'table' => 'articles',
            'redirect' => '/articles',
        ]);

        return redirect()->route('articles.index')->with('success', 'Articulo creado Exitosamente.');
    }

    public function uploadImage(Request $request)
    {
        if($request->hasFile('upload')){
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time(). '.' . $extension;

            $request->file('upload')->move(public_path('images/ckeditor'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/ckeditor/' . $fileName);
            $msg = 'Image Uploated successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    
    public function edit($id)
    {
        $articulo = Article::find($id);
        
        $page = Page::where('view', 'articles.edit')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;

        $categorias = Category::all();
        $cate = Category::find($articulo->categorie_id);

        return view('administrativo.articulo.edit', compact('articulo', 'contador', 'categorias', 'cate'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
        ]);

        $articulo = Article::find($id);
        $articulo->title = $request->title;
        $articulo->content = $request->content;
        $articulo->categorie_id = $request->category;
        $articulo->save();

        return redirect()->route('articles.index')->with('success', 'Articulo editada Exitosamente.');
    }

    public function show($id)
    {
        $articulo = Article::find($id);
        
        $page = Page::where('view', 'articles.show')->first();
        $page->count = $page->count + 1;
        $page->save();
        $contador = $page->count;
        $cate = Category::find($articulo->categorie_id);

        return view('administrativo.articulo.show', compact('articulo', 'contador', 'cate'));
    }

}
