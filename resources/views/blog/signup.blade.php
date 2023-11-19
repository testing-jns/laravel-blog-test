<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Atom | Sign Up</title>

    <link rel="stylesheet" href="{{ url('assets/css/sign-up-in/style.css') }}" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container sign-up-mode">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" method="POST" class="sign-up-form">
                    @csrf

                    <h2 class="title">Sign Up</h2>
                    <div class="input-field @error('name') is-invalid @enderror">
                        <i class="fas fa-user"></i>
                        <input type="text" class="name" name="name" placeholder="Full Name" value="{{ old('name') }}" />
                    </div>
                    @error('name')
                    <p class="text-is-invalid">{{ $message }}</p>
                    @enderror

                    <div class="input-field @error('username') is-invalid @enderror">
                        <i class="fas fa-user"></i>
                        <input type="text" class="username" name="username" placeholder="Username" value="{{ old('username') }}" />
                    </div>
                    @error('username')
                    <p class="text-is-invalid">{{ $message }}</p>
                    @enderror

                    <div class="input-field @error('email') is-invalid @enderror">
                        <i class="fas fa-envelope"></i>
                        <input type="email" class="email" name="email" placeholder="Email" value="{{ old('email') }}" />
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

                    <div class="input-field @error('password_confirmation') is-invalid @enderror">
                        <i class="fas fa-lock"></i>
                        <input type="password" class="password_confirmation" name="password_confirmation"
                            placeholder="Confirm Password" value="{{ old('password_confirmation') }}" />
                    </div>
                    @error('password_confirmation')
                    <p class="text-is-invalid">{{ $message }}</p>
                    @enderror


                    <button type="submit" class="btn">Sign Up</button>
                    <p class="social-text">Or Sign Up with social platforms</p>
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
                    <button class="btn transparent" id="sign-up-btn">
                        Sign Up
                    </button>
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
                    <a href="{{ route('login') }}">
                      <button class="btn transparent" id="sign-up-btn">
                        Sign In
                      </button>
                    </a>
                </div>
                <img src="{{ url('assets/img/sign-up-in/register.svg') }}" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
