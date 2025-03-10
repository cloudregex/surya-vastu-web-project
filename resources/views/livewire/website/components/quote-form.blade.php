<form wire:submit.prevent="submit">
    <div class="row g-3">
        <div class="col-md-6">
            <label for="full_name" class="form-label">Full Name *</label>
            <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                wire:model.defer="full_name" id="full_name" placeholder="Enter your full name">
            @error('full_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email Address *</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model.defer="email"
                id="email" placeholder="Enter your email address">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Phone Number *</label>
            <input type="tel" class="form-control @error('phone') is-invalid @enderror" wire:model.defer="phone"
                id="phone" placeholder="Enter your phone number">
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-md-6">
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
        <div class="col-12">
            <label for="project_location" class="form-label">Project Location *</label>
            <input type="text" class="form-control @error('project_location') is-invalid @enderror"
                wire:model.defer="project_location" id="project_location" placeholder="Enter project location">
            @error('project_location')
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
        <div class="col-md-6">
            <label for="estimated_budget" class="form-label">Estimated Budget *</label>
            <select class="form-select @error('estimated_budget') is-invalid @enderror"
                wire:model.defer="estimated_budget" id="estimated_budget">
                <option value="">Estimated Budget</option>
                <option value="Below 50L">Below 50 Lakhs</option>
                <option value="50L-1Cr">50 Lakhs - 1 Crore</option>
                <option value="1Cr-5Cr">1 Crore - 5 Crore</option>
                <option value="Above 5Cr">Above 5 Crore</option>
            </select>
            @error('estimated_budget')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-6">
            <label for="expected_timeline" class="form-label">Expected Timeline *</label>
            <select class="form-select @error('expected_timeline') is-invalid @enderror"
                wire:model.defer="expected_timeline" id="expected_timeline">
                <option value="">Expected Timeline</option>
                <option value="3-6 months">3-6 months</option>
                <option value="6-12 months">6-12 months</option>
                <option value="1-2 years">1-2 years</option>
                <option value="2+ years">More than 2 years</option>
            </select>
            @error('expected_timeline')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
            <span wire:loading wire:target="submitForm">
                <i class="fas fa-spinner fa-spin"></i>
            </span>
            Submit Quote Request
        </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
</form>
