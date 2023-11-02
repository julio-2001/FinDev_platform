@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Autenticação') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3 class="text-2xl mb-6">
                        {{ __('Autenticado com sucesso') }}
                    </h3>

                    <span>Ir para pagina de <a class="underline" href="/v1/pessoas">candidatos</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
