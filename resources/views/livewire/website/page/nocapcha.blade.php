<div>
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Load Google reCAPTCHA script -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <form wire:submit.prevent="submit">
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" class="form-control" wire:model="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label>Email:</label>
            <input type="email" class="form-control" wire:model="email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label>Message:</label>
            <textarea class="form-control" wire:model="message"></textarea>
            @error('message')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Google reCAPTCHA -->
        <div class="g-recaptcha" data-sitekey="{{ env('NOCAPTCHA_SITEKEY') }}"></div>
        <br>
        <button type="submit" onclick='handle()' class="btn btn-primary">Submit</button>
    </form>
</div>
