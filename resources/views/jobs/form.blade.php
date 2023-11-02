@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-lg flex justify-between">
                    @if (request()->path() === "v1/vagas/cadastrar")
                        Cadastrar vagas

                    @else(request()->path() === "v1/vagas/*/edit")
                        Edite a vaga: {{$job->empresa}} | id: {{$job->id}}
                    @endif

                    <a href="/v1/vagas" class="underline">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form method="POST" action="/v1/vagas/store" class="flex flex-col gap-4 self-center justify-center" >
                        @csrf

                        <input type="hidden" name="id" value="{{empty($job)? '' : $job -> id}}"/>

                        <div class="flex flex-col" >
                            <label>Empresa:</label>
                            <input maxlength="90" required type="text" name="company" class="bg-gray-200 h-9 p-4 box-border" value="{{empty($job)? '' : $job -> company}}"/>
                        </div>

                        <div class="flex flex-col" >
                            <label>Titulo:</label>
                            <input maxlength="50" required type="text" name="title" class="bg-gray-200 h-9 p-4 box-border" value="{{empty($job)? '' : $job -> title}}"/>
                        </div>

                        <div class="flex flex-col" >
                            <label>Descrição:</label>
                            <input maxlength="120" required type="text" name="description" class="bg-gray-200 h-9 p-4 box-border" value="{{empty($job)? '' : $job -> description}}"/>
                        </div>


                        <select required class="w-full md:w-fit" name="experience">
                            <option value="" disabled selected>Escolha a experiencia</option>

                            @foreach ($experiences as $xp)
                                @if (!empty($job))
                                    <option value="{{$xp->id}}" @if($xp->id == $job -> experience) selected  @endif>{{$xp->experience}}</option>
                                @else
                                    <option value="{{$xp->id}}">{{$xp->experience}}</option>
                                @endif
                            @endforeach
                        </select>

                        <select required class="w-full md:w-fit" name="location">
                            <option value="" disabled selected>Escolha a localização</option>
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
                            <option value="5">E</option>
                            <option value="6">F</option>

                        </select>

                        <button class="m-auto rounded bg-green-500 hover:bg-green-700 hover:text-white font-bold transition-all px-8 py-2 uppercase">
                            @if (request()->path() === "v1/vagas/cadastrar")
                                Cadastrar
                            @else(request()->path() === "v1/vagas/*/edit")
                                Editar
                            @endif
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
