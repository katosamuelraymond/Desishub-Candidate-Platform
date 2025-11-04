<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desishub - Platform Documentation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .tier-card {
            transition: all 0.3s ease;
            border-left: 4px solid;
        }
        .tier-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .challenge-card {
            border-left: 4px solid;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="gradient-bg text-white shadow-lg">
        <div class="container mx-auto px-6 py-12">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Candidate Categorization Platform</h1>
                <p class="text-xl opacity-90">Technical Documentation & Implementation Details</p>
                <div class="mt-6 flex justify-center space-x-4">
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Laravel 12</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">Tailwind CSS</span>
                    <span class="bg-white bg-opacity-20 px-4 py-2 rounded-full">MySQL</span>
                </div>
            </div>
        </div>
    </header>
    <main class="container mx-auto px-6 py-12">
        <!-- Tier Assignment Logic Section -->
        <section class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">🎯 Tier Assignment Logic</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    The system uses a <span class="font-semibold text-purple-600">top-down hierarchical approach</span> to ensure candidates are placed in the most advanced tier they qualify for.
                </p>
            </div>
            <!-- Logic Flow Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                <!-- Tier 5 -->
                <div class="tier-card bg-white rounded-lg shadow-md p-6 border-l-4 border-red-500">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-red-100 text-red-600 rounded-full flex items-center justify-center mr-3">
                            <span class="font-bold">5</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Advanced Full-Stack</h3>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-center text-sm">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            <span>Golang + API Development</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            <span>Express/Hono OR Laravel</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            <span>Authentication + Deployment</span>
                        </div>
                    </div>
                </div>
                <!-- Tier 4 -->
                <div class="tier-card bg-white rounded-lg shadow-md p-6 border-l-4 border-orange-500">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center mr-3">
                            <span class="font-bold">4</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Multi-Framework</h3>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-center text-sm">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            <span>Express/Hono OR Laravel</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            <span>API Development</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-times text-red-500 mr-2"></i>
                            <span>No Golang</span>
                        </div>
                    </div>
                </div>
                <!-- Tier 3 -->
                <div class="tier-card bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-500">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center mr-3">
                            <span class="font-bold">3</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Full-Stack Next.js</h3>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-center text-sm">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            <span>Authentication + Deployment</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-times text-red-500 mr-2"></i>
                            <span>No Express/Hono</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-times text-red-500 mr-2"></i>
                            <span>No Laravel</span>
                        </div>
                    </div>
                </div>
                <!-- Tier 2 -->
                <div class="tier-card bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-green-100 text-green-600 rounded-full flex items-center justify-center mr-3">
                            <span class="font-bold">2</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">CRUD Developer</h3>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-center text-sm">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            <span>CRUD App + Database</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-times text-red-500 mr-2"></i>
                            <span>No Authentication</span>
                        </div>
                    </div>
                </div>
                <!-- Tier 1 -->
                <div class="tier-card bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mr-3">
                            <span class="font-bold">1</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Beginner with React</h3>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-center text-sm">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            <span>React/Next.js Knowledge</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-times text-red-500 mr-2"></i>
                            <span>No CRUD Apps</span>
                        </div>
                    </div>
                </div>
                <!-- Tier 0 -->
                <div class="tier-card bg-white rounded-lg shadow-md p-6 border-l-4 border-gray-400">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-gray-100 text-gray-600 rounded-full flex items-center justify-center mr-3">
                            <span class="font-bold">0</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Complete Beginner</h3>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-center text-sm">
                            <i class="fas fa-info text-gray-500 mr-2"></i>
                            <span>HTML, CSS, Basic JavaScript</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-arrow-down mr-2"></i>
                            <span>Default Tier</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Decision Points Table -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-sitemap mr-3 text-purple-500"></i>
                    Key Decision Points
                </h3>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Comparison</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Differentiator</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Outcome</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900">Tier 5 vs Tier 4</td>
                                <td class="px-6 py-4 text-orange-600">Golang knowledge</td>
                                <td class="px-6 py-4">Tier 5 requires Golang + API development</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900">Tier 4 vs Tier 3</td>
                                <td class="px-6 py-4 text-orange-600">Backend framework knowledge</td>
                                <td class="px-6 py-4">Tier 4 requires Express/Hono/Laravel expertise</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900">Tier 3 vs Tier 2</td>
                                <td class="px-6 py-4 text-orange-600">Authentication + Deployment</td>
                                <td class="px-6 py-4">Tier 3 can handle auth and deployment</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900">Tier 2 vs Tier 1</td>
                                <td class="px-6 py-4 text-orange-600">CRUD app + database capabilities</td>
                                <td class="px-6 py-4">Tier 2 can build full CRUD applications</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900">Tier 1 vs Tier 0</td>
                                <td class="px-6 py-4 text-orange-600">React/Next.js knowledge</td>
                                <td class="px-6 py-4">Tier 1 has basic framework knowledge</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- Assumptions Section -->
        <section class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">🧩 Assumptions Made</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Key assumptions that guided the design and implementation of the platform.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Technical Assumptions -->
                <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-blue-500">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-cogs text-blue-500 text-2xl mr-3"></i>
                        <h3 class="text-xl font-bold text-gray-800">Technical Assumptions</h3>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Skills build upon each other progressively</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Laravel = Express/Hono for backend requirements</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Authentication includes password + OAuth</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Deployment is a distinct skill</span>
                        </li>
                    </ul>
                </div>
                <!-- Business Assumptions -->
                <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-green-500">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-chart-line text-green-500 text-2xl mr-3"></i>
                        <h3 class="text-xl font-bold text-gray-800">Business Logic</h3>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Candidates can accurately self-assess skills</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Specific skill combinations indicate competency</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>One candidate = One tier (highest qualified)</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Strict tier boundaries, no intermediates</span>
                        </li>
                    </ul>
                </div>
                <!-- UX Assumptions -->
                <div class="bg-white rounded-lg shadow-md p-6 border-t-4 border-purple-500">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-users text-purple-500 text-2xl mr-3"></i>
                        <h3 class="text-xl font-bold text-gray-800">User Experience</h3>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Users complete required fields honestly</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Users understand technical terms</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>Responsive design suffices for mobile</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                            <span>No user accounts needed for registration</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- Challenges & Solutions Section -->
        <section class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">🚧 Challenges & Solutions</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Key technical challenges encountered during development and how they were resolved.
                </p>
            </div>
            <div class="space-y-6">
                <!-- Challenge 1 -->
                <div class="challenge-card bg-white rounded-lg shadow-md p-6 border-l-4 border-red-500">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-red-100 text-red-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Checkbox Form Submission</h3>
                            <p class="text-gray-600">Unchecked checkboxes don't submit values</p>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-semibold text-green-600 mb-2 flex items-center">
                            <i class="fas fa-lightbulb mr-2"></i>
                            Solution Implemented
                        </h4>
                        <div class="bg-gray-800 text-green-400 p-4 rounded font-mono text-sm">
                            &lt;input type="hidden" name="skill_name" value="0"&gt;<br>
                            &lt;input type="checkbox" name="skill_name" value="1"&gt;
                        </div>
                        <p class="mt-2 text-gray-600">Hidden fields ensure all boolean values are submitted</p>
                    </div>
                </div>
                <!-- Challenge 2 -->
                <div class="challenge-card bg-white rounded-lg shadow-md p-6 border-l-4 border-orange-500">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Tier Logic Complexity</h3>
                            <p class="text-gray-600">Overlapping criteria and complex conditional relationships</p>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-semibold text-green-600 mb-2 flex items-center">
                            <i class="fas fa-lightbulb mr-2"></i>
                            Solution Implemented
                        </h4>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-center"><i class="fas fa-arrow-down text-blue-500 mr-2"></i>Top-down hierarchical checking (Tier 5 → Tier 0)</li>
                            <li class="flex items-center"><i class="fas fa-search text-blue-500 mr-2"></i>Comprehensive logging for debugging decisions</li>
                            <li class="flex items-center"><i class="fas fa-code text-blue-500 mr-2"></i>Clear descriptive condition checks</li>
                        </ul>
                    </div>
                </div>
                <!-- Challenge 3 -->
                <div class="challenge-card bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-500">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-database"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Data Validation & Integrity</h3>
                            <p class="text-gray-600">Ensuring data consistency across edge cases</p>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-semibold text-green-600 mb-2 flex items-center">
                            <i class="fas fa-lightbulb mr-2"></i>
                            Solution Implemented
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-600">
                            <div>
                                <i class="fas fa-shield-alt text-blue-500 mr-2"></i>
                                Laravel validation rules
                            </div>
                            <div>
                                <i class="fas fa-unique text-blue-500 mr-2"></i>
                                Database constraints
                            </div>
                            <div>
                                <i class="fas fa-file-code text-blue-500 mr-2"></i>
                                JSON casting for skills
                            </div>
                            <div>
                                <i class="fas fa-bug text-blue-500 mr-2"></i>
                                Try-catch with detailed logging
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Technical Implementation -->
        <section>
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">🛠 Technical Implementation</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Architecture and technology decisions for the platform.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Database Design -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-database text-blue-500 mr-3"></i>
                        Database Design
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                            <span class="font-medium">Table Structure</span>
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">Single Table</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                            <span class="font-medium">Skills Storage</span>
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">JSON Field</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-purple-50 rounded-lg">
                            <span class="font-medium">Tier Storage</span>
                            <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">Integer</span>
                        </div>
                    </div>
                </div>
                <!-- Frontend-Backend -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-layer-group text-green-500 mr-3"></i>
                        Frontend-Backend Integration
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <i class="fas fa-palette text-yellow-500 mr-3"></i>
                            <span>Laravel Blade + Tailwind CSS</span>
                        </div>
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <i class="fas fa-server text-blue-500 mr-3"></i>
                            <span>Server-side Validation</span>
                        </div>
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <i class="fas fa-mobile-alt text-green-500 mr-3"></i>
                            <span>Responsive Design</span>
                        </div>
                    </div>
                </div>
                <!-- Error Handling -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                        Error Handling
                    </h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-sm">INFO Level</span>
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">General Flow</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">DEBUG Level</span>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Data Processing</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">WARNING Level</span>
                            <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">Validation Issues</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm">ERROR Level</span>
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">Exceptions</span>
                        </div>
                    </div>
                </div>
                <!-- Scalability -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-rocket text-purple-500 mr-3"></i>
                        Scalability Considerations
                    </h3>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-bolt text-green-500 mr-2"></i>
                            Efficient queries with indexing
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-expand-arrows-alt text-green-500 mr-2"></i>
                            JSON skills for flexible assessments
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-cube text-green-500 mr-2"></i>
                            Modular controller structure
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-project-diagram text-green-500 mr-2"></i>
                            Clear separation of concerns
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="container mx-auto px-6 text-center">
            <div class="flex justify-center space-x-6 mb-4">
                <i class="fab fa-laravel text-red-500 text-2xl"></i>
                <i class="fab fa-php text-purple-500 text-2xl"></i>
                <i class="fab fa-js-square text-yellow-500 text-2xl"></i>
            </div>
            <p class="text-gray-400">Desishub Candidate Categorization Platform</p>
            <p class="text-gray-500 text-sm mt-2">Built with Laravel 12 & Tailwind CSS</p>
        </div>
    </footer>
</body>
</html>
