<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Login - Kabupaten Tasikmalaya</title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .login-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #06b6d4 100%);
        }

        .form-shadow {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .input-focus:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .gradient-text {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .floating-animation {
            animation: floating 6s ease-in-out infinite;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .pulse-glow {
            animation: pulse-glow 2s infinite;
        }

        @keyframes pulse-glow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
            }

            50% {
                box-shadow: 0 0 30px rgba(59, 130, 246, 0.5);
            }
        }
    </style>
</head>

<body class="min-h-screen bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Left Side - Image Section -->
        <div class="hidden lg:flex lg:w-1/2 login-bg relative overflow-hidden">
            <div class="absolute inset-0 bg-black bg-opacity-20"></div>

            <!-- Decorative Elements -->
            <div class="absolute top-10 left-10 w-20 h-20 bg-white bg-opacity-10 rounded-full floating-animation"></div>
            <div class="absolute top-1/3 right-20 w-16 h-16 bg-white bg-opacity-10 rounded-full floating-animation"
                style="animation-delay: -2s;"></div>
            <div class="absolute bottom-1/4 left-1/4 w-12 h-12 bg-white bg-opacity-10 rounded-full floating-animation"
                style="animation-delay: -4s;"></div>

            <div class="relative z-10 flex flex-col justify-center items-center w-full p-12 text-white">
                <!-- Logo/Icon -->
                <div class="mb-8 p-6 bg-white bg-opacity-20 rounded-full pulse-glow">
                    <i class="fas fa-university text-6xl text-white"></i>
                </div>

                <h1 class="text-4xl font-bold mb-4 text-center">
                    Portal Digital
                </h1>
                <h2 class="text-2xl font-semibold mb-6 text-center">
                    Kabupaten Tasikmalaya
                </h2>
                <p class="text-lg text-center text-gray-100 max-w-md leading-relaxed">
                    Sistem informasi terintegrasi untuk pelayanan publik yang lebih efisien dan transparan
                </p>

                <!-- Stats -->
                <div class="flex space-x-8 mt-12">
                    <div class="text-center">
                        <div class="text-2xl font-bold">24/7</div>
                        <div class="text-sm opacity-80">Layanan</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold">Aman</div>
                        <div class="text-sm opacity-80">Terpercaya</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold">Modern</div>
                        <div class="text-sm opacity-80">Digital</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
            <div class="w-full max-w-md">
                <!-- Mobile Logo -->
                <div class="lg:hidden text-center mb-8">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-600 to-blue-500 rounded-full mb-4">
                        <i class="fas fa-university text-2xl text-white"></i>
                    </div>
                    <h1 class="text-2xl font-bold gradient-text">Portal Kabupaten Tasikmalaya</h1>
                </div>

                <!-- Welcome Text -->
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Selamat Datang</h2>
                    <p class="text-gray-600">Silakan masuk ke akun Anda untuk mengakses layanan</p>
                </div>

                <!-- Login Form -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-200">
                    <form class="space-y-6">
                        <!-- Username Field -->
                        <div>
                            <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-user mr-2 text-blue-500"></i>Username
                            </label>
                            <input type="text" id="username" name="username"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-200 input-focus"
                                placeholder="Masukkan username Anda" required>
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-lock mr-2 text-blue-500"></i>Password
                            </label>
                            <div class="relative">
                                <input type="password" id="password" name="password"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-200 input-focus pr-12"
                                    placeholder="Masukkan password Anda" required>
                                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center"
                                    onclick="togglePassword()">
                                    <i class="fas fa-eye text-gray-400 hover:text-gray-600 transition-colors"
                                        id="toggleIcon"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox"
                                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                <label for="remember-me" class="ml-2 block text-sm text-gray-700">
                                    Ingat saya
                                </label>
                            </div>
                            <a href="#"
                                class="text-sm text-blue-600 hover:text-blue-500 font-medium transition-colors">
                                Lupa password?
                            </a>
                        </div>

                        <!-- Login Button -->
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-blue-600 to-blue-500 text-white py-3 px-4 rounded-lg font-semibold text-lg hover:from-blue-700 hover:to-blue-600 focus:ring-4 focus:ring-blue-200 transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98]">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Masuk
                        </button>
                    </form>

                    <!-- Divider -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <p class="text-center text-sm text-gray-600">
                            Butuh bantuan?
                            <a href="#" class="text-blue-600 hover:text-blue-500 font-medium transition-colors">
                                Hubungi Administrator
                            </a>
                        </p>
                    </div>
                </div>

                <!-- Footer -->
                <div class="text-center mt-8 text-sm text-gray-500">
                    <p>© 2024 Pemerintah Kabupaten Tasikmalaya</p>
                    <p class="mt-1">Portal Digital Terintegrasi</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Add smooth animations on load
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('.form-shadow');
            form.style.opacity = '0';
            form.style.transform = 'translateY(20px)';

            setTimeout(() => {
                form.style.transition = 'all 0.6s ease-out';
                form.style.opacity = '1';
                form.style.transform = 'translateY(0)';
            }, 100);
        });

        // Add hover effects to input fields
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
                this.parentElement.style.transition = 'transform 0.2s ease';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>

</html>
