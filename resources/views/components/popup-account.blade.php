<div class="box-popup-account">
    <div class="box-account-overlay"></div>
    <div class="box-account-wrapper"><a class="btn-close-popup btn-close-popup-account" href="#">
            <svg class="icon-16 d-inline-flex align-items-center justify-content-center" fill="#111111" stroke="#111111"
                width="24" height="24" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg></a>
        @guest
            <div class="form-account-info">
                <a class="button-tab btn-for-login active" href="#">Login</a>
                <a class="button-tab btn-for-signup" href="#">Sign up</a>
                <x-forms.form action="/login" method="POST" class="form-login">
                    <x-forms.input name="email" type="email" placeholder="Email" />
                    <x-forms.input name="password" type="password" placeholder="Password" />

                    <div class="form-group"><a class="link-under buttun-forgotpass" href="#">Forgot your
                            password?</a></div>
                    <x-forms.button>Login</x-forms.button>
                </x-forms.form>

                <x-forms.form action="/register" method="POST" class="form-register">
                    <x-forms.input type="text" name="first_name" placeholder="First Name" required />
                    <x-forms.input type="text" name="last_name" placeholder="Last Name" required />
                    <x-forms.input type="email" name="email" placeholder="Email" required />
                    <x-forms.input type="password" name="password" placeholder="Password" required />
                    <div class="form-group">
                        <label class="d-flex align-items-start">
                            <input class="cb-agree" type="checkbox" name="checkbox"><span class="text-agree body-p2">Join
                                for Free
                                and start earning points today. Benefits include 15% off your first purchase,</span>
                        </label>
                    </div>
                    <x-forms.button>Register</x-forms.button>
                </x-forms.form>
            </div>
        @else
            <h1>{{ Auth::user()->first_name }}</h1>
        @endguest

    </div>
</div>
