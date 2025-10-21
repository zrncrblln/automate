<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Wesleyan University-Philippines Student Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <link rel="icon" href="img/logozxc.png">
    <style>
        /* Wesleyan Colors are now defined in css/style.css */

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Custom animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Hover effects */
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--wesleyan-green);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #003d1f;
        }

        /* Login form styling */
        .login-card {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .input-focus:focus {
            border-color: var(--wesleyan-green);
            box-shadow: 0 0 0 3px rgba(0, 77, 38, 0.1);
        }
    </style>
</head>

<body class="font-sans min-h-screen flex items-center justify-center bg-cover bg-center bg-fixed"
    style="background-image: url('wesleyan-university-philippines.jpg');">

    <!-- Background Overlay -->
    <div class="absolute inset-0 bg-gradient-to-r from-green-900/80 to-green-800/70"></div>

    <!-- Navigation -->
    <nav class="absolute top-0 w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex justify-between items-center">
                <a href="index.php"
                    class="flex items-center text-white hover:text-yellow-300 transition-colors duration-300">
                    <img src="img/logozxc.png" alt="Wesleyan University Logo" class="h-8 w-8 mr-2">
                    <span class="font-bold text-lg">Wesleyan University-Philippines</span>
                </a>
                <a href="index.php"
                    class="bg-yellow-400 text-green-800 px-4 py-2 rounded-full font-semibold hover:bg-yellow-300 transition-colors duration-300">
                    <i data-lucide="home" class="w-4 h-4 inline mr-1"></i> Home
                </a>
            </div>
        </div>
    </nav>

    <!-- Login Form -->
    <div class="relative z-10 w-full max-w-md px-4 fade-in-up">
        <div class="login-card rounded-2xl shadow-2xl p-8 hover-lift">

            <!-- Logo and Title -->
            <div class="text-center mb-8">
                <div class="bg-green-700 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="shield" class="w-8 h-8 text-white"></i>
                </div>
                <h1 class="text-2xl font-bold text-gray-900 mb-2">Welcome Back</h1>
                <p class="text-gray-600">Sign in to your account</p>
            </div>

            <!-- Error Message -->
            <?php if (isset($_GET['error'])) { ?>
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6 fade-in-up">
                    <div class="flex items-center">
                        <i data-lucide="alert-circle" class="w-5 h-5 mr-2"></i>
                        <?= htmlspecialchars($_GET['error']) ?>
                    </div>
                </div>
            <?php } ?>

            <!-- Login Form -->
            <form method="post" action="req/login.php" class="space-y-6">
                <div>
                    <label for="uname" class="block text-sm font-medium text-gray-700 mb-2">
                        Email Address
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="mail" class="w-5 h-5 text-gray-400"></i>
                        </div>
                        <input type="text"
                            class="input-focus block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none transition-colors duration-200"
                            id="uname" name="uname" placeholder="Enter your email" autocomplete="off" required />
                    </div>
                </div>

                <div>
                    <label for="pass" class="block text-sm font-medium text-gray-700 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="lock" class="w-5 h-5 text-gray-400"></i>
                        </div>
                        <input type="password"
                            class="input-focus block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none transition-colors duration-200"
                            id="pass" name="pass" placeholder="Enter your password" required />
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-green-700 text-white py-3 px-4 rounded-lg font-semibold hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors duration-200 hover-lift">
                    <i data-lucide="log-in" class="w-4 h-4 inline mr-2"></i>
                    Sign In
                </button>
            </form>

            <!-- Footer Links -->
            <div class="mt-8 text-center space-y-2">
                <p class="text-sm text-gray-600">
                    Access your personalized dashboard
                </p>
                <div class="flex justify-center space-x-4 text-sm">
                    <a href="#admin" class="text-green-700 hover:text-green-800 font-medium">Admin</a>
                    <span class="text-gray-400">•</span>
                    <a href="#teacher" class="text-green-700 hover:text-green-800 font-medium">Teacher</a>
                    <span class="text-gray-400">•</span>
                    <a href="#student" class="text-green-700 hover:text-green-800 font-medium">Student</a>
                </div>
            </div>
        </div>

        <!-- University Info -->
        <div class="text-center mt-8 text-white/80">
            <p class="text-sm">
                Wesleyan University-Philippines<br>
                Student Management System
            </p>
        </div>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Add fade-in animation on load
        document.addEventListener('DOMContentLoaded', function () {
            const formCard = document.querySelector('.login-card');
            formCard.style.opacity = '0';
            formCard.style.transform = 'translateY(20px)';

            setTimeout(() => {
                formCard.style.transition = 'all 0.6s ease-out';
                formCard.style.opacity = '1';
                formCard.style.transform = 'translateY(0)';
            }, 100);
        });

        // Focus effects for inputs
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function () {
                this.parentElement.classList.add('ring-2', 'ring-green-500', 'ring-opacity-50');
            });

            input.addEventListener('blur', function () {
                this.parentElement.classList.remove('ring-2', 'ring-green-500', 'ring-opacity-50');
            });
        });
    </script>
</body>

</html>