<div class="grid grid-cols-4 gap-6 xl:grid-cols-1">
    <!-- card -->
    <div class="report-card">
        <div class="card">
            <div class="flex flex-col card-body">

                <!-- top -->
                <div class="flex flex-row items-center justify-between">
                    <div class="text-indigo-700 h6 fad fa-users"></div>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5 num-4">{{$users}}</h1>
                    <p>total users</p>
                </div>
                <!-- end bottom -->

            </div>
        </div>
        <div class="p-1 mx-4 bg-white border border-t-0 rounded rounded-t-none footer"></div>
    </div>
    <!-- end card -->


    <!-- card -->
    <div class="report-card">
        <div class="card">
            <div class="flex flex-col card-body">

                <!-- top -->
                <div class="flex flex-row items-center justify-between">
                    <div class="text-red-700 h6 fad fa-book"></div>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5 num-4">{{$books}}</h1>
                    <p>total books</p>
                </div>
                <!-- end bottom -->

            </div>
        </div>
        <div class="p-1 mx-4 bg-white border border-t-0 rounded rounded-t-none footer"></div>
    </div>
    <!-- end card -->


    <!-- card -->
    <div class="report-card">
        <div class="card">
            <div class="flex flex-col card-body">

                <!-- top -->
                <div class="flex flex-row items-center justify-between">
                    <div class="text-yellow-600 h6 fad fa-book-reader"></div>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5 num-4">{{$bookReads}}</h1>
                    <p>total read</p>
                </div>
                <!-- end bottom -->

            </div>
        </div>
        <div class="p-1 mx-4 bg-white border border-t-0 rounded rounded-t-none footer"></div>
    </div>
    <!-- end card -->


    <!-- card -->
    <div class="report-card">
        <div class="card">
            <div class="flex flex-col card-body">

                <!-- top -->
                <div class="flex flex-row items-center justify-between">
                    <div class="text-green-700 h6 fad fa-user-check"></div>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5 num-4">{{$groupActiveUsers}}</h1>
                    <p>total active group user</p>
                </div>
                <!-- end bottom -->

            </div>
        </div>
        <div class="p-1 mx-4 bg-white border border-t-0 rounded rounded-t-none footer"></div>
    </div>
    <!-- end card -->


</div>