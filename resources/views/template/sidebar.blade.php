<div id="sidebar" class="app-sidebar">

<div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

    <div class="menu" id="menu-nya">
        <div class="menu-profile">
            <a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile" data-target="#appSidebarProfileMenu">
                <div class="menu-profile-cover with-shadow"></div>
                <div class="menu-profile-image">
                    <img src="../assets/img/user/user-13.jpg" alt="" />
                </div>
                <div class="menu-profile-info">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            Sean Ngu
                        </div>
                        <div class="menu-caret ms-auto"></div>
                    </div>
                    <small>Front end developer</small>
                </div>
            </a>
        </div>
        <div id="appSidebarProfileMenu" class="collapse">
            <div class="menu-item pt-5px">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon"><i class="fa fa-cog"></i></div>
                    <div class="menu-text">Settings</div>
                </a>
            </div>
            <div class="menu-item">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon"><i class="fa fa-pencil-alt"></i></div>
                    <div class="menu-text"> Send Feedback</div>
                </a>
            </div>
            <div class="menu-item pb-5px">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon"><i class="fa fa-question-circle"></i></div>
                    <div class="menu-text"> Helps</div>
                </a>
            </div>
            <div class="menu-divider m-0"></div>
        </div>
        <div class="menu-header">Navigation</div>
        <x-sidebar />
        
        {{-- <div class="menu-item">
            <a href="widget.html" class="menu-link">
                <div class="menu-icon">
                    <i class="fab fa-simplybuilt"></i>
                </div>
                <div class="menu-text">Widgets <span class="menu-label">NEW</span></div>
            </a>
        </div>

        <div class="menu-item ">
            <a href="bootstrap_5.html" class="menu-link">
                <div class="menu-icon-img">
                    <img src="../assets/img/logo/logo-bs5.png" alt="" />
                </div>
                <div class="menu-text">Bootstrap 5 <span class="menu-label">NEW</span></div>
            </a>
        </div>

        <div class="menu-item">
            <a href="calendar.html" class="menu-link">
                <div class="menu-icon">
                    <i class="fa fa-calendar"></i>
                </div>
                <div class="menu-text">Calendar</div>
            </a>
        </div>
 
        <div class="menu-item has-sub active">
            <a href="javascript:;" class="menu-link">
                <div class="menu-icon">
                    <i class="fa fa-cogs"></i>
                </div>
                <div class="menu-text">Page Options <span class="menu-label">NEW</span></div>
                <div class="menu-caret"></div>
            </a>
            <div class="menu-submenu">
                <div class="menu-item active">
                    <a href="page_blank.html" class="menu-link">
                        <div class="menu-text">Blank Page</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="page_with_footer.html" class="menu-link">
                        <div class="menu-text">Page with Footer</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="page_with_fixed_footer.html" class="menu-link">
                        <div class="menu-text">Page with Fixed Footer <i class="fa fa-paper-plane text-theme"></i></div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="page_without_sidebar.html" class="menu-link">
                        <div class="menu-text">Page without Sidebar</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="page_with_right_sidebar.html" class="menu-link">
                        <div class="menu-text">Page with Right Sidebar</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="page_with_minified_sidebar.html" class="menu-link">
                        <div class="menu-text">Page with Minified Sidebar</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="page_with_two_sidebar.html" class="menu-link">
                        <div class="menu-text">Page with Two Sidebar</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="page_with_line_icons.html" class="menu-link">
                        <div class="menu-text">Page with Line Icons</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="page_with_ionicons.html" class="menu-link">
                        <div class="menu-text">Page with Ionicons</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="page_full_height.html" class="menu-link">
                        <div class="menu-text">Full Height Content</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="page_with_wide_sidebar.html" class="menu-link">
                        <div class="menu-text">Page with Wide Sidebar</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="page_with_light_sidebar.html" class="menu-link">
                        <div class="menu-text">Page with Light Sidebar</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="page_with_mega_menu.html" class="menu-link">
                        <div class="menu-text">Page with Mega Menu</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="page_with_top_menu.html" class="menu-link">
                        <div class="menu-text">Page with Top Menu</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="page_with_boxed_layout.html" class="menu-link">
                        <div class="menu-text">Page with Boxed Layout</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="page_with_mixed_menu.html" class="menu-link">
                        <div class="menu-text">Page with Mixed Menu</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="page_boxed_layout_with_mixed_menu.html" class="menu-link">
                        <div class="menu-text">Boxed Layout with Mixed Menu</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="page_with_transparent_sidebar.html" class="menu-link">
                        <div class="menu-text">Page with Transparent Sidebar</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="page_with_search_sidebar.html" class="menu-link">
                        <div class="menu-text">Page with Search Sidebar <i class="fa fa-paper-plane text-theme"></i></div>
                    </a>
                </div>
            </div>
        </div> --}}


        <div class="menu-item d-flex">
            <a href="javascript:;" class="app-sidebar-minify-btn ms-auto" data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
        </div>

    </div>

</div>

</div>