<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link href=
"https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
          rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap"
    />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  </head>
  <body>
    <div class="login-screen w-full h-screen flex items-center justify-center gap-2">
        <div class="left-background w-1/2 h-full bg-no-repeat bg-cover bg-center">
            <div class="login-container w-10/12 h-max rounded-2xl lg:w-2/5 md:w-4/5">
              <div class="logo flex items-center justify-center p-4">
                <!--<img class="w-16 h-16" src="images/logo.png" alt="Logo">-->
                <img class="w-16 h-16" src="{{ asset('images/logo.png') }}" alt="Logo">
              </div>
              <div class="login flex items-center justify-center mt-10">
                <div class="left-container w-1/2 flex items-center justify-center">
                  <img class="vector-img" src="{{ asset('images/profileloginvector.png') }}" alt="background">
                  <img class="profile-img" src="{{ asset('images/profile.png') }}" alt="profile">
                </div>
                <div class="right-container w-1/2 px-5 py-0">
                  <h1 class="mb-8 text-2xl font-normal">Welcome back...</h1>

                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                  <!--<input type="text" placeholder="Username">
                  <input type="password" placeholder="Password">-->

                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  <div class="flex items-center w-5 gap-1">
                    <!--<input class="mt-3" type="checkbox">-->
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <p>Rememeber</p>
                    <p>me</p>
                  </div>
                  <!--<input id="login-btn" type="button" value="Login">-->
                  <input type="submit" value="Login">
                                    {{ __('') }}
                 </input>

                  @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                 @endif
                  </form>
                </div>
              </div>
            </div>
        </div>
        <div class="right-background w-1/2 h-full bg-no-repeat bg-cover bg-center">

        </div>
     
    </div>
   
    <script>
      var usernameText = document.getElementById("usernameText");
      if (usernameText) {
        usernameText.addEventListener("click", function (e) {
          // Please sync "Login- Username" to the project
        });
      }
      
      var passwordText = document.getElementById("passwordText");
      if (passwordText) {
        passwordText.addEventListener("click", function (e) {
          // Please sync "Login- Password" to the project
        });
      }
      
      var loginText = document.getElementById("loginText");
      if (loginText) {
        loginText.addEventListener("click", function (e) {
          // Please sync "Login- Password" to the project
        });
      }
      </script>
  </body>
</html>
