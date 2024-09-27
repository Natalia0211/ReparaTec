@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Crear Inventario</h1>
    
    <form action="{{ route('inventarios.store') }}" method="POST">
        @csrf
        
        <div class="mb-4">
            <label for="nombre" class="label">Nombre del Producto</label>
            <input type="text" name="nombre" id="nombre" class="input" required>
            @error('nombre')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="cantidad" class="label">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="input" required>
            @error('cantidad')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="precio_unitario" class="label">Precio Unitario</label>
            <input type="number" step="0.01" name="precio_unitario" id="precio_unitario" class="input" required>
            @error('precio_unitario')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="proveedor_id" class="label">Proveedor</label>
            <select name="proveedor_id" id="proveedor_id" class="select" required>
                <option value="">Selecciona un proveedor</option>
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
            @error('proveedor_id')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="producto_id" class="label">Producto</label>
            <select name="producto_id" id="producto_id" class="select" required>
                <option value="">Selecciona un producto</option>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
            @error('producto_id')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn">Crear Inventario</button>
    </form>
</div>
@endsection

