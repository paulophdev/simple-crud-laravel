@extends('layouts.home')

@section('content')
<a href="{{ route('user.create') }}" class="text-white w-full rounded bg-sky-700 bg-primary px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">Criar Usuário</a>
<div class="overflow-auto">
    <table class="min-w-full text-left text-sm font-light mt-4">
        <thead class="border-b font-medium dark:border-neutral-500">
            <tr>
                <th scope="col" class="px-6 py-4">#</th>
                <th scope="col" class="px-6 py-4">Nome</th>
                <th scope="col" class="px-6 py-4">E-mail</th>
                <th scope="col" class="px-6 py-4 w-10">Editar</th>
                <th scope="col" class="px-6 py-4 w-10">Excluir</th>
            </tr>
        </thead>
        <tbody>
            @if(count($users) > 0)
            @foreach($users as $user)
            <tr class="border-b dark:border-neutral-500">
                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $loop->iteration }}</td>
                <td class="whitespace-nowrap px-6 py-4">{{ $user->name }}</td>
                <td class="whitespace-nowrap px-6 py-4">{{ $user->email }}</td>
                <td class="whitespace-nowrap px-6 py-4">
                    <a href="{{ route('user.update.show', $user->id) }}" class="p-2 border-2 border-lime-500">
                        &#9999;
                    </a>
                </td>
                <td class="whitespace-nowrap px-6 py-4">
                    <a 
                        href="{{ route('user.destroy', $user->id) }}" 
                        class="p-2 border-2 border-red-700"
                        onClick="return confirm('Confirma a exclusão do usuário?')"
                    >
                        &#9747;
                    </a>
                </td>
            </tr>
            @endforeach
            @else
            <p>Nenhum usuário encontrado...</p>
            @endif
        </tbody>
    </table>
</div>
@endsection