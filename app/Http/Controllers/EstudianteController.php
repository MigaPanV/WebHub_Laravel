<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EstudianteController extends Controller
{
    // Mostrar estudiantes, aplicar filtros y ordenar resultados
    public function list(Request $request)
    {
        // Iniciar consulta a la tabla estudiantes
        $consulta = Estudiante::query();

        // Filtrar por documento
        if ($request->filled('documento')) {
            $consulta->where('ID', 'like', '%' . $request->documento . '%');
        }

        // Filtrar por nombre
        if ($request->filled('nombre')) {
            $consulta->where('nombre', 'like', '%' . $request->nombre . '%');
        }

        // Filtrar por apellido
        if ($request->filled('apellido')) {
            $consulta->where('apellido', 'like', '%' . $request->apellido . '%');
        }

        // Filtrar por correo
        if ($request->filled('correo')) {
            $consulta->where('correo', 'like', '%' . $request->correo . '%');
        }

        // Filtrar por programa
        if ($request->filled('programa')) {
            $consulta->where('programa', $request->programa);
        }

        // Definir el orden alfabético
        $orden = $request->input('orden', 'ASC');

        // Evitar valores de ordenamiento no permitidos
        if (!in_array($orden, ['ASC', 'DESC'])) {
            $orden = 'ASC';
        }

        // Obtener los estudiantes ordenados
        $estudiantes = $consulta
            ->orderBy('nombre', $orden)
            ->get();

        return view('estudiantes.list', compact('estudiantes', 'orden'));
    }

    // Mostrar formulario de registro
    public function index()
    {
        return view('estudiantes.index');
    }

    // Guardar un nuevo estudiante
    public function store(Request $request)
    {
        // Validar los datos recibidos del formulario
        $datos = $request->validate([
            'ID' => 'required|integer|unique:estudiantes,ID',
            'nombre' => 'required|string|max:60',
            'apellido' => 'required|string|max:60',
            'edad' => 'required|integer|min:1|max:120',
            'fecha' => 'required|date',
            'correo' => 'required|email|max:100|unique:estudiantes,correo',
            'programa' => 'required|in:Ingeniería Informática,Ingeniería Industrial,Administración de Empresas',
        ], [
            'ID.required' => 'El documento es obligatorio.',
            'ID.unique' => 'Ya existe un estudiante con ese documento.',
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'edad.required' => 'La edad es obligatoria.',
            'edad.min' => 'La edad debe ser mayor que cero.',
            'edad.max' => 'La edad no puede superar los 120 años.',
            'fecha.required' => 'La fecha de nacimiento es obligatoria.',
            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'Debes ingresar un correo electrónico válido.',
            'correo.unique' => 'Ese correo ya está registrado.',
            'programa.required' => 'Debes seleccionar un programa.',
            'programa.in' => 'El programa seleccionado no es válido.',
        ]);

        // Insertar el estudiante en la base de datos
        Estudiante::index($datos);

        // Volver al listado mostrando un mensaje
        return redirect()->route('estudiantes.list')
            ->with('success', 'Estudiante registrado correctamente.');
    }

    // Mostrar formulario de edición
    public function edit( int $id)
    {
        $estudiante = Estudiante::findOrFail($id);

        return view('estudiantes.edit', compact('estudiante'));
    }

    // Actualizar los datos de un estudiante
    public function update(Request $request, int $id)
    {
        $estudiante = Estudiante::findOrFail($id);

        // Validar los datos recibidos
        $datos = $request->validate([
            'nombre' => 'required|string|max:60',
            'apellido' => 'required|string|max:60',
            'edad' => 'required|integer|min:1|max:120',
            'fecha' => 'required|date',
            'correo' => [
                'required',
                'email',
                'max:100',
                Rule::unique('estudiantes', 'correo')->ignore($estudiante->ID, 'ID'),
            ],
            'programa' => 'required|in:Ingeniería Informática,Ingeniería Industrial,Administración de Empresas',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'edad.required' => 'La edad es obligatoria.',
            'edad.min' => 'La edad debe ser mayor que cero.',
            'edad.max' => 'La edad no puede superar los 120 años.',
            'fecha.required' => 'La fecha de nacimiento es obligatoria.',
            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'Debes ingresar un correo electrónico válido.',
            'programa.required' => 'Debes seleccionar un programa.',
            'programa.in' => 'El programa seleccionado no es válido.',
        ]);

        // Actualizar el registro
        $estudiante->update($datos);

        // Regresar al listado
        return redirect()->route('estudiantes.list')
            ->with('success', 'Estudiante actualizado correctamente.');
    }

    // Eliminar un estudiante
    public function destroy( int $id)
    {
        $estudiante = Estudiante::findOrFail($id);

        $estudiante->delete();

        return redirect()->route('estudiantes.list')
            ->with('success', 'Estudiante eliminado correctamente.');
    }
}