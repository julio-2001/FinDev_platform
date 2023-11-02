@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div >
            <div class="card">
                <div class="card-header"><a href="{{url('v1/candidaturas/cadastrar')}}" class="underline" >Adicionar candidatura</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 class="text-2xl">
                        @if (count($JobApplications) === 0)
                            Não ha candidaturas
                        @else
                            Lista de candidaturas
                        @endif
                    </h1>

                    <table class="min-w-full border-collapse block md:table">
                        <thead class="block md:table-header-group">
                            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Titulo</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Empresa</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Candidatos</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Vaga criada em </th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell w-14">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="block md:table-row-group ">

                            @php
                                $displayedIds = [];
                            @endphp



                            @foreach ($JobApplications as $JobApp )

                                @php
                                    $jobId = $JobApp->job_id;
                                    $count = $JobApp->countJobApplicationsByJobId($jobId);
                                @endphp

                                @if (!in_array($JobApp -> job ->id, $displayedIds))
                                    @php
                                        $displayedIds[] = $JobApp-> job -> id;
                                    @endphp

                                    <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Vaga</span>{{$JobApp -> job -> title}}</td>
                                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Empresa</span>{{$JobApp -> job -> company}}  | ID: {{$JobApp -> job -> id}}</td>
                                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Candidatos</span>{{$count}}</td>
                                        <td class="p-2 md:border md:border-grey-500 text-left md:text-center block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Vaga criada em</span>{{$JobApp -> created_at_job}}</td>
                                        <td class="p-2 md:border md:border-grey-500 text-left flex">


                                            <form method="POST" method="POST" action="{{'/v1/candidaturas/'.$JobApp->id.'/delete/all'}}" >
                                                @csrf
                                                @method('delete')
                                                    <!--TODO adicionar confirmação de delete -->
                                                <button  class="cursor-pointer bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</button>
                                            </form>

                                            <a href="{{'/v1/vagas/'.$JobApp -> job -> id. '/candidaturas/ranking'}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Ranking</a>
                                        </td>
                                    </tr>
                                @endif

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
