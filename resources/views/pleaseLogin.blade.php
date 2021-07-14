<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
        <h1 class="text-center font-bold text-xl p-3">{{__("Please Login")}}</h1>
        <a href="/login">
            <x-button class="ml-4">
                {{ __('Login With User') }}
            </x-button>
        </a>
        <a href="/admin-login">
            <x-button class="ml-4">
                {{ __('Login With Admin') }}
            </x-button>
        </a>
        
    </x-auth-card>
</x-guest-layout>
