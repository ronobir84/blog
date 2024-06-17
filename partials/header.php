 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Blog</title>
     <script src="https://cdn.tailwindcss.com"></script>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
     
 </head>
  

 <body>

     <nav class="  w-full h-[85px] border-gray-200 dark:bg-gray-900 fixed z-10  shadow-md ">
         <div class="flex flex-wrap justify-between py-5 px-[70px]">
             <div class="flex gap-14">
                 <a href=" " class="flex items-center">
                     <h1 class="text-4xl   font-bold   from-purple-400 via-pink-400 to-blue-400 bg-gradient-to-r bg-clip-text text-transparent uppercase relative bottom-1">Blog</h1>
                 </a>

                 <div>
                     <ul class="flex gap-7">
                         <li>
                             <a class="" href="index.php">
                                 <button class=" px-6 py-2 text-lg font-semibold text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Home</button>
                             </a>
                         </li>

                         <li>
                             <div class="relative inline-block text-left">
                                 <div class="group">
                                     <button type="button" class="inline-flex justify-center items-center w-full  text-lg  font-semibold  bg-gray-800 hover:bg-gray-700    px-5 py-2 text-white ">
                                         Categories
                                         <!-- Dropdown arrow -->
                                         <svg class="w-6 h-6 ml-1 mt-[6px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                             <path fill-rule="evenodd" d="M10 12l-5-5h10l-5 5z" />
                                         </svg>
                                     </button>

                                     <!-- Dropdown menu -->
                                     <div class="absolute left-0 w-[151px] h-28 mt-1 origin-top-left bg-[#111827] divide-y divide-gray-100 shadow opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-700">
                                         <div class="py-1">
                                             <a href="#" class="block px-4 py-2 text-lg text-center font-semibold text-gray-100 duration-150 hover:bg-purple-500">Politics</a>
                                             <a href="#" class="block px-4 py-2 text-center text-lg font-semibold text-gray-100 hover:bg-purple-500">Sports</a>

                                         </div>
                                     </div>
                                 </div>
                         </li>

                         <li>
                             <a class="" href="Login.php">
                                 <button class=" px-6 py-2 text-lg font-semibold text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:bg-gray-700 ">Login</button>
                             </a>
                         </li>


                     </ul>
                 </div>


             </div>



             <div class="flex items-center space-x-6 rtl:space-x-reverse">
                 <div>
                     <input class="bg-slate-50   font-mono  ring-zinc-400     duration-300 placeholder:text-zinc-600 placeholder:opacity-50 rounded-sm px-8 py-3 shadow-md focus:shadow-lg  border-2 border-purple-500     " placeholder="Search" name="text" type="search" />

                 </div>
                 <div>
                     <div class=" relative right-[24.4px] bg-transparent items-center justify-center flex border-2 border-purple-500  hover:bg-purple-500 text-purple-500 hover:text-white duration-300 cursor-pointer active:scale-[0.98]">
                         <button class="px-6 py-3"><a class="" href="">Search</a></button>
                     </div>

                 </div>

             </div>
         </div>
     </nav>