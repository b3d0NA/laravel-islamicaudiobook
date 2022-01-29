@include('./base/start.html')


@include('./base/navbar.html')


<!-- strat wrapper -->
<div class="flex flex-row flex-wrap h-screen">

    @include('./base/sidebar.html')

    <!-- strat content -->
    <div class="flex-1 p-6 bg-gray-100 md:mt-16">
        content here
    </div>
    <!-- end content -->

</div>
<!-- end wrapper -->



@include('./base/end.html')