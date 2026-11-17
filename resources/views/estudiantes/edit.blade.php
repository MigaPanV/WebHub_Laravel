@extends('layouts.app')

@section('title', 'Editar estudiante | WebHub')

@section('navbar-actions')
    <a href="{{ route('estudiantes.index') }}" class="btn-secondary-custom">
        Volver al listado
    </a>
@endsection

@section('content')

    <!-- Encabezado -->
    <div class="mb-4">
        <span class="section-label">GESTIÓN ACADÉMICA / EDICIÓN</span>

        <h1 class="page-title">Editar estudiante.</h1>

        <p class="page-description">
            Actualiza la información del estudiante seleccionado.
        </p>
    </div>

    <!-- Formulario -->
    <div class="panel">

        <div class="panel-header">
            <h2 class="panel-title">Información del estudiante</h2>

            <p class="panel-description">
                Modifica los campos que necesites actualizar.
            </p>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <div class="alert-custom">
                    <strong>No fue posible actualizar el estudiante.</strong>

                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('estudiantes.update', $estudiante->ID) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-4">

                    <div class="col-md-6">
                        <label for="ID" class="form-label-custom">
                            Documento de identidad
                        </label>

                        <input
                            type="number"
                            name="ID"
                            id="ID"
                            class="form-control-custom"
                            value="{{ $estudiante->ID }}"
                            disabled
                        >

                        <small class="text-muted">
                            El documento de identidad no se puede modificar.
                        </small>
                    </div>

                    <div class="col-md-6">
                        <label for="nombre" class="form-label-custom">
                            Nombre
                        </label>

                        <input
                            type="text"
                            name="nombre"
                            id="nombre"
                            class="form-control-custom"
                            value="{{ old('nombre', $estudiante->nombre) }}"
                            required
                        >
                    </div>

                    <div class="col-md-6">
                        <label for="apellido" class="form-label-custom">
                            Apellido
                        </label>

                        <input
                            type="text"
                            name="apellido"
                            id="apellido"
                            class="form-control-custom"
                            value="{{ old('apellido', $estudiante->apellido) }}"
                            required
                        >
                    </div>

                    <div class="col-md-6">
                        <label for="edad" class="form-label-custom">
                            Edad
                        </label>

                        <input
                            type="number"
                            name="edad"
                            id="edad"
                            class="form-control-custom"
                            value="{{ old('edad', $estudiante->edad) }}"
                            required
                        >
                    </div>

                    <div class="col-md-6">
                        <label for="fecha" class="form-label-custom">
                            Fecha de nacimiento
                        </label>

                        <input
                            type="date"
                            name="fecha"
                            id="fecha"
                            class="form-control-custom"
                            value="{{ old('fecha', $estudiante->fecha) }}"
                            required
                        >
                    </div>

                    <div class="col-md-6">
                        <label for="correo" class="form-label-custom">
                            Correo electrónico
                        </label>

                        <input
                            type="email"
                            name="correo"
                            id="correo"
                            class="form-control-custom"
                            value="{{ old('correo', $estudiante->correo) }}"
                            required
                        >
                    </div>

                    <div class="col-md-12">
                        <label for="programa" class="form-label-custom">
                            Programa académico
                        </label>

                        <select
                            name="programa"
                            id="programa"
                            class="form-select-custom"
                            required
                        >
                            <option value="">Selecciona un programa</option>

                            <option value="Ingeniería Informática"
                                {{ old('programa', $estudiante->programa) == 'Ingeniería Informática' ? 'selected' : '' }}>
                                Ingeniería Informática
                            </option>

                            <option value="Ingeniería Industrial"
                                {{ old('programa', $estudiante->programa) == 'Ingeniería Industrial' ? 'selected' : '' }}>
                                Ingeniería Industrial
                            </option>

                            <option value="Administración de Empresas"
                                {{ old('programa', $estudiante->programa) == 'Administración de Empresas' ? 'selected' : '' }}>
                                Administración de Empresas
                            </option>
                        </select>
                    </div>

                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-end gap-3 mt-4">
                    <a href="{{ route('estudiantes.index') }}" class="btn-secondary-custom">
                        Cancelar
                    </a>

                    <button type="submit" class="btn-primary-custom">
                        Guardar cambios
                    </button>
                </div>

            </form>

        </div>
    </div>

@endsection