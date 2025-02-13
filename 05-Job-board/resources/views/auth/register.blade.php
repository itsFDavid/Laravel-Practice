<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-slate-600">
        Register for an account
    </h1>

    <x-card>
        <form action="{{ route('auth.register') }}" method="POST">
            @csrf

            <div class="mb-8">
                <x-label for="name" :required="true">
                    Name
                </x-label>
                <x-text-input name="name" />
            </div>

            <div class="mb-8">
                <x-label for="email" :required="true">
                    E-mail
                </x-label>
                <x-text-input name="email" type="email" />
            </div>

            <div class="mb-8">
                <x-label for="password" :required="true">
                    Password
                </x-label>
                <x-text-input name="password" type="password" />
            </div>


            <div class="mb-8 flex justify-between items-center text-sm font-medium">
                <div>
                    <a href="{{ route('auth.login' )}}" class="text-indigo-600 hover:underline">Sign In?</a>
                </div>
            </div>

            <x-button class="w-full bg-green-200">Create account</x-button>
        </form>
    </x-card>

</x-layout>
