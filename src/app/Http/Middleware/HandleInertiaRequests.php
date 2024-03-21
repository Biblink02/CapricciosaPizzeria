<?php
namespace App\Http\Middleware;

use App\Actions\Navigation\GetSidebar;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tighten\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';
    private GetSidebar $getSidebar;
    public function __construct(GetSidebar $getSidebar)
    {
        $this->getSidebar = $getSidebar;
    }

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $share = [
            'sidebar' => $this->getSidebar->get(),
        ];

        return array_merge(parent::share($request), $share);
    }
}
