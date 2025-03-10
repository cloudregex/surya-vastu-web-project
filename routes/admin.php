 <?php

   use App\Livewire\Admin\AdminDashboard;
   use App\Livewire\Admin\Auth\Profile;
   use App\Livewire\Admin\Page\Blog\BlogCreate;
   use App\Livewire\Admin\Page\Blog\BlogEdit;
   use App\Livewire\Admin\Page\Blog\BlogIndex;
   use App\Livewire\Admin\Page\Blog\BlogTrash;
   use App\Livewire\Admin\Page\Gallery\GalleryCreate;
   use App\Livewire\Admin\Page\Gallery\GalleryEdit;
   use App\Livewire\Admin\Page\Gallery\GalleryIndex;
   use App\Livewire\Admin\Page\Gallery\GalleryTrash;
   use App\Livewire\Admin\Page\Projects\ProjectCreate;
   use App\Livewire\Admin\Page\Projects\ProjectEdit;
   use App\Livewire\Admin\Page\Projects\ProjectIndex;
   use App\Livewire\Admin\Page\Projects\ProjectTrash;
   use App\Livewire\Admin\Page\Service\ServiceCreate;
   use App\Livewire\Admin\Page\Service\ServiceEdit;
   use App\Livewire\Admin\Page\Service\ServiceIndex;
   use App\Livewire\Admin\Page\Service\ServiceTrash;
   use App\Livewire\Admin\Page\SideBar\SideBarCreate;
   use App\Livewire\Admin\Page\SideBar\SideBarEdit;
   use App\Livewire\Admin\Page\SideBar\SideBarIndex;
   use App\Livewire\Admin\Page\SideBar\SideBarTrash;
   use App\Livewire\Admin\Page\Team\TeamCreate;
   use App\Livewire\Admin\Page\Team\TeamEdit;
   use App\Livewire\Admin\Page\Team\TeamIndex;
   use App\Livewire\Admin\Page\Team\TeamTrash;
   use App\Livewire\Admin\Page\Testimonial\TestimonialCreate;
   use App\Livewire\Admin\Page\Testimonial\TestimonialEdit;
   use App\Livewire\Admin\Page\Testimonial\TestimonialIndex;
   use App\Livewire\Admin\Page\Testimonial\TestimonialTrash;
   use Illuminate\Support\Facades\Route;
   use App\Livewire\Admin\UserManagement\LoginSetting\LoginSetting;
   use App\Livewire\Admin\UserManagement\Permission\PermissionCreate;
   use App\Livewire\Admin\UserManagement\Permission\PermissionIndex;
   use App\Livewire\Admin\UserManagement\Role\RoleCreate;
   use App\Livewire\Admin\UserManagement\Role\RoleEdit;
   use App\Livewire\Admin\UserManagement\Role\RoleIndex;
   use App\Livewire\Admin\UserManagement\Users\UserCreate;
   use App\Livewire\Admin\UserManagement\Users\UserEdit;
   use App\Livewire\Admin\UserManagement\Users\UserIndex;
   use App\Livewire\Admin\UserManagement\Users\UserTrash;

   //================================================= TEMPLATE ADMIN AUTH ROUTE ======================================================
   // Admin Dashboard
   Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
   // User Route
   Route::get('/admin/user-list', UserIndex::class)->name('admin.user.list');
   Route::get('/admin/user-delete/{encryptedId}', [UserIndex::class, 'DeleteUser'])->name('admin.user.delete');
   Route::get('/admin/user-trash', UserTrash::class)->name('admin.user.trash');
   Route::get('/admin/user-create', UserCreate::class)->name('admin.user.create');
   Route::get('/admin/user-edit/{encryptedId}', UserEdit::class)->name('admin.user.edit');
   // Role Route
   Route::get('/admin/role-list', RoleIndex::class)->name('admin.role.list');
   Route::get('/admin/role-create', RoleCreate::class)->name('admin.role.create');
   Route::get('/admin/role-edit/{encryptedId}', RoleEdit::class)->name('admin.role.edit');
   // Permission Route
   Route::get('/admin/permission-list', PermissionIndex::class)->name('admin.permission.list');
   Route::get('/permissions/permission-create', PermissionCreate::class)->name('admin.permission.create');
   // Login Settings
   Route::get('/admin/login-setting', LoginSetting::class)->name('auth.login.setting');
   // Profile Route
   Route::get('/admin/profile', Profile::class)->name('auth.profile');
   //===================================================== END ADMIN AUTH ROUTE =======================================================


   // ======================================================= Pages Routes ============================================================

   // testimonial
   Route::get('/admin/testimonial-list', TestimonialIndex::class)->name('admin.testimonial.list');
   Route::get('/admin/testimonial-delete/{encryptedId}', [TestimonialIndex::class, 'DeleteUser'])->name('admin.testimonial.delete');
   Route::get('/admin/testimonial-trash', TestimonialTrash::class)->name('admin.testimonial.trash');
   Route::get('/admin/testimonial-create', TestimonialCreate::class)->name('admin.testimonial.create');
   Route::get('/admin/testimonial-edit/{encryptedId}', TestimonialEdit::class)->name('admin.testimonial.edit');

   // blog
   Route::get('/admin/blog-list', BlogIndex::class)->name('admin.blog.list');
   Route::get('/admin/blog-delete/{encryptedId}', [BlogIndex::class, 'DeleteUser'])->name('admin.blog.delete');
   Route::get('/admin/blog-trash', BlogTrash::class)->name('admin.blog.trash');
   Route::get('/admin/blog-create', BlogCreate::class)->name('admin.blog.create');
   Route::get('/admin/blog-edit/{encryptedId}', BlogEdit::class)->name('admin.blog.edit');

   // projects
   Route::get('/admin/projects-list', ProjectIndex::class)->name('admin.projects.list');
   Route::get('/admin/projects-delete/{encryptedId}', [ProjectIndex::class, 'DeleteUser'])->name('admin.projects.delete');
   Route::get('/admin/projects-trash', ProjectTrash::class)->name('admin.projects.trash');
   Route::get('/admin/projects-create', ProjectCreate::class)->name('admin.projects.create');
   Route::get('/admin/projects-edit/{encryptedId}', ProjectEdit::class)->name('admin.projects.edit');

   // team
   Route::get('/admin/team-list', TeamIndex::class)->name('admin.team.list');
   Route::get('/admin/team-delete/{encryptedId}', [TeamIndex::class, 'DeleteUser'])->name('admin.team.delete');
   Route::get('/admin/team-trash', TeamTrash::class)->name('admin.team.trash');
   Route::get('/admin/team-create', TeamCreate::class)->name('admin.team.create');
   Route::get('/admin/team-edit/{encryptedId}', TeamEdit::class)->name('admin.team.edit');

   // gallery
   Route::get('/admin/gallery-list', GalleryIndex::class)->name('admin.gallery.list');
   Route::get('/admin/gallery-delete/{encryptedId}', [galleryIndex::class, 'DeleteUser'])->name('admin.gallery.delete');
   Route::get('/admin/gallery-trash', GalleryTrash::class)->name('admin.gallery.trash');
   Route::get('/admin/gallery-create', GalleryCreate::class)->name('admin.gallery.create');
   Route::get('/admin/gallery-edit/{encryptedId}', GalleryEdit::class)->name('admin.gallery.edit');

   // Side bar info
   Route::get('/admin/side-bar-list', SideBarIndex::class)->name('admin.side.bar.list');
   Route::get('/admin/side-bar-delete/{encryptedId}', [SideBarIndex::class, 'DeleteUser'])->name('admin.side.bar.delete');
   Route::get('/admin/side-bar-trash', SideBarTrash::class)->name('admin.side.bar.trash');
   Route::get('/admin/side-bar-create', SideBarCreate::class)->name('admin.side.bar.create');
   Route::get('/admin/side-bar-edit/{encryptedId}', SideBarEdit::class)->name('admin.side.bar.edit');

   // services
   Route::get('/admin/services-list', ServiceIndex::class)->name('admin.services.index');
   Route::get('/admin/services-delete/{encryptedId}', [ServiceIndex::class, 'DeleteService'])->name('admin.services.delete');
   Route::get('/admin/services-trash', ServiceTrash::class)->name('admin.services.trash');
   Route::get('/admin/services-create', ServiceCreate::class)->name('admin.services.create');
   Route::get('/admin/services-edit/{encryptedId}', ServiceEdit::class)->name('admin.services.edit');
    
   // ===================================================== End Pages Routes ==========================================================