<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Login extends Component
{
    #[Validate('required', message: 'User harus diisi')]
    public $idUser = '';
    #[Validate('required', message: 'Password harus diisi')]
    #[Validate('min:6', message: 'Password minimal 6 karakter')]
    public $password = '';
    public $remember = false;

    public function login() {
        $this->validate();

        $user = User::where('email', $this->idUser)
        ->orWhere('username', $this->idUser)
        ->orWhere('whatsapp', $this->idUser)
        ->first();

        if (! $user) {
            $this->addError('idUser', 'User tidak ditemukan');
            return;
        }

        if(Auth::attempt(
            [$this->getLoginField($user) => $this->idUser, 'password' => $this->password],
            $this->remember
        )) {
            session()->regenerate();
            return $this->redirectIntended(route('admin.dashboard'), navigate: true);
        }

        $this->addError('password', 'Password salah');
    }

    private function getLoginField(User $user) {
        return match (true) {
            $user->email === $this->idUser => 'email',
            $user->username === $this->idUser => 'username',
            $user->whatsapp === $this->whatsapp => 'whatsapp',
            default => 'email',
        };
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
