<?php

namespace App\Livewire\Admin\Page\Service;

use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class ServiceEdit extends Component
{
    use WithFileUploads;
    #[Title('Edit Service')]
    public $columns;
    public $existingFile;

    public function mount($encryptedId)
    {
        if (!User::find(Auth::id())->can('admin.services.edit')) {
            abort(403); // Unauthorized access
        }
        $this->columns = Service::getColumns();
        // Retrieve the user by ID
        $this->columns['service_id'] = decryptData($encryptedId);
        $service = Service::findOrFail($this->columns['service_id']);
        if ($service) {
            foreach ($this->columns as $key => $column) {
                $this->columns[$key] = $service[$key];
            }
            $this->columns['service_image'] = '';
            $this->existingFile = $service->service_image;
        }
    }

    protected function rules()
    {
        return Service::rules($this->columns['service_id']);
    }

    protected function messages()
    {
        return Service::messages();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $this->validate();

        // simple store Image code
        if (!empty($this->columns['service_image'])) {
            $this->columns['service_image'] = uploadOrReplaceImage(
                $this->columns['service_image'],
                $this->existingFile,
                'projects'
            );
            $this->existingFile = $this->columns['service_image'];
        } else {
            $this->columns['service_image'] =  $this->existingFile;
        }
        $this->columns['service_slug'] = Str::slug($this->columns['service_name']);

        Service::updateOrCreate(
            ['service_id' =>  $this->columns['service_id']],
            $this->columns
        );

        flashSuccess('Service updated successfully.');
        return redirect()->route('admin.services.index');
    }

    public function render()
    {
        return view('livewire.admin.page.service.service-edit');
    }
}