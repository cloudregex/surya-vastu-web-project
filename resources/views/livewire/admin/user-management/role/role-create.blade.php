<x-card-comp listRoute="admin.role.list" listButtonName="Go Role List" title="Role Create">
    <x-slot name="CardBody">

        <x-input type="text" placeholder="Enter your Role" col="12" name="roleName" value=""
            label="Role Name" />

        <div class="row border">
            <div class="col-md-12 mb-2 d-flex justify-content-between mt-3">
                <h5>Select Permission</h5>
                @error('permissions')
                    <span>
                        <x-failure message="{{ $message }}" />
                    </span>
                @enderror
                <div class="form-check">
                    <input type="checkbox" class="form-check-input form-checked-danger fs-5" id="select-all">
                    <label class="form-check-label mt-1" for="select-all">
                        <strong>Select All</strong>
                    </label>
                </div>
            </div>

            @foreach ($availablePermissions as $key => $group)
                <div class="col-md-4 pb-3 border p-0">
                    <div class="d-flex justify-content-between bg-primary-gradient p-1">
                        <h6 class="text-white">{{ ucfirst($group['prefix_name']) }} Permissions</h6>
                        <input type="checkbox" class="form-check-input form-checked-primary fs-6" title="Check All"
                            onclick="CheckedGroup(this, 'checked-{{ $key }}')">
                    </div>
                    @foreach ($group['data'] as $permission)
                        <div class="form-check mx-3">
                            <input type="checkbox"
                                class="form-check-input form-checked-success fs-5 checked-{{ $key }}"
                                wire:model="permissions" value="{{ $permission['name'] }}"
                                id="permission-{{ $permission['id'] }}">
                            <label class="form-check-label mt-1" for="permission-{{ $permission['id'] }}">
                                <strong>{{ ucfirst($permission['title_name']) }}</strong>
                            </label>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </x-slot>
    @push('scripts')
        <script>
            // Select All functionality
            document.getElementById('select-all').addEventListener('change', function(e) {
                const allCheckboxes = document.querySelectorAll('input[type="checkbox"][wire\\:model="permissions"]');
                allCheckboxes.forEach(checkbox => {
                    checkbox.checked = e.target.checked;
                    checkbox.dispatchEvent(new Event('change')); // Trigger change event for Livewire
                });
            });

            // Group-level Select All functionality
            function CheckedGroup(checkboxElement, className) {
                const checkboxes = document.querySelectorAll(`.${className}`);
                checkboxes.forEach(checkbox => {
                    checkbox.checked = checkboxElement.checked;
                    checkbox.dispatchEvent(new Event('change')); // Trigger change event for Livewire
                });
            }
        </script>
    @endpush
</x-card-comp>
