<div
    id="add-employee-modal"
    data-has-errors="{{ $errors->any() ? 'true' : 'false' }}"
    data-success="{{ session('success') ? 'true' : 'false' }}"
    class="fixed inset-0 z-100 hidden items-center justify-center p-4 sm:p-6"
    aria-hidden="true"
>
    <div
        id="add-employee-overlay"
        class="fixed inset-0 bg-slate-950/60 backdrop-blur-sm"
    ></div>

    <div
        class="relative flex max-h-[90vh] w-full max-w-4xl flex-col overflow-hidden rounded-2xl bg-white shadow-2xl"
    >

        <div class="flex items-center justify-between border-b border-slate-200 px-6 py-4">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-amber-100 text-amber-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 4v16m8-8H4"
                        />
                    </svg>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-slate-800">
                        Add New Employee
                    </h2>

                    <p class="text-sm text-slate-500">
                        Create a new employee account
                    </p>
                </div>
            </div>

            <button
                type="button"
                id="close-add-employee-modal"
                class="rounded-lg p-2 text-slate-400 transition hover:bg-slate-100 hover:text-slate-700"
            >
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>
            </button>
        </div>
        @if($errors->any())
    <div class="mx-6 mt-4 rounded-lg border border-red-200 bg-red-50 px-4 py-3">
        <div class="flex items-start gap-3">
            <svg
                class="mt-0.5 h-5 w-5 shrink-0 text-red-600"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 9v2m0 4h.01M10.29 3.86l-8.18 14A2 2 0 003.84 21h16.32a2 2 0 001.73-3.14l-8.18-14a2 2 0 00-3.42 0z"
                />
            </svg>

            <div>
                <p class="text-sm font-semibold text-red-800">
                    Please correct the following errors:
                </p>

                <ul class="mt-1 list-inside list-disc space-y-1 text-sm text-red-700">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
        <form
            action="{{ route('employees.store') }}"
            method="POST"
            class="flex min-h-0 flex-1 flex-col"
        >
            @csrf

            {{-- Scrollable Content --}}
            <div class="overflow-y-auto px-6 py-6">

                {{-- Personal Information --}}
                <div class="mb-8">
                    <h3 class="mb-4 text-sm font-bold uppercase tracking-wide text-slate-700">
                        Personal Information
                    </h3>

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                        {{-- First Name --}}
                        <div>
                            <label
                                for="First_name"
                                class="mb-2 block text-sm font-medium text-slate-700"
                            >
                                First Name
                            </label>

                            <input
                                type="text"
                                name="First_name"
                                id="First_name"
                                value="{{ old('First_name') }}"
                                required
                                class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none transition focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20"
                            >
                        </div>

                        {{-- Last Name --}}
                        <div>
                            <label
                                for="Last_name"
                                class="mb-2 block text-sm font-medium text-slate-700"
                            >
                                Last Name
                            </label>

                            <input
                                type="text"
                                name="Last_name"
                                id="Last_name"
                                value="{{ old('Last_name') }}"
                                required
                                class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none transition focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20"
                            >
                        </div>

                        {{-- Phone --}}
                        <div>
                            <label
                                for="phone"
                                class="mb-2 block text-sm font-medium text-slate-700"
                            >
                                Phone
                            </label>

                            <input
                                type="text"
                                name="phone"
                                id="phone"
                                value="{{ old('phone') }}"
                                class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none transition focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20"
                            >
                        </div>

                        {{-- Birth Date --}}
                        <div>
                            <label
                                for="birth_date"
                                class="mb-2 block text-sm font-medium text-slate-700"
                            >
                                Birth Date
                            </label>

                            <input
                                type="date"
                                name="birth_date"
                                id="birth_date"
                                value="{{ old('birth_date') }}"
                                class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none transition focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20"
                            >
                        </div>

                        {{-- Address --}}
                        <div class="md:col-span-2">
                            <label
                                for="address"
                                class="mb-2 block text-sm font-medium text-slate-700"
                            >
                                Address
                            </label>

                            <input
                                type="text"
                                name="address"
                                id="address"
                                value="{{ old('address') }}"
                                class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none transition focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20"
                            >
                        </div>

                    </div>
                </div>

                {{-- Employment Information --}}
                <div class="mb-8">
                    <h3 class="mb-4 text-sm font-bold uppercase tracking-wide text-slate-700">
                        Employment Information
                    </h3>

                    <div>
                        <label
                            for="specialization"
                            class="mb-2 block text-sm font-medium text-slate-700"
                        >
                            Specialization
                        </label>

                        <select
                            name="specialization"
                            id="specialization"
                            required
                            class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none transition focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20"
                        >
                            <option value="">Select specialization</option>
                            <option value="Construction" @selected(old('specialization') === 'Construction')>
                                Construction
                            </option>
                            <option value="Electrical" @selected(old('specialization') === 'Electrical')>
                                Electrical
                            </option>
                            <option value="Plumbing" @selected(old('specialization') === 'Plumbing')>
                                Plumbing
                            </option>
                            <option value="Architecture" @selected(old('specialization') === 'Architecture')>
                                Architecture
                            </option>
                            <option value="Engineering" @selected(old('specialization') === 'Engineering')>
                                Engineering
                            </option>
                        </select>
                    </div>
                </div>

                {{-- Account Information --}}
                <div>
                    <h3 class="mb-4 text-sm font-bold uppercase tracking-wide text-slate-700">
                        Account Information
                    </h3>

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                        {{-- Email --}}
                        <div class="md:col-span-2">
                            <label
                                for="email"
                                class="mb-2 block text-sm font-medium text-slate-700"
                            >
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email') }}"
                                required
                                class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none transition focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20"
                            >
                        </div>

                        {{-- Password --}}
                        <div>
                            <label
                                for="password"
                                class="mb-2 block text-sm font-medium text-slate-700"
                            >
                                Password
                            </label>

                            <div class="relative">
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    required
                                    class="w-full rounded-lg border border-slate-300 px-3 py-2.5 pr-10 text-sm outline-none transition focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20"
                                >

                                <button
                                    type="button"
                                    class="password-toggle absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600"
                                    data-target="password"
                                >
                                    👁
                                </button>
                            </div>
                        </div>

                        {{-- Confirm Password --}}
                        <div>
                            <label
                                for="password_confirmation"
                                class="mb-2 block text-sm font-medium text-slate-700"
                            >
                                Confirm Password
                            </label>

                            <div class="relative">
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    required
                                    class="w-full rounded-lg border border-slate-300 px-3 py-2.5 pr-10 text-sm outline-none transition focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20"
                                >

                                <button
                                    type="button"
                                    class="password-toggle absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600"
                                    data-target="password_confirmation"
                                >
                                    👁
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            {{-- Footer --}}
            <div class="flex shrink-0 items-center justify-end gap-3 border-t border-slate-200 bg-slate-50 px-6 py-4">

                <button
                    type="button"
                    id="cancel-add-employee"
                    class="rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-100"
                >
                    Cancel
                </button>

                <button
                    type="submit"
                    class="rounded-lg bg-amber-500 px-5 py-2.5 text-sm font-semibold text-slate-950 transition hover:bg-amber-400 focus:outline-none focus:ring-2 focus:ring-amber-500/40"
                >
                    Create Employee
                </button>

            </div>
        </form>
    </div>
</div>