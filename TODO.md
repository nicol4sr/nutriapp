# TODO

-   Cambiar el _Tipo_ en _RecetaSeeder_.
-   Mejorar estilos GLOBAL.
-   Estilos pendientes en /planes-nutricional/publico/{tipo} -> (tipo: Subir de peso, Bajar de peso, Nutritivo)
-   Traducir la fecha de "datos_fisicos.pdf"
-   Hacer pdf
-   Añadir mensajes por session y boostrap alerts, validaciones de formularios (required).

# Seeders

-   Añadir al menos 15 registros en los siguientes seeders:
    -   _RecetaSeeder_
    -   _EjercicioSeeder_

# Por borrar

    composer

-   barryvdh/laravel-snappy
-   spatie/browsershot
    npm

# Módulos

1. # (Finalizado) Registro de usuario

    Modificar completamente el registro de usuario, añadiendo más campos a sus datos (fecha nacimiento, genero), posterior, redirigir a otro formulario (considerando los datos que se solicitan, creo que no debería ser opcional) (datos físicos, calóricos y psicológicos), respecto al perfil tambien se modifica en base a estos cambios, dentro del propio perfil datos como especialista

    - Faltan:

    - Datos físicos
    - Datos calóricos
    - Datos psicológicos

2. # (Finalizado) Añadir consultas

    Añadir módulo de consultas, 3 cards con cada tipo de especialista y mostrar un desplegable con los especialistas de ese tipo, enviar notificacion al especialista, crear una "cita / consulta" cuando este acepte, se le muestran los datos del usuario y un formulario dandole respuesta (textarea - campo de texto solamente), notificar al usuario de la respuesta

3. # (Finalizado) Seguridad

-   Validacion de intentos fallidos
-   Recuperacion de contraseña
-   (Finalizado) - Respaldo de base de datos (facil)

# Discuciones

1. ## (Finalizado) Modulo de Recetas

    ruta: "/recetas"
    objetivo: Registrar las recetas creadas por el usuario,
    segun los parametros para su creacion.
    Parametros: nombre, descripcion, para quien esta dirigido la receta
    (niños, jovenes, adultos, adultos mayores) junto a la edad y genero, tipo de comida(desayuno,almuerzo,cena) y tipo de receta(nutritiva, aumento de peso, disminucion de peso,deportiva, etc)
    alimentos para dicha receta y que no sobrepase el limite de calorias
    desempeño: cumple su funcion
    notas:
    accion: no

2. ## (Finalizado) - Plan nutricional

    ruta: "/planes-nutricionales"
    objetivo: usuario consulta los planes nutricionales y sus tipos, se le muestra el contenido del plan
    parametros: el plan lo crea el especialista
    desempeño: ninguno
    notas: los especialistas crean los planes, y estos se veran reflejados en la app
    accion: ser especialista para crear un plan nutricional

3. ## (Finalizado) - Plan de ejercicios

    ruta: "/ejercicios" y "/ejercicios/crear" (para crear un plan de ejercicio)
    objetivo: el usuario consulta los planes de ejercicios y sus tipos de planes(fullbody,pecho,brazo,espalda etc), se le muestra el contenido del plan
    parametros: ninguno
    desempeño: cumple su funcion
    notas: "Mis planes" deberian estar los planes creados por el usuario (cumple su funcion)
    accion: el entrenador crea los planes. El usuario crea su propio plan

4. ## (Omitir) - Logros y metas (no existe, dejar para despues, hacer caso de uso)

5. ## (Finalizado) - Entrenamiento(niveles, basico,intermedio,avanzado) esto esta ligado a los planes de ejercicios, hacer caso de uso?

    objetivo: el usuario visualiza el nivel de entrenamiento de un plan de ejercicio con un filtro
    parametros: el plan de ejercicio debe estar identificado con un nivel
    desempeño: ninguno
    notas:
    accion: Cada plan que cree el entrenador, este debe identificar su nivel con una etiqueta

6. ## (Pendiente: PDF) - Control de peso

    ruta: "/peso"
    objetivo: El usuario ingresa su peso(actual) y ver los cambios
    parametros: ingresar peso
    desempeño: incompleto
    notas: eliminar "Logros y Metas" de la grafica. agregar informacion detallada en la grafica. QUIZAS, agregar uno de altura
    accion: imprimir como pdf

7. ## (Finalizado) - Control del especialista (CONSULTAS) hacer caso de uso

    Ruta: "/consultas"
    objetivo: El usuario elige a un especialista, el cual tendrá un control del usuario
    parametros: Enlistar a todos los especialistas, saber quienes estan disponibles
    desempeño: falta
    notas: Tener un listado de todos los especialistas registrados en la app, disponibles y no disponibles
    accion: El usuario solicita y visualiza a los especialistas disponibles, el espe lleva un control del usuario.

8. ## (Pendiente: PDF) - Estadistica (hacer caso de uso?)

    ruta: "/peso"
    objetivo: el usuario visualiza su progreso, cantidad de calorias quemadas y consumidas, ingresar y modificar su peso, ejercicios realizados o seleccionados(grafica)
    parametros: generar un archivo PDF
    desempeño: falta
    notas: las graficas pueden ser de: peso(cambios de peso), recetas(cuantas tipos de receta ha elegido ó creado), planes(cantidad de tipos de planes nutridionales. Cantidad de plan de ejercicios seleccionados o tipos de planes)
    accion: imprimir como pdf
