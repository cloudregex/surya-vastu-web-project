<div>
    <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown"
        data-bs-auto-close="outside" aria-expanded="false">
        @if ($profile->profile_picture)
            @if (substr($profile->profile_picture, 0, 16) != 'profile_pictures')
                <img alt="logo" src="{{ $profile->profile_picture }}" width="37" height="37"
                    class="rounded-circle">
            @else
                <img alt="logo" src="{{ url('/storage/' . $profile->profile_picture) }}" width="37"
                    height="37" class="rounded-circle">
            @endif
        @else
            <img src="{{ asset('assets/images/faces/6.jpg') }}" alt="img" width="37" height="37"
                class="rounded-circle">
        @endif

    </a>

    <ul class="main-header-dropdown dropdown-menu pt-0 header-profile-dropdown dropdown-menu-end main-profile-menu"
        aria-labelledby="mainHeaderProfile">
        <li>
            <div class="main-header-profile bg-primary menu-header-content text-fixed-white">
                <div class="my-auto">
                    <h6 class="mb-0 lh-1 text-fixed-white">{{ $profile->name }}</h6>
                </div>
            </div>
        </li>
        <li><a class="dropdown-item d-flex" href="{{ route('auth.profile') }}"><i
                    class="bx bx-user-circle fs-18 me-2 op-7"></i>Profile</a></li>
        <li><a class="dropdown-item d-flex" href="/messages"><i class="bx bx-envelope fs-18 me-2 op-7"></i>Messages</a>
        </li>
        <li>
            <a class="dropdown-item d-flex" href="#" wire:click.prevent="Logout">
                <i class="bx bx-log-out fs-18 me-2 op-7"></i>Sign Out
            </a>
        </li>
    </ul>
</div>
