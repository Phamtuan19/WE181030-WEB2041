<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\User;

use App\Models\Module;

use App\Models\Post;

use App\Policies\PostPolicy;

use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $moduleList = Module::all();

        if ($moduleList->count() > 0) {
            foreach ($moduleList as $module) {

                Gate::define($module->name, function (User $user) use ($module) {

                    $roleJson = $user->position->permissions;

                    if (!empty($roleJson)) {
                        $roleArr = json_decode($roleJson, true);

                        $check = isRole($roleArr, $module->name);

                        return $check;
                    }

                    return false;
                });

                Gate::define($module->name . '.add', function (User $user) use ($module) {

                    $roleJson = $user->position->permissions;

                    if (!empty($roleJson)) {
                        $roleArr = json_decode($roleJson, true);

                        $check = isRole($roleArr, $module->name, 'add');
                        // dd($check);
                        return $check;
                    }

                    return false;
                });

                Gate::define($module->name . '.edit', function (User $user) use ($module) {

                    $roleJson = $user->position->permissions;

                    if (!empty($roleJson)) {
                        $roleArr = json_decode($roleJson, true);

                        $check = isRole($roleArr, $module->name, 'edit');
                        // dd($check);
                        return $check;
                    }

                    return false;
                });

                Gate::define($module->name . '.delete', function (User $user) use ($module) {

                    $roleJson = $user->position->permissions;

                    if (!empty($roleJson)) {
                        $roleArr = json_decode($roleJson, true);

                        $check = isRole($roleArr, $module->name, 'delete');
                        // dd($check);
                        return $check;
                    }

                    return false;
                });
            }
        }
    }
}
