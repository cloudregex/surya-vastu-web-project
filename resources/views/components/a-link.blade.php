@can($target)
    <a href="{{ $href }}" class="btn-raised-shadow btn-wave btn-sm btn btn-{{ $color }} {{ $class }}"
        data-bs-toggle="tooltip" title="{{ $name }}">
        @if (isset($icon))
            {!! $icon !!}
        @endif
        @if ($name)
            {{ $name }}
        @endif
    </a>
@else
    <button class="btn btn-{{ $color }} btn-raised-shadow btn-wave" data-bs-toggle="tooltip"
        title="You do not have permission to access this page.">
        {{ $name }} <i class="fa-solid fa-ban"></i></button>
@endcan
