<div class="top_nav">
    <div class="nav_menu">
      <nav>
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>

        <ul class="nav navbar-nav navbar-right">
          <li class="">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="../../new_images/flag-phil.png" alt="">{{ fname }} {{ lname}}
              <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu pull-right">
              <li><a href="javascript:;"> Profile</a></li>
              <li>
                <a ui-sref="profile_settings">
                  <span class="badge bg-red pull-right">50%</span>
                  <span>Settings</span>
                </a>
              </li>
              <li><a href="javascript:;">Help</a></li>
              <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
            </ul>
          </li>

	<li class="date-time">
		<p><img src="../../new_images/flag-japan.png" width="20px" /> {{ phTime | date:'hh:m a' : 'GMT+9' }}<br /><span>July 29, 2016</p>
	</li>
	<li class="date-time">
		<p><img src="../../new_images/flag-phil.png" width="20px" /> {{ phTime | date:'hh:m a' }}<br /><span> {{ phTime | date: 'mediumDate' }}</p>
	</li>
        </ul>
      </nav>
    </div>
  </div>