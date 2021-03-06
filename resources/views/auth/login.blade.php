@extends('layout.auth.app',[
    'title' => 'Login'
])
@section('content')
<div class="row justify-content-center">

    <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Selamat Datang !</h1>
                                @include('layout.component.alert-dismissible')
                            </div>
                            <hr>
                            <form class="user mt-5" method="POST" action="{{ route('login.post') }}">
                                @csrf
                                <div class="form-group">
                                    <input name="email" required="" type="email" class="form-control form-control-user"
                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input name="password" required="" type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block mt-5">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@stop
