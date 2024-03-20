citar = document.getElementById("citar");
citar2 = document.getElementById("citar2");
citar3 = document.getElementById("citar3");

citar.onclick = function(){

        citar = Swal.fire({
            icon: 'success',
            title: 'Su consulta ha sido solicitada',
            confirmButtonText: 'Salir'
        }); 
};

citar2.onclick = function(){

    citar2 = Swal.fire({
        icon: 'success',
        title: 'Su consulta ha sido solicitada',
        confirmButtonText: 'Salir'
    }); 
};

citar3.onclick = function(){

    citar3 = Swal.fire({
        icon: 'success',
        title: 'Su consulta ha sido solicitada',
        confirmButtonText: 'Salir'
    }); 
};