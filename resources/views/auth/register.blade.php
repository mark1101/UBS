@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cidade_sede" class="col-md-4 col-form-label text-md-right">{{ __('Cidade Sede') }}</label>
                            <div class="col-md-6">
                                <input id="cidade_sede" type="text" class="form-control" name="cidade_sede" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="localidade" class="col-md-4 col-form-label text-md-right">{{ __('Localidade') }}</label>
                            <div class="col-md-6">
                                <input id="localidade" type="text" class="form-control" name="localidade" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="funcao" class="col-md-4 col-form-label text-md-right">{{ __('Funcao') }}</label>

                            <div class="col-md-6">
                                <input id="funcao" type="text" class="form-control" name="funcao" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="controle_acesso" class="col-md-4 col-form-label text-md-right">{{ __('Controle Acesso') }}</label>
                            <div class="col-md-6">
                                <input id="controle_acesso" type="text" class="form-control" name="controle_acesso" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>
                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control" name="cpf" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="data_nascimento" class="col-md-4 col-form-label text-md-right">{{ __('Data Nascimento') }}</label>
                            <div class="col-md-6">
                                <input id="data_nascimento" type="text" class="form-control" name="data_nascimento" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
