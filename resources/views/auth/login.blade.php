<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success mb-4" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="text-center mb-4">
        <h4 class="fw-bold">Selamat Datang!</h4>
        <p class="text-muted">Silakan masuk ke akun Anda.</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Alamat Email</label>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0"><i class="fas fa-envelope text-muted"></i></span>
                <input id="email" class="form-control border-start-0 @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Masukkan email Anda">
            </div>
            @error('email')
                <div class="text-danger mt-1 small">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <label for="password" class="form-label fw-semibold">Kata Sandi</label>
                @if (Route::has('password.request'))
                    <a class="text-decoration-none small text-primary fw-semibold" href="{{ route('password.request') }}">
                        Lupa sandi?
                    </a>
                @endif
            </div>
            <div class="input-group">
                <span class="input-group-text bg-light border-end-0"><i class="fas fa-lock text-muted"></i></span>
                <input id="password" class="form-control border-start-0 @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan kata sandi">
            </div>
            @error('password')
                <div class="text-danger mt-1 small">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="mb-4 form-check">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label class="form-check-label text-muted" for="remember_me">
                Ingat saya
            </label>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">
                Masuk
            </button>
        </div>
    </form>
</x-guest-layout>
