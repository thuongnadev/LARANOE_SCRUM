<button {{ $attributes->merge(['type' => 'submit', 'class' => 'relative grid-flow-col items-center justify-center font-semibold transition duration-75 focus-visible:ring-2 rounded-lg gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-white text-gray-950 dark:text-black hover:bg-gray-50 ring-1 ring-gray-950/10 dark:ring-white/20 focus-visible:ring-gray-950/10 dark:bg-white/5 dark:hover:bg-white/5 dark:focus-visible:ring-white/20']) }}>
    {{ $slot }}
</button>
