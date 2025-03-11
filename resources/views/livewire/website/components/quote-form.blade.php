<form wire:submit.prevent="submit">
    <div class="row g-3">
        <div class="col-12 col-md-6">
            <label for="full_name" class="form-label">Full Name *</label>
            <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                wire:model.defer="full_name" id="full_name" placeholder="Enter your full name">
            @error('full_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12 col-md-6">
            <label for="email" class="form-label">Email Address *</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model.defer="email"
                id="email" placeholder="Enter your email address">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12 col-md-6">
            <label for="phone" class="form-label">Phone Number *</label>
            <input type="tel" class="form-control @error('phone') is-invalid @enderror" wire:model.defer="phone"
                id="phone" placeholder="Enter your phone number">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12 col-md-6">
            <label for="project_type" class="form-label">Project Type *</label>
            <select class="form-select @error('project_type') is-invalid @enderror" wire:model.defer="project_type"
                id="project_type">
                <option value="">Select Project Type</option>
                <option value="Commercial">Commercial Construction</option>
                <option value="Residential">Residential Project</option>
                <option value="Industrial">Industrial Project</option>
                <option value="Infrastructure">Infrastructure Development</option>
                <option value="Renovation">Renovation</option>
            </select>
            @error('project_type')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12 col-md-6">
            <label for="project_location" class="form-label">Project Location *</label>
            <input type="text" class="form-control @error('project_location') is-invalid @enderror"
                wire:model.defer="project_location" id="project_location" placeholder="Enter project location">
            @error('project_location')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12 col-md-6">
            <label for="project_date" class="form-label">Project Date</label>
            <input type="date" class="form-control @error('project_date') is-invalid @enderror"
                wire:model.defer="project_date" id="project_date">
            @error('project_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-12">
            <label for="project_description" class="form-label">Project Description *</label>
            <textarea class="form-control @error('project_description') is-invalid @enderror" wire:model.defer="project_description"
                id="project_description" rows="4" placeholder="Provide a brief description of your project"></textarea>
            @error('project_description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-center align-items-center">
        <button type="submit" class="btn btn-primary w-100 w-md-auto" wire:loading.attr="disabled">
            <span wire:loading wire:target="submit">
                <i class="fas fa-spinner fa-spin"></i>
            </span>
            Book Appointment
        </button>
    </div>
</form>
