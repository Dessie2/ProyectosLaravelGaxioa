<x-admin-layout title=Usuarios| Dr.Gaxiola :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    ['name' => 'Usuario'],
]">

<div class="flex justify-end mb-4">
    <x-wire-button href="{{ route('admin.users.index') }}" blue>
        <i class="fa-solid fa-plus mr-2"></i> Nuevo
    </x-wire-button>
</div>

    @livewire('admin.datatables.user-table')
</x-admin-layout>