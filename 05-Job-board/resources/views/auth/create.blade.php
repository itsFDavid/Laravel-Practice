<x-layout>
    <h1 class="my-16 text-center text-4xl font-medium text-slate-600">
        Sign in to your account
    </h1>

    <x-card class="py-8 px-16">
        <form action="{{ route('auth.login') }}" method="POST">
            @csrf

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
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="remember" id="" class="rounded-sm border border-slate-400">
                        <label for="remember">Remember me</label>
                    </div>
                </div>
                <div>
                    <a href="{{ route('auth.register') }}" class="text-indigo-600 hover:underline">Register?</a>
                </div>
            </div>

            <x-button class="w-full bg-green-200">Login</x-button>
        </form>
    </x-card>
</x-layout>
