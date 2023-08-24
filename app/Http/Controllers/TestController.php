<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Category;
use App\Models\Post;
use App\Models\Role;
use App\Models\Subscriber;
use App\Models\User;
use App\Repositories\PostRepository;
use App\Services\Currency\CurrencyService;
use App\Services\NewsPost\NewsPostService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Faker\Generator as Faker;

class TestController extends Controller
{
    //
    public function __invoke()
    {
        //$post = Post::factory(1, ['user_id' => 6])->create();
        $post = Post::find(492);
        $post->update(['is_published' => true]);
        dd($post);

        //$role = Role::where('name', 'User')->first();
        //$role = DB::table('roles')->select('id')->where('name', 'Admin')->first();
        //dump($role);
        //$sub = Subscriber::withSubscriber(1)->withAuthor(2);
        //dd($sub);
        //$user = User::find(1);
        //Auth::login($user, true);
        //Auth::logout();

        /*$post = Post::create([
            'title' => 'post1',
            'slug' => 'post1',
            'category_id' => 1,
            'is_published' => 1,
            'popular' => 1,
            'main_slider' => 1,
            'excerpt' => 'asdadsadadasdasdad',
            'content' => 'asddadasdadasd',
        ]);
        dd($post);*/
        /*$faker = app()->make(Faker::class);
        $rt = $faker->image(storage_path('app/public/userimages'), 640, 480, 'abstract', false,
            true);
        dump($rt);*/

        //Cache::tags('tag123')->put('tag345', 1235);
        //$tag = Cache::tags('tag123')->remember('tag345', 3600, function(){
        //    return 678;
        //});
        //dd($tag);
        //$currencyService = app()->make(CurrencyService::class) ;
        //dd($currencyService->getActualInfo());
        //dump(Carbon::createFromTimestamp(1685577599));
        //dd(Carbon::createFromTimestamp(1685577599)->today());
        //$npr = new NewsPostRepository();
        //dd($npr->getAllWithPaginate(10));
        //dd( User::factory()->create());
        //dd(Category::find(16)->description);
        //dd(response(true, 403));
        //$user = User::find(2);
        //dd($user->hasAnyRole(['Chief-editor']));
        //$role = Role::find(1)->users()->get();
        //dd($role);
        //$post = Post::orderBy('published_at', 'desc')->limit(10);
        //dd($post);
        //dump($post->getMiddleFormatDateAttribute());
        //dump($post->getMiddleShortMonthFormatDateAttribute());
        //dump($post->getFullShortTimeFormatDateAttribute());
    }
}
