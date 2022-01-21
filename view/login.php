<?php

require_once('vendor/autoload.php');
// dd( password_hash('2449578' , PASSWORD_DEFAULT) );

?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/6c6195e631.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
</head>

<body>
  <div class="flex items-center justify-center bg-gray-50 min-h-screen px-4 py-12 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <img class="mx-auto h-12 w-auto" src="assets/images/acceso-privado.png">
        <h2 class="mt-6 text-center text-3xl text-gray-900 font-extrabold">
          Iniciar sesión
        </h2>
      </div>
      <div class="shadow-lg p-6 rounded-md">
        <form class="mt-8 space-y-6" action="" method="POST">
          <div class="rounded-md shadow-sm -space-y-px">
            <div>
              <label for="correo" class="sr-only">Correo</label>
              <input id="correo" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Correo">
            </div>
            <div>
              <label for="pwd" class="sr-only">Contraseña</label>
              <input id="pwd" name="pass" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Contraseña">
            </div>
          </div>
  
          <div class="flex items-center justify-between">
            <div class="flex items-center"></div>
            <div class="text-sm">
              <a href="#" class="font-medium text-teal-600 hover:text-teal-500">¿Olvidaste tu contraseña?</a>
            </div>
          </div>
  
          <div>
            <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                <i class="fas fa-lock"></i>
              </span>
              Entrar
            </button>
          </div>
          <input type="hidden" name="recordar" value="true">
        </form>
      </div>
    </div>
  </div>
</body>

</html>