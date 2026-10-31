<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BFMS | Smart Construction Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-900 antialiased">

    {{-- Navbar --}}
    <header class="bg-white border-b border-slate-200">
        <nav class="max-w-7xl mx-auto px-6 lg:px-8 h-20 flex items-center justify-between">

            {{-- Brand --}}
            <a href="{{ url('/') }}" class="flex items-center gap-3">

                <div class="w-10 h-10 bg-amber-500 rounded-lg flex items-center justify-center">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        class="w-6 h-6 text-slate-900"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 21h18M5 21V9l7-4 7 4v12M9 21v-6h6v6M9 10h.01M15 10h.01"/>
                    </svg>
                </div>

                <div>
                    <p class="font-bold text-xl tracking-tight text-slate-900">
                        BFMS
                    </p>

                    <p class="text-xs text-slate-500 hidden sm:block">
                        Smart Construction Management System
                    </p>
                </div>

            </a>


            {{-- Authentication --}}
            @guest
                <a
                    href="{{ route('login') }}"
                    class="inline-flex items-center justify-center rounded-lg bg-slate-900
                           px-5 py-2.5 text-sm font-semibold text-white transition
                           hover:bg-slate-700"
                >
                    Sign In
                </a>
            @else

                @php
                    $dashboardRoute = match(auth()->user()->role) {
                        'admin' => 'admin.dashboard',
                        'manager' => 'manager.dashboard',
                        'employee' => 'employee.dashboard',
                        'customer' => 'customer.dashboard',
                        default => null,
                    };
                @endphp

                @if($dashboardRoute)
                    <a
                        href="{{ route($dashboardRoute) }}"
                        class="inline-flex items-center justify-center rounded-lg
                               bg-slate-900 px-5 py-2.5 text-sm font-semibold
                               text-white transition hover:bg-slate-700"
                    >
                        Dashboard
                    </a>
                @endif

            @endguest

        </nav>
    </header>


    <main>

        {{-- Hero --}}
        <section class="relative overflow-hidden bg-white">

            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20 lg:py-28">

                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    {{-- Hero Content --}}
                    <div>

                        <div class="inline-flex items-center gap-2 rounded-full
                                    border border-amber-200 bg-amber-50
                                    px-3 py-1.5 text-sm text-amber-800 mb-7">

                            <span class="w-2 h-2 rounded-full bg-amber-500"></span>

                            Smart Construction Management
                        </div>


                        <h1 class="text-4xl sm:text-5xl lg:text-6xl
                                   font-bold tracking-tight text-slate-900 leading-tight">

                            Build smarter.
                            <br>

                            <span class="text-slate-500">
                                Manage better.
                            </span>

                        </h1>


                        <p class="mt-6 text-lg leading-8 text-slate-600 max-w-xl">
                            BFMS provides a centralized platform for managing construction
                            projects, site operations, workers, materials, costs and project
                            progress from one organized workspace.
                        </p>


                        <div class="mt-9 flex flex-wrap items-center gap-5">

                            @guest
                                <a
                                    href="{{ route('login') }}"
                                    class="inline-flex items-center gap-2 rounded-lg
                                           bg-slate-900 px-6 py-3 text-sm font-semibold
                                           text-white shadow-sm transition hover:bg-slate-700"
                                >
                                    Sign In to BFMS

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        class="w-4 h-4"
                                    >
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M5 12h14M13 6l6 6-6 6"/>
                                    </svg>
                                </a>
                            @endguest


                            <a
                                href="#features"
                                class="text-sm font-semibold text-slate-700
                                       hover:text-slate-900 transition"
                            >
                                Explore the system
                            </a>

                        </div>

                    </div>


                    {{-- Construction Dashboard Preview --}}
                    <div class="relative">

                        <div class="absolute -inset-6 bg-amber-50 rounded-3xl -z-10"></div>

                        <div class="bg-white border border-slate-200 rounded-2xl
                                    shadow-xl overflow-hidden">

                            {{-- Preview Header --}}
                            <div class="h-12 border-b border-slate-200
                                        flex items-center px-5 justify-between">

                                <div class="flex gap-1.5">
                                    <span class="w-2.5 h-2.5 rounded-full bg-slate-300"></span>
                                    <span class="w-2.5 h-2.5 rounded-full bg-slate-300"></span>
                                    <span class="w-2.5 h-2.5 rounded-full bg-slate-300"></span>
                                </div>

                                <span class="text-xs text-slate-400">
                                    Construction Dashboard
                                </span>

                            </div>


                            <div class="flex min-h-97.5">

                                {{-- Sidebar --}}
                                <aside class="hidden sm:block w-44 bg-slate-900 p-4">

                                    <div class="flex items-center gap-2 mb-8">

                                        <div class="w-7 h-7 bg-amber-500 rounded-md
                                                    flex items-center justify-center">

                                            <span class="text-slate-900 font-bold text-xs">
                                                B
                                            </span>

                                        </div>

                                        <span class="text-white font-semibold text-sm">
                                            BFMS
                                        </span>

                                    </div>


                                    <div class="space-y-2">

                                        <div class="bg-slate-800 text-white rounded-md
                                                    px-3 py-2 text-xs">
                                            Overview
                                        </div>

                                        <div class="text-slate-400 px-3 py-2 text-xs">
                                            Projects
                                        </div>

                                        <div class="text-slate-400 px-3 py-2 text-xs">
                                            Sites
                                        </div>

                                        <div class="text-slate-400 px-3 py-2 text-xs">
                                            Workers
                                        </div>

                                        <div class="text-slate-400 px-3 py-2 text-xs">
                                            Materials
                                        </div>

                                        <div class="text-slate-400 px-3 py-2 text-xs">
                                            Expenses
                                        </div>

                                    </div>

                                </aside>


                                {{-- Dashboard --}}
                                <div class="flex-1 bg-slate-50 p-5">

                                    <div class="flex justify-between items-start mb-6">

                                        <div>
                                            <p class="font-semibold text-slate-900">
                                                Project Overview
                                            </p>

                                            <p class="text-xs text-slate-500 mt-1">
                                                Current construction activity
                                            </p>
                                        </div>

                                        <span class="text-xs bg-emerald-50
                                                     text-emerald-700 px-2.5 py-1 rounded-full">
                                            Active
                                        </span>

                                    </div>


                                    {{-- Statistics --}}
                                    <div class="grid grid-cols-2 gap-3">

                                        <div class="bg-white border border-slate-200
                                                    rounded-lg p-4">

                                            <p class="text-xs text-slate-500">
                                                Active Projects
                                            </p>

                                            <p class="text-2xl font-bold mt-2">
                                                12
                                            </p>

                                            <p class="text-xs text-emerald-600 mt-2">
                                                8 on schedule
                                            </p>

                                        </div>


                                        <div class="bg-white border border-slate-200
                                                    rounded-lg p-4">

                                            <p class="text-xs text-slate-500">
                                                Site Workers
                                            </p>

                                            <p class="text-2xl font-bold mt-2">
                                                146
                                            </p>

                                            <p class="text-xs text-slate-400 mt-2">
                                                Across all sites
                                            </p>

                                        </div>


                                        <div class="bg-white border border-slate-200
                                                    rounded-lg p-4">

                                            <p class="text-xs text-slate-500">
                                                Pending Tasks
                                            </p>

                                            <p class="text-2xl font-bold mt-2">
                                                27
                                            </p>

                                            <p class="text-xs text-amber-600 mt-2">
                                                Requires attention
                                            </p>

                                        </div>


                                        <div class="bg-white border border-slate-200
                                                    rounded-lg p-4">

                                            <p class="text-xs text-slate-500">
                                                Materials
                                            </p>

                                            <p class="text-2xl font-bold mt-2">
                                                84
                                            </p>

                                            <p class="text-xs text-slate-400 mt-2">
                                                Tracked items
                                            </p>

                                        </div>

                                    </div>


                                    {{-- Project Progress --}}
                                    <div class="mt-4 bg-white border border-slate-200
                                                rounded-lg p-4">

                                        <div class="flex justify-between items-center mb-3">

                                            <div>
                                                <p class="text-sm font-semibold">
                                                    Project Progress
                                                </p>

                                                <p class="text-xs text-slate-400 mt-0.5">
                                                    Main Building
                                                </p>
                                            </div>

                                            <span class="text-sm font-semibold">
                                                68%
                                            </span>

                                        </div>


                                        <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">

                                            <div class="h-full bg-amber-500 rounded-full"
                                                 style="width: 68%">
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- Features --}}
        <section id="features" class="border-t border-slate-200 bg-slate-50">

            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">

                <div class="max-w-2xl">

                    <p class="text-sm font-semibold text-amber-600 uppercase tracking-wider">
                        Construction Operations
                    </p>

                    <h2 class="mt-3 text-3xl font-bold tracking-tight text-slate-900">
                        Everything needed to keep projects organized
                    </h2>

                    <p class="mt-4 text-slate-600 leading-7">
                        Keep project information, field operations and resources connected
                        so teams can monitor work and make better decisions.
                    </p>

                </div>


                <div class="mt-12 grid md:grid-cols-2 lg:grid-cols-4 gap-5">

                    {{-- Projects --}}
                    <div class="bg-white border border-slate-200
                                rounded-xl p-6 hover:shadow-sm transition">

                        <div class="w-11 h-11 rounded-lg bg-amber-50
                                    text-amber-700 flex items-center justify-center mb-5">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.8"
                                 stroke="currentColor"
                                 class="w-5 h-5">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M3 21h18M5 21V9l7-4 7 4v12M9 21v-6h6v6"/>
                            </svg>

                        </div>

                        <h3 class="font-semibold">
                            Project Management
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Organize construction projects, schedules, milestones
                            and overall progress.
                        </p>

                    </div>


                    {{-- Site --}}
                    <div class="bg-white border border-slate-200
                                rounded-xl p-6 hover:shadow-sm transition">

                        <div class="w-11 h-11 rounded-lg bg-amber-50
                                    text-amber-700 flex items-center justify-center mb-5">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.8"
                                 stroke="currentColor"
                                 class="w-5 h-5">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M12 21s6-5.4 6-11a6 6 0 1 0-12 0c0 5.6 6 11 6 11Z"/>

                                <circle cx="12" cy="10" r="2"/>
                            </svg>

                        </div>

                        <h3 class="font-semibold">
                            Site Operations
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Monitor active construction sites and keep daily
                            field operations organized.
                        </p>

                    </div>


                    {{-- Workers --}}
                    <div class="bg-white border border-slate-200
                                rounded-xl p-6 hover:shadow-sm transition">

                        <div class="w-11 h-11 rounded-lg bg-amber-50
                                    text-amber-700 flex items-center justify-center mb-5">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.8"
                                 stroke="currentColor"
                                 class="w-5 h-5">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8ZM22 21v-2a4 4 0 0 0-3-3.87"/>
                            </svg>

                        </div>

                        <h3 class="font-semibold">
                            Workforce Management
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Manage workers, assignments and responsibilities
                            across construction sites.
                        </p>

                    </div>


                    {{-- Materials --}}
                    <div class="bg-white border border-slate-200
                                rounded-xl p-6 hover:shadow-sm transition">

                        <div class="w-11 h-11 rounded-lg bg-amber-50
                                    text-amber-700 flex items-center justify-center mb-5">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke-width="1.8"
                                 stroke="currentColor"
                                 class="w-5 h-5">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="m12 3 9 5-9 5-9-5 9-5Zm-9 10 9 5 9-5M3 17l9 5 9-5"/>
                            </svg>

                        </div>

                        <h3 class="font-semibold">
                            Materials & Resources
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-600">
                            Track construction materials and resources required
                            for ongoing project work.
                        </p>

                    </div>

                </div>

            </div>

        </section>


        {{-- Management Section --}}
        <section class="bg-white border-t border-slate-200">

            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">

                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <div>

                        <p class="text-sm font-semibold text-amber-600
                                  uppercase tracking-wider">
                            Better Visibility
                        </p>

                        <h2 class="mt-3 text-3xl lg:text-4xl font-bold
                                   tracking-tight text-slate-900">
                            Keep every part of the project connected
                        </h2>

                        <p class="mt-5 text-slate-600 leading-7">
                            Construction projects involve people, materials,
                            schedules and costs. BFMS brings this information
                            together so management can follow project activity
                            without relying on disconnected records.
                        </p>

                    </div>


                    <div class="grid grid-cols-2 gap-4">

                        <div class="border border-slate-200 rounded-xl p-6">
                            <p class="text-sm text-slate-500">Projects</p>
                            <p class="mt-2 font-semibold">Progress Tracking</p>
                        </div>

                        <div class="border border-slate-200 rounded-xl p-6">
                            <p class="text-sm text-slate-500">Sites</p>
                            <p class="mt-2 font-semibold">Daily Operations</p>
                        </div>

                        <div class="border border-slate-200 rounded-xl p-6">
                            <p class="text-sm text-slate-500">Resources</p>
                            <p class="mt-2 font-semibold">Material Tracking</p>
                        </div>

                        <div class="border border-slate-200 rounded-xl p-6">
                            <p class="text-sm text-slate-500">Management</p>
                            <p class="mt-2 font-semibold">Cost Monitoring</p>
                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- CTA --}}
        <section class="bg-slate-50 border-t border-slate-200">

            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">

                <div class="bg-slate-900 rounded-2xl px-8 py-12 lg:px-12
                            flex flex-col lg:flex-row lg:items-center
                            lg:justify-between gap-8">

                    <div>

                        <h2 class="text-2xl font-bold text-white">
                            Access the construction management system
                        </h2>

                        <p class="mt-2 text-slate-400 max-w-xl">
                            Sign in with your assigned account to access
                            projects and tools available for your role.
                        </p>

                    </div>


                    @guest
                        <a
                            href="{{ route('login') }}"
                            class="shrink-0 inline-flex justify-center items-center
                                   rounded-lg bg-amber-500 px-6 py-3
                                   text-sm font-semibold text-slate-900
                                   transition hover:bg-amber-400"
                        >
                            Sign In
                        </a>
                    @endguest

                </div>

            </div>

        </section>

    </main>


    {{-- Footer --}}
    <footer class="bg-white border-t border-slate-200">

        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-8
                    flex flex-col sm:flex-row gap-4 justify-between items-center">

            <div class="flex items-center gap-2">

                <div class="w-7 h-7 bg-amber-500 rounded-md
                            flex items-center justify-center">

                    <span class="text-slate-900 text-xs font-bold">
                        B
                    </span>

                </div>

                <span class="font-semibold text-slate-900">
                    BFMS
                </span>

            </div>


            <p class="text-sm text-slate-500">
                Smart Construction Management System
            </p>

        </div>

    </footer>

</body>
</html>