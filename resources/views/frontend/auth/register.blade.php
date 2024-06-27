<form method="POST" action="{{ Session::has('status')?route('customer.register-validate'):'' }}" id="register-form">
    @csrf
    {{ Session::has('email')?'shi':'mashi' }}
    <div class="row mb-3">

        <label for="email_or_phone" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

        <div class="col-md-6">
            <select class="form-select type" aria-label="Default select example" name="type">
                <option selected disabled>Register Type</option>
                <option value="1" {{ Session::has('email')?'selected':'' }}>Email</option>
                <option value="2" {{ Session::has('phone')?'selected':'' }}>Phone</option>
            </select>
        </div>
    </div>
    <div class="row mb-3 d-none email">

        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

        <div class="col-md-6">
            <input id="email" value="{{ Session::has('email')?Session::get('email'):'' }}" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="row mb-3 d-none phone">

        <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

        <div class="col-md-6">
            <input id="phone" value="{{ Session::has('phone')?Session::get('phone'):'' }}" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone" autofocus>

            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('password') }}</label>

        <div class="col-md-6">
            <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ Session::has('password')?Session::get('password'):'' }}">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    @if(Session::has('status'))
    <input type="hidden" name="real_code" value="{{ Session::get('status') }}">
    <div class="row mb-3 code">

        <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Verification Code') }}</label>

        <div class="col-md-6">
            <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}"  autocomplete="code" autofocus>

            @error('code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            @if(Session::has('message'))
            <span class="text-danger" role="alert">
                <strong>{{ Session::get('message') }}</strong>
            </span>
            @endif
        </div>
    </div>
    @endif
    {{-- <div class="row mb-3">
        <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

        <div class="col-md-6">
            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('first_name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

        <div class="col-md-6">
            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('last_name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3" id="email">
        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Name') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('name') }}" autocomplete="email " autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3" id="phone">
        <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

        <div class="col-md-6">
            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('name') }}" autocomplete="phone" autofocus>

            @error('phone')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="dob" class="col-md-4 col-form-label text-md-end">{{ __('dob') }}</label>

        <div class="col-md-6">
            <input id="dob" type="text" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('dob')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('gender') }}</label>

        <div class="col-md-6">
            <select class="form-select @error('gender') is-invalid @enderror" name="gender" aria-label="Default select example">
                <option value="0">Male</option>
                <option value="1">Female</option>
                <option value="2">Other</option>
            </select>
            @error('gender')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div> --}}
    
    @if(Session::has('status'))
    <div class="row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Register
            </button>
        </div>
    </div>
    @else
    <div class="row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary" id="send_code">
                Send Code
            </button>
        </div>
    </div> 
    @endif

</form>
