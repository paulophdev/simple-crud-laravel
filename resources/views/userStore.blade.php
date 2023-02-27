@extends('layouts.home')

@section('content')
@php
   function returnUrl($param)
   {
      $uri = "https://";

      if ($_SERVER['HTTP_HOST'] === 'localhost:8000') {
         $uri = "http://";
      }

      return $uri.$_SERVER['HTTP_HOST'].$param;
   } 
@endphp
<div class="block max-w-md rounded-lg bg-white p-6 shadow-lg dark:bg-neutral-700 m-auto mt-20 mb-20">
   <h1 class="text-lg mb-5 text-center ">Criar usuário</h1>
   <form autocomplete="off" method="POST" action="{{ returnUrl('/user') }}">
      @csrf
      <div class="relative mb-6">
         <label for="name">Nome</label>
         <input 
            name="name" 
            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] outline-none" 
            id="name" 
            required
            placeholder="Nome completo"
            value="{{ old('name') }}"
         />
         @error('name')
         <div class="text-red-600 text-sm">{{ $message }}</div>
         @enderror
      </div>
      <div class="relative mb-6">
         <label for="email">E-mail</label>
         <input 
            type="email"
            required
            name="email" 
            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] outline-none" 
            id="email" 
            placeholder="Seu melhor e-mail"
            value="{{ old('email') }}"
         />
         @error('email')
         <div class="text-red-600 text-sm">{{ $message }}</div>
         @enderror
      </div>
      <div class="relative mb-6">
         <label for="password">Senha</label>
         <input 
            type="password" 
            name="password" 
            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] outline-none" 
            id="password" 
            required
            placeholder="Senha segura" 
            value="{{ old('password') }}"
         />
         @error('password')
         <div class="text-red-600 text-sm">{{ $message }}</div>
         @enderror
      </div>
      <button type="submit" class="text-white inline-block w-full rounded bg-lime-700 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]" data-te-ripple-init="" data-te-ripple-color="light">
      Criar Agora
      </button>
      <a href="/" onClick="return confirm('Ao retornar o conteúdo do formulário será descartado.\nDeseja continuar?')" class="text-center text-white inline-block w-full rounded bg-red-700 mt-5 px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]" data-te-ripple-init="" data-te-ripple-color="light">
         Cancelar
      </a>
   </form>
</div>
@endsection