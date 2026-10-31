<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign In | BFMS</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 text-slate-900 antialiased">

    <main class="min-h-screen lg:grid lg:grid-cols-2">

        {{-- Left Side --}}
        <section class="hidden lg:flex relative bg-slate-900 overflow-hidden">

            {{-- Subtle construction grid --}}
            <div
                class="absolute inset-0 opacity-[0.035]"
                style="
                    background-image:
                        linear-gradient(to right, white 1px, transparent 1px),
                        linear-gradient(to bottom, white 1px, transparent 1px);
                    background-size: 40px 40px;
                ">
            </div>

            {{-- Accent --}}
            <div class="absolute top-0 left-0 w-full h-1.5 bg-amber-500"></div>

            <div class="relative z-10 flex flex-col justify-between w-full p-12 xl:p-16">

                {{-- Brand --}}
                <a href="{{ url('/') }}" class="inline-flex items-center gap-3 w-fit">

                    <div class="w-11 h-11 rounded-lg bg-amber-500
                                flex items-center justify-center">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            class="w-6 h-6 text-slate-900"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 21h18M5 21V9l7-4 7 4v12M9 21v-6h6v6M9 10h.01M15 10h.01"
                            />
                        </svg>

                    </div>

                    <div>
                        <p class="text-white text-xl font-bold tracking-tight">
                            BFMS
                        </p>

                        <p class="text-slate-400 text-xs">
                            Smart Construction Management System
                        </p>
                    </div>

                </a>


                {{-- Main Content --}}
                <div class="max-w-lg">

                    <div class="w-12 h-1 bg-amber-500 mb-7"></div>

                    <h1 class="text-4xl xl:text-5xl font-bold text-white
                               tracking-tight leading-tight">

                        Keep the project moving.

                    </h1>

                    <p class="mt-6 text-lg leading-8 text-slate-400">
                        Access project information, site activity, resources
                        and the tools you need for your daily work.
                    </p>


                    {{-- Small project status card --}}
                    <div class="mt-10 max-w-md border border-slate-700
                                bg-slate-800/60 rounded-xl p-5">

                        <div class="flex items-center justify-between">

                            <div>
                                <p class="text-xs uppercase tracking-wider text-slate-500">
                                    System
                                </p>

                                <p class="mt-1 text-sm font-medium text-slate-200">
                                    Construction Operations
                                </p>
                            </div>

                            <div class="flex items-center gap-2 text-sm text-slate-300">

                                <span class="w-2 h-2 rounded-full bg-emerald-400"></span>

                                Available

                            </div>

                        </div>

                        <div class="mt-5 grid grid-cols-3 gap-3">

                            <div>
                                <p class="text-xs text-slate-500">
                                    Projects
                                </p>

                                <p class="mt-1 text-sm text-slate-300">
                                    Management
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-slate-500">
                                    Sites
                                </p>

                                <p class="mt-1 text-sm text-slate-300">
                                    Operations
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-slate-500">
                                    Resources
                                </p>

                                <p class="mt-1 text-sm text-slate-300">
                                    Tracking
                                </p>
                            </div>

                        </div>

                    </div>

                </div>


                {{-- Footer --}}
                <p class="text-sm text-slate-500">
                    BFMS · Internal Management System
                </p>

            </div>

        </section>


        {{-- Right Side / Login --}}
        <section class="relative flex min-h-screen items-center justify-center
                        bg-white px-6 py-12 sm:px-10 lg:px-12">

            {{-- Mobile Top Bar --}}
            <div class="absolute top-0 left-0 right-0 lg:hidden">

                <div class="h-1 bg-amber-500"></div>

                <div class="px-6 py-5 border-b border-slate-200">

                    <a href="{{ url('/') }}" class="inline-flex items-center gap-3">

                        <div class="w-9 h-9 rounded-lg bg-amber-500
                                    flex items-center justify-center">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                class="w-5 h-5 text-slate-900"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 21h18M5 21V9l7-4 7 4v12M9 21v-6h6v6"
                                />
                            </svg>

                        </div>

                        <div>
                            <p class="font-bold text-slate-900">
                                BFMS
                            </p>

                            <p class="text-[11px] text-slate-500">
                                Construction Management
                            </p>
                        </div>

                    </a>

                </div>

            </div>


            <div class="w-full max-w-md mt-20 lg:mt-0">

                {{-- Back --}}
                <a
                    href="{{ url('/') }}"
                    class="inline-flex items-center gap-2 text-sm text-slate-500
                           hover:text-slate-900 transition mb-10"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        class="w-4 h-4"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M19 12H5M11 18l-6-6 6-6"
                        />
                    </svg>

                    Back to home

                </a>


                {{-- Heading --}}
                <div>

                    <h2 class="text-3xl font-bold tracking-tight text-slate-900">
                        Sign in
                    </h2>

                    <p class="mt-3 text-sm leading-6 text-slate-500">
                        Enter your account details to access BFMS.
                    </p>

                </div>


                {{-- Session Status --}}
                @if (session('status'))

                    <div class="mt-6 rounded-lg border border-emerald-200
                                bg-emerald-50 px-4 py-3 text-sm text-emerald-700">

                        {{ session('status') }}

                    </div>

                @endif


                {{-- Validation Errors --}}
                @if ($errors->any())

                    <div class="mt-6 rounded-lg border border-red-200
                                bg-red-50 px-4 py-3">

                        <div class="flex gap-3">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                class="w-5 h-5 text-red-500 shrink-0 mt-0.5"
                            >
                                <circle cx="12" cy="12" r="9"/>
                                <path d="M12 8v4M12 16h.01"/>
                            </svg>

                            <div>

                                <p class="text-sm font-medium text-red-800">
                                    We couldn't sign you in.
                                </p>

                                <ul class="mt-1 text-sm text-red-600 space-y-1">

                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach

                                </ul>

                            </div>

                        </div>

                    </div>

                @endif


                {{-- Login Form --}}
                <form
                    method="POST"
                    action="{{ route('login') }}"
                    class="mt-8"
                >

                    @csrf


                    {{-- Email --}}
                    <div>

                        <label
                            for="email"
                            class="block text-sm font-medium text-slate-700 mb-2"
                        >
                            Email address
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            required
                            autofocus
                            placeholder="name@company.com"
                            class="block w-full rounded-lg border border-slate-300
                                   bg-white px-3.5 py-3 text-sm text-slate-900
                                   placeholder:text-slate-400
                                   outline-none transition
                                   focus:border-amber-500
                                   focus:ring-2 focus:ring-amber-500/20"
                        >

                    </div>


                    {{-- Password --}}
                    <div class="mt-6">

                        <div class="flex items-center justify-between mb-2">

                            <label
                                for="password"
                                class="block text-sm font-medium text-slate-700"
                            >
                                Password
                            </label>

                            @if (Route::has('password.request'))

                                <a
                                    href="{{ route('password.request') }}"
                                    class="text-sm font-medium text-slate-500
                                           hover:text-slate-900 transition"
                                >
                                    Forgot password?
                                </a>

                            @endif

                        </div>


                        <div class="relative">

                            <input
                                id="password"
                                name="password"
                                type="password"
                                autocomplete="current-password"
                                required
                                placeholder="Enter your password"
                                class="block w-full rounded-lg border border-slate-300
                                       bg-white px-3.5 py-3 pr-12 text-sm
                                       text-slate-900 placeholder:text-slate-400
                                       outline-none transition
                                       focus:border-amber-500
                                       focus:ring-2 focus:ring-amber-500/20"
                            >


                            {{-- Show / Hide Password --}}
                            <button
                                type="button"
                                id="togglePassword"
                                aria-label="Show password"
                                class="absolute inset-y-0 right-0 flex items-center
                                       px-4 text-slate-400 hover:text-slate-700
                                       transition"
                            >

                                {{-- Eye --}}
                                <svg
                                    id="eyeOpen"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    class="w-5 h-5"
                                >
                                    <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>

                                {{-- Eye Off --}}
                                <svg
                                    id="eyeClosed"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    class="w-5 h-5 hidden"
                                >
                                    <path d="m3 3 18 18"/>
                                    <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"/>
                                    <path d="M9.9 4.2A10.8 10.8 0 0 1 12 4c6.5 0 10 8 10 8a18.5 18.5 0 0 1-2.1 3.2"/>
                                    <path d="M6.6 6.6C3.5 8.5 2 12 2 12s3.5 8 10 8a9.8 9.8 0 0 0 4.2-.9"/>
                                </svg>

                            </button>

                        </div>

                    </div>


                    {{-- Remember Me --}}
                    <div class="mt-5">

                        <label class="inline-flex items-center gap-2.5 cursor-pointer">

                            <input
                                type="checkbox"
                                name="remember"
                                class="w-4 h-4 rounded border-slate-300
                                       text-amber-500
                                       focus:ring-amber-500"
                            >

                            <span class="text-sm text-slate-600">
                                Keep me signed in
                            </span>

                        </label>

                    </div>


                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="mt-7 w-full inline-flex items-center justify-center
                               gap-2 rounded-lg bg-slate-900 px-5 py-3
                               text-sm font-semibold text-white
                               shadow-sm transition
                               hover:bg-slate-800
                               focus:outline-none
                               focus:ring-2
                               focus:ring-slate-900
                               focus:ring-offset-2"
                    >
                        Sign In

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            class="w-4 h-4"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M5 12h14M13 6l6 6-6 6"
                            />
                        </svg>

                    </button>

                </form>


                {{-- No Registration --}}
                <div class="mt-8 pt-6 border-t border-slate-200">

                    <p class="text-xs leading-5 text-slate-500">
                        BFMS access is limited to authorized users.
                        Contact your system administrator if you need access
                        to the platform.
                    </p>

                </div>

            </div>

        </section>

    </main>


    {{-- Password Visibility --}}
    <script>

        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeOpen = document.getElementById('eyeOpen');
        const eyeClosed = document.getElementById('eyeClosed');

        togglePassword.addEventListener('click', function () {

            const passwordIsHidden = passwordInput.type === 'password';

            passwordInput.type = passwordIsHidden ? 'text' : 'password';

            eyeOpen.classList.toggle('hidden', passwordIsHidden);
            eyeClosed.classList.toggle('hidden', !passwordIsHidden);

            togglePassword.setAttribute(
                'aria-label',
                passwordIsHidden ? 'Hide password' : 'Show password'
            );

        });

    </script>

</body>
</html>