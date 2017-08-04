<ul id="login-dp" class="dropdown-menu " aria-labelledby="dropdownMenu2">
    <li>
        <div class="row">
            <div class="col-md-12">
                Register
                <form class="form" role="form" method="POST" action="{{ route('register') }}" accept-charset="UTF-8"
                      id="login-nav">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="sr-only" for="name">Name</label>
                        <input id="name" type="text" class="form-control" placeholder="Your name " name="name"
                               value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="sr-only" for="email">Email address</label>
                        <input id="email" type="email" class="form-control" placeholder="Email address" name="email"
                               value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="sr-only" for="exampleInputPassword2">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password"
                               required="">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="password">Confirm Password</label>
                        <input id="password-confirm" type="password" placeholder="Confirm Password ... "
                               class="form-control" name="password_confirmation" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Sign up</button>
                    </div>
                </form>
            </div>
            <div class="bottom text-center">
                Already have account ? <a href="#"><b><br>Click here</b></a>
            </div>
        </div>
    </li>
</ul>