<div
    id="edit-employee-modal"
    class="fixed inset-0 z-100 hidden items-center justify-center p-4 sm:p-6"
    aria-hidden="true"
>
    {{-- Overlay --}}
    <div
        id="edit-employee-overlay"
        class="fixed inset-0 bg-slate-950/60 backdrop-blur-sm"
    ></div>

    {{-- Modal --}}
    <div
        class="relative z-10 flex max-h-[90vh] w-full max-w-3xl flex-col overflow-hidden rounded-2xl bg-white shadow-2xl"
        role="dialog"
        aria-modal="true"
        aria-labelledby="edit-employee-title"
    >

        {{-- Header --}}
        <div class="flex items-center justify-between border-b border-slate-200 px-6 py-5">
            <div>
                <h2
                    id="edit-employee-title"
                    class="text-lg font-bold text-slate-900"
                >
                    Edit Employee
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Update employee information and account details.
                </p>
            </div>

            <button
                type="button"
                id="close-edit-employee-modal"
                class="rounded-lg p-2 text-slate-400 transition hover:bg-slate-100 hover:text-slate-700"
                aria-label="Close"
            >
                <svg
                    class="h-5 w-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>
            </button>
        </div>

        {{-- Validation Errors --}}
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
                            d="M12 9v2m0 4h.01M10.29 3.86l-8.18 14A2 2 0 003.84 21h16.32a2 2 0 001.73-3.14l-8.18-14a2 2 0 00-1.73-3.14l-8.18-14a2 2 0 00-3.42 0z"
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

        {{-- Form --}}
        <form
            id="edit-employee-form"
            method="POST"
            class="overflow-y-auto"
        >
            @csrf
            @method('PUT')

            <div class="space-y-6 p-6">

                {{-- Personal Information --}}
                <div>
                    <h3 class="mb-4 text-sm font-semibold uppercase tracking-wide text-slate-700">
                        Personal Information
                    </h3>

                    <div class="grid gap-4 sm:grid-cols-2">

                        {{-- First Name --}}
                        <div>
                            <label
                                for="edit_First_name"
                                class="mb-1.5 block text-sm font-medium text-slate-700"
                            >
                                First Name
                            </label>

                            <input
                                id="edit_First_name"
                                name="First_name"
                                type="text"
                                value="{{ old('First_name') }}"
                                class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none transition focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20"
                            >
                        </div>

                        {{-- Last Name --}}
                        <div>
                            <label
                                for="edit_Last_name"
                                class="mb-1.5 block text-sm font-medium text-slate-700"
                            >
                                Last Name
                            </label>

                            <input
                                id="edit_Last_name"
                                name="Last_name"
                                type="text"
                                value="{{ old('Last_name') }}"
                                class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none transition focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20"
                            >
                        </div>

                        {{-- Phone --}}
                        <div>
                            <label
                                for="edit_phone"
                                class="mb-1.5 block text-sm font-medium text-slate-700"
                            >
                                Phone
                            </label>

                            <input
                                id="edit_phone"
                                name="phone"
                                type="text"
                                value="{{ old('phone') }}"
                                class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none transition focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20"
                            >
                        </div>

                        {{-- Birth Date --}}
                        <div>
                            <label
                                for="edit_birth_date"
                                class="mb-1.5 block text-sm font-medium text-slate-700"
                            >
                                Birth Date
                            </label>

                            <input
                                id="edit_birth_date"
                                name="birth_date"
                                type="date"
                                value="{{ old('birth_date') }}"
                                class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none transition focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20"
                            >
                        </div>

                        {{-- Address --}}
                        <div class="sm:col-span-2">
                            <label
                                for="edit_address"
                                class="mb-1.5 block text-sm font-medium text-slate-700"
                            >
                                Address
                            </label>

                            <input
                                id="edit_address"
                                name="address"
                                type="text"
                                value="{{ old('address') }}"
                                class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none transition focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20"
                            >
                        </div>

                    </div>
                </div>

                {{-- Employment Information --}}
                <div class="border-t border-slate-100 pt-6">

                    <h3 class="mb-4 text-sm font-semibold uppercase tracking-wide text-slate-700">
                        Employment Information
                    </h3>

                    <div>
                        <label
                            for="edit_specialization"
                            class="mb-1.5 block text-sm font-medium text-slate-700"
                        >
                            Specialization
                        </label>

                        <input
                            id="edit_specialization"
                            name="specialization"
                            type="text"
                            value="{{ old('specialization') }}"
                            class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none transition focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20"
                        >
                    </div>

                </div>

                {{-- Account Information --}}
                <div class="border-t border-slate-100 pt-6">

                    <h3 class="mb-4 text-sm font-semibold uppercase tracking-wide text-slate-700">
                        Account Information
                    </h3>

                    <div>
                        <label
                            for="edit_email"
                            class="mb-1.5 block text-sm font-medium text-slate-700"
                        >
                            Email
                        </label>

                        <input
                            id="edit_email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none transition focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20"
                        >
                    </div>

                    <p class="mt-2 text-xs text-slate-400">
                        Password is not changed from this form.
                    </p>

                </div>

            </div>

            {{-- Footer --}}
            <div class="flex items-center justify-end gap-3 border-t border-slate-200 bg-slate-50 px-6 py-4">

                <button
                    type="button"
                    id="cancel-edit-employee"
                    class="rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-100"
                >
                    Cancel
                </button>

                <button
                    type="submit"
                    class="rounded-lg bg-amber-500 px-5 py-2.5 text-sm font-semibold text-slate-950 shadow-sm transition hover:bg-amber-400"
                >
                    Update Employee
                </button>

            </div>

        </form>
    </div>
</div>