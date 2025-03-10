<?php

namespace App\Livewire\Admin\Page\Service;

use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class ServiceCreate extends Component
{
    use WithFileUploads;
    #[Title('Create Service')]
    public $columns, $existingFile;

    public function mount()
    {
        if (!User::find(Auth::id())->can('admin.services.create')) {
            abort(403); // Unauthorized access
        }
        $this->columns = Service::getColumns();
        $this->existingFile = $this->columns['service_image'];
    }

    // Define the rules dynamically
    protected function rules()
    {
        return Service::rules();
    }

    // Define the messages dynamically
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

        // Upload the image
        if (!empty($this->columns['service_image'])) {
            $this->columns['service_image'] = uploadOrReplaceImage(
                $this->columns['service_image'],
                $this->existingFile,
                'services'
            );
            $this->existingFile = $this->columns['service_image'];
        }
        $this->columns['service_slug'] = Str::slug($this->columns['service_name']);
        // Save the service entry
        Service::create($this->columns);

        flashSuccess('Service created successfully.');
        return redirect()->route('admin.services.index');
    }

    public function render()
    {
        return view('livewire.admin.page.service.service-create');
    }
}