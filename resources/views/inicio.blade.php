@extends('layouts.app')
@section('titulo', 'ReparaTec')
@section('cabecera', 'ReparaTec - Expertos en reparación y mantenimiento de dispositivos móviles')

@section('contenido')
    <div class="hero min-h-screen" style="background-image: url(https://source.unsplash.com/random/400x200/?repair,technology);">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class="hero-content text-center text-neutral-content">
            <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">ReparaTec Tu solución integral para dispositivos móviles</h1>
                <p class="mb-5">Ofrecemos reparación y mantenimiento especializado para tu celular, tablet o cualquier dispositivo móvil. Además, contamos con repuestos y accesorios de calidad. ¡Tu dispositivo como nuevo!</p>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary">Comprar Repuestos y Accesorios</a>
            </div>
        </div>
    </div>
@endsection
