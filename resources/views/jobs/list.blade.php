@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div >
            <div class="card">
                <div class="card-header"><a href="{{url('v1/vagas/cadastrar')}}" class="underline" >Adicionar vaga</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 class="text-2xl">
                        @if (count($jobs) === 0)
                            Não há registro de vagas
                        @else
                            Lista de vagas
                        @endif
                    </h1>

                    <table class="min-w-full border-collapse block md:table">
                        <thead class="block md:table-header-group">
                            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                            <th class="bg-gray-600 p-2 text-white text-center font-bold md:border md:border-grey-500 block md:table-cell">ID</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Empresa</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Titulo</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Descrição</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nivel</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Local</th>
                                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell w-14">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="block md:table-row-group ">

                            @foreach ($jobs as $job )
                                <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                                <td class="p-2 md:border md:border-grey-500 text-center  block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">ID</span>{{$job -> id}}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Empresa</span>{{$job -> company}}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Titulo</span>{{$job -> title}}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Descrição</span>{{$job -> description}}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold text">Nivel</span>{{$job -> experiencesName -> experience}}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left md:text-center block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Local</span>{{$job -> locationsName -> location}}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left flex">
                                        <a href="{{url('v1/vagas/'.$job -> id.'/edit')}}"   class="cursor-pointer  bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 border border-blue-500 rounded" >Edit</a>

                                        <form method="POST" action="{{'/v1/vagas/'.$job -> id.'/delete'}}">
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
