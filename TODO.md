# TODO

-   Mejorar estilos GLOBAL.
-   Estilos pendientes en /planes-nutricional/publico/{tipo} -> (tipo: Subir de peso, Bajar de peso, Nutritivo)
-   Traducir la fecha de "datos_fisicos.pdf"
-   Hacer pdf para estadísticas (peso y altura)
-   Añadir mensajes por session y boostrap alerts, validaciones de formularios (required).

# Por borrar

    composer

-   barryvdh/laravel-snappy
-   spatie/browsershot

<!-- 1. Error en el formulario de entrenado (quizas tambien en nutricionista) -->

2. Hacer las preguntas de especialista, al igual que el de usuario, despues de que se registre, rellene su form
3. Traducciones
4. Arreglar fecha y hora
 <!-- 5. Invalidar un usuario, no regresa como usuario normal, se mantiene como un especialista -->

_Correcciones:_

_3)_ Cada plan debe dar la opción de imprimir como un PDF

Esto para darle un control al usuario

Ejemplo:
Usuario: Imprimió una plan de ejercicios y un plan nutricional y lo tiene pegado a su nevera para cumplirlo diariamente(o no)

_5)_ Darle uso a la tabla de alimentos

Nutricionista, hace un plan nutricional al usuario de manera diaria

Ejemplo:

-   Desayuno: 2 huevos, pan y queso

Sacar total de calorías, carbohidratos etc etc

-   Almuerzo: seleccionar varios alimentos y sacar total de datos
-   cena: igual
-   Merienda

Total de datos de los alimentos + el día, quizás con hora, este debe poder descargar como PDF
Nota: esto fácilmente lo podemos adaptar al crear receta, con más campos específicos

_6)_ Consultas

Que sea como un microchat

El usuario consulta/pregunta -> especialista responde
