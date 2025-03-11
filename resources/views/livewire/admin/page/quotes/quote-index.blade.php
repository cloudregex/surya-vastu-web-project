<x-dynamic-table icon='<i class="bi bi-chat-quote"></i>' trashRoute="" createRoute="" createButton="" filter="true"
    listName="Appointments List" :filters="$filters" :sortBy="$sortBy" :sortDir="$sortDir" :array="$quotes" :arrayThead="[
        ['th' => 'Sr.No'],
        ['th' => 'Name', 'sort' => 'full_name'],
        ['th' => 'Email', 'sort' => 'email'],
        ['th' => 'Phone', 'sort' => 'phone'],
        ['th' => 'Project Type', 'sort' => 'project_type'],
        ['th' => 'Location', 'sort' => 'project_location'],
        ['th' => 'Date', 'sort' => 'project_date'],
        ['th' => 'Action'],
    ]">
    <x-slot name="filter_data">
        <div class="row g-3">
            <x-input type="text" col="4" placeholder="Enter Name" name="filters.full_name"
                value="{{ $filters['full_name'] }}" label="Name" modelOn="true" />
            <x-input type="text" col="4" placeholder="Enter Email" name="filters.email"
                value="{{ $filters['email'] }}" label="Email" modelOn="true" />
            <x-select dropdownParent="FilterModal" placeholder="Select Project Type" className="select_project_type"
                col="4" name="filters.project_type" :value="$filters['project_type']" label="Project Type" :options="[
                    (object) ['value' => 'Residential', 'text' => 'Residential'],
                    (object) ['value' => 'Commercial', 'text' => 'Commercial'],
                    (object) ['value' => 'Industrial', 'text' => 'Industrial'],
                    (object) ['value' => 'Infrastructure', 'text' => 'Infrastructure'],
                ]"
                optionsid="value" optionsName="text" :shouldLive="false" />
            <x-input type="text" col="4" placeholder="Enter Phone" name="filters.phone"
                value="{{ $filters['phone'] }}" label="Phone" modelOn="true" />
            <x-input type="text" col="4" placeholder="Enter Location" name="filters.project_location"
                value="{{ $filters['project_location'] }}" label="Location" modelOn="true" />
        </div>
    </x-slot>
    <x-slot name="tbody">
        @foreach ($quotes as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->full_name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->project_type }}</td>
                <td>{{ $item->project_location }}</td>
                <td>{{ format_date($item->project_date) }}</td>
                <td>
                    <button class="btn btn-danger" wire:click="deleteQuote('{{ encryptData($item->quote_id) }}')">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-dynamic-table>
