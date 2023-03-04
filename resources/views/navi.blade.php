<nav class="navbar navbar-expand-md sticky-top navbar-dark bg-dark mb-3">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/">VegeEC  商品管理システム</a>
    <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">アカウント</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/account/register">新規登録</a>
                        <a class="dropdown-item" href="{{ route('loginIndex') }}">ログイン</a>

                        <a class="dropdown-item" href="{{ route('logout') }}">ログアウト</a>
  
                </div>
            </li>
            @can('admin')
            <li class="nav-item">
                <a class="nav-link" href="/items">商品管理</a> 
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="/users">ユーザー管理</a>
            </li>
            @endcan
        </ul>
    </div>
</nav>    
