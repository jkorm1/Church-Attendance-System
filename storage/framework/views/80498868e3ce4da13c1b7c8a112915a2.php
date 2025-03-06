<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(config('app.name', 'Your Portfolio')); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            light: '#9061F9',
                            DEFAULT: '#6D28D9',
                            dark: '#4C1D95',
                        },
                        secondary: {
                            light: '#818CF8',
                            DEFAULT: '#4F46E5',
                            dark: '#3730A3',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-indigo-900 to-purple-800 min-h-screen font-sans text-white">
    <!-- Navigation -->
    <nav class="container mx-auto py-6 px-4 flex justify-between items-center">
        <div class="text-2xl font-bold">Your Name</div>
        <div class="hidden md:flex space-x-6">
            <a href="#about" class="hover:text-purple-300 transition-colors">About</a>
            <a href="#projects" class="hover:text-purple-300 transition-colors">Projects</a>
            <a href="#skills" class="hover:text-purple-300 transition-colors">Skills</a>
            <a href="#contact" class="hover:text-purple-300 transition-colors">Contact</a>
        </div>
        
        <!-- Authentication -->
        
    </nav>
    
    <!-- Hero Section -->
    <section class="container mx-auto px-4 py-20 flex flex-col items-center text-center">
        <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in-down">
            Hi, I'm <span class="text-purple-300">Your Name</span>
        </h1>
        <p class="text-xl md:text-2xl mb-10 max-w-2xl animate-fade-in">
            Full-stack developer specializing in creating beautiful and functional web experiences
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#projects" class="py-3 px-6 text-white bg-purple-500 hover:bg-purple-600 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 shadow-lg">
                View My Work
            </a>
            <a href="#contact" class="py-3 px-6 text-white bg-transparent border border-purple-500 hover:bg-purple-500/20 rounded-full transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 shadow-lg">
                Contact Me
            </a>
        </div>
        
        <!-- Social Links -->
        <div class="flex mt-10 space-x-4">
            <a href="https://github.com/yourusername" target="_blank" rel="noopener noreferrer" class="bg-white/10 p-3 rounded-full hover:bg-purple-500/30 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
            </a>
            <a href="https://figma.com/@yourusername" target="_blank" rel="noopener noreferrer" class="bg-white/10 p-3 rounded-full hover:bg-purple-500/30 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-figma"><path d="M5 5.5A3.5 3.5 0 0 1 8.5 2H12v7H8.5A3.5 3.5 0 0 1 5 5.5z"></path><path d="M12 2h3.5a3.5 3.5 0 1 1 0 7H12V2z"></path><path d="M12 12.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 1 1-7 0z"></path><path d="M5 19.5A3.5 3.5 0 0 1 8.5 16H12v3.5a3.5 3.5 0 1 1-7 0z"></path><path d="M12 16h3.5a3.5 3.5 0 1 1 0 7H12v-7z"></path></svg>
            </a>
            <a href="https://linkedin.com/in/yourusername" target="_blank" rel="noopener noreferrer" class="bg-white/10 p-3 rounded-full hover:bg-purple-500/30 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
            </a>
            <a href="https://twitter.com/yourusername" target="_blank" rel="noopener noreferrer" class="bg-white/10 p-3 rounded-full hover:bg-purple-500/30 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
            </a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-black/20">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold mb-10 text-center">About Me</h2>
            <div class="flex flex-col md:flex-row gap-10 items-center">
                <div class="md:w-1/3">
                    <img 
                        src="https://via.placeholder.com/400" 
                        alt="Profile" 
                        class="rounded-full w-64 h-64 object-cover mx-auto border-4 border-purple-500"
                    />
                </div>
                <div class="md:w-2/3">
                    <p class="text-lg mb-6">
                        I'm a passionate developer with expertise in building modern web applications. 
                        With a strong foundation in both frontend and backend technologies, I create 
                        seamless digital experiences that solve real-world problems.
                    </p>
                    <p class="text-lg mb-6">
                        My journey in tech began 5 years ago, and since then I've worked on a variety 
                        of projects ranging from e-commerce platforms to interactive data visualizations.
                        I'm constantly learning and exploring new technologies to stay at the cutting edge.
                    </p>
                    <a href="#" class="inline-block py-3 px-6 bg-purple-500 hover:bg-purple-600 rounded-full transition duration-300">
                        Download Resume
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-20">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold mb-10 text-center">My Projects</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                    $projects = [
                        [
                            'title' => 'E-Commerce Platform',
                            'description' => 'A full-stack e-commerce solution with payment integration, user authentication, and admin dashboard.',
                            'image' => 'https://via.placeholder.com/500x300',
                            'tags' => ['Laravel', 'Vue.js', 'MySQL'],
                            'github' => 'https://github.com/yourusername/ecommerce',
                            'live' => 'https://ecommerce-demo.com',
                            'figma' => 'https://figma.com/file/ecommerce-design'
                        ],
                        [
                            'title' => 'Data Visualization Dashboard',
                            'description' => 'Interactive dashboard for visualizing complex datasets with filtering and export capabilities.',
                            'image' => 'https://via.placeholder.com/500x300',
                            'tags' => ['D3.js', 'Laravel', 'Alpine.js'],
                            'github' => 'https://github.com/yourusername/data-viz',
                            'live' => 'https://data-viz-demo.com'
                        ],
                        [
                            'title' => 'Social Media App',
                            'description' => 'A responsive social media application with real-time messaging and content sharing.',
                            'image' => 'https://via.placeholder.com/500x300',
                            'tags' => ['Laravel', 'Livewire', 'TailwindCSS'],
                            'github' => 'https://github.com/yourusername/social-app',
                            'figma' => 'https://figma.com/file/social-app-design'
                        ],
                        [
                            'title' => 'Portfolio Website',
                            'description' => 'A personal portfolio website showcasing projects and skills (this website).',
                            'image' => 'https://via.placeholder.com/500x300',
                            'tags' => ['Laravel', 'Blade', 'TailwindCSS'],
                            'github' => 'https://github.com/yourusername/portfolio',
                            'live' => 'https://yourportfolio.com'
                        ],
                        [
                            'title' => 'Weather Application',
                            'description' => 'A weather forecast application with location detection and 5-day predictions.',
                            'image' => 'https://via.placeholder.com/500x300',
                            'tags' => ['Laravel', 'Alpine.js', 'API'],
                            'github' => 'https://github.com/yourusername/weather-app',
                            'live' => 'https://weather-app-demo.com'
                        ],
                        [
                            'title' => 'Task Management System',
                            'description' => 'A collaborative task management system with team features and progress tracking.',
                            'image' => 'https://via.placeholder.com/500x300',
                            'tags' => ['Laravel', 'Vue.js', 'MySQL'],
                            'github' => 'https://github.com/yourusername/task-manager',
                            'figma' => 'https://figma.com/file/task-manager-design'
                        ]
                    ];
                ?>

                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="overflow-hidden bg-white/10 border border-purple-500/30 hover:border-purple-500/70 transition-all duration-300 hover:shadow-lg hover:shadow-purple-500/20 h-full flex flex-col rounded-lg">
                    <div class="relative overflow-hidden h-48">
                        <img 
                            src="<?php echo e($project['image']); ?>" 
                            alt="<?php echo e($project['title']); ?>" 
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-110"
                        />
                    </div>
                    <div class="p-6 pb-2">
                        <h3 class="text-xl font-bold text-white"><?php echo e($project['title']); ?></h3>
                    </div>
                    <div class="p-6 pt-0 flex-grow">
                        <p class="text-gray-200 mb-4"><?php echo e($project['description']); ?></p>
                        <div class="flex flex-wrap gap-2 mt-4">
                            <?php $__currentLoopData = $project['tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="bg-purple-500/20 text-purple-200 border border-purple-500/50 px-3 py-1 rounded-full text-xs">
                                    <?php echo e($tag); ?>

                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="border-t border-purple-500/30 p-6 pt-4 flex justify-between">
                        <div class="flex space-x-3">
                            <?php if(isset($project['github'])): ?>
                                <a 
                                    href="<?php echo e($project['github']); ?>" 
                                    target="_blank" 
                                    rel="noopener noreferrer"
                                    class="text-gray-300 hover:text-white transition-colors"
                                    aria-label="View GitHub repository"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                                </a>
                            <?php endif; ?>
                            <?php if(isset($project['figma'])): ?>
                                <a 
                                    href="<?php echo e($project['figma']); ?>" 
                                    target="_blank" 
                                    rel="noopener noreferrer"
                                    class="text-gray-300 hover:text-white transition-colors"
                                    aria-label="View Figma design"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-figma"><path d="M5 5.5A3.5 3.5 0 0 1 8.5 2H12v7H8.5A3.5 3.5 0 0 1 5 5.5z"></path><path d="M12 2h3.5a3.5 3.5 0 1 1 0 7H12V2z"></path><path d="M12 12.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 1 1-7 0z"></path><path d="M5 19.5A3.5 3.5 0 0 1 8.5 16H12v3.5a3.5 3.5 0 1 1-7 0z"></path><path d="M12 16h3.5a3.5 3.5 0 1 1 0 7H12v-7z"></path></svg>
                                </a>
                            <?php endif; ?>
                            <?php if(isset($project['live'])): ?>
                                <a 
                                    href="<?php echo e($project['live']); ?>" 
                                    target="_blank" 
                                    rel="noopener noreferrer"
                                    class="text-gray-300 hover:text-white transition-colors"
                                    aria-label="View live project"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-20 bg-black/20">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold mb-10 text-center">Skills & Technologies</h2>
            
            <div class="mb-12">
                <h3 class="text-2xl font-semibold mb-6">Frontend</h3>
                <div class="flex flex-wrap gap-4">
                    <?php
                        $frontendSkills = [
                            ['name' => 'HTML5', 'level' => 90],
                            ['name' => 'CSS3', 'level' => 85],
                            ['name' => 'JavaScript', 'level' => 90],
                            ['name' => 'Vue.js', 'level' => 80],
                            ['name' => 'Alpine.js', 'level' => 85],
                            ['name' => 'TailwindCSS', 'level' => 90],
                            ['name' => 'Livewire', 'level' => 75]
                        ];
                    ?>

                    <?php $__currentLoopData = $frontendSkills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white/10 rounded-full px-4 py-2 border border-purple-500/30 hover:border-purple-500/70 transition-all duration-300">
                            <div class="flex flex-col">
                                <span class="font-medium"><?php echo e($skill['name']); ?></span>
                                <div class="w-full bg-gray-700 rounded-full h-2 mt-2">
                                    <div 
                                        class="bg-gradient-to-r from-purple-500 to-pink-500 h-2 rounded-full" 
                                        style="width: <?php echo e($skill['level']); ?>%"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            
            <div class="mb-12">
                <h3 class="text-2xl font-semibold mb-6">Backend</h3>
                <div class="flex flex-wrap gap-4">
                    <?php
                        $backendSkills = [
                            ['name' => 'PHP', 'level' => 90],
                            ['name' => 'Laravel', 'level' => 85],
                            ['name' => 'MySQL', 'level' => 80],
                            ['name' => 'API Development', 'level' => 85],
                            ['name' => 'Firebase', 'level' => 70],
                            ['name' => 'Redis', 'level' => 65]
                        ];
                    ?>

                    <?php $__currentLoopData = $backendSkills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white/10 rounded-full px-4 py-2 border border-purple-500/30 hover:border-purple-500/70 transition-all duration-300">
                            <div class="flex flex-col">
                                <span class="font-medium"><?php echo e($skill['name']); ?></span>
                                <div class="w-full bg-gray-700 rounded-full h-2 mt-2">
                                    <div 
                                        class="bg-gradient-to-r from-purple-500 to-pink-500 h-2 rounded-full" 
                                        style="width: <?php echo e($skill['level']); ?>%"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            
            <div class="mb-12">
                <h3 class="text-2xl font-semibold mb-6">Tools & Others</h3>
                <div class="flex flex-wrap gap-4">
                    <?php
                        $otherSkills = [
                            ['name' => 'Git', 'level' => 85],
                            ['name' => 'Docker', 'level' => 70],
                            ['name' => 'Figma', 'level' => 75],
                            ['name' => 'AWS', 'level' => 65],
                            ['name' => 'CI/CD', 'level' => 70],
                            ['name' => 'Testing', 'level' => 75]
                        ];
                    ?>

                    <?php $__currentLoopData = $otherSkills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white/10 rounded-full px-4 py-2 border border-purple-500/30 hover:border-purple-500/70 transition-all duration-300">
                            <div class="flex flex-col">
                                <span class="font-medium"><?php echo e($skill['name']); ?></span>
                                <div class="w-full bg-gray-700 rounded-full h-2 mt-2">
                                    <div 
                                        class="bg-gradient-to-r from-purple-500 to-pink-500 h-2 rounded-full" 
                                        style="width: <?php echo e($skill['level']); ?>%"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold mb-10 text-center">Get In Touch</h2>
            <div class="max-w-3xl mx-auto">
                <div class="flex flex-col md:flex-row gap-10">
                    <div class="md:w-1/2">
                        <h3 class="text-2xl font-semibold mb-6">Contact Information</h3>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail text-purple-300 mr-4"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                <a href="mailto:hello@yourname.com" class="hover:text-purple-300 transition-colors">
                                    hello@yourname.com
                                </a>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin text-purple-300 mr-4"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                                <a href="https://linkedin.com/in/yourusername" class="hover:text-purple-300 transition-colors">
                                    linkedin.com/in/yourusername
                                </a>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter text-purple-300 mr-4"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                                <a href="https://twitter.com/yourusername" class="hover:text-purple-300 transition-colors">
                                    @yourusername
                                </a>
                            </div>
                        </div>
                        
                        <h3 class="text-2xl font-semibold mt-10 mb-6">Location</h3>
                        <p class="text-lg">San Francisco, California</p>
                    </div>
                    
                    <div class="md:w-1/2">
                        <form action="/contact" method="POST" class="space-y-4">
                            <?php echo csrf_field(); ?>
                            <div>
                                <label for="name" class="block mb-2">Name</label>
                                <input 
                                    type="text" 
                                    id="name"
                                    name="name"
                                    class="w-full p-3 rounded bg-white/10 border border-purple-500/50 focus:border-purple-500 focus:outline-none"
                                    placeholder="Your name"
                                    required
                                />
                            </div>
                            <div>
                                <label for="email" class="block mb-2">Email</label>
                                <input 
                                    type="email" 
                                    id="email"
                                    name="email"
                                    class="w-full p-3 rounded bg-white/10 border border-purple-500/50 focus:border-purple-500 focus:outline-none"
                                    placeholder="Your email"
                                    required
                                />
                            </div>
                            <div>
                                <label for="message" class="block mb-2">Message</label>
                                <textarea 
                                    id="message"
                                    name="message" 
                                    rows="5" 
                                    class="w-full p-3 rounded bg-white/10 border border-purple-500/50 focus:border-purple-500 focus:outline-none"
                                    placeholder="Your message"
                                    required
                                ></textarea>
                            </div>
                            <button type="submit" class="w-full py-3 px-6 bg-purple-500 hover:bg-purple-600 rounded-full transition duration-300">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="py-10 bg-black/30 text-center">
        <div class="container mx-auto px-4">
            <div class="flex justify-center space-x-6 mb-6">
                <a href="https://github.com/yourusername" target="_blank" rel="noopener noreferrer" class="bg-white/10 p-2 rounded-full hover:bg-purple-500/30 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                </a>
                <a href="https://figma.com/@yourusername" target="_blank" rel="noopener noreferrer" class="bg-white/10 p-2 rounded-full hover:bg-purple-500/30 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-figma"><path d="M5 5.5A3.5 3.5 0 0 1 8.5 2H12v7H8.5A3.5 3.5 0 0 1 5 5.5z"></path><path d="M12 2h3.5a3.5 3.5 0 1 1 0 7H12V2z"></path><path d="M12 12.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 1 1-7 0z"></path><path d="M5 19.5A3.5 3.5 0 0 1 8.5 16H12v3.5a3.5 3.5 0 1 1-7 0z"></path><path d="M12 16h3.5a3.5 3.5 0 1 1 0 7H12v-7z"></path></svg>
                </a>
                <a href="https://linkedin.com/in/yourusername" target="_blank" rel="noopener noreferrer" class="bg-white/10 p-2 rounded-full hover:bg-purple-500/30 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                </a>
                <a href="https://twitter.com/yourusername" target="_blank" rel="noopener noreferrer" class="bg-white/10 p-2 rounded-full hover:bg-purple-500/30 transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                </a>
            </div>
            <p>© <?php echo e(date('Y')); ?> Your Name. All rights reserved.</p>
        </div>
    </footer>

    <!-- Particle effect script -->
    <script>
        // Add a simple particle effect
        function createParticle(x, y) {
            const particle = document.createElement('div');
            particle.style.position = 'fixed';
            particle.style.left = `${x}px`;
            particle.style.top = `${y}px`;
            particle.style.width = '5px';
            particle.style.height = '5px';
            particle.style.background = 'rgba(255, 255, 255, 0.5)';
            particle.style.borderRadius = '50%';
            particle.style.pointerEvents = 'none';
            document.body.appendChild(particle);

            const animation = particle.animate([
                { transform: 'translate(0, 0)', opacity: 1 },
                { transform: `translate(${Math.random() * 100 - 50}px, ${Math.random() * 100 - 50}px)`, opacity: 0 }
            ], {
                duration: 1000 + Math.random() * 1000,
                easing: 'cubic-bezier(0, .9, .57, 1)',
            });

            animation.onfinish = () => particle.remove();
        }

        document.body.addEventListener('mousemove', (e) => {
            if (Math.random() < 0.1) {
                createParticle(e.clientX, e.clientY);
            }
        });

        // Add animation classes to elements
        document.addEventListener('DOMContentLoaded', function() {
            // Add smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>

    <style>
        @keyframes fade-in-down {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in-down {
            animation: fade-in-down 0.5s ease-out;
        }
        
        .animate-fade-in {
            animation: fade-in 0.5s ease-out 0.3s forwards;
            opacity: 0;
        }
        
        @keyframes fade-in {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
    </style>
</body>
</html>

<?php /**PATH C:\Users\Joseph Korm\Desktop\Portfolio\portfolio\resources\views/welcome.blade.php ENDPATH**/ ?>