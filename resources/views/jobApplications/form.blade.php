@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-lg flex justify-between">
                    Candidatar candidato a uma vaga

                    <a href="/v1/candidaturas" class="underline">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form method="POST" action="/v1/candidaturas/store" class="flex flex-col gap-4 self-center justify-center" >
                        @csrf


                        @if (empty($candidates) && empty($jobs))
                            Não há registros de vagas ou candidatos
                        @else

                            <select  required class="w-full md:w-fit" name="job" >
                                <option value="" disabled selected>Escolha uma vaga para o candidato</option>

                                @foreach ($jobs as $job)
                                    <option class="{{ $loop->iteration % 2 === 0 ? 'bg-gray-200' : 'bg-gray-300' }} font-medium" value="{{$job -> id}}">ID: {{$job -> id}} | empresa: {{$job->company}} | vaga: {{$job -> title}}</option>
                                @endforeach
                            </select>

                            <select  required class="w-full md:w-fit" name="candidate" >
                                <option value="" disabled selected>Escolha um candidato</option>

                                @foreach ($candidates as $candidate)
                                    <option class="{{ $loop->iteration % 2 === 0 ? 'bg-gray-200' : 'bg-gray-300' }} font-medium" value="{{$candidate -> id}}">ID:{{$candidate -> id}} | nome: {{$candidate -> nome}}</option>
                                @endforeach
                            </select>
                        @endif

                        <!-- TODO um candidato não poder ser candidato mais de 1 vez-->

                        <button class="m-auto rounded bg-green-500 hover:bg-green-700 hover:text-white transition-all px-8 py-2 uppercase">Candidatar</button>
                    </form>

                    @if(session('error'))
                        <div class="p-2 bg-red-100 text-red-700 font-bold my-4 border-solid border-2 border-red-700 rounded">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
