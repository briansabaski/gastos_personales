@extends('layouts.app')

@section ('titulo', 'Transacciones')

@section('contenido')
<style>
    table {
    max-width: 100vw;
    background-color: rgb(253, 247, 193);
    box-shadow: 4px 3px 8px;
}
table, th, td {
    border:  1px solid rgba(0, 0, 0, 0.85);
}
</style>
<table> 
    <thead> 
        <tr> 
            <th>Id de usuario</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Contraseña</th>
            <th>Rol Id</th>
            <th>Contraseña</th>
            <th>Guardar Token</th>
            <th>Creado en</th>
            <th>Actualizado</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($datos as $dato): ?>
        <tr>
            <td><?= $dato['user_id']?></td>
            <td><?= $dato['name']?></td>
            <td><?= $dato['email']?></td>
            <td><?= $dato['password']?></td>
            <td><?= $dato['role_id']?></td>
            <td><?= $dato['email_verified_at']?></td>
            <td><?= $dato['remember_token']?></td>
            <td><?= $dato['created_at']?></td>
            <td><?= $dato['updated_at']?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</div>

<script>
    // El código js se ejecuta luego de que todos los elementos del DOM haya creado
 document.addEventListener('DOMContentLoaded', function(){
    console.log("Cargó la pagina");
 });
</script>
@endsection