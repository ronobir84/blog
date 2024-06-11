<?php include "header.php"?>
            <!-- Begin Page Content -->
            <div class="container-fluid">
               <!-- Page Heading -->
               <h5 class="mb-2 text-black text-lg font-semibold">Blog Posts</h5>
               <!-- DataTales Example -->
               <div class="card shadow">
                  <div class="card-header py-3 d-flex justify-content-between">
                     <div>
                        <a href="">
                           <button class="  absolute   overflow-hidden  w-36 h-12 cursor-pointer flex items-center border border-blue-600 bg-blue-600 group hover:bg-blue-600 active:bg-blue-600 active:border-blue-600">
                              <span class="text-gray-200 font-semibold ml-8 transform group-hover:translate-x-20 transition-all duration-300">Add New</span>
                              <span class="absolute right-0 h-full w-10 rounded-lg bg-blue-600 flex items-center justify-center transform group-hover:translate-x-0 group-hover:w-full transition-all duration-300">
                                 <svg class="svg w-8 text-white" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="12" x2="12" y1="5" y2="19"></line>
                                    <line x1="5" x2="19" y1="12" y2="12"></line>
                                 </svg>
                              </span>
                           </button>

                        </a>
                     </div>
                     <div>
                        <form class="navbar-search">
                           <div class="flex items-center space-x-6 rtl:space-x-reverse">
                              <div>
                                 <input class="bg-slate-50   font-mono  ring-zinc-400    outline-none duration-300 placeholder:text-zinc-600 placeholder:opacity-50   px-8 py-2  focus:shadow-lg  border-2 border-sky-500   " placeholder="Search" name="text" type="search" />

                              </div>
                              <div>
                                 <div class=" relative right-[24.4px] bg-transparent items-center justify-center flex border-2 border-sky-500   cursor-pointer active:scale-[0.98]">
                                    <button class="px-6 py-2 hover:bg-sky-500 text-sky-500 hover:text-white duration-300 ">Search</button>
                                 </div>

                              </div>

                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                 <th>Sr.No</th>
                                 <th>Title</th>
                                 <th>Category</th>
                                 <th>Author</th>
                                 <th>Date</th>
                                 <th colspan="2">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
         </div>

         <?php include "footer.php"?>
         