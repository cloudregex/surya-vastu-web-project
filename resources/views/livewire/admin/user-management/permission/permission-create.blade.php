<x-card-comp listRoute="admin.permission.list" listButtonName="Go Permission List" title="Permission Create">
    <x-slot name="CardBody">
        @error('permissions')
            <x-failure message="{{ $message }}" />
        @enderror

        <div class="row">
            <div class="col-md-12 mb-3 d-flex justify-content-between">
                <h5>Select Permission</h5>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input form-checked-danger" id="select-all">
                    <label class="form-check-label" for="select-all">
                        <strong>Select All</strong>
                    </label>
                </div>
            </div>
            <hr>
            @forelse ($formattedRoutes as $key => $permission)
                <div class="col-md-4 mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input form-checked-success fs-5"
                            wire:model="permissions" value="{{ $permission['name'] }}"
                            id="permission-{{ $key + 1 }}">
                        <label class="form-check-label mt-1" for="permission-{{ $key + 1 }}">
                            <strong>{{ ucfirst($permission['title_name']) }}</strong>
                        </label>
                    </div>
                </div>
            @empty
                <div class="text-center p-5">
                    <i class="fa-solid fa-circle-info text-muted fa-5x"></i>
                    <br />
                    <br />
                    <h2>
                        Not Found New Permission
                    </h2>
                </div>
            @endforelse
            <hr>
        </div>
    </x-slot>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const selectAllCheckbox = document.getElementById('select-all');
                const permissionCheckboxes = document.querySelectorAll(
                    'input[type="checkbox"][wire\\:model="permissions"]'
                );

                selectAllCheckbox.addEventListener('change', function() {
                    permissionCheckboxes.forEach(function(checkbox) {
                        checkbox.checked = selectAllCheckbox.checked;
                        checkbox.dispatchEvent(new Event('change')); // This triggers Livewire to update
                    });
                });
            });
        </script>
    @endpush
</x-card-comp>
