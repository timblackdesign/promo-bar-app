@extends('default')

@section('content')
<?php
//$shop = ShopifyApp::shop();

//$themes = $shop->api()->rest('GET', '/admin/api/2019-10/themes.json')->body->themes;
//$theme_id = '';
//foreach($themes as $theme){
//    if($theme->role == 'main'){
 //       $theme_id = $theme->id;
//    }
//}
//echo $theme_id;
//echo "<pre>";
//var_dump($themes);
//echo "</pre>";

//$settings = '{
//  "enabled": true,
//  "message": "Test message"
//}';

//$settings_request = $shop->api()->rest('GET', '/admin/api/2019-10/themes/'. $theme_id . '/assets.json', ["asset[key]"=>"snippets/tbd__settings_appdata.liquid"]);

//if(!$settings_request){
    //$shop->api()->rest('PUT', '/admin/api/2019-10/themes/'. $theme_id . '/assets.json', ["asset"=>["key" => "snippets/tbd__settings_appdata.liquid", "value" => $settings]]);
//}
//$shop->api()->rest('PUT', '/admin/api/2019-10/themes/'. $theme_id . '/assets.json', ["asset"=>["key" => "snippets/tbd__settings_appdata.liquid", "value" => $settings]]);
//$request = $shop->api()->rest('DELETE', '/admin/api/2019-10/script_tags/111850356816.json');
//$request = $shop->api()->rest('POST', '/admin/api/2019-10/script_tags.json', ["script_tag"=>['event' => 'onload', 'src' => 'https://c0b7612b.ngrok.io/helper.js']]);
//$request = $api->rest('GET', '/admin/shop.json', ['limit' => 1, 'page' => 1]);
//echo $request->body->shop->name;
echo "<pre>";
//var_dump($settings);
echo "</pre>";
?>

<div style="--top-bar-background:#00848e; --top-bar-background-lighter:#1d9ba4; --top-bar-color:#f9fafb;">
    <div class="Polaris-Page">
        <div class="Polaris-Page-Header Polaris-Page-Header--separator">
            <div class="Polaris-Page-Header__MainContent">
                <div class="Polaris-Page-Header__TitleActionMenuWrapper">
                    <div>
                        <div class="Polaris-Header-Title__TitleAndSubtitleWrapper">
                            <div class="Polaris-Header-Title">
                                <h1 class="Polaris-DisplayText Polaris-DisplayText--sizeLarge">Settings</h1>
                                <p>You are: {{ ShopifyApp::shop()->shopify_domain }}</p>
                                <p>Your Shop ID: {{ ShopifyApp::shop()->id }}</p>
                                <!-- <button class="Polaris-Button">Example button</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="--top-bar-background:#00848e; --top-bar-background-lighter:#1d9ba4; --top-bar-color:#f9fafb;">   
            {{-- <photoshop v-model="colors" />      --}}
            <example-component :items="{{$announcements}}"></example-component> 
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@parent

<script type="text/javascript">
    var AppBridge = window['app-bridge'];
    var actions = AppBridge.actions;
    var TitleBar = actions.TitleBar;
    var Button = actions.Button;
    var Redirect = actions.Redirect;
    var titleBarOptions = {
        title: 'Welcome',
    };
    var myTitleBar = TitleBar.create(app, titleBarOptions);
</script>
<script type="text/javascript" src="/js/app.js"></script>
@endsection