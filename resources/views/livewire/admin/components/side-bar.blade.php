  <!-- Start::app-sidebar -->
  <aside class="app-sidebar sticky" id="sidebar">

      <!-- Start::main-sidebar-header -->
      <livewire:admin.components.logo-header type="vertical" wire:key="1" />

      <!-- Start::main-sidebar -->
      <div class="main-sidebar" id="sidebar-scroll">

          <!-- Start::nav -->
          <nav class="main-menu-container nav nav-pills flex-column sub-open">
              <div class="slide-left" id="slide-left">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                      viewBox="0 0 24 24">
                      <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                  </svg>
              </div>
              <ul class="main-menu">
                  <!-- Start::slide__category -->
                  <li class="slide__category"><span class="category-name">Main</span></li>
                  <!-- End::slide__category -->

                  <!-- Start::slide -->
                  @can('admin.dashboard')
                      <li class="slide {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                          <a href="{{ route('admin.dashboard') }}"
                              class="side-menu__item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                              <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                  <path d="M0 0h24v24H0V0z" fill="none" />
                                  <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                                  <path
                                      d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                              </svg>
                              <span class="side-menu__label">Dashboard</span>
                          </a>
                      </li>
                  @endcan

                  @can('admin.testimonial.list')
                      <li class="slide {{ Route::is('admin.testimonial*') ? 'active' : '' }}">
                          <a href="{{ route('admin.testimonial.list') }}"
                              class="side-menu__item {{ Route::is('admin.testimonial*') ? 'active' : '' }}">
                              <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" fill="currentColor"
                                  class="bi bi-journal-check" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd"
                                      d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                                  <path
                                      d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                                  <path
                                      d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                              </svg>
                              <span class="side-menu__label">Testimonial</span>
                          </a>
                      </li>
                  @endcan

                  @can('admin.gallery.list')
                      <li class="slide {{ Route::is('admin.gallery*') ? 'active' : '' }}">
                          <a href="{{ route('admin.gallery.list') }}"
                              class="side-menu__item {{ Route::is('admin.gallery*') ? 'active' : '' }}">
                              <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" fill="currentColor"
                                  class="bi bi-image" viewBox="0 0 16 16">
                                  <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                  <path
                                      d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                              </svg>
                              <span class="side-menu__label">Gallery</span>
                          </a>
                      </li>
                  @endcan

                  @can('admin.projects.list')
                      <li class="slide {{ Route::is('admin.projects*') ? 'active' : '' }}">
                          <a href="{{ route('admin.projects.list') }}"
                              class="side-menu__item {{ Route::is('admin.projects*') ? 'active' : '' }}">
                              <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" fill="currentColor"
                                  class="bi bi-cast" viewBox="0 0 16 16">
                                  <path
                                      d="m7.646 9.354-3.792 3.792a.5.5 0 0 0 .353.854h7.586a.5.5 0 0 0 .354-.854L8.354 9.354a.5.5 0 0 0-.708 0" />
                                  <path
                                      d="M11.414 11H14.5a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.5-.5h-13a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5h3.086l-1 1H1.5A1.5 1.5 0 0 1 0 10.5v-7A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v7a1.5 1.5 0 0 1-1.5 1.5h-2.086z" />
                              </svg>
                              <span class="side-menu__label">Projects</span>
                          </a>
                      </li>
                  @endcan
                  @can('admin.services.index')
                      <li class="slide {{ Route::is('admin.services.index') ? 'active' : '' }}">
                          <a href="{{ route('admin.services.index') }}"
                              class="side-menu__item {{ Route::is('admin.services.index') ? 'active' : '' }}">
                              <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" fill="currentColor"
                                  class="bi bi-sliders2" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd"
                                      d="M10.5 1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4H1.5a.5.5 0 0 1 0-1H10V1.5a.5.5 0 0 1 .5-.5M12 3.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m-6.5 2A.5.5 0 0 1 6 6v1.5h8.5a.5.5 0 0 1 0 1H6V10a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5M1 8a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 1 8m9.5 2a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V13H1.5a.5.5 0 0 1 0-1H10v-1.5a.5.5 0 0 1 .5-.5m1.5 2.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5" />
                              </svg>
                              <span class="side-menu__label">Services</span>
                          </a>
                      </li>
                  @endcan
                  {{-- @can('admin.team.list')
                      <li class="slide {{ Route::is('admin.team*') ? 'active' : '' }}">
                          <a href="{{ route('admin.team.list') }}"
                              class="side-menu__item {{ Route::is('admin.team*') ? 'active' : '' }}">
                              <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" fill="currentColor"
                                  class="bi bi-diagram-3" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd"
                                      d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5zM0 11.5A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm4.5.5A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                              </svg>
                              <span class="side-menu__label">Team</span>
                          </a>
                      </li>
                  @endcan --}}
                  @can('admin.quotes.index')
                      <li class="slide {{ Route::is('admin.quotes*') ? 'active' : '' }}">
                          <a href="{{ route('admin.quotes.index') }}"
                              class="side-menu__item {{ Route::is('admin.quotes*') ? 'active' : '' }}">
                              <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" fill="currentColor"
                                  class="bi bi-diagram-3" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd"
                                      d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5zM0 11.5A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm4.5.5A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                              </svg>
                              <span class="side-menu__label">Appointments</span>
                          </a>
                      </li>
                  @endcan

                  @can('admin.blog.list')
                      <li class="slide {{ Route::is('admin.blog*') ? 'active' : '' }}">
                          <a href="{{ route('admin.blog.list') }}"
                              class="side-menu__item {{ Route::is('admin.blog*') ? 'active' : '' }}">
                              <svg xmlns="http://www.w3.org/2000/svg"class="side-menu__icon" fill="currentColor"
                                  class="bi bi-blockquote-right" viewBox="0 0 16 16">
                                  <path
                                      d="M2.5 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1zm10.113-5.373a7 7 0 0 0-.445-.275l.21-.352q.183.111.452.287.27.176.51.428.234.246.398.562.164.31.164.692 0 .54-.216.873-.217.328-.721.328-.322 0-.504-.211a.7.7 0 0 1-.188-.463q0-.345.211-.521.205-.182.569-.182h.281a1.7 1.7 0 0 0-.123-.498 1.4 1.4 0 0 0-.252-.37 2 2 0 0 0-.346-.298m-2.168 0A7 7 0 0 0 10 6.352L10.21 6q.183.111.452.287.27.176.51.428.234.246.398.562.164.31.164.692 0 .54-.216.873-.217.328-.721.328-.322 0-.504-.211a.7.7 0 0 1-.188-.463q0-.345.211-.521.206-.182.569-.182h.281a1.8 1.8 0 0 0-.117-.492 1.4 1.4 0 0 0-.258-.375 2 2 0 0 0-.346-.3z" />
                              </svg>
                              <span class="side-menu__label">Blog</span>
                          </a>
                      </li>
                  @endcan

                  @can('admin.side.bar.list')
                      <li class="slide {{ Route::is('admin.side.bar*') ? 'active' : '' }}">
                          <a href="{{ route('admin.side.bar.list') }}"
                              class="side-menu__item {{ Route::is('admin.side.bar*') ? 'active' : '' }}">
                              <svg xmlns="http://www.w3.org/2000/svg"class="side-menu__icon" fill="currentColor"
                                  class="bi bi-aspect-ratio" viewBox="0 0 16 16">
                                  <path
                                      d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5z" />
                                  <path
                                      d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0z" />
                              </svg>
                              <span class="side-menu__label">Sliders</span>
                          </a>
                      </li>
                  @endcan

                  {{-- @canany(['admin.user.list', 'admin.user.edit', 'admin.permission.list'])
                      <li
                          class="slide has-sub {{ request()->routeIs('admin.user*', 'admin.permission*', 'admin.role*', 'auth.login.setting') ? 'active open' : '' }}">
                          <a href="javascript:void(0);"
                              class="side-menu__item {{ request()->routeIs('admin.user*', 'admin.permission*', 'admin.role*', 'auth.login.setting') ? 'active' : '' }}">
                              <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                                  <path d="M0 0h24v24H0V0z" fill="none" />
                                  <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3" />
                                  <path
                                      d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z" />
                              </svg>
                              <span class="side-menu__label">Roles-Permission</span>
                              <i class="fe fe-chevron-right side-menu__angle"></i>
                          </a>
                          <ul class="slide-menu child1">
                              @can('admin.user.list')
                                  <li class="slide">
                                      <a href="{{ route('admin.user.list') }}"
                                          class="side-menu__item {{ Route::is('admin.user*') ? 'active' : '' }}">User</a>
                                  </li>
                              @endcan
                              @can('admin.role.list')
                                  <li class="slide">
                                      <a href="{{ route('admin.role.list') }}"
                                          class="side-menu__item  {{ Route::is('admin.role*') ? 'active' : '' }}">Roles</a>
                                  </li>
                              @endcan
                              @can('admin.permission.list')
                                  <li class="slide">
                                      <a href="{{ route('admin.permission.list') }}"
                                          class="side-menu__item {{ Route::is('admin.permission*') ? 'active' : '' }}">Permission</a>
                                  </li>
                              @endcan
                              @if (Auth::id() == 1)
                                  <li class="slide">
                                      <a href="{{ route('auth.login.setting') }}"
                                          class="side-menu__item {{ Route::is('auth.login.setting') ? 'active' : '' }}">
                                          Setting</a>
                                  </li>
                              @endif
                          </ul>
                      </li>
                  @endcanany --}}

                  <li class="slide {{ Route::is('auth.profile') ? 'active' : '' }}">
                      <a href="{{ route('auth.profile') }}"
                          class="side-menu__item {{ Route::is('auth.profile') ? 'active' : '' }}">
                          <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                              <path d="M0 0h24v24H0V0z" fill="none" />
                              <path
                                  d="M12 4c-4.42 0-8 3.58-8 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm3.5 4c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5zm-7 0c.83 0 1.5.67 1.5 1.5S9.33 11 8.5 11 7 10.33 7 9.5 7.67 8 8.5 8zm3.5 9.5c-2.33 0-4.32-1.45-5.12-3.5h1.67c.7 1.19 1.97 2 3.45 2s2.76-.81 3.45-2h1.67c-.8 2.05-2.79 3.5-5.12 3.5z"
                                  opacity=".3" />
                              <circle cx="15.5" cy="9.5" r="1.5" />
                              <circle cx="8.5" cy="9.5" r="1.5" />
                              <path
                                  d="M12 16c-1.48 0-2.75-.81-3.45-2H6.88c.8 2.05 2.79 3.5 5.12 3.5s4.32-1.45 5.12-3.5h-1.67c-.69 1.19-1.97 2-3.45 2zm-.01-14C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z" />
                          </svg>
                          <span class="side-menu__label">Profile</span>
                      </a>
                  </li>
                  <!-- End::slide -->
              </ul>
              <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                      width="24" height="24" viewBox="0 0 24 24">
                      <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                  </svg></div>
          </nav>
          <!-- End::nav -->

      </div>
      <!-- End::main-sidebar -->

  </aside>
  <!-- End::app-sidebar -->
