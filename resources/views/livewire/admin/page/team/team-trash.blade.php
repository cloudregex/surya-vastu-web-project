<x-dynamic-table icon='<i class="bi bi-arrow-left"></i>' createRoute="admin.team.list" createButton="Go to team List"
    listName="Trash List" :sortBy="$sortBy" :sortDir="$sortDir" :array="$team" :arrayThead="[
        ['th' => 'Sr.No'],
        ['th' => 'Profession', 'sort' => 'team_profession'],
        ['th' => 'Team User', 'sort' => 'team_user_name'],
        ['th' => 'Image', 'sort' => 'team_image'],
        ['th' => 'Action'],
    ]">
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
                    <x-a-link target="admin.team.delete"
                        href="{{ route('admin.team.delete', encryptData($item->team_id)) }}" color="success"
                        icon="<i class='fa-solid fa-trash-can-arrow-up'></i>" />
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-dynamic-table>
