@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div>
            <div class="card">
                <div class="card-header"><a href="{{url('v1/vagas/cadastrar')}}" class="underline" ><a href="/v1/candidaturas" class="underline">Voltar</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 class="text-2xl">
                        Ranking da vaga
                    </h1>

                    <table class="min-w-full border-collapse block md:table">
                        <thead class="block md:table-header-group">
                            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Vaga</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">candidato</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nivel</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell md:text-center">ID</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">localização</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">score</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell w-14">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="block md:table-row-group ">

                            @foreach ($JobApplications as $jobApp )
                                <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Vaga:</span>{{$jobApp -> job -> title}} | ID: {{$jobApp -> job -> id}}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Candidato</span>{{$jobApp -> candidates -> nome}}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nivel</span>{{$jobApp -> candidates -> experiencesName -> experience}}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left md:text-center block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold ">ID</span>{{$jobApp -> candidates -> id}}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">localização</span>{{$jobApp -> candidates -> location}}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left md:text-center block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">score</span>14</td>

                                    <td class="p-2 md:border md:border-grey-500 text-left flex">

                                        <form method="POST" action="{{'/v1/vagas/*/candidaturas/'.$jobApp -> id.'/ranking/delete'}}">
                                            @csrf
                                            @method('delete')
                                            <!--TODO adicionar confirmação de delete -->
                                            <button  class="cursor-pointer bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
