<div class="flex items-center space-x-2">

    <x-wire-button href="{{ route('admin.roles.edit', $role) }}" blue xs>
        <i class="fa-solid fa-pen-to-square"></i>
    </x-wire-button>

    <form action="{{ route('admin.roles.destroy', $role) }}" method="GET" class="inline">
        @csrf
        @method('DELETE')
        <x-wire-button type="submit" red xs>
            <li class="fa-solid fa-trash"></li>
        </x-wire-button>
    </form>

</div>
