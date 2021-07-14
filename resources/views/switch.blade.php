<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
        <form method="POST" action="{{ route('switching') }}">
            @csrf
            @if(Auth::guard('admin')->check())
                <h1 class="text-center font-bold text-xl p-3">{{__("Switch to User")}}</h1>
            @else
                <h1 class="text-center font-bold text-xl p-3">{{__("Switch to Admin")}}</h1>
            @endif

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Confirm Your Account')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" placeholder="Your Password"/>
                @if(session()->has('message'))
                    <div class="alert text-center text-red-500">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Switch') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
