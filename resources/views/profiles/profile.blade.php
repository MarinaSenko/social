@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="col-lg-4">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="text-center">
                    Личный кабинет {{ $user->name }}
                    </p>
                </div>

            <div class="panel-body">
                <img src="{{ Storage::url($user->avatar) }}" width="70px" height="70px" style="border-radius: 50%" class="img-responsive" alt="">

            </div>
                <p class="text-center">

                    @if (Auth::id() == $user->id )

                        <a href="{{ route('profile.edit') }}" class="btn btn-lg btn-info">Редакитровать профиль</a>
                        
                    @endif
                </p>
            </div>
        </div>
    </div>
@stop