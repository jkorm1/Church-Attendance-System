<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        tech: {
                            dark: '#0A0A0A',
                            gray: '#1A1A1A',
                            light: '#2A2A2A',
                            accent: '#0066CC',
                            highlight: '#38BDF8',
                            muted: '#888888',
                            white: '#F5F5F7'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-tech-dark text-tech-white min-h-screen font-sans antialiased">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 py-8">
        <!-- Navigation -->
        <nav class="flex justify-between items-center py-6 mb-12">
            <div class="text-xl font-medium tracking-tight">YourName<span class="text-tech-accent">.</span></div>
            <div class="hidden md:flex space-x-8">
                <a href="#about" class="text-sm font-medium hover:text-tech-highlight transition-colors duration-300">About</a>
                <a href="#projects" class="text-sm font-medium hover:text-tech-highlight transition-colors duration-300">Projects</a>
                <a href="#skills" class="text-sm font-medium hover:text-tech-highlight transition-colors duration-300">Skills</a>
                <a href="#contact" class="text-sm font-medium hover:text-tech-highlight transition-colors duration-300">Contact</a>
            </div>
        </nav>
        
        <!-- Hero Section -->
        <section class="py-16 flex flex-col items-start">
            <div class="max-w-2xl">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight tracking-tight">
                    Developer & Designer creating digital experiences
                </h1>
                <p class="text-tech-muted text-lg mb-10 leading-relaxed">
                    I build innovative solutions with clean code and thoughtful design, focusing on performance and user experience.
                </p>
                <div class="flex space-x-4">
                    <a href="#projects" class="px-5 py-2.5 bg-tech-accent hover:bg-opacity-90 rounded-md text-sm font-medium transition duration-300">
                        View Projects
                    </a>
                    <a href="#contact" class="px-5 py-2.5 bg-tech-light hover:bg-tech-gray border border-tech-light rounded-md text-sm font-medium transition duration-300">
                        Get in Touch
                    </a>
                </div>
            </div>
            
            <!-- Tech element decoration -->
            <div class="absolute right-0 top-1/4 w-64 h-64 bg-tech-accent opacity-5 rounded-full blur-3xl -z-10"></div>
            
            <!-- Social Links -->
            <div class="flex mt-16 space-x-6">
                <a href="https://github.com/yourusername" target="_blank" rel="noopener noreferrer" class="text-tech-muted hover:text-tech-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                </a>
                <a href="https://figma.com/@yourusername" target="_blank" rel="noopener noreferrer" class="text-tech-muted hover:text-tech-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-figma"><path d="M5 5.5A3.5 3.5 0 0 1 8.5 2H12v7H8.5A3.5 3.5 0 0 1 5 5.5z"></path><path d="M12 2h3.5a3.5 3.5 0 1 1 0 7H12V2z"></path><path d="M12 12.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 1 1-7 0z"></path><path d="M5 19.5A3.5 3.5 0 0 1 8.5 16H12v3.5a3.5 3.5 0 1 1-7 0z"></path><path d="M12 16h3.5a3.5 3.5 0 1 1 0 7H12v-7z"></path></svg>
                </a>
                <a href="https://linkedin.com/in/yourusername" target="_blank" rel="noopener noreferrer" class="text-tech-muted hover:text-tech-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                </a>
                <a href="https://twitter.com/yourusername" target="_blank" rel="noopener noreferrer" class="text-tech-muted hover:text-tech-white transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                </a>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-20 border-t border-tech-light">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
                <div class="md:col-span-5">
                    <div class="relative">
                        <div class="aspect-square bg-tech-gray rounded-lg overflow-hidden">
                            <img 
                                src="https://via.placeholder.com/500" 
                                alt="Profile" 
                                class="w-full h-full object-cover mix-blend-luminosity hover:mix-blend-normal transition-all duration-500"
                            />
                        </div>
                        <div class="absolute -bottom-3 -right-3 w-24 h-24 bg-tech-accent opacity-10 rounded-lg blur-xl"></div>
                    </div>
                </div>
                <div class="md:col-span-7">
                    <h2 class="text-2xl font-semibold mb-6 flex items-center">
                        <span class="w-6 h-0.5 bg-tech-accent mr-3"></span>
                        About Me
                    </h2>
                    <p class="text-tech-muted mb-4 leading-relaxed">
                        I'm a full-stack developer with a passion for creating elegant, efficient solutions to complex problems. My approach combines technical expertise with a keen eye for design.
                    </p>
                    <p class="text-tech-muted mb-6 leading-relaxed">
                        With 5+ years of experience building web applications, I've developed a workflow that emphasizes clean code, performance optimization, and thoughtful user experiences.
                    </p>
                    
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div>
                            <h3 class="text-sm font-medium text-tech-white mb-1">Location</h3>
                            <p class="text-tech-muted text-sm">San Francisco, CA</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-tech-white mb-1">Experience</h3>
                            <p class="text-tech-muted text-sm">5+ Years</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-tech-white mb-1">Availability</h3>
                            <p class="text-tech-muted text-sm">Freelance / Contract</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-tech-white mb-1">Email</h3>
                            <p class="text-tech-muted text-sm">hello@yourname.com</p>
                        </div>
                    </div>
                    
                    <a href="#" class="inline-flex items-center px-4 py-2 bg-tech-light hover:bg-tech-gray rounded-md text-sm font-medium transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download mr-2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                        Download Resume
                    </a>
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section id="projects" class="py-20 border-t border-tech-light">
            <h2 class="text-2xl font-semibold mb-6 flex items-center">
                <span class="w-6 h-0.5 bg-tech-accent mr-3"></span>
                Selected Projects
            </h2>
            <p class="text-tech-muted mb-12 max-w-2xl">
                A curated selection of my recent work, showcasing my skills in development, design, and problem-solving.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @php
                    $projects = [
                        [
                            'title' => 'E-Commerce Platform',
                            'description' => 'A full-stack e-commerce solution with payment integration, user authentication, and admin dashboard.',
                            'image' => 'https://via.placeholder.com/600x400',
                            'tags' => ['Laravel', 'Vue.js', 'MySQL'],
                            'github' => 'https://github.com/yourusername/ecommerce',
                            'live' => 'https://ecommerce-demo.com'
                        ],
                        [
                            'title' => 'Data Visualization Dashboard',
                            'description' => 'Interactive dashboard for visualizing complex datasets with filtering and export capabilities.',
                            'image' => 'https://via.placeholder.com/600x400',
                            'tags' => ['D3.js', 'Laravel', 'Alpine.js'],
                            'github' => 'https://github.com/yourusername/data-viz',
                            'live' => 'https://data-viz-demo.com'
                        ],
                        [
                            'title' => 'Social Media App',
                            'description' => 'A responsive social media application with real-time messaging and content sharing.',
                            'image' => 'https://via.placeholder.com/600x400',
                            'tags' => ['Laravel', 'Livewire', 'TailwindCSS'],
                            'github' => 'https://github.com/yourusername/social-app',
                            'figma' => 'https://figma.com/file/social-app-design'
                        ],
                        [
                            'title' => 'Portfolio Website',
                            'description' => 'A personal portfolio website showcasing projects and skills (this website).',
                            'image' => 'https://via.placeholder.com/600x400',
                            'tags' => ['Laravel', 'Blade', 'TailwindCSS'],
                            'github' => 'https://github.com/yourusername/portfolio',
                            'live' => 'https://yourportfolio.com'
                        ]
                    ];
                @endphp

                @foreach ($projects as $project)
                <div class="group bg-tech-gray rounded-lg overflow-hidden transition-all duration-300 hover:translate-y-[-4px] hover:shadow-lg hover:shadow-tech-accent/5">
                    <div class="relative overflow-hidden aspect-video">
                        <img 
                            src="{{ $project['image'] }}" 
                            alt="{{ $project['title'] }}" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-tech-dark/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-medium mb-2">{{ $project['title'] }}</h3>
                        <p class="text-tech-muted text-sm mb-4">{{ $project['description'] }}</p>
                        
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach ($project['tags'] as $tag)
                                <span class="text-xs px-2 py-1 bg-tech-light rounded-md text-tech-muted">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                        
                        <div class="flex space-x-4">
                            @if (isset($project['github']))
                                <a 
                                    href="{{ $project['github'] }}" 
                                    target="_blank" 
                                    rel="noopener noreferrer"
                                    class="text-tech-muted hover:text-tech-white transition-colors"
                                    aria-label="View GitHub repository"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                                </a>
                            @endif
                            @if (isset($project['figma']))
                                <a 
                                    href="{{ $project['figma'] }}" 
                                    target="_blank" 
                                    rel="noopener noreferrer"
                                    class="text-tech-muted hover:text-tech-white transition-colors"
                                    aria-label="View Figma design"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-figma"><path d="M5 5.5A3.5 3.5 0 0 1 8.5 2H12v7H8.5A3.5 3.5 0 0 1 5 5.5z"></path><path d="M12 2h3.5a3.5 3.5 0 1 1 0 7H12V2z"></path><path d="M12 12.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 1 1-7 0z"></path><path d="M5 19.5A3.5 3.5 0 0 1 8.5 16H12v3.5a3.5 3.5 0 1 1-7 0z"></path><path d="M12 16h3.5a3.5 3.5 0 1 1 0 7H12v-7z"></path></svg>
                                </a>
                            @endif
                            @if (isset($project['live']))
                                <a 
                                    href="{{ $project['live'] }}" 
                                    target="_blank" 
                                    rel="noopener noreferrer"
                                    class="text-tech-muted hover:text-tech-white transition-colors"
                                    aria-label="View live project"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="mt-12 text-center">
                <a href="https://github.com/yourusername" class="inline-flex items-center px-5 py-2.5 bg-tech-light hover:bg-tech-gray rounded-md text-sm font-medium transition duration-300">
                    View More Projects
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right ml-2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
            </div>
        </section>

        <!-- Skills Section -->
        <section id="skills" class="py-20 border-t border-tech-light">
            <h2 class="text-2xl font-semibold mb-6 flex items-center">
                <span class="w-6 h-0.5 bg-tech-accent mr-3"></span>
                Skills & Technologies
            </h2>
            <p class="text-tech-muted mb-12 max-w-2xl">
                My technical toolkit includes a range of languages, frameworks, and tools that I've mastered over the years.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-medium mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code mr-2 text-tech-accent"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                        Frontend
                    </h3>
                    
                    @php
                        $frontendSkills = [
                            ['name' => 'HTML5 & CSS3', 'level' => 90],
                            ['name' => 'JavaScript (ES6+)', 'level' => 85],
                            ['name' => 'Vue.js', 'level' => 80],
                            ['name' => 'Alpine.js', 'level' => 85],
                            ['name' => 'TailwindCSS', 'level' => 90],
                            ['name' => 'Responsive Design', 'level' => 85]
                        ];
                    @endphp

                    <div class="space-y-4">
                        @foreach ($frontendSkills as $skill)
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm">{{ $skill['name'] }}</span>
                                    <span class="text-xs text-tech-muted">{{ $skill['level'] }}%</span>
                                </div>
                                <div class="w-full bg-tech-light rounded-full h-1.5">
                                    <div 
                                        class="bg-gradient-to-r from-tech-accent to-tech-highlight h-1.5 rounded-full" 
                                        style="width: {{ $skill['level'] }}%"
                                    ></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-medium mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server mr-2 text-tech-accent"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>
                        Backend
                    </h3>
                    
                    @php
                        $backendSkills = [
                            ['name' => 'PHP', 'level' => 90],
                            ['name' => 'Laravel', 'level' => 85],
                            ['name' => 'MySQL', 'level' => 80],
                            ['name' => 'API Development', 'level' => 85],
                            ['name' => 'Firebase', 'level' => 70],
                            ['name' => 'Redis', 'level' => 65]
                        ];
                    @endphp

                    <div class="space-y-4">
                        @foreach ($backendSkills as $skill)
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm">{{ $skill['name'] }}</span>
                                    <span class="text-xs text-tech-muted">{{ $skill['level'] }}%</span>
                                </div>
                                <div class="w-full bg-tech-light rounded-full h-1.5">
                                    <div 
                                        class="bg-gradient-to-r from-tech-accent to-tech-highlight h-1.5 rounded-full" 
                                        style="width: {{ $skill['level'] }}%"
                                    ></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <div>
                    <h3 class="text-lg font-medium mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tool mr-2 text-tech-accent"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
                        Tools & Others
                    </h3>
                    
                    @php
                        $otherSkills = [
                            ['name' => 'Git & GitHub', 'level' => 85],
                            ['name' => 'Docker', 'level' => 70],
                            ['name' => 'Figma & Design', 'level' => 75],
                            ['name' => 'AWS', 'level' => 65],
                            ['name' => 'CI/CD', 'level' => 70],
                            ['name' => 'Testing', 'level' => 75]
                        ];
                    @endphp

                    <div class="space-y-4">
                        @foreach ($otherSkills as $skill)
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm">{{ $skill['name'] }}</span>
                                    <span class="text-xs text-tech-muted">{{ $skill['level'] }}%</span>
                                </div>
                                <div class="w-full bg-tech-light rounded-full h-1.5">
                                    <div 
                                        class="bg-gradient-to-r from-tech-accent to-tech-highlight h-1.5 rounded-full" 
                                        style="width: {{ $skill['level'] }}%"
                                    ></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-20 border-t border-tech-light">
            <h2 class="text-2xl font-semibold mb-6 flex items-center">
                <span class="w-6 h-0.5 bg-tech-accent mr-3"></span>
                Get In Touch
            </h2>
            <p class="text-tech-muted mb-12 max-w-2xl">
                Interested in working together? Feel free to reach out for collaborations or just a friendly hello.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-tech-light p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail text-tech-accent"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium mb-1">Email</h3>
                                <a href="mailto:hello@yourname.com" class="text-tech-muted hover:text-tech-accent transition-colors">
                                    hello@yourname.com
                                </a>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-tech-light p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin text-tech-accent"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium mb-1">LinkedIn</h3>
                                <a href="https://linkedin.com/in/yourusername" class="text-tech-muted hover:text-tech-accent transition-colors">
                                    linkedin.com/in/yourusername
                                </a>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-tech-light p-3 rounded-lg mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin text-tech-accent"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium mb-1">Location</h3>
                                <p class="text-tech-muted">
                                    San Francisco, California
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <form class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium mb-2">Name</label>
                            <input 
                                type="text" 
                                id="name"
                                name="name"
                                class="w-full p-3 rounded-md bg-tech-gray border border-tech-light focus:border-tech-accent focus:outline-none transition-colors"
                                placeholder="Your name"
                            />
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium mb-2">Email</label>
                            <input 
                                type="email" 
                                id="email"
                                name="email"
                                class="w-full p-3 rounded-md bg-tech-gray border border-tech-light focus:border-tech-accent focus:outline-none transition-colors"
                                placeholder="Your email"
                            />
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium mb-2">Message</label>
                            <textarea 
                                id="message"
                                name="message" 
                                rows="4" 
                                class="w-full p-3 rounded-md bg-tech-gray border border-tech-light focus:border-tech-accent focus:outline-none transition-colors"
                                placeholder="Your message"
                            ></textarea>
                        </div>
                        <button type="button" class="w-full py-3 px-6 bg-tech-accent hover:bg-opacity-90 rounded-md text-sm font-medium transition duration-300">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </section>
        
        <!-- Footer -->
        <footer class="py-8 border-t border-tech-light mt-12">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <p class="text-tech-muted text-sm">© {{ date('Y') }} Your Name. All rights reserved.</p>
                </div>
                <div class="flex space-x-6">
                    <a href="https://github.com/yourusername" target="_blank" rel="noopener noreferrer" class="text-tech-muted hover:text-tech-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                    </a>
                    <a href="https://figma.com/@yourusername" target="_blank" rel="noopener noreferrer" class="text-tech-muted hover:text-tech-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-figma"><path d="M5 5.5A3.5 3.5 0 0 1 8.5 2H12v7H8.5A3.5 3.5 0 0 1 5 5.5z"></path><path d="M12 2h3.5a3.5 3.5 0 1 1 0 7H12V2z"></path><path d="M12 12.5a3.5 3.5 0 1 1 7 0 3.5 3.5 0 1 1-7 0z"></path><path d="M5 19.5A3.5 3.5 0 0 1 8.5 16H12v3.5a3.5 3.5 0 1 1-7 0z"></path><path d="M12 16h3.5a3.5 3.5 0 1 1 0 7H12v-7z"></path></svg>
                    </a>
                    <a href="https://linkedin.com/in/yourusername" target="_blank" rel="noopener noreferrer" class="text-tech-muted hover:text-tech-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                    </a>
                    <a href="https://twitter.com/yourusername" target="_blank" rel="noopener noreferrer" class="text-tech-muted hover:text-tech-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                    </a>
                </div>
            </div>
        </footer>
    </div>

    <!-- Cursor effect -->
    <div id="cursor-dot" class="fixed w-3 h-3 bg-tech-accent rounded-full pointer-events-none z-50 opacity-0 transition-opacity duration-300"></div>
    <div id="cursor-outline" class="fixed w-8 h-8 border border-tech-accent rounded-full pointer-events-none z-50 opacity-0 transition-opacity duration-300"></div>

    <!-- Tech background elements -->
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-tech-accent opacity-[0.03] rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/3 right-1/3 w-96 h-96 bg-tech-highlight opacity-[0.02] rounded-full blur-3xl"></div>
    </div>

    <script>
        // Custom cursor effect
        document.addEventListener('DOMContentLoaded', function() {
            const cursorDot = document.getElementById('cursor-dot');
            const cursorOutline = document.getElementById('cursor-outline');
            
            window.addEventListener('mousemove', function(e) {
                const posX = e.clientX;
                const posY = e.clientY;
                
                cursorDot.style.opacity = '1';
                cursorOutline.style.opacity = '1';
                
                // Dot follows cursor exactly
                cursorDot.style.left = `${posX}px`;
                cursorDot.style.top = `${posY}px`;
                
                // Outline follows with slight delay
                setTimeout(() => {
                    cursorOutline.style.left = `${posX - 12}px`;
                    cursorOutline.style.top = `${posY - 12}px`;
                }, 50);
            });
            
            // Hide cursor when leaving window
            document.addEventListener('mouseleave', function() {
                cursorDot.style.opacity = '0';
                cursorOutline.style.opacity = '0';
            });
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
            
            // Hover effect for links
            const links = document.querySelectorAll('a, button');
            links.forEach(link => {
                link.addEventListener('mouseenter', () => {
                    cursorOutline.style.width = '40px';
                    cursorOutline.style.height = '40px';
                    cursorOutline.style.left = `${parseFloat(cursorOutline.style.left) - 8}px`;
                    cursorOutline.style.top = `${parseFloat(cursorOutline.style.top) - 8}px`;
                });
                
                link.addEventListener('mouseleave', () => {
                    cursorOutline.style.width = '32px';
                    cursorOutline.style.height = '32px';
                    cursorOutline.style.left = `${parseFloat(cursorOutline.style.left) + 8}px`;
                    cursorOutline.style.top = `${parseFloat(cursorOutline.style.top) + 8}px`;
                });
            });
        });
        
        // Subtle parallax effect
        document.addEventListener('mousemove', (e) => {
            const moveX = (e.clientX - window.innerWidth / 2) * 0.01;
            const moveY = (e.clientY - window.innerHeight / 2) * 0.01;
            
            document.querySelectorAll('.bg-tech-accent, .bg-tech-highlight').forEach(element => {
                element.style.transform = `translate(${moveX}px, ${moveY}px)`;
            });
        });
    </script>
</body>
</html>
