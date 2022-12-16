<div class="flex flex-col bg-gray-900 w-full h-screen"
            x-data="{
            showSubscribe: @entangle('showSubscribe'),
            showSuccess: @entangle('showSuccess'),
        }">

    <nav class="flex pt-5 justify-between container mx-auto text-indigo-200">
        <a class="text-4xl font-bold" href="/">

            <x-application-logo class="w-16 h-16 fill-current"></x-application-logo>
        </a>

        <div class="flex justify-end">
            @auth
            <a href="{{ route('dashboard') }}">Dashboard</a>
            @else
            <a href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </nav>

    <div class="flex container mx-auto items-center h-full">

        <div class="flex flex-col w-1/3 items-start">

            <h1 class="text-white font-bold text-5xl leading-tight mb-4">Tailwind | Alpine | Laravel & Livewire</h1>

            <p class="text-indigo-200 text-xl mb-10">Discover the power of the
                <span class="font-bold underline">TALL</span> stack.</p>

            <x-danger-button class="py-3 px-8 bg-red-500 hover:bg-red-200 font-bold"
            x-on:click="showSubscribe = true">SUBSCRIBE NOW</x-danger-button>
        </div>

    </div>

    <x-modal class="bg-red-500" trigger="showSubscribe">

        <p class="text-white text-3xl font-extrabold text-center mt-12">Enter your email below</p>
        <form class="flex flex-col items-center p-14"
        wire:submit.prevent="subscribe">

            <x-text-input class="px-3 py-3 w-80 border border-blue-400"
            type="email"
            name="email"
            placeholder="Email Address"
            wire:model="email"></x-text-input>

            <span class="text-gray-100 text-md pt-10 font-bold">
            {{
                    $errors->has('email')
                    ? $errors->first('email')
                    : 'We will send you a confirmation email.'
                }}
           </span>

            <x-secondary-button class="px-5 py-4 mt-5 w-80 bg-blue-500 justify-center"
            wire:click="subscribe">
            <span class="animate-spin" wire:loading wire:target="subscribe">&#9696</span>
<span wire:loading.remove wire:target="subscribe">Get In</span>
        </x-secondary-button>
        </form>

    </x-modal>

    <x-modal class="bg-green-500" trigger="showSuccess">

        <p class="animate-pulse text-white text-9xl font-extrabold text-center mt-8">&check;</p>

        <p class="text-white text-5xl font-extrabold text-center mt-1"></p>

@if (request()->has('verified') && request()->verified == 1)

        <p class="text-white text-3xl text-center mt-4">Thanks for confirming!</p>

@else

        <p class="text-white text-3xl text-center mt-4">Please check your inbox!</p>

@endif

    </x-modal>
</div>
