<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-8 py-12"> --}}

                <div class="relative flex items-center space-x-10 w-full bg-gradient-to-r from-sky-400 to-sky-500 overflow-hidden rounded-t-xl">
                    <!-- Three.js container -->
                    <div id="three-background" class="absolute inset-0 opacity-30 pointer-events-none"></div>

                    <div class="mb-6 mt-5 px-5">
                        <div class="mt-1 flex rounded-lg shadow-sm">
                            <div class="relative flex-grow focus-within:z-10">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <input type="text" name="search" class="border border-gray-400 block w-full h-20 rounded-lg  pl-10 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Search jobs...">
                            </div>
                        </div>
                    </div>

                </div>


            <div class="bg-gray-50  overflow-hidden shadow-sm sm:rounded-b-xl">

                       <!-- Search and Filter Section -->










                <div class="container mx-auto py-4">
                    <div class="flex gap-6 px-2">
                        <!-- Left Column (2/5 width) -->
                        <div class="w-1/5 bg-white p-4 shadow rounded-lg px-2">
                            <h2 class="text-2xl font-semibold mb-4 text-center text-gray-700">職種</h2>
                            <ul class="space-y-2 text-l mb-2">
                        @foreach ($categories as $item)

                            {{-- <li class="px-2 bg-pink-50 hover:bg-pink-100 rounded ">
                                <a href="" class="hover:underline hover:text-stone-800 px-2">{{ $item->name }}</a>
                            </li> --}}

                            <li class="px-2  hover:bg-gray-100 rounded ">
                                <a href="{{ route('categories.jobPosts', $item) }}" class="hover:underline hover:text-stone-800 px-2">
                                    {{ $item->name }}
                                </a>
                            </li>


                        @endforeach
                            </ul>
                        </div>




                        <!-- Right Column (3/5 width) -->
                        <div class="w-4/5 mx-auto p-6">
                            <div class="space-y-6">
                                @foreach ($jobpost as $job)
                                <div class="bg-white rounded-xl shadow-lg hover:shadow-lg transition-shadow duration-300 overflow-hidden hover:bg-gray-100 border border-gray-300">
                                    <div class="flex items-start p-6">
                                        <!-- Company Logo -->
                                        <div class="flex-shrink-0">
                                            <img
                                                src="{{ asset('storage/' . $job->user->profile_image) }}"
                                                alt="{{ $job->user->name }}"
                                                class="w-24 h-24 object-cover rounded-lg"
                                            >
                                        </div>

                                        <!-- Job Details -->
                                        <div class="flex-1 ml-6">
                                            <div class="flex justify-between items-start">
                                                <div>
                                                    <!-- Company Name -->
                                                    <div class="flex items-center space-x-2">
                                                        <h3 class="text-lg font-semibold text-gray-900">株式会社 {{ $job->user->name }}</h3>
                                                        <span class="px-2 py-1 text-xs font-medium text-blue-600 bg-blue-50 rounded-full">
                                                            新着
                                                        </span>
                                                    </div>

                                                    <!-- Job Title -->
                                                    <h2 class="text-xl font-bold text-gray-900 mt-2">
                                                        {{ $job->title }}
                                                    </h2>
                                                </div>

                                                <!-- Apply Button -->
                                                <a href="{{ route('jobpost.show', $job->id) }}"
                                                   class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-300">
                                                    詳細を見る
                                                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                    </svg>
                                                </a>
                                            </div>

                                            <!-- Job Metadata -->
                                            <div class="mt-4 grid grid-cols-3 gap-4">
                                                <!-- Working Hours -->
                                                <div class="flex items-center space-x-2">
                                                    <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-blue-50">
                                                        <svg class="w-5 h-5 text-blue-600" viewBox="0 0 24 24" fill="none">
                                                            <path d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-500">勤務時間</div>
                                                        <div class="text-sm text-gray-900">{{ $job->working_hour }}</div>
                                                    </div>
                                                </div>

                                                <!-- Salary -->
                                                <div class="flex items-center space-x-2">
                                                    <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-green-50">
                                                        <svg class="w-5 h-5 text-green-600" viewBox="0 0 24 24" fill="none">
                                                            <path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-500">給与</div>
                                                        <div class="text-sm font-medium text-green-600">{{ $job->salary }}</div>
                                                    </div>
                                                </div>

                                                <!-- Location -->
                                                <div class="flex items-center space-x-2">
                                                    <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-purple-50">
                                                        <svg class="w-5 h-5 text-purple-600" viewBox="0 0 24 24" fill="none">
                                                            <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <div class="text-sm font-medium text-gray-500">勤務地</div>
                                                        <div class="text-sm text-gray-900">{{ $job->working_location }}</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Posted Date -->
                                            <div class="mt-4 text-sm text-gray-500">
                                                投稿日: {{ \Carbon\Carbon::parse($job->created_at)->format('Y年m月d日') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <!-- Pagination -->

                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</x-app-layout>
