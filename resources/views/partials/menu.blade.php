<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('dog_access')
                <li class="{{ request()->is('admin/dogs') || request()->is('admin/dogs/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.dogs.index") }}">
                        <i class="fa-fw fab fa-sticker-mule">

                        </i>
                        <span>{{ trans('cruds.dog.title') }}</span>
                    </a>
                </li>
            @endcan
            @can('litter_access')
                <li class="{{ request()->is('admin/litters') || request()->is('admin/litters/*') ? 'active' : '' }}">
                    <a href="{{ route("admin.litters.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.litter.title') }}</span>
                    </a>
                </li>
            @endcan
            @can('content_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-book">

                        </i>
                        <span>{{ trans('cruds.contentManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('content_category_access')
                            <li class="{{ request()->is('admin/content-categories') || request()->is('admin/content-categories/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.content-categories.index") }}">
                                    <i class="fa-fw fas fa-folder">

                                    </i>
                                    <span>{{ trans('cruds.contentCategory.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('content_tag_access')
                            <li class="{{ request()->is('admin/content-tags') || request()->is('admin/content-tags/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.content-tags.index") }}">
                                    <i class="fa-fw fas fa-tags">

                                    </i>
                                    <span>{{ trans('cruds.contentTag.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('content_page_access')
                            <li class="{{ request()->is('admin/content-pages') || request()->is('admin/content-pages/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.content-pages.index") }}">
                                    <i class="fa-fw fas fa-file">

                                    </i>
                                    <span>{{ trans('cruds.contentPage.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>