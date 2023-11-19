<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ url('assets/css/sign-up-in/style.css') }}" />
    <title>Sign in & Sign up Form</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" method="POST" class="sign-in-form">
                  @csrf

                    @if (session()->has('success_signup'))
                        <div class="">
                            {{ session('success_signup') }}
                        </div>
                    @endif

                    @if (session()->has('login_error'))
                        <div class="">
                            {{ session('login_error') }}
                        </div>
                    @endif

                    @error('login')
                        <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui vitae velit voluptatibus veniam accusamus dolores eaque soluta recusandae aspernatur, ut perferendis ad porro vero dignissimos illum ab et repudiandae assumenda?</h1>
                    @enderror

                    <h2 class="title">Sign In</h2>
                    <div class="input-field @error('email') is-invalid @enderror">
                        <i class="fas fa-user"></i>
                        <input type="text" class="email" name="email" placeholder="Email" value="{{ old('email') }}" autofocus value="{{ old('email') }}" />
                    </div>
                    @error('email')
                    <p class="text-is-invalid">{{ $message }}</p>
                    @enderror

                    <div class="input-field @error('password') is-invalid @enderror">
                        <i class="fas fa-lock"></i>
                        <input type="password" class="password" name="password" placeholder="Password" />
                    </div>
                    @error('password')
                    <p class="text-is-invalid">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="btn solid">Login</button>
                    <p class="social-text">Or Sign in with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
                        ex ratione. Aliquid!
                    </p>
                    <a href="{{ route('signup') }}">
                        <button class="btn transparent" id="sign-up-btn">
                            Sign Up
                        </button>
                    </a>
                </div>
                <img src="{{ url('assets/img/sign-up-in/log.svg') }}" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                        laboriosam ad deleniti.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="{{ url('assets/img/sign-up-in/register.svg') }}" class="image" alt="" />
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
