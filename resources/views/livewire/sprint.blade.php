<div id="accordion-table">
    <div data-accordion="collapse">
        <!-- Accordion Item 1 -->
        <h2 id="accordion-heading-1 z-10">
            <button type="button"
                class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                data-accordion-target="#accordion-body-1" aria-expanded="false" aria-controls="accordion-body-1">
                <div class="flex items-center justify-center">
                    <svg data-accordion-icon class="w-3 h-3 mx-4 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                    <span>Inventory 5</span>
                </div>

                <div class="flex items-center justify-center z-50">
                    <span class="mx-4">Product Category 1</span>
                    <div class="z-50">
                        <div id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal"
                            class="z-50 inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 16 3">
                                <path
                                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                            </svg>
                        </div>
                        
                        <!-- Dropdown menu -->
                        <div id="dropdownDotsHorizontal"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownMenuIconHorizontalButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                </li>
                            </ul>
                            <div class="py-2">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Separated
                                    link</a>
                            </div>
                        </div>
                    </div>
                </div>
            </button>
        </h2>
        <div id="accordion-body-1" class="hidden" aria-labelledby="accordion-heading-1">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Apple
                                    MacBook Pro 17"</th>
                                <td class="px-6 py-4">Silver</td>
                                <td class="px-6 py-4">Laptop</td>
                                <td class="px-6 py-4">$2999</td>
                            </tr>
                            <!-- Other rows for this category -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Accordion Item 2 -->
        <h2 id="accordion-heading-2">
            <button type="button"
                class="flex items-center justify-between w-full p-5 font-medium text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                data-accordion-target="#accordion-body-2" aria-expanded="false" aria-controls="accordion-body-2">
                <span>Product Category 2</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div id="accordion-body-2" class="hidden" aria-labelledby="accordion-heading-2">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Product name</th>
                                <th scope="col" class="px-6 py-3">Color</th>
                                <th scope="col" class="px-6 py-3">Category</th>
                                <th scope="col" class="px-6 py-3">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Microsoft Surface Pro</th>
                                <td class="px-6 py-4">White</td>
                                <td class="px-6 py-4">Laptop PC</td>
                                <td class="px-6 py-4">$1999</td>
                            </tr>
                            <!-- Other rows for this category -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add more accordion items as needed -->
    </div>
</div>

<!-- Include this script for handling accordion behavior -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const accordionButtons = document.querySelectorAll('[data-accordion-target]');

        accordionButtons.forEach(button => {
            button.addEventListener('click', function() {
                const target = document.querySelector(button.getAttribute(
                    'data-accordion-target'));
                const isOpen = button.getAttribute('aria-expanded') === 'true';

                if (isOpen) {
                    button.setAttribute('aria-expanded', 'false');
                    target.classList.add('hidden');
                } else {
                    button.setAttribute('aria-expanded', 'true');
                    target.classList.remove('hidden');
                }
            });
        });
    });
</script>
