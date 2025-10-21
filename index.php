<?php
include "DB_connection.php";
include "data/setting.php";
$setting = getSetting($conn);

if ($setting != 0) {
	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Wesleyan University-Philippines - Student Management System</title>
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

			/* Counter animation */
			@keyframes countUp {
				from {
					opacity: 0;
					transform: scale(0.5);
				}

				to {
					opacity: 1;
					transform: scale(1);
				}
			}

			.counter {
				animation: countUp 0.8s ease-out;
			}

			/* Navbar backdrop blur */
			.navbar-blur {
				backdrop-filter: blur(10px);
				background-color: rgba(0, 77, 38, 0.9);
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
		</style>
	</head>

	<body class="font-sans text-gray-900">

		<!-- Navigation -->
		<nav id="navbar" class="fixed top-0 w-full z-50 transition-all duration-300 navbar-blur">
			<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
				<div class="flex justify-between items-center py-4">
					<div class="flex items-center">
						<span class="text-white font-bold text-xl">Wesleyan University-Philippines</span>
					</div>

					<div class="hidden md:flex space-x-8">
						<a href="#home" class="text-white hover:text-yellow-300 transition-colors duration-300">Home</a>
						<a href="#about" class="text-white hover:text-yellow-300 transition-colors duration-300">About</a>
						<a href="#features"
							class="text-white hover:text-yellow-300 transition-colors duration-300">Features</a>
						<a href="#access" class="text-white hover:text-yellow-300 transition-colors duration-300">Access</a>
						<a href="#contact"
							class="text-white hover:text-yellow-300 transition-colors duration-300">Contact</a>
					</div>

					<div class="flex items-center space-x-4">
						<a href="login.php"
							class="bg-yellow-400 text-green-800 px-6 py-2 rounded-full font-semibold hover:bg-yellow-300 transition-colors duration-300">
							Login
						</a>
						<button class="md:hidden text-white" id="mobile-menu-button">
							<i data-lucide="menu" class="w-6 h-6"></i>
						</button>
					</div>
				</div>

				<!-- Mobile menu -->
				<div id="mobile-menu" class="hidden md:hidden pb-4">
					<div class="flex flex-col space-y-2">
						<a href="#home" class="text-white hover:text-yellow-300 py-2">Home</a>
						<a href="#about" class="text-white hover:text-yellow-300 py-2">About</a>
						<a href="#features" class="text-white hover:text-yellow-300 py-2">Features</a>
						<a href="#access" class="text-white hover:text-yellow-300 py-2">Access</a>
						<a href="#contact" class="text-white hover:text-yellow-300 py-2">Contact</a>
					</div>
				</div>
			</div>
		</nav>

		<!-- Hero Section -->
		<section id="home" class="relative min-h-screen flex items-center justify-center">
			<div class="absolute inset-0 bg-cover bg-center bg-fixed"
				style="background-image: url('wesleyan-university-philippines.jpg');">
				<div class="absolute inset-0 bg-gradient-to-r from-green-900/80 to-green-800/70"></div>
			</div>

			<div class="relative z-10 text-center text-white px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
				<h1 class="text-5xl md:text-4xl font-bold mb-6 fade-in-up">
					Welcome to
				</h1>
				<h1 class="text-5xl md:text-5xl font-bold mb-6 fade-in-up">
					Wesleyan University-Philippines
				</h1>
				<p class="text-xl md:text-2xl mb-4 fade-in-up" style="animation-delay: 0.2s">
					Student Management System
				</p>
				<p class="text-lg mb-8 fade-in-up" style="animation-delay: 0.4s">
					Streamlining Education Management for Excellence
				</p>
				<div class="flex flex-col sm:flex-row gap-4 justify-center fade-in-up" style="animation-delay: 0.6s">
					<a href="#access"
						class="bg-yellow-400 text-green-800 px-8 py-3 rounded-full font-semibold text-lg hover:bg-yellow-300 transition-colors duration-300 hover-lift">
						Get Started
					</a>
					<a href="#about"
						class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold text-lg hover:bg-white hover:text-green-800 transition-colors duration-300 hover-lift">
						Learn More
					</a>
				</div>
			</div>

			<div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
				<a href="#about" class="text-white">
					<i data-lucide="chevron-down" class="w-8 h-8"></i>
				</a>
			</div>
		</section>

		<!-- About Section -->
		<section id="about" class="py-20 bg-gray-50">
			<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
				<div class="grid md:grid-cols-2 gap-12 items-center">
					<div class="fade-in-up">
						<img src="img/logozxc.png" alt="University Building" class="rounded-lg shadow-lg w-full">
					</div>
					<div class="fade-in-up" style="animation-delay: 0.2s">
						<h2 class="text-4xl font-bold text-gray-900 mb-6">About Our System</h2>
						<p class="text-lg text-gray-600 mb-4">
							<?= htmlspecialchars($setting['slogan']) ?>
						</p>
						<p class="text-gray-600 leading-relaxed">
							<?= htmlspecialchars($setting['about']) ?>
						</p>
						<div class="mt-8">
							<a href="#features"
								class="bg-green-700 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-800 transition-colors duration-300">
								Explore Features
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Features Section -->
		<section id="features" class="py-20 bg-white">
			<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
				<div class="text-center mb-16">
					<h2 class="text-4xl font-bold text-gray-900 mb-4">Powerful Features</h2>
					<p class="text-xl text-gray-600">Everything you need to manage your educational institution efficiently
					</p>
				</div>

				<div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
					<div class="bg-gray-50 p-6 rounded-xl hover-lift fade-in-up">
						<div class="bg-yellow-400 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
							<i data-lucide="users" class="w-6 h-6 text-green-800"></i>
						</div>
						<h3 class="text-xl font-semibold text-gray-900 mb-2">Student Management</h3>
						<p class="text-gray-600">Comprehensive student profiles, enrollment tracking, and academic records
							management.</p>
					</div>

					<div class="bg-gray-50 p-6 rounded-xl hover-lift fade-in-up" style="animation-delay: 0.1s">
						<div class="bg-yellow-400 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
							<i data-lucide="calendar-check" class="w-6 h-6 text-green-800"></i>
						</div>
						<h3 class="text-xl font-semibold text-gray-900 mb-2">Attendance Tracking</h3>
						<p class="text-gray-600">Automated attendance monitoring with real-time updates and comprehensive
							reporting.</p>
					</div>

					<div class="bg-gray-50 p-6 rounded-xl hover-lift fade-in-up" style="animation-delay: 0.2s">
						<div class="bg-yellow-400 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
							<i data-lucide="trending-up" class="w-6 h-6 text-green-800"></i>
						</div>
						<h3 class="text-xl font-semibold text-gray-900 mb-2">Grade Management</h3>
						<p class="text-gray-600">Efficient grade calculation, transcript generation, and academic
							performance analytics.</p>
					</div>

					<div class="bg-gray-50 p-6 rounded-xl hover-lift fade-in-up" style="animation-delay: 0.3s">
						<div class="bg-yellow-400 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
							<i data-lucide="bar-chart-3" class="w-6 h-6 text-green-800"></i>
						</div>
						<h3 class="text-xl font-semibold text-gray-900 mb-2">Reports & Analytics</h3>
						<p class="text-gray-600">Detailed reports, data visualization, and insights for informed decision
							making.</p>
					</div>
				</div>
			</div>
		</section>

		<!-- Quick Access Section -->
		<section id="access" class="py-20 bg-gray-50">
			<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
				<div class="text-center mb-16">
					<h2 class="text-4xl font-bold text-gray-900 mb-4">Quick Access</h2>
					<p class="text-xl text-gray-600">Access your personalized dashboard</p>
				</div>

				<div class="grid md:grid-cols-3 gap-8">
					<a href="admin/" class="bg-white p-8 rounded-xl hover-lift text-center fade-in-up">
						<div class="bg-green-700 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
							<i data-lucide="shield" class="w-8 h-8 text-white"></i>
						</div>
						<h3 class="text-2xl font-semibold text-gray-900 mb-2">Administrator</h3>
						<p class="text-gray-600 mb-4">Manage system settings, users, and oversee all operations</p>
						<span class="text-green-700 font-semibold">Access Admin Panel →</span>
					</a>

					<a href="Teacher/" class="bg-white p-8 rounded-xl hover-lift text-center fade-in-up"
						style="animation-delay: 0.1s">
						<div class="bg-green-700 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
							<i data-lucide="graduation-cap" class="w-8 h-8 text-white"></i>
						</div>
						<h3 class="text-2xl font-semibold text-gray-900 mb-2">Teacher</h3>
						<p class="text-gray-600 mb-4">Manage classes, grades, and student performance</p>
						<span class="text-green-700 font-semibold">Access Teacher Portal →</span>
					</a>

					<a href="Student/" class="bg-white p-8 rounded-xl hover-lift text-center fade-in-up"
						style="animation-delay: 0.2s">
						<div class="bg-green-700 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
							<i data-lucide="user" class="w-8 h-8 text-white"></i>
						</div>
						<h3 class="text-2xl font-semibold text-gray-900 mb-2">Student</h3>
						<p class="text-gray-600 mb-4">View grades, attendance, and academic progress</p>
						<span class="text-green-700 font-semibold">Access Student Portal →</span>
					</a>
				</div>
			</div>
		</section>

		<!-- Statistics Section -->
		<section class="py-20 bg-green-700 text-white">
			<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
				<div class="text-center mb-16">
					<h2 class="text-4xl font-bold mb-4">Our Impact</h2>
					<p class="text-xl text-green-100">Numbers that speak for themselves</p>
				</div>

				<div class="grid md:grid-cols-4 gap-8 text-center">
					<div class="counter">
						<div class="text-5xl font-bold text-yellow-400 mb-2" data-target="1500">0</div>
						<div class="text-xl">Total Students</div>
					</div>
					<div class="counter" style="animation-delay: 0.1s">
						<div class="text-5xl font-bold text-yellow-400 mb-2" data-target="45">0</div>
						<div class="text-xl">Active Courses</div>
					</div>
					<div class="counter" style="animation-delay: 0.2s">
						<div class="text-5xl font-bold text-yellow-400 mb-2" data-target="120">0</div>
						<div class="text-xl">Faculty Members</div>
					</div>
					<div class="counter" style="animation-delay: 0.3s">
						<div class="text-5xl font-bold text-yellow-400 mb-2" data-target="25">0</div>
						<div class="text-xl">Years of Excellence</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Call to Action Section -->
		<section class="py-20 bg-gray-50">
			<div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
				<h2 class="text-4xl font-bold text-gray-900 mb-6">Ready to Get Started?</h2>
				<p class="text-xl text-gray-600 mb-8">
					Join thousands of students and educators already using our system to streamline education management.
				</p>
				<div class="flex flex-col sm:flex-row gap-4 justify-center">
					<a href="login.php"
						class="bg-green-700 text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-green-800 transition-colors duration-300 hover-lift">
						Access Your Account
					</a>
					<a href="#contact"
						class="border-2 border-green-700 text-green-700 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-green-50 transition-colors duration-300 hover-lift">
						Contact Support
					</a>
				</div>
			</div>
		</section>

		<!-- Footer -->
		<footer id="contact" class="bg-green-700 text-white py-12">
			<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
				<div class="grid md:grid-cols-3 gap-8">
					<div>
						<div class="flex items-center mb-4">
							<img src="img/logozxc.png" alt="Wesleyan University Logo" class="h-8 w-8 mr-2">
							<span class="font-bold text-lg">Wesleyan University</span>
						</div>
						<p class="text-green-100 mb-4">
							Committed to excellence in education and innovation in learning management.
						</p>
						<div class="flex space-x-4">
							<a href="#" class="text-yellow-400 hover:text-yellow-300">
								<i data-lucide="facebook" class="w-5 h-5"></i>
							</a>
							<a href="#" class="text-yellow-400 hover:text-yellow-300">
								<i data-lucide="twitter" class="w-5 h-5"></i>
							</a>
							<a href="#" class="text-yellow-400 hover:text-yellow-300">
								<i data-lucide="instagram" class="w-5 h-5"></i>
							</a>
						</div>
					</div>

					<div>
						<h3 class="font-semibold text-lg mb-4">Quick Links</h3>
						<ul class="space-y-2">
							<li><a href="#about"
									class="text-green-100 hover:text-yellow-400 transition-colors duration-300">About Us</a>
							</li>
							<li><a href="#features"
									class="text-green-100 hover:text-yellow-400 transition-colors duration-300">Features</a>
							</li>
							<li><a href="#access"
									class="text-green-100 hover:text-yellow-400 transition-colors duration-300">Access
									Portal</a></li>
							<li><a href="login.php"
									class="text-green-100 hover:text-yellow-400 transition-colors duration-300">Login</a>
							</li>
						</ul>
					</div>

					<div>
						<h3 class="font-semibold text-lg mb-4">Contact Information</h3>
						<div class="space-y-2 text-green-100">
							<p><i data-lucide="map-pin" class="w-4 h-4 inline mr-2"></i>Cabanatuan City, Nueva Ecija</p>
							<p><i data-lucide="phone" class="w-4 h-4 inline mr-2"></i>(044) 463-2000</p>
							<p><i data-lucide="mail" class="w-4 h-4 inline mr-2"></i>info@wesleyan.edu.ph</p>
						</div>
					</div>
				</div>

				<div class="border-t border-green-600 mt-8 pt-8 text-center">
					<p class="text-green-100">
						&copy; 2024 Wesleyan University-Philippines. All rights reserved.
					</p>
				</div>
			</div>
		</footer>

		<script>
			// Initialize Lucide icons
			lucide.createIcons();

			// Navbar scroll effect
			window.addEventListener('scroll', function () {
				const navbar = document.getElementById('navbar');
				if (window.scrollY > 50) {
					navbar.classList.add('shadow-lg');
				} else {
					navbar.classList.remove('shadow-lg');
				}
			});

			// Mobile menu toggle
			document.getElementById('mobile-menu-button').addEventListener('click', function () {
				const mobileMenu = document.getElementById('mobile-menu');
				mobileMenu.classList.toggle('hidden');
			});

			// Smooth scroll for navigation links
			document.querySelectorAll('a[href^="#"]').forEach(anchor => {
				anchor.addEventListener('click', function (e) {
					e.preventDefault();
					const target = document.querySelector(this.getAttribute('href'));
					if (target) {
						target.scrollIntoView({
							behavior: 'smooth',
							block: 'start'
						});
					}
				});
			});

			// Counter animation
			function animateCounters() {
				const counters = document.querySelectorAll('.counter [data-target]');
				const speed = 200;

				counters.forEach(counter => {
					const target = +counter.getAttribute('data-target');
					const increment = target / speed;

					function updateCount() {
						const count = +counter.innerText;
						if (count < target) {
							counter.innerText = Math.ceil(count + increment);
							setTimeout(updateCount, 1);
						} else {
							counter.innerText = target;
						}
					}

					updateCount();
				});
			}

			// Trigger counter animation when statistics section is in view
			const observerOptions = {
				threshold: 0.5
			};

			const observer = new IntersectionObserver(function (entries) {
				entries.forEach(entry => {
					if (entry.isIntersecting) {
						animateCounters();
						observer.unobserve(entry.target);
					}
				});
			}, observerOptions);

			const statsSection = document.querySelector('section.bg-green-700');
			if (statsSection) {
				observer.observe(statsSection);
			}

			// Fade in animation on scroll
			const fadeElements = document.querySelectorAll('.fade-in-up');

			const fadeObserver = new IntersectionObserver(function (entries) {
				entries.forEach(entry => {
					if (entry.isIntersecting) {
						entry.target.style.opacity = '1';
						entry.target.style.transform = 'translateY(0)';
					}
				});
			}, {
				threshold: 0.1
			});

			fadeElements.forEach(element => {
				fadeObserver.observe(element);
			});
		</script>
	</body>

	</html>
<?php } else {
	header("Location: login.php");
	exit;
} ?>