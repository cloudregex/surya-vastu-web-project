@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/libs/quill/quill.snow.css') }}">
@endpush

<div class="col-md-{{ $col }}">
    <input type="hidden" name="{{ $name }}" wire:model.lazy="{{ $name }}" value="{{ $value }}">
    <div class="d-flex justify-content-between">
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
        @error($name)
            <span class="text-danger float-end">{{ $message }}</span>
        @enderror
    </div>
    <div wire:ignore>
        <div class="quillEditor"></div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('assets/libs/quill/quill.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quill = new Quill('.quillEditor', {
                theme: 'snow',
                placeholder: '{{ $placeholder }}',
                modules: {
                    toolbar: [
                        [{
                            'font': []
                        }],
                        [{
                            'header': [1, 2, 3, 4, 5, 6, false]
                        }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            'color': []
                        }, {
                            'background': []
                        }],
                        [{
                            'script': 'sub'
                        }, {
                            'script': 'super'
                        }],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        [{
                            'indent': '-1'
                        }, {
                            'indent': '+1'
                        }],
                        [{
                            'align': []
                        }],
                        ['blockquote', 'code-block'],
                        ['link', 'image', 'video'],
                        ['clean']
                    ]
                }
            });

            // Load initial content into Quill
            const initialContent = `{!! $value !!}`;
            quill.root.innerHTML = initialContent;

            // Sync Quill data with hidden input and Livewire
            const hiddenInput = document.querySelector('input[name="{{ $name }}"]');
            quill.on('text-change', function() {
                const quillContent = quill.root.innerHTML;
                hiddenInput.value = quillContent;
                hiddenInput.dispatchEvent(new Event('input')); // Trigger Livewire's update
            });
        });
    </script>
@endpush
