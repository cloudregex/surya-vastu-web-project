<x-card-comp icon='<i class="bi bi-arrow-left"></i>' listRoute="admin.dashboard" listButtonName="Go Dashboard"
    title="Setting List" :bottomButton="false">
    <x-slot name="CardBody">
        <div class="row">
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="col-lg-12 col-md-12">
                <div class="card shadow-sm">
                    <div class="text-center mb-0 my-3">
                        <h5 class="card-title ">Admin Dashboard Register</h5>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <x-toggle-button click="onSubmit" value="{{ $register }}" />
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-card-comp>
