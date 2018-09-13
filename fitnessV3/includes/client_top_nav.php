<div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand logo" href="client_profile.php"><img style="width: 45px;height: 45px; padding-bottom: 12px;" src="images/Logo Blue.png" alt="Chania"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li class="active"><a href="client_profile.php">Home</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span>&nbsp;Sample</a>
                <ul  class="dropdown-menu">
                    <li><a href="#">List 1</a></li>
                    <li><a href="#">List 2</a></li>
                    <li><a href="#">List 3</a></li>
                </ul>
            </li>
            <li><a href="client_profile.php">Content</a></li>
        </ul>
        <?php $found_user = User::find_by_id($_SESSION['user_id']);?>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $found_user->Forename; ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="client_profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                    </li>
                    <li>
                        <a href="client_gallery.php"><i class="fa fa-fw fa-envelope"></i> My Photos</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-envelope"></i> My Instructor</a>
                    </li>
                    <li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>


</div>