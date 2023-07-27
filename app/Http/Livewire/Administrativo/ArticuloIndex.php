<?php

namespace App\Http\Livewire\Administrativo;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class ArticuloIndex extends Component
{

    protected $listeners = ['eventDestroyArticleAccept'];

    public $search = '';
    use WithPagination;

    public function eventDestroyArticle($id){
        $article = Article::find($id);
        $this->emit('event-destroy-article', $id);
    }

    public function eventDestroyArticleAccept($id){
        $article = Article::find($id);
        $article->delete();
    }


    public function render()
    {
        $articulos = Article::join('categories', 'categories.id', 'articles.categorie_id' )
        ->whereRaw('LOWER("articles"."title") LIKE ?', ['%' . Str::lower($this->search) . '%'])
        ->orWhereRaw('LOWER("articles"."content") LIKE ?', ['%' . Str::lower($this->search) . '%'])
        ->select(
            'articles.*',
            'categories.name as category'
        )->orderBy('id', 'asc')
        ->get();

        return view('livewire..administrativo.articulo-index', compact('articulos'));
    }
}
