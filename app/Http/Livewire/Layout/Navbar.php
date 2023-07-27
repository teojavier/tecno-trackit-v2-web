<?php

namespace App\Http\Livewire\Layout;

use App\Models\Menu;
use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        $menus = Menu::where('redirect', 'LIKE' , '%' . '#' . '%')->get();

        return view('livewire..layout.navbar', compact('menus'));
    }
}
