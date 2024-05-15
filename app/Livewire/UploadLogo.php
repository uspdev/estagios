<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class UploadLogo extends Component
{
    use WithFileUploads;

    #[Validate('image', message: 'O logo deve ser uma imagem.')]
    #[Validate('max:1500', message: 'O arquivo do logo deve ser menor que 1.5MB.')]
    public $logo;

    public $settingsLogo;

    public function render()
    {
        return view('livewire.upload-logo');
    }

    public function mount($settingsLogo)
    {
        $this->settingsLogo = $settingsLogo;
    }
}
