@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{url('v1/pessoas/cadastrar')}}" class="underline" >Adicionar candidato</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 class="text-2xl">
                        @if (count($candidates) === 0)
                            Não ha candidatos
                        @else
                            Lista de candidatos
                        @endif
                    </h1>

                    <table class="min-w-full border-collapse block md:table">
                        <thead class="block md:table-header-group">
                            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nome</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Profissão</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nivel</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">local</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell w-14">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="block md:table-row-group ">

                            @foreach ($candidates as $candidate )
                                <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nome</span>{{$candidate -> nome}}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Profissão</span>{{$candidate -> profissao}}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nivel</span>{{$candidate -> experiencesName -> experience}}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left md:text-center block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Local</span>{{$candidate -> locationsName -> location}}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left flex">

                                        <a href="{{url('v1/pessoas/'.$candidate->id.'/edit')}}"   class="cursor-pointer  bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 border border-blue-500 rounded" >Edit</a>

                                        <form method="POST" action="{{'/v1/pessoas/'.$candidate -> id.'/delete'}}">
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
