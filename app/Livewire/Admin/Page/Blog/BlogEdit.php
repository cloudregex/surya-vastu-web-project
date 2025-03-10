<?php

namespace App\Livewire\Admin\Page\Blog;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogEdit extends Component
{
    use WithFileUploads;
    #[Title('Edit Blog')]

    public $columns, $existingFile;

    public function mount($encryptedId)
    {
        if (!User::find(Auth::id())->can('admin.blog.edit')) {
            abort(403);
        }

        $this->columns = Blog::getColumns();
        // Retrieve the user by ID
        $this->columns['blog_id'] = decryptData($encryptedId);
        $blog = Blog::findOrFail($this->columns['blog_id']);
        if ($blog) {
            foreach ($this->columns as $key => $column) {
                $this->columns[$key] = $blog[$key];
            }
            $this->columns['blog_image'] = '';
            $this->existingFile = $blog->blog_image;
        }
    }

    // Define the rules dynamically
    protected function rules()
    {
        return Blog::rules($this->columns['blog_id']);
    }

    // Define the messages dynamically
    protected function messages()
    {
        return Blog::messages();
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);  // Validate only the updated field
    }

    public function submitForm()
    {
        $this->validate();

        // simple store Image code
        if (!empty($this->columns['blog_image'])) {
            $this->columns['blog_image'] = uploadOrReplaceImage(
                $this->columns['blog_image'],
                $this->existingFile,
                'blogs'
            );
            $this->existingFile = $this->columns['blog_image'];
        } else {
            $this->columns['blog_image'] =  $this->existingFile;
        }
        $this->columns['blog_slug'] = Str::slug($this->columns['blog_title']);
        Blog::updateOrCreate(
            ['blog_id' =>  $this->columns['blog_id']],
            $this->columns
        );

        flashSuccess('Blog updated successfully.');
        return redirect()->route('admin.blog.list');
    }

    public function render()
    {
        return view('livewire.admin.page.blog.blog-edit');
    }
}