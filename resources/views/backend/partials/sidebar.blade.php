<!-- Sidebar -->
<div class="bg-dark border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-warning">Job Questions</div>
    <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action border-warning bg-dark text-warning">Dashboard</a>
        <a href="{{ route('questions.index') }}" class="{{ request()->routeIs('questions.*') ? 'active_menu' : '' }}  list-group-item list-group-item-action border-warning bg-dark text-warning">Questions</a>
        <a href="{{ route('all.lesson') }}" class="list-group-item list-group-item-action border-warning bg-dark text-warning">Practise Lessen</a>
    </div>
</div>
<!-- /#sidebar-wrapper -->


<style>
    .active_menu {
        background-color: #1d2124!important;
        color: #fff!important;
    }
</style>

