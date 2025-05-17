<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Apotik</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-800">
    <div class="relative min-h-screen flex items-center justify-center bg-cover bg-center before:absolute before:inset-0 before:bg-black/40" style="background-image: url('assets/img/bg-apotik.jpg');">
    <!-- Login Card -->
    <div class="relative z-10 bg-white bg-opacity-100 p-8 rounded-lg shadow-md w-full max-w-md">
      <!-- Logo -->
      <div class="flex justify-center mb-4">
        <img src="{{ asset('assets/img/logo-rsi-banjarmasin.png') }}" alt="Logo" class="h-16 w-16 rounded-full border">
      </div>

      <!-- Form -->
      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-4">
          <label for="email" class="block text-gray-700 text-sm font-medium mb-1">Email</label>
          <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="mb-4">
          <label for="password" class="block text-gray-700 text-sm font-medium mb-1">Kata Sandi</label>
          <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
          <div class="text-right mt-1">
            <a href="#" class="text-blue-500 text-sm hover:underline">Lupa Kata Sandi ?</a>
          </div>
        </div>

        <div class="mb-4 flex items-center">
          <input type="checkbox" id="remember" name="remember" class="mr-2">
          <label for="remember" class="text-sm text-gray-700">Ingat Saya</label>
        </div>

        <button type="submit" name="submit" class="w-full bg-blue-900 text-white py-2 rounded hover:bg-blue-800">Masuk</button>
      </form>
    </div>
  </div>
</body>
</html>
