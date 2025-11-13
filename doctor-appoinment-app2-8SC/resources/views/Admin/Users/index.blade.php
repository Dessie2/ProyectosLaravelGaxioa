<x-admin-layout title="Usuarios | Healthify" :breadcrumbs="[['name' => 'Dashboard', 'href' => route('admin.dashboard')], ['name' => 'Usuarios']]">

    <x-slot name="actions">
        <x-wire-button href="{{ route('admin.users.create') }}" blue>
            <i class="fa-solid fa-plus mr-2"></i> Nuevo
        </x-wire-button>
    </x-slot>

</x-admin-layout>
