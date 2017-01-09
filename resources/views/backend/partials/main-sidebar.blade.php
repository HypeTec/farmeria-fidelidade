<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ $user->gravatar_url }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ $user->first_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <ul class="sidebar-menu">
             <li class="header">MAIN NAVIGATION</li>
            <li {!! str_is(url('/backend'), url()->current()) ? 'class="active"' : '' !!}>
                <a href="{{ url('/backend') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li {!! str_is(route('lojas.index') . '*', url()->current()) ? 'class="active"' : '' !!}>
                <a href="{{ route('lojas.index') }}">
                    <i class="fa fa-list"></i> <span>Lojas</span>
                </a>
            </li>
            <li>
                <a href="#" onclick="$('#sair').submit();">
                    <i class="fa fa-sign-out"></i> <span>Sair</span>
                </a>
                <form id="sair" action="{{ url('backend/logout') }}" method="post">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </section>
</aside>
