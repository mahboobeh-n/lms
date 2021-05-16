@extends('User::Front.master')

@section('content')
    <div class="account act">
        <form action="" class="form" method="post">
            <a class="account-logo" href="index.html">
                <img src="/img/weblogo.png" alt="">
            </a>
            <div class="card-header">
                <p class="activation-code-title">کد فرستاده شده به ایمیل  <span>Mohammadniko3@gmail.com</span>
                    را وارد کنید . ممکن است ایمیل به پوشه spam فرستاده شده باشد
                </p>
            </div>
            <div class="form-content form-content1">
                <input name="verify_code" class="activation-code-input" placeholder="فعال سازی">
                <br>
                <button class="btn i-t">تایید</button>
                <a href="{{route('verification.resend')}}">ارسال مجدد کد فعالسازی</a>

            </div>
            <div class="form-footer">
                <a href="login.html">صفحه ثبت نام</a>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/activation-code.js"></script>
    @endsection
