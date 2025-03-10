<!-- Start::row-1 -->
<div class="row row-sm my-4">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header p-2 border-bottom d-flex justify-content-between">
                <div class="card-title">
                    {{ $title }}
                </div>
                <div>
                    <x-a-link target="{{ $listRoute }}" href="{{ route($listRoute) }}" color="primary"
                        name="{{ $listButtonName }}" icon='<i class="bi bi-arrow-left"></i>' />
                </div>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="submitForm">
                    {{ $CardBody }}
                    @if ($bottomButton)
                        <div class="text-center mt-3" wire:ignore>
                            <button type="button" class="btn-raised-shadow btn-wave btn btn-danger mx-2"
                                onclick="window.location.reload();" data-bs-toggle="tooltip"
                                title="Reset form information">Reset</button>
                            <x-button color="success" name="Submit" title="Create new record" class="mx-2" />
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
<!--End::row-1 -->
