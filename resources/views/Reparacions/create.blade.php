@extends('layouts.app')

@section('titulo', 'Crear Reparación')

@section('contenido')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Agregar Nueva Reparación</h1>
        <form action="{{ route('reparacions.store') }}" method="POST">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="solicitud_id" class="block text-sm font-medium text-gray-700">ID de Solicitud</label>
                    <input type="number" id="solicitud_id" name="solicitud_id" value="{{ old('solicitud_id') }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('solicitud_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="empleado_id" class="block text-sm font-medium text-gray-700">Empleado</label>
                    <select id="empleado_id" name="empleado_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
                        <option value="">Seleccione un empleado</option>
                        @foreach ($empleados as $empleado)
                            <option value="{{ $empleado->id }}" {{ old('empleado_id') == $empleado->id ? 'selected' : '' }}>
                                {{ $empleado->nombre }} <!-- Cambia 'nombre' al atributo correcto que representa el nombre del empleado -->
                            </option>
                        @endforeach
                    </select>
                    @error('empleado_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="fecha_reparacion" class="block text-sm font-medium text-gray-700">Fecha de Reparación</label>
                    <input type="datetime-local" id="fecha_reparacion" name="fecha_reparacion" value="{{ old('fecha_reparacion') }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('fecha_reparacion')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="costo_reparacion" class="block text-sm font-medium text-gray-700">Costo de Reparación</label>
                    <input type="number" step="0.01" id="costo_reparacion" name="costo_reparacion" value="{{ old('costo_reparacion') }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                        required>
                    @error('costo_reparacion')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="estado" class="block text-sm font-medium text-gray-700">Estado de la Reparación</label>
                    <select id="estado" name="estado" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" required>
                        <option value="">Seleccione un estado</option>
                        <option value="pendiente" {{ old('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="en_proceso" {{ old('estado') == 'en_proceso' ? 'selected' : '' }}>En Progreso</option>
                        <option value="completada" {{ old('estado') == 'completada' ? 'selected' : '' }}>Esperando Piezas</option>
                        <option value="prueba_de_funcionamiento" {{ old('estado') == 'prueba_de_funcionamiento' ? 'selected' : '' }}>Prueba de Funcionamiento</option>
                        <option value="listo_para_recoger" {{ old('estado') == 'listo_para_recoger' ? 'selected' : '' }}>Listo para Recoger</option>
                        <option value="entregado" {{ old('estado') == 'entregado' ? 'selected' : '' }}>Entregado</option>
                        <option value="cancelada" {{ old('estado') == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                    </select>
                    @error('estado')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Guardar
                </button>
                <a href="{{ route('reparacions.index') }}"
                    class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-gray-700 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
