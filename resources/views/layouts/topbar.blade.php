<a href="#" class="logo">
    <span class="logo-mini"><b>S</b>Vote</span>
    <span class="logo-lg"><b>Smart-Vote</b></span>
  </a>
  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Basculer la navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            
            <img src="https://ui-avatars.com/api/?name={{auth()->user()->prenom_electeur}}+{{auth()->user()->nom_electeur}}&background=0D8ABC&color=fff" class="user-image" alt="User Image">
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              
              <img src="https://ui-avatars.com/api/?name={{auth()->user()->prenom_electeur}}+{{auth()->user()->nom_electeur}}&background=0D8ABC&color=fff" class="img-circle" alt="User Image">

              <p>
              {{auth()->user()->prenom_electeur}} <small>Administrateur</small>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Paramètres</a>
              </div>
              <div class="pull-right">
                <a href="{{route('logout')}}" class="btn btn-default btn-flat">Déconnexion</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
