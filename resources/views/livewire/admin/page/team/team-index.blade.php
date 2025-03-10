<x-dynamic-table icon='<i class="bi bi-plus-lg"></i>' createRoute="admin.team.create" trashRoute="admin.team.trash"
    createButton="Create Team" filter="true" listName="Team List" :filters="$filters" :sortBy="$sortBy" :sortDir="$sortDir"
    :array="$team" :arrayThead="[
        ['th' => 'Sr.No'],
        ['th' => 'Profession', 'sort' => 'team_profession'],
        ['th' => 'Team User', 'sort' => 'team_user_name'],
        ['th' => 'Image', 'sort' => 'team_image'],
        ['th' => 'Action'],
    ]">
    <x-slot name="filter_data">
        <div class="row">
            <x-input type="text" placeholder="Enter Team Profession" col="6" name="filters.team_profession"
                value="{{ $filters['team_profession'] }}" label="Profession" modelOn='true' />
            <x-input type="text" placeholder="Enter Team User Name" col="6" name="filters.team_user_name"
                value="{{ $filters['team_user_name'] }}" label="User Name" modelOn='true' />
        </div>
    </x-slot>
    <x-slot name="tbody">
        @foreach ($team as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->team_profession }}</td>
                <td>{{ $item->team_user_name }}</td>
                <td>
                    @if ($item->team_image)
                        <img src="{{ asset('storage/' . $item->team_image) }}" alt="Team Image"
                            style="width: 100px; height: auto;">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    <x-a-link target="admin.team.edit"
                        href="{{ route('admin.team.edit', encryptData($item->team_id)) }}" color="success"
                        icon="<i class='fa-regular fa-pen-to-square'></i>" />
                    <x-a-link target="admin.team.delete"
                        href="{{ route('admin.team.delete', encryptData($item->team_id)) }}" color="danger"
                        icon="<i class='fa-solid fa-trash-can'></i>" />
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-dynamic-table>
