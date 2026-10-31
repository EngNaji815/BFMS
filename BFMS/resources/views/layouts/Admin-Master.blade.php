<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SCMS Dashboard')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 text-slate-800">

<div class="min-h-screen">

  
    <div
        id="sidebar-overlay"
        class="fixed inset-0 z-40 hidden bg-slate-950/50 backdrop-blur-[1px] lg:hidden"
    ></div>

   
    @include('layouts.SideBars.AdminSidebar')


    <div
        id="main-content"
        class="min-h-screen transition-all duration-300 lg:ml-64"
    >

        <div class="flex min-h-screen flex-col">

            {{-- Header --}}
            @include('layouts.header')


            {{-- Page Content --}}
            <main class="flex-1 p-4 sm:p-5 md:p-6 lg:p-7">

                @if(session('success'))
                    <div
                        class="mb-5 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700"
                    >
                        {{ session('success') }}
                    </div>
                @endif


                @if($errors->any())
                    <div
                        class="mb-5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700"
                    >
                        <ul class="list-inside list-disc space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                @yield('content')

            </main>


            {{-- Footer --}}
            @include('layouts.footer')

        </div>

    </div>

</div>

</body>
</html>