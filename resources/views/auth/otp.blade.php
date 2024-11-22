<form action="{{ route('otp.verify.post') }}" method="POST">
    @csrf
    <div>
        <label for="otp">Masukkan Kode OTP</label>
        <input type="text" name="otp" id="otp" required>
        @error('otp')
            <span>{{ $message }}</span>
        @enderror
    </div>
    <button type="submit">Verifikasi</button>
</form>
