<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel Livewire Poll</title>

  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

  {{-- blade-formatter-disable --}}
  <style type="text/tailwindcss">
    .btn {
      @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
    }

    label {
      @apply block uppercase text-slate-700 mb-2
    }

    input,
    textarea {
      @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
    }

    .error {
      @apply text-red-500 text-sm
    }
  </style>
  {{-- blade-formatter-enable --}}

  @livewireStyles
</head>

<body class="container mx-auto mt-10 mb-10 max-w-7xl">
    <div class="flex gap-4">

        <div class="w-1/3">
            <h2 class="text-center text-2xl m-2">Create Poll</h2>
            @livewire('create-poll')
        </div>

        <div class="w-2/3 bg-slate-50 rounded-md p-4 h-full">
            <h2 class="text-center text-2xl m-2">Available Polls</h2>
            @livewire('polls')
        </div>

    </div>
    @livewireScripts
</body>

</html>
