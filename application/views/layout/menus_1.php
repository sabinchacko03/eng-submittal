<div class="app-main">
    <div class="app-sidebar sidebar-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>
        <div class="scrollbar-sidebar">
            <div class="app-sidebar__inner">
                <ul class="vertical-nav-menu">
                    <?php if ($this->session->user_type == 'manager') { ?>
                        <li class="app-sidebar__heading">
                            <a class="nav-link" href="<?= base_url() ?>home">Dashboards</a>
                        </li>
                        <li class="app-sidebar__heading">Projects</li>
                        <li>
                            <a href="<?= base_url() ?>home/view_project" class="mm-active">
                                <i class="metismenu-icon pe-7s-rocket"></i>
                                View Projects
                            </a>
                        </li>
                        <li class="app-sidebar__heading">Milestones</li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-diamond"></i>
                                Milestone Achievements
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= base_url() ?>milestone/view_milestone_overall">
                                        <i class="metismenu-icon"></i>
                                        Overall Milestones
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>milestone/view_milestone_by_project">
                                        <i class="metismenu-icon"></i>
                                        Project Milestones
                                    </a>
                                </li>

                            </ul>
                        </li>

                    <?php } elseif ($this->session->user_type == 'admin') { ?>

                        <li class="app-sidebar__heading">Projects</li>
                        <li class="app-sidebar__heading">Projects</li>
                        <li>
                            <a href="<?= base_url() ?>projects/">
                                <i class="metismenu-icon pe-7s-rocket"></i>
                                Project Management
                            </a>
                        </li>
                        <li class="app-sidebar__heading">Milestones</li>
                        <li>
                            <a href="<?= base_url() ?>milestone/">
                                <i class="metismenu-icon pe-7s-rocket"></i>
                                Project Milestones
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="metismenu-icon pe-7s-diamond"></i>
                                Milestone Achievements
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= base_url() ?>milestone/view_milestone_overall">
                                        <i class="metismenu-icon"></i>
                                        Overall Milestones
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url() ?>milestone/view_milestone_by_project">
                                        <i class="metismenu-icon"></i>
                                        Project Milestones
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="app-sidebar__heading">Billing</li>
                        <li>
                            <a href="<?= base_url() ?>billing/">
                                <i class="metismenu-icon pe-7s-rocket"></i>
                                Billing
                            </a>
                        </li>
                        <li class="app-sidebar__heading">Inspection</li>
                        <li>
                            <a href="<?= base_url() ?>inspections/">
                                <i class="metismenu-icon pe-7s-rocket"></i>
                                Inspections
                            </a>
                            <a href="<?= base_url() ?>inspections/add_master">
                                <i class="metismenu-icon pe-7s-rocket"></i>
                                Add Master
                            </a>
                        </li>
                        <li class="app-sidebar__heading">Critical Issue</li>
                        <li>
                            <a href="<?= base_url() ?>critical_issue/">
                                <i class="metismenu-icon pe-7s-rocket"></i>
                                Issues
                            </a>
                            <a href="<?= base_url() ?>critical_issue/add_master">
                                <i class="metismenu-icon pe-7s-rocket"></i>
                                Add Master
                            </a>
                        </li>
                        <li class="app-sidebar__heading">Users</li>
                        <li>
                            <a href="<?= base_url() ?>user/manage">
                                <i class="metismenu-icon pe-7s-diamond"></i>
                                User Management
                            </a>
                        </li>
                    <?php } ?>
                    <li class="app-sidebar__heading">Account</li>
                    <li>                                 
                        <a href="<?= base_url() ?>login/logout">
                            <i class="metismenu-icon pe-7s-rocket"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>