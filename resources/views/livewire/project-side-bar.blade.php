<div>
    <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
        <div class="mb-5" x-data="{
                openAccordion: null,
                openSubAccordion: {
                    priority: null,
                    status: null
                }
        }">
            <h2 id="accordion-flush-heading-priority">
                <button type="button" class="flex items-center justify-between w-full py-5 px-4 font-medium rtl:text-right text-black dark:text-white gap-3 bg-gray-100 dark:bg-gray-700 rounded-lg transition-all duration-300 hover:bg-gray-200 dark:hover:bg-gray-600" @click="openAccordion = openAccordion === 'priority' ? null : 'priority'; openSubAccordion.priority = null">
                    <span>Project Priority</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 rotate-180 shrink-0" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </button>
            </h2>
            <div x-show="openAccordion === 'priority'" x-cloak x-transition class="ml-4">
                <!-- High Priority -->
                <div x-data="{ open: false }" class="pl-4 mt-2">
                    <h3>
                        <button type="button" @click="openSubAccordion.priority = openSubAccordion.priority === 'high' ? null : 'high'" class="flex items-center justify-between w-full py-3 text-sm font-medium rtl:text-right text-black dark:text-white gap-3 bg-red-50 hover:bg-red-100 rounded-md">
                            <span class="ms-2">High</span>
                            <span class="px-2 py-1 text-xs font-semibold text-white bg-red-500 rounded-full">
                        {{ $priorityProjects['high']['count'] }}
                    </span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 me-2 transition-transform" :class="{ 'rotate-180': open }">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </h3>
                    <div x-show="openAccordion === 'priority' && openSubAccordion.priority === 'high'" x-transition class="ml-4 bg-white border-l-4 border-gray-300 rounded-md">
                        @foreach($priorityProjects['high']['projects'] as $project)
                            <div class="py-2 mt-2 flex items-center justify-between cursor-pointer hover:bg-gray-100 rounded-md px-2"
                                 @click="$dispatch('show-project-modal', { project: {{ $project->id }} })">
                                <span>{{ $project->project_name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Medium Priority -->
                <div x-data="{ open: false }" class="pl-4 mt-2">
                    <h3>
                        <button type="button" @click="openSubAccordion.priority = openSubAccordion.priority === 'medium' ? null : 'medium'" class="flex items-center justify-between w-full py-3 text-sm font-medium rtl:text-right text-black dark:text-white gap-3 bg-yellow-50 hover:bg-yellow-100 rounded-md">
                            <span class="ms-2">Medium</span>
                            <span class="px-2 py-1 text-xs font-semibold text-white bg-yellow-500 rounded-full">
                        {{ $priorityProjects['medium']['count'] }}
                    </span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 transition-transform me-2" :class="{ 'rotate-180': open }">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </h3>
                    <div x-show="openAccordion === 'priority' && openSubAccordion.priority === 'medium'" x-transition class="ml-4 bg-white border-l-4 border-gray-300 rounded-md">
                        @foreach($priorityProjects['medium']['projects'] as $project)
                            <div class="py-2 mt-2 flex items-center justify-between cursor-pointer hover:bg-gray-100 rounded-md px-2"
                                 @click="$dispatch('show-project-modal', { project: {{ $project->id }} })">
                                <span>{{ $project->project_name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Low Priority -->
                <div x-data="{ open: false }" class="pl-4 mt-2">
                    <h3>
                        <button type="button" @click="openSubAccordion.priority = openSubAccordion.priority === 'low' ? null : 'low'" class="flex items-center justify-between w-full py-3 text-sm font-medium rtl:text-right text-black dark:text-white gap-3 bg-green-50 hover:bg-green-100 rounded-md">
                            <span class="ms-2">Low</span>
                            <span class="px-2 py-1 text-xs font-semibold text-white bg-green-500 rounded-full">
                        {{ $priorityProjects['low']['count'] }}
                    </span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 transition-transform me-2" :class="{ 'rotate-180': open }">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </h3>
                    <div x-show="openAccordion === 'priority' && openSubAccordion.priority === 'low'" x-transition class="ml-4 bg-white border-l-4 border-gray-300 rounded-md">
                        @foreach($priorityProjects['low']['projects'] as $project)
                            <div class="py-2 mt-2 flex items-center justify-between cursor-pointer hover:bg-gray-100 rounded-md px-2"
                                 @click="$dispatch('show-project-modal', { project: {{ $project->id }} })">
                                <span>{{ $project->project_name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <h2 id="accordion-flush-heading-status" class="mt-4">
                <button type="button" class="flex items-center justify-between w-full py-5 px-4 font-medium rtl:text-right text-black dark:text-white gap-3 bg-gray-100 dark:bg-gray-700 rounded-lg transition-all duration-300 hover:bg-gray-200 dark:hover:bg-gray-600" @click="openAccordion = openAccordion === 'status' ? null : 'status'; openSubAccordion.status = null">
                    <span>Project Status</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 rotate-180 shrink-0" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </button>
            </h2>
            <div x-show="openAccordion === 'status'" x-cloak x-transition class="ml-4">
            <!-- Not Started -->
            <div class="pl-4 mt-2">
                <h3>
                    <button type="button" class="flex items-center justify-between w-full py-3 text-sm font-medium rtl:text-right text-black dark:text-white gap-3 bg-gray-50 hover:bg-gray-100 rounded-md" @click="openSubAccordion.status = openSubAccordion.status === 'not_started' ? null : 'not_started'">
                        <span class="ms-2">Not Started</span>
                        <span class="px-2 py-1 text-xs font-semibold text-white bg-gray-500 rounded-full">
                    {{ $statusProjects['not_started']['count'] }}
                </span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 me-2 transition-transform" :class="{ 'rotate-180': openSubAccordion.status === 'not_started' }">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </h3>
                <div x-show="openSubAccordion.status === 'not_started'" x-transition class="ml-4 bg-white border-l-4 border-gray-300 rounded-md">
                    @foreach($statusProjects['not_started']['projects'] as $project)
                        <div class="py-2 mt-2 flex items-center justify-between cursor-pointer hover:bg-gray-100 rounded-md px-2"
                             @click="$dispatch('show-project-modal', { project: {{ $project->id }} })">
                            <span>{{ $project->project_name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Processing -->
            <div class="pl-4 mt-2">
                <h3>
                    <button type="button" class="flex items-center justify-between w-full py-3 text-sm font-medium rtl:text-right text-black dark:text-white gap-3 bg-blue-50 hover:bg-blue-100 rounded-md" @click="openSubAccordion.status = openSubAccordion.status === 'processing' ? null : 'processing'">
                        <span class="ms-2">Processing</span>
                        <span class="px-2 py-1 text-xs font-semibold text-white bg-blue-500 rounded-full">
                    {{ $statusProjects['processing']['count'] }}
                </span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 me-2 transition-transform" :class="{ 'rotate-180': openSubAccordion.status === 'processing' }">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </h3>
                <div x-show="openSubAccordion.status === 'processing'" x-transition class="ml-4 bg-white border-l-4 border-gray-300 rounded-md">
                    @foreach($statusProjects['processing']['projects'] as $project)
                        <div class="py-2 mt-2 flex items-center justify-between cursor-pointer hover:bg-gray-100 rounded-md px-2"
                             @click="$dispatch('show-project-modal', { project: {{ $project->id }} })">
                            <span>{{ $project->project_name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Completed -->
            <div class="pl-4 mt-2">
                <h3>
                    <button type="button" class="flex items-center justify-between w-full py-3 text-sm font-medium rtl:text-right text-black dark:text-white gap-3 bg-green-50 hover:bg-green-100 rounded-md" @click="openSubAccordion.status = openSubAccordion.status === 'completed' ? null : 'completed'">
                        <span class="ms-2">Completed</span>
                        <span class="px-2 py-1 text-xs font-semibold text-white bg-green-500 rounded-full">
                    {{ $statusProjects['completed']['count'] }}
                </span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 transition-transform me-2" :class="{ 'rotate-180': openSubAccordion.status === 'completed' }">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </h3>
                <div x-show="openSubAccordion.status === 'completed'" x-transition class="ml-4 bg-white border-l-4 border-gray-300 rounded-md">
                    @foreach($statusProjects['completed']['projects'] as $project)
                        <div class="py-2 mt-2 flex items-center justify-between cursor-pointer hover:bg-gray-100 rounded-md px-2"
                             @click="$dispatch('show-project-modal', { project: {{ $project->id }} })">
                            <span>{{ $project->project_name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="max-w-sm p-6 bg-white border shadow-gray-900 border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Upgrade Laranoe</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Get many advanced and convenient features for you</p>
        <a href="#" class="inline-flex items-center text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            Upgrade Now
            <svg class="rtl:rotate-180 w-4 h-4 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
</div>

