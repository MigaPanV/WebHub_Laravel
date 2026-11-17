 @extends('layouts.app')

@section('title', 'Registrar estudiante | WebHub')

@section('navbar-actions')
    <a href="{{ route('estudiantes.list') }}" class="btn-secondary-custom">
        Ver lista de estudiantes
    </a>
@endsection

@section('content')

    <!-- Encabezado -->
    <div class="mb-4">
        <span class="section-label">GESTIÓN ACADÉMICA / REGISTRO</span>

        <h1 class="page-title">Registrar estudiante.</h1>

        <p class="page-description">
            Ingresa la información del estudiante para agregarlo al sistema.
        </p>
    </div>

    <!-- Formulario -->
    <div class="panel">

        <div class="panel-header">
            <h2 class="panel-title">Información del estudiante</h2>

            <p class="panel-description">
                Completa todos los campos del formulario.
            </p>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <div class="alert-custom">
                    <strong>No fue posible registrar el estudiante.</strong>

                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('estudiantes.store') }}" method="POST">
                @csrf

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
                            value="{{ old('ID') }}"
                            placeholder="Ej. 1234567890"
                            required
                        >
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
                            value="{{ old('nombre') }}"
                            placeholder="Nombre del estudiante"
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
                            value="{{ old('apellido') }}"
                            placeholder="Apellido del estudiante"
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
                            value="{{ old('edad') }}"
                            placeholder="Ej. 20"
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
                            value="{{ old('fecha') }}"
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
                            value="{{ old('correo') }}"
                            placeholder="ejemplo@correo.com"
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
                                {{ old('programa') == 'Ingeniería Informática' ? 'selected' : '' }}>
                                Ingeniería Informática
                            </option>

                            <option value="Ingeniería Industrial"
                                {{ old('programa') == 'Ingeniería Industrial' ? 'selected' : '' }}>
                                Ingeniería Industrial
                            </option>

                            <option value="Administración de Empresas"
                                {{ old('programa') == 'Administración de Empresas' ? 'selected' : '' }}>
                                Administración de Empresas
                            </option>
                        </select>
                    </div>

                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-end gap-3 mt-4">
                    <a href="{{ route('estudiantes.list') }}" class="btn-secondary-custom">
                        Cancelar
                    </a>

                    <button type="submit" class="btn-primary-custom">
                        Registrar estudiante
                    </button>
                </div>

            </form>

        </div>
    </div>

@endsection