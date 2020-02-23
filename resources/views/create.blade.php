@extends('shopify-app::layouts.default')

@section('content')

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
            <div class="Polaris-Card">
                <div class="Polaris-CalloutCard__Container">
                    <div class="Polaris-Card__Section">
                        <div class="Polaris-CalloutCard">
                            <div class="Polaris-CalloutCard__Content">
                                <div class="Polaris-CalloutCard__Title">
                                    <h2 class="Polaris-Heading">Create an Announcment</h2>
                                </div>
                                <div class="Polaris-TextContainer">
                                    <p>Fill out the form below</p>
                                    <form method="POST" action="/">
                                        {{ csrf_field() }}
                                        <input name="title" type="text" placeholder="Title">
                                        <textarea name="message" placeholder="Content"></textarea>
                                        <button class="Polaris-Button" type="submit">Create</button>
                                    </form>
                                </div>
                            </div><img src="https://cdn.shopify.com/s/assets/admin/checkout/settings-customizecart-705f57c725ac05be5a34ec20c05b94298cb8afd10aac7bd9c7ad02030f48cfa0.svg" alt="" class="Polaris-CalloutCard__Image">
                        </div>
                    </div>
                </div>
            </div>
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
@endsection