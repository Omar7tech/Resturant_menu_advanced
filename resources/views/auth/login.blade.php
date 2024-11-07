<x-layout>
    <div class="flex items-center justify-center min-h-screen bg-base-200">
        <div class="w-full max-w-sm p-8 space-y-6 bg-base-100 shadow-lg rounded-lg">
            <h2 class="text-2xl font-bold text-center">Login</h2>
            <form method="POST" action="/login" class="space-y-4">
                @csrf
                <div class="form-control w-full">
                    <label for="username" class="label">
                        <span class="label-text">Username</span>
                    </label>
                    <input type="text" name="username" id="username" placeholder="Enter your username" required
                        class="input input-bordered w-full" />
                </div>
                <div class="form-control w-full">
                    <label for="password" class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required
                        class="input input-bordered w-full" />
                </div>
                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary w-full">Login</button>
                </div>
                <div class="w-full mt-6">
                    @if ($errors->has('login_error'))
                        <div role="alert" class="alert alert-error">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ $errors->first('login_error') }}</span>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>



</x-layout>
