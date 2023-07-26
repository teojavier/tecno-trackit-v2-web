<?php

namespace App\Http\Livewire\Administrativo;

use App\Models\Category;
use App\Models\Messenger;
use App\Models\Messenger_statu;
use App\Models\Messenger_type;
use App\Models\User;
use Livewire\Component;

class SolicitudesShow extends Component
{
    public $solicitud, $soporte, $cliente, $categoria, $type, $status;

    public function mount($id){
        $this->solicitud = Messenger::find($id);
        $this->soporte = User::find($this->solicitud->support_id);
        $this->cliente = User::find($this->solicitud->client_id);
        $this->categoria = Category::find($this->solicitud->categorie_id);
        $this->type = Messenger_type::find($this->solicitud->messenger_type_id);
        $this->status = Messenger_statu::find($this->solicitud->messenger_status_id);
    }
    public function render()
    {
        return view('livewire..administrativo.solicitudes-show');
    }
}
