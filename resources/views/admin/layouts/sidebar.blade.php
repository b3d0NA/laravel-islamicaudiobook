  <!-- start sidebar -->
  <div id="sideBar" x-init @open-sidebar.window="$el.classList.remove('md:-ml-64')"
      @close-sidebar.window="$el.classList.add('md:-ml-64')"
      class="relative flex flex-col flex-wrap flex-none w-64 p-6 bg-white border-r border-gray-300 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster transition ease-in-out">


      <!-- sidebar content -->
      <div class="flex flex-col">

          <!-- sidebar toggle -->
          <div @click="$dispatch('close-sidebar')" class="hidden mb-4 text-right md:block">
              <button id="sideBarHideBtn">
                  <i class="fad fa-times-circle"></i>
              </button>
          </div>
          <!-- end sidebar toggle -->

          <p class="mb-4 text-xs tracking-wider text-gray-600 uppercase">home</p>

          <!-- link -->
          <a href="{{route('admin.dashboard')}}"
              class="mb-3 text-sm font-medium capitalize transition duration-500 ease-in-out hover:text-blue-600">
              <i class="mr-2 text-xs fad fa-chart-pie"></i>
              dashboard
          </a>
          <!-- end link -->

          <p class="mt-4 mb-4 text-xs tracking-wider text-gray-600 uppercase">apps</p>

          <!-- link -->
          <a href="{{route('admin.vlib.index')}}"
              class="mb-3 text-sm font-medium capitalize transition duration-500 ease-in-out hover:text-blue-600">
              <i class="mr-2 text-xs fas fa-book-reader"></i>
              virtual library
          </a>
          <!-- end link -->

          <!-- link -->
          <a href="{{route('admin.fbooks.index')}}"
              class="mb-3 text-sm font-medium capitalize transition duration-500 ease-in-out hover:text-blue-600 flex">
              <svg class="mr-2 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              featured books
          </a>
          <!-- end link -->

          <!-- link -->
          <a href="{{route('admin.users.index')}}"
              class="mb-3 text-sm font-medium capitalize transition duration-500 ease-in-out hover:text-blue-600">
              <i class="mr-2 text-xs fas fa-users"></i>
              users
          </a>
          <!-- end link -->

          <!-- link -->
          <a href="{{route('admin.users.payments.index')}}"
              class="mb-3 text-sm font-medium capitalize transition duration-500 ease-in-out hover:text-blue-600 flex">
              <svg class="mr-2 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M11 11V9a2 2 0 00-2-2m2 4v4a2 2 0 104 0v-1m-4-3H9m2 0h4m6 1a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              payments
          </a>
          <!-- end link -->

          <!-- link -->
          <a href="{{route('admin.users.sendmail.index')}}"
              class="mb-3 text-sm font-medium capitalize transition duration-500 ease-in-out hover:text-blue-600">
              <i class="mr-2 text-xs fas fa-envelope"></i>
              send email to users
          </a>
          <!-- end link -->

          <!-- link -->
          <a href="{{route('admin.settings.index')}}"
              class="mb-3 text-sm font-medium capitalize transition duration-500 ease-in-out hover:text-blue-600">
              <i class="mr-2 text-xs fas fa-cogs"></i>
              settings
          </a>
          <!-- end link -->
      </div>
      <!-- end sidebar content -->

  </div>
  <!-- end sidbar -->