

<x-guest-layout>
    

   
        <x-slot name="logo">
       
        </x-slot>
    
        <x-jet-validation-errors class="mb-4" style="color:red" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif 
      

      
<div class="form-content">

<h1 class=""><img src="{{url('assets/img/koku.png')}}" alt="logo" width="100" height="100"></h1>
<h1 class=""><img src="{{url('assets/img/abcari.png')}}" alt="logo" width="170" height="100"></h1>

<form class="text-left"  method="POST" action="{{ route('login') }}">
@csrf
    <div class="form">

        <div id="username-field" class="field-wrapper input">
            <label for="username">USERNAME</label>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <input id="username" name="email" type="text" class="form-control" placeholder="e.g John_Doe">
        </div>

        <div id="password-field" class="field-wrapper input mb-2">
            <div class="d-flex justify-content-between">
                <label for="password">PASSWORD</label>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-pass-link"> {{ __('Forgot your password?') }}</a>
                @endif
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
            <input id="password" name="password" type="password" class="form-control" placeholder="Password">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
        </div>
        <div class="d-sm-flex justify-content-between">
            <div class="field-wrapper">
                <button type="submit" class="btn btn-primary" value="">Log In</button>
            </div>
        </div>

      

       

        

    </div>
</form>

</div>       
                



</x-guest-layout>

