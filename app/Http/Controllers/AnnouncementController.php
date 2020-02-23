<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;

class AnnouncementController extends Controller
{
    public function index()
    {

$shop = ShopifyApp::shop();

$themes = $shop->api()->rest('GET', '/admin/api/2019-10/themes.json')->body->themes;
$theme_id = '';
foreach($themes as $theme){
    if($theme->role == 'main'){
        $theme_id = $theme->id;
    }
}
//echo $theme_id;
//echo "<pre>";
//var_dump($themes);
//echo "</pre>";

$settings = '{
  "enabled": true,
  "message": "_____ test message"
}';

$settings_request = $shop->api()->rest('GET', '/admin/api/2019-10/themes/'. $theme_id . '/assets.json', ["asset[key]"=>"snippets/tbd__settings_appdata.liquid"]);
// echo "<pre>";
// // var_dump($settings_request);
// echo "</pre>";

// $shop->api()->rest('PUT', '/admin/api/2019-10/themes/'. $theme_id . '/assets.json', ["asset"=>["key" => "snippets/tbd__settings_appdata.liquid", "value" => $settings]]);

//$request = $shop->api()->rest('DELETE', '/admin/api/2019-10/script_tags/111850356816.json');
//$request = $shop->api()->rest('POST', '/admin/api/2019-10/script_tags.json', ["script_tag"=>['event' => 'onload', 'src' => 'https://c0b7612b.ngrok.io/helper.js']]);
//$request = $api->rest('GET', '/admin/shop.json', ['limit' => 1, 'page' => 1]);
//echo $request->body->shop->name;
//echo "<pre>";
//var_dump($settings_request->body);
//echo "</pre>";







        $announcements = Announcement::where('shop_id', ShopifyApp::shop()->id)->get();

        return view('welcome', [ 'announcements' => $announcements, 'settings' => $settings_request ]);
    }

    public function helper()
    {

        $announcement = Announcement::where('shop_id', ShopifyApp::shop()->id)->first();

        return view('helper', [ 'announcement' => $announcement  ]);
    }

    public function store(Request $request)
    {
        $announcement = new Announcement();

        $announcement->title = $request->get('title');
        $announcement->content = $request->get('content');
        $announcement->shop_id = ShopifyApp::shop()->id;

        $announcement->save();

        $announcements = Announcement::where('shop_id', ShopifyApp::shop()->id)->get();

        
        
        // updates Shopify theme files. Will not be needed once I start pulling options and settigns from database.
        $shop = ShopifyApp::shop();     
        $themes = $shop->api()->rest('GET', '/admin/api/2019-10/themes.json')->body->themes;
        $theme_id = '';
        foreach($themes as $theme){
            if($theme->role == 'main'){
                $theme_id = $theme->id;
            }
        }
        //echo $theme_id;
        //echo "<pre>";
        //var_dump($themes);
        //echo "</pre>";

        $settings = '{
        "enabled": true,
        "message": "' . $announcement->content . '"
        }';

        $shop->api()->rest('PUT', '/admin/api/2019-10/themes/'. $theme_id . '/assets.json', ["asset"=>["key" => "snippets/tbd__settings_appdata.liquid", "value" => $settings]]);
        // End updates shopify theme files

        return ['items' => $announcements];
    }
 
    public function update(Request $request)
    {
        $announcement = Announcement::find($request->id);

        $announcement->title = $request->get('title');
        $announcement->content = $request->get('content');
        $announcement->shop_id = ShopifyApp::shop()->id;

        $announcement->save();

        $announcements = Announcement::where('shop_id', ShopifyApp::shop()->id)->get();

        
        
        // updates Shopify theme files. Will not be needed once I start pulling options and settigns from database.
        $shop = ShopifyApp::shop();     
        $themes = $shop->api()->rest('GET', '/admin/api/2019-10/themes.json')->body->themes;
        $theme_id = '';
        foreach($themes as $theme){
            if($theme->role == 'main'){
                $theme_id = $theme->id;
            }
        }
        //echo $theme_id;
        //echo "<pre>";
        //var_dump($themes);
        //echo "</pre>";

        $settings = '{
        "enabled": true,
        "message": "' . $announcement->content . '"
        }';

        $shop->api()->rest('PUT', '/admin/api/2019-10/themes/'. $theme_id . '/assets.json', ["asset"=>["key" => "snippets/tbd__settings_appdata.liquid", "value" => $settings]]);
        // End updates shopify theme files

        return ['items' => $announcements];
    }
    
    
    public function delete($id)
    {
        $announcement = Announcement::find($id);

        $announcement->delete();

        $announcements = Announcement::where('shop_id', ShopifyApp::shop()->id)->get();

        
        
        // updates Shopify theme files. Will not be needed once I start pulling options and settigns from database.
        $shop = ShopifyApp::shop();     
        $themes = $shop->api()->rest('GET', '/admin/api/2019-10/themes.json')->body->themes;
        $theme_id = '';
        foreach($themes as $theme){
            if($theme->role == 'main'){
                $theme_id = $theme->id;
            }
        }
        //echo $theme_id;
        //echo "<pre>";
        //var_dump($themes);
        //echo "</pre>";

        $settings = '{
        "enabled": true,
        "message": "' . $announcement->content . '"
        }';

        $shop->api()->rest('PUT', '/admin/api/2019-10/themes/'. $theme_id . '/assets.json', ["asset"=>["key" => "snippets/tbd__settings_appdata.liquid", "value" => $settings]]);
        // End updates shopify theme files

        return ['items' => $announcements];
    }
}
