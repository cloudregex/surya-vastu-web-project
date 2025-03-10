<?php

namespace App\Livewire\Admin\Page\Blog;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class BlogCreate extends Component
{
    use WithFileUploads;
    #[Title('Create Blog')]

    public $columns, $existingFile;

    public function mount()
    {
        if (!User::find(Auth::id())->can('admin.blog.create')) {
            abort(403); // Unauthorized access
        }
        $this->columns = Blog::getColumns();
        $this->existingFile = $this->columns['blog_image'];
    }

    // Define the rules dynamically
    protected function rules()
    {
        return Blog::rules();
    }

    // Define the messages dynamically
    protected function messages()
    {
        return Blog::messages();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $this->validate();

        // Upload the image
        if (!empty($this->columns['blog_image'])) {
            $this->columns['blog_image'] = uploadOrReplaceImage(
                $this->columns['blog_image'],
                $this->existingFile,
                'blogs'
            );
            $this->existingFile = $this->columns['blog_image'];
        }
        $this->columns['blog_slug'] = Str::slug($this->columns['blog_title']);
        // Save the blog entry
        Blog::create($this->columns);

        flashSuccess('Blog created successfully.');
        return redirect()->route('admin.blog.list');
    }

    public function render()
    {
        return view('livewire.admin.page.blog.blog-create');
    }
}