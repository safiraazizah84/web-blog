<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LogoutOtherBrowserSessions extends Component
{
    public $password;

    public function logoutOtherBrowserSessions()
    {
        $this->resetErrorBag();

        // Logout dari sesi lain
        Auth::logoutOtherDevices($this->password);

        // Reset password input setelah logout
        $this->password = '';

        // Berikan flash message atau aksi sukses
        $this->emit('loggedOut');

        // Redirect ke halaman homepage setelah logout
        return redirect()->route('home.homepage');
    }

    public function render()
    {
        return view('livewire.logout-other-browser-sessions');
    }
}
