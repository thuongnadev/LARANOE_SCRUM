<div {!! $attributes->merge(['class' => 'flex rounded-lg shadow-sm ring-1 transition duration-75 bg-white dark:bg-white/5 focus-within:ring-2 focus-within:ring-amber-600 dark:focus-within:ring-amber-500 overflow-hidden']) !!}>
    <input {!! $attributes->whereDoesntStartWith('class') !!} class="bg-white/0 block w-full rounded-md border-none text-base sm:text-sm px-3 py-2 text-gray-950 dark:text-black placeholder-gray-400 dark:placeholder-gray-500 focus:ring-0 focus-visible:outline-none dark:focus-visible:outline-none" >
</div>
