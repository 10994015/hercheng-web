<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>赫成教育後臺管理系統</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
    <link rel="stylesheet" href="/css/style.css">
    @livewireStyles
    @livewireScripts
</head>
<body>
   <div id="app" x-data="{
        isCloseSidebar:false,
        sideBar:{
            isArticle:false,
        },
        closeSideBarFn(){
            this.isCloseSidebar = !this.isCloseSidebar
            this.sideBar.isArticle = false
        },
        isSideBarOpenFn:function(ev){
            this.sideBar[ev.name] = true
        }
   }" x-on:is-open-sidebar.window="isSideBarOpenFn($event.detail)">
       @include('../livewire/cms/components/header')
        <div class="main">
            @include('../livewire/cms/components/sidebar')
            <main>
                <div class="router-view">
                    {{$slot}}
                </div>
                @include('../livewire/cms/components/footer')
            </main>
        </div>

   </div>
    
</body>
</html>