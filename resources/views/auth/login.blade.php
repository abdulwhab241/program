{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('الإيميل')" dir="rtl" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('كلمة السر')" dir="rtl" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div> --}}

        {{-- <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div> --}}

        {{-- <div class="flex items-center justify-end mt-4"> --}}
            {{-- @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif --}}

            {{-- <x-primary-button class="ml-3">
                {{ __('دخول') }}
            </x-primary-button> --}}
            {{-- <div>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" style="margin-right: 10px;" class="btn btn-outline-info ml-4 text-sm text-gray-700 dark:text-gray-500 underline">تسجيل</a>
                @endif
                </div>   --}}
        {{-- </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>برنامج عبدالوهاب لادارة المدارس</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">

</head>

<body>

    <div class="wrapper">

                <!--=================================
 preloader -->

 <div id="pre-loader">
    <img src="images/pre-loader/loader-01.svg" alt="">
</div>

<!--=================================
preloader -->

<!--=================================
login-->

<section class="height-100vh d-flex align-items-center page-section-ptb login"
    style="background-image: url(assets/images/login-bg.jpg);">
    <div class="container">
        <div class="row justify-content-center no-gutters vertical-align">
            <div class="col-lg-4 col-md-6 login-fancy-bg bg"
                style="background-image: url(images/login-inner-bg.jpg);">
                <div class="login-fancy">
                    <h2 class="text-white mb-20">Hello world!</h2>
                    <p class="mb-20 text-white">Create tailor-cut websites with the exclusive multi-purpose
                        responsive template along with powerful features.</p>
                    <ul class="list-unstyled  pos-bot pb-30">
                        <li class="list-inline-item"><a class="text-white" href="#"> Terms of Use</a> </li>
                        <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 bg-white">
                <div class="login-fancy pb-40 clearfix">
                    <h3 class="mb-30">تسجيل الدخول</h3>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="section-field mb-20">
                            <label class="mb-10" for="name">البريدالالكتروني*</label>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="section-field mb-20">
                            <label class="mb-10" for="Password">كلمة المرور * </label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="section-field">
                            <div class="remember-checkbox mb-30">
                                <input type="checkbox" class="form-control" name="two" id="two" />
                                <label for="two"> تذكرني</label>
                                <a href="#" class="float-right">هل نسيت كلمةالمرور ؟</a>
                            </div>
                        </div>
                        <button class="button"><span>دخول</span><i class="fa fa-check"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=================================login-->

<!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script>
    var plugin_path = 'js/';
</script>

<!-- chart -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>

</body>

</html>
