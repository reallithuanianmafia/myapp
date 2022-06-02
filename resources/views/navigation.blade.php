<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}">CRM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::routeIs('company.index') ? 'active' : '' }}" aria-current="page" href="{{route('company.index')}}">Companies</a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('employee.index') ? 'active' : '' }}" aria-current="page" href="{{route('employee.index')}}">Employees</a>
        </li>
      </ul>
    </div>
  </div>
</nav>