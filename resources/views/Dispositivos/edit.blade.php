@extends('layouts.app')

@section('titulo', 'Editar Dispositivo')

@section('contenido')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Editar Dispositivo</h1>
        <form action="{{ route('dispositivos.update', $dispositivo->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Indica que el método del formulario es PUT -->

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <!-- Campo Marca -->
                <div>
                    <label for="marca" class="block text-sm font-medium text-gray-700">Marca</label>
                    <input type="text" id="marca" name="marca" value="{{ old('marca', $dispositivo->Marca) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('marca')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Modelo -->
                <div>
                    <label for="modelo" class="block text-sm font-medium text-gray-700">Modelo</label>
                    <input type="text" id="modelo" name="modelo" value="{{ old('modelo', $dispositivo->Modelo) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('modelo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo IMEI -->
                <div>
                    <label for="imei" class="block text-sm font-medium text-gray-700">IMEI</label>
                    <input type="text" id="imei" name="imei" value="{{ old('imei', $dispositivo->IMEI) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('imei')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Campo Cliente -->
                <div>
                    <label for="cliente_id" class="block text-sm font-medium text-gray-700">Cliente</label>
                    <select id="cliente_id" name="cliente_id" 
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" 
                        required>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}" {{ $cliente->id == old('cliente_id', $dispositivo->cliente_id) ? 'selected' : '' }}>
                                {{ $cliente->nombre }} {{ $cliente->apellidos }}
                            </option>
                        @endforeach
                    </select>
                    @error('cliente_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Botones de Guardar y Cancelar -->
            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Guardar
                </button>
                <a href="{{ route('dispositivos.index') }}"
                    class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
