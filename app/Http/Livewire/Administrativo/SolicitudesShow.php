<?php

namespace App\Http\Livewire\Administrativo;

use App\Models\Category;
use App\Models\diffFecha;
use App\Models\Messenger;
use App\Models\Messenger_statu;
use App\Models\Messenger_type;
use App\Models\Mora;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Livewire\Component;

class SolicitudesShow extends Component
{
    public $conclution, $solicitud, $soporte, $cliente, $categoria, $type, $status, $date_request, $date_accept, $date_finish, $mora ;
    public $solicitud_aceptacion, $aceptacion_finalizacion, $tiempo_total;
    protected $listeners = ['eventSolicitudAcceptCorrecty', 'eventSolicitudFinishCorrecty'];
    protected $rules = [
        'conclution' => 'required'
    ];

    public function mount($id)
    {
        $this->solicitud = Messenger::find($id);
        $this->soporte = User::find($this->solicitud->support_id);
        $this->date_request = $this->solicitud->date_request;
        $this->date_accept = $this->solicitud->date_accept;
        $this->date_finish = $this->solicitud->date_finish;
        $this->cliente = User::find($this->solicitud->client_id);
        $this->categoria = Category::find($this->solicitud->categorie_id);
        $this->type = Messenger_type::find($this->solicitud->messenger_type_id);
        $this->status = Messenger_statu::find($this->solicitud->messenger_status_id);
        $this->mora = Mora::where('messenger_id', $this->solicitud->id)->first();


        //CALCULO DE LOS TIEMPOS
        $f_sol = new DateTime($this->date_request);
        $f_ace = new DateTime($this->date_accept);
        $f_fin = new DateTime($this->date_finish);

        //tiempo que tarda el responsable en aceptar
        $dif_solicitud_acepto = $f_sol->diff($f_ace);
        //tiempo que se tarda desde aceptar hasta finalizar
        $dif_acep_fin = $f_ace->diff($f_fin);
        //tiempo que se tarda todo soporte
        $dif_solicitud_fin = $f_sol->diff($f_fin);

        //asignacion
        $this->solicitud_aceptacion = new diffFecha();
        $this->solicitud_aceptacion->ano = $dif_solicitud_acepto->y;
        $this->solicitud_aceptacion->mes = $dif_solicitud_acepto->m;
        $this->solicitud_aceptacion->dia = $dif_solicitud_acepto->d;
        $this->solicitud_aceptacion->hora = $dif_solicitud_acepto->h;
        $this->solicitud_aceptacion->min = $dif_solicitud_acepto->i;
        $this->solicitud_aceptacion->seg = $dif_solicitud_acepto->s;

        $this->aceptacion_finalizacion = new diffFecha();
        $this->aceptacion_finalizacion->ano = $dif_acep_fin->y;
        $this->aceptacion_finalizacion->mes = $dif_acep_fin->m;
        $this->aceptacion_finalizacion->dia = $dif_acep_fin->d;
        $this->aceptacion_finalizacion->hora = $dif_acep_fin->h;
        $this->aceptacion_finalizacion->min = $dif_acep_fin->i;
        $this->aceptacion_finalizacion->seg = $dif_acep_fin->s;

        $this->tiempo_total = new diffFecha();
        $this->tiempo_total->ano = $dif_solicitud_fin->y;
        $this->tiempo_total->mes = $dif_solicitud_fin->m;
        $this->tiempo_total->dia = $dif_solicitud_fin->d;
        $this->tiempo_total->hora = $dif_solicitud_fin->h;
        $this->tiempo_total->min = $dif_solicitud_fin->i;
        $this->tiempo_total->seg = $dif_solicitud_fin->s;
    }

    public function eventAceptarSolicitud($id)
    {
        $this->emit('event-solicitud-accept', $id);
    }

    public function eventSolicitudAcceptCorrecty($id)
    {
        $solicitud = Messenger::find($id);
        $solicitud->messenger_status_id = 2;
        $solicitud->date_accept = Carbon::now();
        $solicitud->save();

        $mora = Mora::where('messenger_id', $solicitud->id)->first();
        $mora->date_begin = Carbon::now();
        $categoria = Category::find($solicitud->categorie_id);
        $time = $categoria->time;
        $mora->date_end = Carbon::now()->addHours($time);
        $mora->save();

        $this->mount($solicitud->id);
    }

    public function eventFinalizarSolicitud($id)
    {
        $this->validate();
        $this->emit('event-solicitud-finish', $id);
    }

    public function eventSolicitudFinishCorrecty($id)
    {
        $solicitud = Messenger::find($id);
        $solicitud->messenger_status_id = 3;
        $solicitud->date_finish = Carbon::now();
        $solicitud->conclution = $this->conclution;
        $solicitud->save();
        
        $mora = Mora::where('messenger_id', $solicitud->id)->first();
        $mora->date_compare = $solicitud->date_finish;

        $fechaCompare = new DateTime($mora->date_compare);
        $fechaEnd = new DateTime($mora->date_end);
        
        if ($fechaCompare > $fechaEnd   ) {
            $mora->arrear_statu_id = 2;
        }

        $mora->save();
        $this->mount($id);
    }


    public function render()
    {
        return view('livewire..administrativo.solicitudes-show');
    }
}
