<ul id="login-dp" class="dropdown-menu clear" aria-labelledby="dropdownMenu1">
    <li>
        <div class="row">
            <div class="col-md-12">
                Login
                <div class="social-buttons">
                    <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                    <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                </div>
                or
                <form class="form" role="form" method="POST" action="{{ route('login') }}" accept-charset="UTF-8" id="login-nav">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="sr-only" for="exampleInputEmail2">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email address"
                           value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="sr-only" for="exampleInputPassword2">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password"
                           name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                    <div class="help-block text-right"><a href="{{ route('password.request') }}">Forget the password
                            ?</a></div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> keep me logged-in
                    </label>
                </div>
                </form>
            </div>
            <div class="bottom text-center">
                New here ? <a href="#"><b>Join Us</b></a>
            </div>
        </div>
    </li>
</ul>
