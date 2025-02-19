<!DOCTYPE html>
<html>
<head>
    <title>Listado de Pacientes</title>
    <style>
        /* Estilos para el PDF */
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>Listado de Pacientes</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Fecha de Nacimiento</th>
                <th>Propietario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->name }}</td>
                    <td>{{ $paciente->type }}</td>
                    <td>{{ $paciente->date_of_birth->format('d/m/Y') }}</td>
                    <td>{{ $paciente->owner->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
