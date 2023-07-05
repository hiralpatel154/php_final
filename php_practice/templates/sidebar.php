<div class="col-lg-2 logo-bg sidenav-box">
    <div class="sidenav-scroll">
        <nav class='nav-menu'>
            <ul class="menu-list">
                <li class='title'><a href='javascript:void(0)'>Home<div class='fa fa-caret-down right'>
                        </div></a>
                    <ul <?php if(trim($_GET['view'])=='home'){ ?>class="list" <?php }else{ ?>class="list" <?php } ?>>
                        <li <?php if(trim($_GET['view'])=='home'){ ?>class="sub-list text-center d-flex align-items-center active"
                            <?php }else{ ?>class="sub-list text-center d-flex align-items-center" <?php } ?>>
                            <a type="button" class="" href="index.php?view=home">Dashboard</a>
                        </li>
                    </ul>
                </li>
                <li class='title'><a href='javascript:void(0)'>Pages<div class='fa fa-caret-down right'>
                        </div></a>
                    <ul <?php if(trim($_GET['view'])=='add_page'|| trim($_GET['view'])=='read'){ ?>class="list"
                        <?php }else{ ?>class="list" <?php } ?>>

                        <li <?php if(trim($_GET['view'])=='add_page'){ ?>class="sub-list text-center d-flex align-items-center active"
                            <?php }else{ ?>class="sub-list text-center d-flex align-items-center" <?php } ?>>
                            <i class="fa-solid fa-plus text-white"></i><a type="button" class="list-item"
                                href="index.php?view=add_page">Add Page</a>
                        </li>
                        <li <?php if(trim($_GET['view'])=='read'){ ?>class="sub-list text-center d-flex align-items-center"
                            <?php }else{ ?>class="sub-list text-center d-flex align-items-center" <?php } ?>>
                            <i class="fa-solid fa-list text-white"></i>
                            <a href='index.php?view=read' class="list-item">


                                List Pages</a>
                        </li>

                    </ul>
                </li>
                <li class='title'><a href='javascript:void(0)'>Country<div class='fa fa-caret-down right'>
                        </div></a>
                    <ul <?php if(trim($_GET['view'])=='add_country'|| trim($_GET['view'])=='read_country'){ ?>class="list"
                        <?php }else{ ?>class="list" <?php } ?>>

                        <li <?php if(trim($_GET['view'])=='add_country'){ ?>class="sub-list text-center d-flex align-items-center"
                            <?php }else{ ?>class="sub-list text-center d-flex align-items-center" <?php } ?>>
                            <i class="fa-solid fa-plus text-white"></i><a type="button" class="list-item"
                                href="index.php?view=add_country">Add Country</a>
                        </li>
                        <li <?php if(trim($_GET['view'])=='read_country'){ ?>class="sub-list text-center d-flex align-items-center"
                            <?php }else{ ?>class="sub-list text-center d-flex align-items-center" <?php } ?>>
                            <i class="fa-solid fa-list text-white"></i>
                            <a href='index.php?view=read_country' class="list-item">


                                Country List</a>
                        </li>

                    </ul>
                </li>
                <li class='title'><a href='javascript:void(0)'>State<div class='fa fa-caret-down right'>
                        </div></a>
                    <ul <?php if(trim($_GET['view'])=='add_state'|| trim($_GET['view'])=='read_state'){ ?>class="list"
                        <?php }else{ ?>class="list" <?php } ?>>

                        <li <?php if(trim($_GET['view'])=='add_state'){ ?>class="sub-list text-center d-flex align-items-center active"
                            <?php }else{ ?>class="sub-list text-center d-flex align-items-center" <?php } ?>>
                            <i class="fa-solid fa-plus text-white"></i><a type="button" class="list-item"
                                href="index.php?view=add_state">Add State</a>
                        </li>
                        <li <?php if(trim($_GET['view'])=='read_state'){ ?>class="sub-list text-center d-flex align-items-center active"
                            <?php }else{ ?>class="sub-list text-center d-flex align-items-center" <?php } ?>>
                            <i class="fa-solid fa-list text-white"></i>
                            <a href='index.php?view=read_state' class="list-item">


                                State List</a>
                        </li>

                    </ul>
                </li>
                <li class='title'><a href='javascript:void(0)'>City<div class='fa fa-caret-down right'>
                        </div></a>
                    <ul <?php if(trim($_GET['view'])=='add_city'|| trim($_GET['view'])=='read_city'){ ?>class="list"
                        <?php }else{ ?>class="list" <?php } ?>>

                        <li <?php if(trim($_GET['view'])=='add_city'){ ?>class="sub-list text-center d-flex align-items-center active"
                            <?php }else{ ?>class="sub-list text-center d-flex align-items-center" <?php } ?>>
                            <i class="fa-solid fa-plus text-white"></i><a type="button" class="list-item"
                                href="index.php?view=add_city">Add City</a>
                        </li>
                        <li <?php if(trim($_GET['view'])=='read_city`'){ ?>class="sub-list text-center d-flex align-items-center active"
                            <?php }else{ ?>class="sub-list text-center d-flex align-items-center" <?php } ?>>
                            <i class="fa-solid fa-list text-white"></i>
                            <a href='index.php?view=read_city' class="list-item">


                                City List</a>
                        </li>

                    </ul>
                </li>




            </ul>
        </nav>
    </div>
</div>