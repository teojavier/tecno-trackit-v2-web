<?php

namespace App\Http\Livewire\Administrativo;

use App\Models\Soporteia;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatContent extends Component
{
    public $input = "";

    // extraer usuario
    public $user = null;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        $messages = Soporteia::where('user_id', $this->user->id)
            ->orderBy('created_at', 'asc')
            ->get();
        return view('livewire.administrativo.chat-content', compact('messages'));
    }

    public function requestOpenAI()
    {
        // Obtener la API Key desde el archivo .env
        $apiKey = "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";

        // URL de la API
        $url =
            "https://api.openai.com/v1/engines/text-davinci-003/completions";
        $max_tokens = 300;
        $data = [
            'prompt' => $this->input,
            'max_tokens' => $max_tokens,
        ];

        // Crear el cliente HTTP
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ],
        ]);

        try {
            $response = $client->post($url, [
                'json' => $data,
            ]);

            // Decodificar la respuesta JSON
            $result = json_decode($response->getBody(), true);

            if (isset($result['choices']) && !empty($result['choices']))
                $textoCompletado = trim($result['choices'][0]['text']);
            else
                $textoCompletado = 'No se encontró texto completado.';

            Soporteia::create([
                'user_id' => $this->user->id,
                'input' => $this->input,
                'output' => $textoCompletado,
            ]);

            $this->input = "";

            // scroll to bottom
            $this->dispatchBrowserEvent('scrollDown');
        } catch (\Throwable $th) {
            throw $th;
        }

        $this->render();
    }
}
