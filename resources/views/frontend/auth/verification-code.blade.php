<h1>Verification Code</h1>
<h4>{{ $code }}</h4>
@if (isset($password))
<a href="{{ route('emailVerification',['code'=>$code,'email'=>$email,'password'=>$password]) }}">Enter Code</a>
@else
<a href="{{ route('emailLoginVerification',['code'=>$code,'email'=>$email]) }}">Enter Code</a>

@endif

