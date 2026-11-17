
@extends('layouts.app')

@section('title', 'Gestión de estudiantes | WebHub')

@section('navbar-actions')
    <a href="{{ route('estudiantes.create') }}" class="btn-primary-custom">
        + Registrar estudiante
    </a>
@endsection

@section('content')

    <!-- Encabezado -->
    <section>

        <p class="section-label">
            PANEL DE ADMINISTRACIÓN / 01
        </p>

        <h1 class="page-title">
            Gestión de<br>
            estudiantes<span style="color: var(--color-purple);">.</span>
        </h1>

        <p class="page-description">
            Administra la información académica de los estudiantes.
            Consulta, registra y actualiza sus datos desde un solo lugar.
        </p>

    </section>


    <!-- Notificación -->
    @if (session('success'))

        <div class="alert-custom alert-success-custom mt-4">
            {{ session('success') }}
        </div>

    @endif


    <!-- Botón para mostrar u ocultar filtros -->
    <div class="d-flex justify-content-end mt-5 mb-3">
        
        <button
        type="button"
        id="toggleFilters"
        class="btn-secondary-custom"
            aria-controls="filtersPanel"
            aria-expanded="false"
            >
            Mostrar filtros
        </button>
        
    </div>
    
    <!-- Filtros -->
    @php
        $filtrosActivos = request()->hasAny([
            'documento',
            'nombre',
            'apellido',
            'correo',
            'programa'
        ]);
    @endphp

    <section
        class="panel"
        id="filtersPanel"
        @unless($filtrosActivos) hidden @endunless
    >

        <div class="panel-header">

            <h2 class="panel-title">
                Buscar estudiantes
            </h2>

            <p class="panel-description">
                Utiliza los filtros para encontrar un registro específico.
            </p>

        </div>


        <div class="panel-body">

            <form action="{{ route('estudiantes.index') }}" method="GET">

                <div class="row">

                    <div class="col-md-4 mb-4">

                        <label class="form-label-custom">
                            Documento
                        </label>

                        <input
                            type="text"
                            name="documento"
                            class="form-control-custom"
                            value="{{ request('documento') }}"
                            placeholder="Número de documento"
                        >

                    </div>


                    <div class="col-md-4 mb-4">

                        <label class="form-label-custom">
                            Nombre
                        </label>

                        <input
                            type="text"
                            name="nombre"
                            class="form-control-custom"
                            value="{{ request('nombre') }}"
                            placeholder="Nombre del estudiante"
                        >

                    </div>


                    <div class="col-md-4 mb-4">

                        <label class="form-label-custom">
                            Apellido
                        </label>

                        <input
                            type="text"
                            name="apellido"
                            class="form-control-custom"
                            value="{{ request('apellido') }}"
                            placeholder="Apellido del estudiante"
                        >

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label-custom">
                            Correo electrónico
                        </label>

                        <input
                            type="text"
                            name="correo"
                            class="form-control-custom"
                            value="{{ request('correo') }}"
                            placeholder="Correo electrónico"
                        >

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label-custom">
                            Programa académico
                        </label>

                        <select name="programa" class="form-select-custom">

                            <option value="">Todos los programas</option>

                            <option value="Ingeniería Informática"
                                {{ request('programa') == 'Ingeniería Informática' ? 'selected' : '' }}>
                                Ingeniería Informática
                            </option>

                            <option value="Ingeniería Industrial"
                                {{ request('programa') == 'Ingeniería Industrial' ? 'selected' : '' }}>
                                Ingeniería Industrial
                            </option>

                            <option value="Administración de Empresas"
                                {{ request('programa') == 'Administración de Empresas' ? 'selected' : '' }}>
                                Administración de Empresas
                            </option>

                        </select>

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="form-label-custom">
                            Ordenar por nombre
                        </label>

                        <select name="orden" class="form-select-custom">

                            <option value="ASC"
                                {{ $orden == 'ASC' ? 'selected' : '' }}>
                                Ascendente (A - Z)
                            </option>

                            <option value="DESC"
                                {{ $orden == 'DESC' ? 'selected' : '' }}>
                                Descendente (Z - A)
                            </option>

                        </select>

                    </div>

                </div>


                <div class="d-flex flex-wrap gap-2">

                    <button type="submit" class="btn-primary-custom">
                        Buscar estudiantes
                    </button>

                    <a href="{{ route('estudiantes.index') }}" class="btn-secondary-custom">
                        Limpiar filtros
                    </a>

                </div>

            </form>

        </div>

    </section>


    <!-- Tabla de estudiantes -->
    <section class="panel">

        <div class="panel-header d-flex justify-content-between align-items-center flex-wrap gap-2">

            <div>

                <h2 class="panel-title">
                    Estudiantes registrados
                </h2>

                <p class="panel-description">
                    Información almacenada en la base de datos.
                </p>

            </div>

            <span class="section-label mb-0">
                REGISTROS
            </span>

        </div>


        <div class="table-container">

            <table class="table-custom">

                <thead>

                    <tr>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Edad</th>
                        <th>Fecha de nacimiento</th>
                        <th>Correo</th>
                        <th>Programa</th>
                        <th>Acciones</th>
                    </tr>

                </thead>


                <tbody>

                    @forelse ($estudiantes as $estudiante)

                        <tr>

                            <td>
                                <span class="student-document">
                                    {{ $estudiante->ID }}
                                </span>
                            </td>

                            <td>
                                <span class="student-name">
                                    {{ $estudiante->nombre }}
                                </span>
                            </td>

                            <td>
                                {{ $estudiante->apellido }}
                            </td>

                            <td>
                                {{ $estudiante->edad }}
                            </td>

                            <td>
                                {{ $estudiante->fecha }}
                            </td>

                            <td>
                                {{ $estudiante->correo }}
                            </td>

                            <td>
                                <span class="student-program">
                                    {{ $estudiante->programa }}
                                </span>
                            </td>

                            <td>

                                <div class="actions-container">

                                    <a
                                        href="{{ route('estudiantes.edit', $estudiante->ID) }}"
                                        class="btn-action btn-edit"
                                    >
                                        Editar
                                    </a>

                                    <form
                                        action="{{ route('estudiantes.destroy', $estudiante->ID) }}"
                                        method="POST"
                                        onsubmit="return confirm('¿Estás seguro de eliminar este estudiante?')"
                                        class="m-0"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-action btn-delete">
                                            Eliminar
                                        </button>
                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8" class="empty-message">
                                No hay estudiantes que coincidan con la búsqueda.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        <div class="table-footer">

            <span class="table-info">
                Consulta de registros académicos
            </span>

            <span class="table-info">
                WebHub / Sistema de estudiantes
            </span>

        </div>

    </section>

    @push('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const toggleButton = document.getElementById('toggleFilters');
            const filtersPanel = document.getElementById('filtersPanel');

            // Comprobar si el formulario está visible
            let filtersVisible = !filtersPanel.hidden;

            // Configurar el botón según el estado inicial
            toggleButton.textContent = filtersVisible
                ? 'Ocultar filtros'
                : 'Mostrar filtros';

            toggleButton.setAttribute('aria-expanded', filtersVisible);

            // Mostrar u ocultar el formulario
            toggleButton.addEventListener('click', function () {

                filtersVisible = !filtersVisible;

                filtersPanel.hidden = !filtersVisible;

                toggleButton.textContent = filtersVisible
                    ? 'Ocultar filtros'
                    : 'Mostrar filtros';

                toggleButton.setAttribute('aria-expanded', filtersVisible);

            });

        });
    </script>

    @endpush
@endsection

