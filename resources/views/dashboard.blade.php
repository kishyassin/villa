<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Afficher les informations de l'utilisateur ou d'autres données -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h3>Welcome, {{ $user->name }}!</h3>
                    <p>Your email is: {{ $user->email }}</p>
                    <!-- Vous pouvez ajouter plus de contenu ici selon les besoins -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
